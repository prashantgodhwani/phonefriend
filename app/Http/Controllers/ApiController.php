<?php

namespace App\Http\Controllers;

use App\Data;
use App\Phone;
use App\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Ixudra\Curl\Facades\Curl;
use Gloudemans\Shoppingcart\Facades\Cart;
use PhpParser\Node\Expr\Cast\Object_;

class ApiController extends Controller
{
    public function __construct()
    {
//       // $this->middleware(['auth','isBanned']);
//        $this->middleware('isMerchant', ['only' => ['getModel']]);
        $this->middleware('CartHasItems', ['only' => ['deleteFromCart']]);
    }

    public function getModel(Request $request){
        $models=Data::select("model","id","storage")->where('company',$request->company)->take(100)->orderBy('id', 'desc')->get();
        return response()->json($models);
    }

    public function isEligibleForDiscount(Request $request){
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
        $amt = number_unformat(Cart::subtotal());
        if($amt <= 10000 && $amt > 0 )
            $shipping = 106;
        elseif($amt > 10000 && $amt <= 20000)
            $shipping = 165;
        elseif($amt > 20000)
            $shipping = 234;
        else
            $shipping = 0;
        $subtotal = number_unformat(Cart::subtotal()) + $shipping;
        if($request->payment_mode === "ccdc"){
            $data['total'] = number_format($subtotal, 2);
            $data['subtotal'] =   $subtotal - (($subtotal * 1.5)/100);
            $data['discount'] = (($subtotal * 1.5)/100);
            $data['discount_code'] = 'PREPAID_DISCOUNT_AT_PHONEFRIEND';
        }else {
            $data['total'] = number_format($subtotal, 2);
            $data['subtotal'] = $subtotal;
            $data['discount'] = 0.0;
        }
        $response['data'] = $data;
        $response['status'] = 'Success';
        $response['code'] = 200;
        return response()->json($response);
    }



    public function addToCart(Request $request){

//  $warranty = $request->warranty;
        //print_r($warranty); die;
        //if(isset($warranty)){
        //$exp = explode('_',$warranty);
        //if($exp[0] == 3){
        //$month = $exp[0]." Month Warranty purchase";
        //}elseif($exp[0] == 6){
        //$month = $exp[0]." Month Warranty purchase";
        //}else{
        //$month = $exp[0]." Month Warranty purchase";
        //}
        // $price= $exp[1];
        //}
        $phone=Phone::find($request->phone);
        $flag=0;
        foreach (Cart::content() as $prod){
            if($prod->id === $phone->id){
                $flag=1;
                break;
            }
        }
        if($flag==0) {
//    if(isset($warranty)){
//    //$cart = Cart::add(['id' => $phone->id , 'name' => (ucfirst($month)), 'qty' => 1, 'price' => $price]);
            //$cart =  Cart::add(['id' => $phone->id, 'name' => (ucfirst($phone->data->company) . " " . $phone->data->model . " + " .$month), 'qty' => 1, 'price' => $phone->price+$price]);
//  }else{
            $cart =  Cart::add(['id' => $phone->id, 'name' => (ucfirst($phone->data->company) . " " . $phone->data->model). " + 12 Months Seller Warranty", 'qty' => 1, 'price' => $phone->price]);
        }
        else{
            $cart="Already Added to cart.";
        }
        return response()->json($cart);
    }

    public function buyNow(Request $request){
//	$warranty = $request->warranty;
//	if(isset($warranty)){
//		$exp = explode('_',$warranty);
//		if($exp[0] == 3){
//			$month = $exp[0]." Month Warranty purchase";
//		}elseif($exp[0] == 6){
//			$month = $exp[0]." Month Warranty purchase";
//		}else{
//			$month = $exp[0]." Month Warranty purchase";
//		}
//		$price= $exp[1];
//	}
        //dd($request->warranty); die;
        $phone=Phone::find($request->phone);
        $flag=0;
        foreach (Cart::content() as $prod){
            if($prod->id === $phone->id){
                $flag=1;
                break;
            }
        }
        if($flag==0) {
//	if(isset($warranty)){
//		//$cart = Cart::add(['id' => $phone->id , 'name' => (ucfirst($month)), 'qty' => 1, 'price' => $price]);
            $cart =  Cart::add(['id' => $phone->id, 'name' => (ucfirst($phone->data->company) . " " . $phone->data->model). " + 12 Months Seller Warranty", 'qty' => 1, 'price' => $phone->price]);
            return redirect()->route('cart');
        }else{
            return redirect()->route('cart');
        }
    }

    public function deleteFromCart(Request $request){
        Cart::remove($request->cartid);
        return response()->json($request->cartid);
    }

    public function updateCart(Request $request){
        $cart=Cart::update($request->cartid,$request->value);
        return response()->json($cart);
    }


    public function updateTotal(Request $request){

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
        $amt = number_unformat(Cart::subtotal());
        if($amt <= 10000 && $amt > 0 )
            $shipping = 106;
        elseif($amt > 10000 && $amt <= 20000)
            $shipping = 165;
        elseif($amt > 20000)
            $shipping = 234;
        else
            $shipping = 0;
        $cartTotals =  (object) ['cartTotal' => (number_format(number_unformat(Cart::subtotal()) + $shipping, 2)), 'shippingCharges' => number_format($shipping, 2)];
        return response()->json($cartTotals);
    }

    public function getState(Request $request){
        $html='';
        $state = DB::table('statelist')->select('*')
            ->where('state', '=', $request->state)->orderby('city_name','asc')
            ->get();
        // return response()->json($state);

        $html.='<label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label><select class="input-text selectt select2-selection valid" name="deliver_cityid" id="city" data-validation="required" style="width: 100%;">';
        $html.='<option value="">Select City</option>';
        foreach($state as $s)
        {
            $selected = "";
            if(strtolower($request->city) == strtolower($s->city_name)){
                $selected = "selected";
            }
            $html.='<option value="'.$s->city_id.'" '. $selected .'>'.$s->city_name.'</option>';

        }
        $html.='</select>';
        echo $html;
    }



}
