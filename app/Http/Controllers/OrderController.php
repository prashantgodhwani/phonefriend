<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDevice;
use App\Phone;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Softon\Indipay\Facades\Indipay;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['ShowResponse'], ['only' => ['response']]);
        $this->middleware(['auth','isUser','isBanned']);
    }

    public function returnCart(){
        $amt = (int)str_replace(",", "", Cart::subtotal()); $shipping = 0;
        if($amt <= 10000 && $amt > 0 )
            $shipping = 106;
        elseif($amt > 10000 && $amt <= 20000)
            $shipping = 165;
        elseif($amt > 20000)
            $shipping = 234;
        else
            $shipping = 0;
        return view('cart.index',compact('shipping'));
    }


    public function response(Request $request)
    {
        // For Otherthan Default Gateway
        $response = Indipay::gateway('CCAvenue')->response($request);


        Order::where('order_id', $response['order_id'])
            ->update(['tracking_id' => $response['order_id'],'bank_ref_no'=>$response['bank_ref_no'],'order_status'=>$response['order_status'],'payment_mode'=>$response['payment_mode'],'card_name'=>$response['card_name']]);

        $order_id=$response['order_id'];
        if($response['order_status']=="Success"){
            foreach (Cart::content() as $content) {
                $phone = Phone::find($content->id);
                $phone->units_rem = $phone->units_rem - 1;
                $phone->units = $phone->units - 1;
                $phone->units = $phone->units - 1;
                $phone->save();
            }

            $request->session()->put('order', 'Success');
            event(new \App\Events\OrderConfirmed(\App\Order::where('order_id',$order_id)->first()));
            return view('cart.success',compact('order_id'));
        }
        else{
            $request->session()->put('order', $response['order_status']);
            $request->session()->flash('status', 'Items have been re-stored to your cart for your convenience');
            return view('cart.failed',compact('order_id'));
        }

    }

    function number_unformat($number, $force_number = true, $dec_point = '.', $thousands_sep = ',') {
        if ($force_number) {
            $number = preg_replace('/^[^\d]+/', '', $number);
        } else if (preg_match('/^[^\d]+/', $number)) {
            return false;
        }
        $type = (strpos($number, $dec_point) === false) ? 'int' : 'float';
        $number = str_replace(array($dec_point, $thousands_sep), array('.', ''), $number);
        settype($number, $type);
        return $number;
    }

    public function checkout(){
        $cities = DB::table('statelist')->orderBy('city_name', 'asc')->get();
        $states = DB::table('statelist')->orderBy('state', 'asc')->select('state')->groupby('state')->get();
        $amt = $this->number_unformat(Cart::subtotal());
        if($amt <= 10000 && $amt > 0 )
            $shipping = 106;
        elseif($amt > 10000 && $amt <= 20000)
            $shipping = 165;
        elseif($amt > 20000)
            $shipping = 234;
        else
            $shipping = 0;
        return view('cart.checkout',compact('cities','states', 'shipping'));
    }


    public function storeOrder(Request $request){
        $amt = $this->number_unformat(Cart::subtotal());
        if($amt <= 10000 && $amt > 0 )
            $shipping = 106;
        elseif($amt > 10000 && $amt <= 20000)
            $shipping = 165;
        elseif($amt > 20000)
            $shipping = 234;
        else
            $shipping = 0;
        $val = $this->number_unformat(Cart::subtotal()) + $shipping;
        if($val <= 0 || Cart::count() <= 0) {
            $request->session()->flash('alert', 'No items in cart or Order value less than permitted. Please add some items and try again.');
            return redirect()->route('cart');
        }
        $this->validate($request, [
            'deliver_phone' => 'required|digits_between:10,10',
            'deliver_fname' => 'required',
            'deliver_lname' => 'required',
            'deliver_add1' => 'required',
            // 'deliver_cityid' => 'required',
            'payment_method' => [
                'required',
                Rule::in(['ccdc', 'cod']),
            ],
            'postcode' => 'required'
        ]);
        $request['user_id']=Auth::user()->id;
        $id = strtoupper(str_random(5));
        $now=Carbon::now();
        $id = substr($id.'-'.$now->format('mdHisu'),0,20);
        $validator = \Validator::make(['id'=>$id],['id'=>'unique:orders,order_id']);
        if($validator->fails()){
            $this->randomId();
        }
        $request['order_id']=$id;
        $amount = $val;
        if($request->session()->has('coupon')){
            $amount = $amount -  $request->session()->get('coupon_value');
        }
        $request['amount']= $amount;
        $request['nop']=Cart::count();
        $request['district']=$request->deliver_cityid;
        $request['payment_mode']=$request->payment_method;
        $request['order_status']="UP";
        $request['state']=$request->billing_state;
        $order=Order::create($request->all());

        // dd(Cart::content()->toArray());
        foreach (Cart::content() as $content) {
            if (strpos($content->name, 'Warranty') !== false) {
                $exp = explode('+',$content->name);
                $month = $exp[1];
                //dd($month);
                OrderDevice::create([
                    'order_id'=>$order->id,
                    'phone_id'=>$content->id,
                    'phone_color'=>$month,
                    'status'=> 0,
                    'warranty_duration' => 12
                ]);
            }else{
                //dd($content->name);
                OrderDevice::create([
                    'order_id'=>$order->id,
                    'phone_id'=>$content->id,
                    'phone_color'=>$content->name,
                    'status'=> 0,
                    'warranty_duration' => 12
                ]);
            }
        }
        $orderid=$order->id;
        $order_id=$order->order_id;
        if($request->payment_method=="cod"){
            Order::where('id', $orderid)
                ->update(['order_status' => "Success"]);
            foreach (Cart::content() as $content) {
                $phone = Phone::find($content->id);
                $phone->units_rem = $phone->units_rem - 1;
                $phone->save();
            }
            if($request->session()->has('coupon')){
                \DB::table('issued_coupons')
                    ->where('email', \Auth::user()->email)
                    ->update(
                        [
                            'is_used' => 1,

                        ]
                    );
                $request->session()->forget('coupon');
                $request->session()->forget('coupon_value');
            }


            $request->session()->put('order', 'Success');

            event(new \App\Events\OrderConfirmed($order));
            return view('cart.success',compact('order_id'));
        }  else {
            $finalAmount = $order->amount - (($order->amount * 1.5)/100);
            if($request->session()->has('coupon')){
                $finalAmount = $finalAmount -  $request->session()->get('coupon_value');
            }
            $parameters = [

                'tid' => $order->id,

                'order_id' => $order->order_id,

                'amount' => (int)$finalAmount,

                'billing_name' => $order->deliver_fname,

                'billing_country' => 'India',

                'billing_tel' => $order->deliver_phone,

                'billing_email' => Auth::user()->email

            ];

            // gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Mocker

            $order = Indipay::gateway('CCAvenue')->prepare($parameters);
            $request->session()->put('order', 'init');
            return Indipay::process($order);
        }
    }
}
