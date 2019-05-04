<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\OrderDevice;
use App\Settlement;
use App\Bid;
use App\Condition;
use App\Order;
use Illuminate\Http\Request;
use App\Phone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isBanned']);
        //$this->middleware(['UcanAccess','isSold'],['only' => ['editphones','showbids','sold','showbids']]);
        $this->middleware(['isUser'],['only' => ['showorders','cancelorder']]);
        $this->middleware(['isMerchant'],['only' => ['index','showphones','editphones','sold','showSettlements']]);
    }

    public function index(){
        return view('accounts.home');
    }

    public function showphones(){
        //$phones=Phone::where('user_id',Auth::user()->id)->orderBy('sold')->latest()->paginate(8);
		$phones=Phone::where('user_id',Auth::user()->id)->orderBy('sold')->latest()->get();
       // $phones=Phone::where('user_id',Auth::user()->id)->where('sold','!=',2)->orderBy('sold')->latest()->get();

        $dt = DB::table('phones')->selectRaw('`user_id`,SUM(price*(units-units_rem)) as total_sales')
        ->whereRaw('`units_rem` < `units` AND `user_id`= '.Auth::user()->id .' AND `sold`!=2')->groupBy('user_id')->orderByRaw('total_sales DESC')->first();
        $totals = DB::table('settlements')
        ->select('user_id', DB::raw('SUM(amount) as total_settled'))
        ->where('user_id',Auth::user()->id)
        ->groupBy('user_id')
        ->first();
        return view('accounts.show',compact(['phones','dt','totals']));
    }

    public function showPhoneOrders(Phone $phone){
        $phones=OrderDevice::where('phone_id',$phone->id)->latest()->paginate(8);
        return view('accounts.showphones',compact(['phones','phone']));
    }

    public function showSettlements(){
        $datas=Settlement::where('user_id',Auth::user()->id)->latest()->paginate(8);
        $dt = DB::table('phones')->selectRaw('`user_id`,SUM(price*(units-units_rem)) as total_sales')
        ->whereRaw('`units_rem` < `units` AND `user_id`= '.Auth::user()->id .' AND `sold`!=2')->groupBy('user_id')->orderByRaw('total_sales DESC')->first();
        $totals = DB::table('settlements')
        ->select('user_id', DB::raw('SUM(amount) as total_settled'))
        ->where('user_id',Auth::user()->id)
        ->groupBy('user_id')
        ->first();
        
        return view('accounts.settlements',compact(['datas','dt','totals']));
    }
    public function cancelorder()
    {

       /*  $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
        ->withData( array( 'user' => 'pra.godh', 'password' => 'R@dhasoami30', 'msisdn' =>'8299639330','sid' => 'PHNFRN' , 'msg' => 'Dear customer your order no.————— had been successfully cancelled. For furthr info or complaint you may call 7465828888.','fl'=>'0','gwid'=>'2') )
        ->asJson()
        ->get(); */
        
        // $ch=curl_init("http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=pra.godh&password=R@dhasoami30&msisdn=9919015571&sid=PHNFRN&msg=Dear%20customer%20your%20order%20has%20been%20successfully%20cancelled.%20For%20further%20info%20or%20complaint%20you%20may%20call%207465828888.&fl=0&gwid=2");
        $mobile = Auth::user()->phone;
        $order = Order::where('id',$_POST['id'])->first();
        $orderid = $order->order_id;
        $amount = $order->amount;
        //$phoneName = Phone::where()
        $ch=curl_init("http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=PHFRN&password=Sandeep@5051&msisdn=".$mobile."&sid=PHNFRN&msg=Order%20cancelled%20successfully%20order%20cancellation%20for%20Mobile%20with%20order%20id%20".$orderid."%20amounting%20to%20Rs.".$amount."/-.%20Please%20leave%20your%20valuable%20feedback%20at%20support@phonefriend.in%20See%20more%20products%20https://phonefriend.in&fl=0&gwid=2");
        ##field## is the one-time password (OTP) for your online registration at Phone Friend. This is usable once. PLEASE DO NOT SHARE WITH ANYONE
       
        $data = curl_exec($ch);

        $newOrder = Order::where('id',$_POST['id'])->first();

        $newOrder->reason         = $_POST['reason'];
        $newOrder->order_status	='Cancelled';
        try{
        //echo '<pre>'; print_r($data); echo "</pre>"; die;
         $newOrder->save();
            
     }
     catch(\Exception $e){
        echo $e->getMessage();
    }
    return redirect('account/orders');


}

public function storeAccount(Request $request)
{
    $this->validate($request,
        [
            'name' => 'required',
            'phone' => 'required|numeric|digits_between:10,10',
            'curr_password' => 'required',
            'new_password' => 'string|min:6|nullable',
        ]);

    if (isset($request->new_password)) {
        if (!(Hash::check($request->get('curr_password'), Auth::user()->password))) {
                // The passwords matches
            \request()->session()->flash('alert', 'Your current password does not matches with the password you provided. Please try again.');
            return redirect()->route('accnt');
        }

        if (strcmp($request->get('curr_password'), $request->get('new_password')) == 0) {
            \request()->session()->flash('alert', 'New Password cannot be same as your current password. Please choose a different password.');
            return redirect()->route('accnt');
        }

            //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->name=$request->name;
        $user->save();
        \request()->session()->flash('status', 'Profile updated successfully.');
        return redirect()->route('accnt');
    }
    else{
        if (!(Hash::check($request->get('curr_password'), Auth::user()->password))) {
                // The passwords matches
            \request()->session()->flash('alert', 'Your current password does not matches with the password you provided. Please try again.');
            return redirect()->route('accnt');
        }
        else {
            $user = Auth::user();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();
            \request()->session()->flash('status', 'Profile updated successfully.');
            return redirect()->route('accnt');
        }
    }
}

public function showorders(){
    $orders=Order::where('user_id',Auth::user()->id)->where('order_status','Success')->latest()->paginate(8);
    return view('accounts.orders',compact('orders'));
}

public function editphones(Phone $phone){
    $conditions=Condition::pluck('condition','id');
    $accessories=Accessory::pluck('accessory','id');
    $photos = \App\Photo::where('phone_id',$phone->id)->get();
    // dd($photos);
    return view('accounts.edit',compact('phone','conditions','accessories','photos'));
}

public function sold(Phone $phone){
    $conditions=Condition::pluck('condition','id');
    $accessories=Accessory::pluck('accessory','id');
    return view('accounts.edit',compact('phone','conditions','accessories'));
}

}
