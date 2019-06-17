<?php

namespace App\Http\Controllers;

use App\Data;
use App\MerchantDetails;
use App\Order;
use App\OrderDevice;
use App\Phone;
use App\Settlement;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Ixudra\Curl\Facades\Curl;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin','isBanned','2fa','auth']);
        $this->middleware(['auth','LastActivity','RecordActivity'],['except' => ['checkLock']]);
    }

    public function index(){

        return view('admin.dashboard');
    }

    public function restoreAdvertisement(Phone $phone){
        $phone->update(['sold'=>0]);
        return redirect()->back();
    }

    public function showOutOfStock(){
        $phones=Phone::where('units_rem', 0)->latest('id')->get();
        return view('admin.out_of_stock_ads',compact('phones'));
    }

    public function updateOutOfStock(Request $request,Phone $phone){
        $this->validate($request,[
            'quantityAdvertisement' => 'required|numeric|min:1'
        ]);
        $phone->units += intval($request->quantityAdvertisement);
        $phone->units_rem = intval($request->quantityAdvertisement);
        $phone->save();
        $status = "Buffer successfully Increased.";
        //dd(intval($request->quantityAdvertisement), $phone->units_rem);
        return redirect()->back()->with('status',$status);
    }

    public function resetPass(User $user){
        $otp = rand(100000000,999999999);
        session(['onthep' => $otp]);
        $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
            ->withData( array( 'user' => 'PHFRN', 'password' => 'Sandeep@5051', 'msisdn' => '8126911300','sid' => 'PHNFRN' , 'msg' => $otp.' is the one-time password (OTP) for your online registration at Phone Friend. This is usable once. PLEASE DO NOT SHARE WITH ANYONE.','fl'=>'0','gwid'=>'2') )
            ->asJson()
            ->get();
        return view('admin.updatepassword',compact('user'));
    }
    public function updatePassword(User $user){
        $this->validate(\request(),[
            'otp'=>'required',
            'password'=>'required'

        ]);
        if(session()->get('onthep') == \request()->otp){
            $user->update(['password' => bcrypt(\request()->password)]);
            $status = "Password successfully updated. You can now login.";
            session()->forget('onthep');

        }else{
            $status = "Your OTP is incorrect. Retry!";
            session()->forget('onthep');

        }
        return redirect()->route('merchant.all')->with('status', $status);
    }

    public function checkLock(Request $request){
        if(\Hash::check($request->password,\Auth::user
        ()->password)){
            session(['last_activity_at'=>now()]);
            return redirect()->route('admin.dashboard');
        }
        else{
            \request()->session()->flash('alert',
                'Incorrect Password');
            return redirect()->route('lockscreen');
        }
    }

    public function showBrands(){
        $data=Data::distinct()->get(['company']);
        return view('admin.brands',compact('data'));
    }

    public function viewDevice(Phone $phone){
        $conditions= DB::table('condition_phone')
            ->where('phone_id', $phone->id)
            ->get();

        $accessories = DB::table('accessory_phone')
            ->where('phone_id', $phone->id)
            ->get();
        return view('admin.device',compact('phone','conditions','accessories'));
    }

    public function showContacted(){
        $contacts = DB::select('select * from contact');
        return view('admin.contacted',compact('contacts'));
    }

    public function repair(){
        $repair = DB::select('select * from repair');
        return view('admin.repair',compact('repair'));
    }

    public function showModels(){
        $phones=Data::all();
        return view('admin.models',compact('phones'));
    }

    public function editModel(Data $data){
        return view('admin.editmodel',compact('data'));
    }

    public function updateModel(Request $request,Data
    $data){
        $this->validate($request,[
            'company'=>'required',
            'model'=>'required',
            'storage'=>'required',
            'price'=>'required'
        ]);
        $data->update($request->toArray());
        \request()->session()->flash('status',
            'Successfully Edited Phone Model!');
        return redirect()->route('admin.models');
    }

    public function deleteModel(Data $data){
        $data->delete();
        \request()->session()->flash('status',
            'Successfully Deleted Item !');
        return redirect()->route('phones.show');
    }

    public function deleteMerchant(User $user){
        $user->delete();
        \request()->session()->flash('status',
            'Successfully Deleted Merchant !');
        return redirect()->route('merchant.all');
    }

    public function addMerchant(){
        $cities = DB::table('statelist')
            ->get();
        return view('admin.addmerchant',compact
        ('cities'));
    }

    public function showAccounts(){
        $data = DB::table('phones')->selectRaw('`user_id`,SUM(price*(units-units_rem)) as total_sales')
            ->whereRaw('`units_rem` < `units` AND `sold`!=2')->groupBy('user_id')->orderByRaw('total_sales DESC')->get();
        $total_sales=DB::table('phones')->selectRaw('SUM(price*(units-units_rem)) as total_sales')
            ->whereRaw('`units_rem` < `units` AND `sold`!=2')->get();
        $total_settled = DB::table('settlements')
            ->select(DB::raw('SUM(amount) as total_settled'))
            ->first();
        $total_sales = $total_sales[0]->total_sales;
        return view('admin.accounts',compact(['data','total_sales','total_settled']));
    }

    public function settleMerchant(User $user){
        $totals = DB::table('settlements')
            ->select('user_id', DB::raw('SUM(amount) as total_settled'))
            ->where('user_id',$user->id)
            ->groupBy('user_id')
            ->first();
        $dt = DB::table('phones')->selectRaw('`user_id`,SUM(price*(units-units_rem)) as total_sales')
            ->whereRaw('`units_rem` < `units` AND `user_id`= '.$user->id.' AND `sold`!=2')->groupBy('user_id')->orderByRaw('total_sales DESC')->first();
        return view('admin.settlemerchant',compact(['user','totals','dt']));
    }

    public function storeSettlement(User $user){
        $this->validate(request(),[
            'method' =>'required',
            'transaction_id'=>'required',
            'amount'=>'required|numeric'
        ]);
        $data=\request();
        $data['user_id']=$user->id;
        Settlement::create($data->toArray());
        \request()->session()->flash('status', 'Outstanding worth '.number_format(\request()->amount,2).' INR has been settled.');
        return redirect()->route('admin.view_settlements',$user->id);
    }

    public function viewSettlements(User $user){
        $totals = DB::table('settlements')
            ->select('user_id', DB::raw('SUM(amount) as total_settled'))
            ->where('user_id',$user->id)
            ->groupBy('user_id')
            ->first();
        $dt = DB::table('phones')->selectRaw('`user_id`,SUM(price*(units-units_rem)) as total_sales')
            ->whereRaw('`units_rem` < `units` AND `user_id`= '.$user->id .' AND `sold`!=2')->groupBy('user_id')->orderByRaw('total_sales DESC')->first();
        $data=Settlement::where('user_id',$user->id)->get();
        return view('admin.merchant_settlements',compact(['totals','dt','data']));
    }

    public function merchantTransactions(User $user){
        $phones=Phone::where('user_id',$user->id)->whereRaw('`units_rem` < `units`')->get();
        $dt = DB::table('phones')->selectRaw('`user_id`,SUM(price*(units-units_rem)) as total_sales')
            ->whereRaw('`units_rem` < `units` AND `user_id`= '.$user->id .' AND `sold`!=2')->groupBy('user_id')->first();

        return view('admin.merchanttransactions',compact(['phones','user','dt']));
    }

    public function storeMerchant(Request $request){

        $this->validate($request,[
            'cname'=>'required',
            'ckeypersonname'=>'required',
            'cemail'=>"required|email|unique:users,email",
            'cpassword'=>'required',
            'caddress'=>'required',
            'deliver_cityid'=>'required',
            'pincode'=>'required',
            'cin'=>'required',
            'caadhar'=>'required',
            'gstin'=>'required',
            'pan'=>'required',
            'financial'=>'required',
            'period'=>'required',
            'score'=>'required',
            'marketedby'=>'required',
            'mouphoto'=>'required',
            'aadharphoto'=>'required',
            'bankk'=>'required',
            'ifsc'=>'required',
            'beneficiary'=>'required',
            'cmobile'=>'required'
        ]);
        $user = User::create([
            'name' => $request->ckeypersonname,
            'email' => $request->cemail,
            'role'=>1,
            'password' => bcrypt($request->cpassword),
            'verified'=>1,
            'phone'=>$request->cmobile
        ]);
        $data=$request->except(['ckeypersonname']);
        $data['user_id']=$user->id;
        $data['caddress']=$request->caddress;

        $data['bank']=$request->bankk;
        $aadharphoto = $request->aadharphoto;
        $data['aadharphoto']=$aadharphoto->store('public/photos');
        $mouphoto = $request->mouphoto;
        $data['mouphoto']=$mouphoto->store('public/photos');
        $md=MerchantDetails::create($data);
        \request()->session()->flash('status', 'Merchant Generated!');
        return redirect()->route('merchant.all');
    }

    public function updateMerchant(Request $request,User $user){

        $this->validate($request,[
            'cname'=>'required',
            'ckeypersonname'=>'required',
            'cemail'=>'required|email|unique:users,email',
            'caddress'=>'required',
            'deliver_cityid'=>'required',
            'pincode'=>'required',
            'cin'=>'required',
            'caadhar'=>'required',
            'gstin'=>'required',
            'pan'=>'required',
            'financial'=>'required',
            'period'=>'required',
            'score'=>'required',
            'marketedby'=>'required',
            'bankk'=>'required',
            'ifsc'=>'required',
            'beneficiary'=>'required',
            'cmobile'=>'required'
        ]);

        $user->update([
            'name' => $request->ckeypersonname,
            'email' => $request->cemail,
            'role'=>1,
            'verified'=>1,
            'phone'=>$request->cmobile
        ]);
        $data=$request->except(['ckeypersonname']);
        $data['user_id']=$user->id;
        $data['caddress']=$request->caddress;

        $data['bank']=$request->bankk;
        if(isset($request->aadharphoto)) {
            $aadharphoto = $request->aadharphoto;
            $data['aadharphoto'] = $aadharphoto->store('public/photos');

        }
        if(isset($request->mouphoto)) {
            $mouphoto = $request->mouphoto;
            $data['mouphoto']=$mouphoto->store('public/photos');
        }
        $md= MerchantDetails::where('user_id',$user->id)->first();
        $md->update($data);
        \request()->session()->flash('status', 'Merchant Updated!');
        return redirect()->route('merchant.all');
    }

    public function showMerchants(){
        $users = User::where('role',1)->get();
        return view('admin.allmerchants',compact('users'));

    }

    public function showUsers(){
        $users = User::where('role',2)->get();
        return view('admin.allusers',compact('users'));

    }

    public function showAdmins(){
        $users = User::where('role',3)->get();
        return view('admin.alladmins',compact('users'));

    }

    public function showMerchant(User $user){
        return view('admin.viewmerchant',compact('user'));

    }

    public function editMerchant(User $user){

        $cities = DB::table('statelist')
            ->get();
        $mrchntinfo=MerchantDetails::where('user_id',$user->id)->get();
        $citty = DB::table('statelist')
            ->where('city_id', '=', $mrchntinfo[0]->deliver_cityid)
            ->first();
        return view('admin.editmerchant',compact('user','cities','mrchntinfo','citty'));

    }

    public function banUser(User $user){
        $user->update(['banned'=>1]);
        \request()->session()->flash('status', 'User Banned!');
        return redirect()->back();

    }

    public function unBanUser(User $user){
        $user->update(['banned'=>0]);
        \request()->session()->flash('status', 'User Un Banned!');
        return redirect()->back();

    }

    public function showMerchantRequests(){
        $users = DB::table('merchant')
            ->get();
        return view('admin.merchantrequests',compact('users'));

    }

    public function addModel(){
        return view('admin.addmodel');

    }

    public function storeModel(Request $request){
        $this->validate($request,[
            'company'=>'required',
            'model'=>'required',
            'storage'=>'required',
            'price'=>'required',
        ]);
        Data::create($request->toArray());
        \request()->session()->flash('status', 'Model Added!');
        return redirect()->route('admin.models');
    }

    public function allPhones(){
        $phones=Phone::latest()->get();
        return view('admin.allads',compact('phones'));
    }

    public function deletePhone(Phone $phone){
        $phone->update(['sold'=>2]);
        \request()->session()->flash('status', 'Successfully Removed from Sale!');
        $phones=Phone::latest()->paginate(8);
        return redirect()->back()->with('phones');
    }

    public function updatePhone(Request $request,$id){
        //$phone->delete();
        //echo "<pre>"; print_r($_POST); die;
        $phoneupdate = Phone::where('id',$id)->update(['rating'=>$request->ratingPhone,'type'=>$request->type]);
        \request()->session()->flash('status', 'Rating Updated!');
        $phones=Phone::latest()->paginate(8);
        return redirect()->back()->with('phones');
    }

    public function userHistory(User $user){

        return view('admin.userhistory',compact('user'));

    }

    public function displayOrder(Order $order){
        $order=$order->orderdevices()->get();
        return view('admin.displayorder',compact('order'));

    }

    public function bankDetails(Order $order){
        return view('admin.bankdetails',compact('order'));
    }

    public function showOrders(){
        // $orders=Order::paginate(8);
        $orders=Order::orderBy('created_at', 'desc')->get();

        // $data=array();
        //$data=Data::distinct()->get(['company']);
        return view('admin.neworders',compact('orders'));
    }

    public function showSuccessOrders(){
        $orders=Order::where('order_status','success')->paginate(8);
        return view('admin.neworders',compact('orders'));
    }

    public function showFailedOrders(){
        $orders=Order::where('order_status','failure')->paginate(8);
        return view('admin.neworders',compact('orders'));
    }
    public function cancelled(){
        $orders=Order::where('order_status','Cancelled')->paginate(8);
        return view('admin.neworders',compact('orders'));
    }
    public function showUnprocessedOrders(){
        $orders=Order::where('order_status','UP')->paginate(8);
        return view('admin.neworders',compact('orders'));
    }

    public function showOrder(Order $order)
    {
        $user = \App\User::where('id',$order->user_id)->first();
        return view('admin.order',compact('order','user'));
    }
    public function offerSubscribers()
    {
        $data['offer_subscribers'] = \App\OfferSubscription::paginate(10);
        return view('admin.offer_subscribers',$data);
    }

    public function comments(){
        //$comment = \App\Comment::where('status',1)->get();
        $comments = \App\Comment::select('data.model','data.company','data.storage','comments.content', 'comments.rating', 'users.name','comments.id','comments.status')->leftJoin('phones','comments.phone_id','=','phones.id')->leftJoin('data', 'phones.data_id', '=', 'data.id')->leftJoin('users','comments.user_id','=','users.id')->paginate(15);
        return view('admin.comments',compact('comments'));
    }

    public function commentupdate(Request $request,$id){

        $commentUpdate = \App\Comment::where('id',$id)->update(['status'=>$request->commentStatus]);
        \request()->session()->flash('status', 'Comment Updated!');
        return redirect()->back();
    }

    public function sendlink()
    {

        $ch=curl_init("http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=PHFRN&password=Sandeep@5051&msisdn=".$_POST['mobileno']."&sid=PHNFRN&msg=Congrats%20your%20order%20has%20been%20shipped.Please%20track%20your%20order%20at%20the%20given%20link%20below%20".$_POST['link']."%20Thanks%20for%20shopping%20with%20us%20Please%20leave%20us%20a%20valuable%20feedback%20atSupport@phonefriend.in%20Visit%20www.phonefriend.in&fl=0&gwid=2");
        $data = curl_exec($ch);
        \request()->session()->flash('status', 'Link sent as SMS Successfully!');
        return redirect('/admin/orders');
    }

    public function getOrdersByPhones(){
        return view('admin.orderbyphones');
    }

    public function getOrdersBetweenDates(Request $request){
        $this->validate($request,[
            'startdt' => 'required',
            'enddt' => 'required'
        ]);
        $start = $request->startdt;
        $end = $request->enddt;

        //dd(Carbon::createFromFormat('Y-m-d', $request->startdt)->toDateTimeString(), Carbon::createFromFormat('Y-m-d', $request->enddt)->toDateTimeString());

        //$orders = Order::findOrFail(OrderDevice::select('order_id')->where('phone_id', $phone->id)->get());
        $orders = DB::table('order_devices')->select('order_devices.phone_id', DB::raw("count('order_devices.order_id') as sales"))->leftJoin('orders','orders.id','=','order_devices.order_id')->whereBetween('orders.created_at', [Carbon::createFromFormat('Y-m-d', $start)->toDateTimeString(), Carbon::createFromFormat('Y-m-d', $end)->toDateTimeString()])->groupBy('order_devices.phone_id')->orderBy('sales', 'DESC')->get();
        return view('admin.orderbyphones', compact('orders', 'start','end'));
    }
}
