<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Phone;
use App\Repair;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware(['isBanned']);

    }
    public function index()
    {

/*  $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
            ->withData( array( 'user' => 'pra.godh', 'password' => 'R@dhasoami30', 'msisdn' =>'8299639330','sid' => 'PHNFRN' , 'msg' => 'Dear customer your order has been successfully placed for return/replacement.for more info call 7465828888','fl'=>'0','gwid'=>'2') )
            ->asJson()
            ->get(); */

		   // $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->take(15)->orderBy('price', 'asc')->get();
     //        $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->take(5)->orderBy('price', 'asc')->get();


            $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderByRaw('RAND()')->get();
            $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
            $bestseller = Phone::where('units_rem', '!=', 0)->where('type','BEST_SELLING')->where('sold', '==' , 0)->orderBy('price', 'asc')->get();
            $brands = DB::select( DB::raw("SELECT data.company , COUNT(phones.id) as total FROM data INNER JOIN phones ON data.id = phones.data_id WHERE SOLD = 0 and phones.units_rem != 0 GROUP BY data.company ORDER BY total desc LIMIT 10"));
            $deal =  Phone::where('units_rem', '!=', 0)->where('type','DEAL_OF_THE_DAY')->where('sold', '==' , 0)->first();
        return view('home',compact('phones','certified','bestseller', 'brands', 'deal'));
          }
		  
		  public function home2()
    {

/*  $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
            ->withData( array( 'user' => 'pra.godh', 'password' => 'R@dhasoami30', 'msisdn' =>'8299639330','sid' => 'PHNFRN' , 'msg' => 'Dear customer your order has been successfully placed for return/replacement.for more info call 7465828888','fl'=>'0','gwid'=>'2') )
            ->asJson()
            ->get(); */

		   // $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->take(15)->orderBy('price', 'asc')->get();
     //        $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->take(5)->orderBy('price', 'asc')->get();


            $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
            $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
			 $bestseller = Phone::where('units_rem', '!=', 0)->where('mostselling','Yes')->where('sold', '!=' , 2)->orderBy('price', 'asc') ->limit(5)->get();
            return view('home2',compact('phones','certified','bestseller'));
          }

 public function home1()
    {

/*  $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
            ->withData( array( 'user' => 'pra.godh', 'password' => 'R@dhasoami30', 'msisdn' =>'8299639330','sid' => 'PHNFRN' , 'msg' => 'Dear customer your order has been successfully placed for return/replacement.for more info call 7465828888','fl'=>'0','gwid'=>'2') )
            ->asJson()
            ->get(); */

		   // $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->take(15)->orderBy('price', 'asc')->get();
     //        $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->take(5)->orderBy('price', 'asc')->get();


            $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
            $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
			 $bestseller = Phone::where('units_rem', '!=', 0)->where('mostselling','Yes')->where('sold', '!=' , 2)->orderBy('price', 'asc') ->limit(5)->get();
            return view('home1',compact('phones','certified','bestseller'));
          }
          public function filterPhones(Request $request)
          {
            $brands = $request->brands;
            $storages = $request->storages;
            $price = $request->price;
            if(is_null($price)){
              $min_price = 500;
              $max_price = 1000000;
            }else{
              $priceArray = explode('-', $price);
              $min_price = $priceArray[0];
              $max_price = $priceArray[1];
            }
            if(is_null($brands) && is_null($storages)){
              $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc') ->whereBetween('price', [$min_price, $max_price])->get();
              $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc') ->whereBetween('price', [$min_price, $max_price])->get();
              return view('filter-phones',compact('phones','certified'));
            }
            else{
             if(is_null($brands)){
              $result = \App\Data::whereIn('storage',$storages) ->whereBetween('price', [$min_price, $max_price])->get();
            }else if(is_null($storages)){
              $result = \App\Data::whereIn('company',$brands) ->whereBetween('price', [$min_price, $max_price])->get();
            }else if(! is_null($storages) && !is_null($storages)){
              $result = \App\Data::whereIn('company',$brands)->whereIn('storage',$storages) ->whereBetween('price', [$min_price, $max_price])->get();
            }
            $data_id = array();
            if(count($result) > 0){
              foreach ($result as $data) {                
                array_push($data_id, $data->id);
              }
              $phones = Phone::whereIn('data_id',$data_id)->where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
              $certified = Phone::whereIn('data_id',$data_id)->where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
            }else{
              $phones = array();
              $certified = array();
            }

            return view('filter-phones',compact('phones','certified'));
          }
        }
        public function indexTest()
        {

          $phones = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
          $certified = Phone::where('units_rem', '!=', 0)->where('sold', '!=' , 2)->orderBy('price', 'asc')->get();
          return view('test',compact('phones','certified'));
        }
public function slider()
        {

          
          return view('slider');
        }
        public function storeContact(Request $request){
          $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'subject'=>'required',
            'message'=>'required',
            'phone'=>'required|numeric|digits_between:10,10'
          ]);

          DB::insert('insert into contact (fname,lname,subject,phone,message) values (?,?,?,?,?)', [$request->fname, $request->lname,$request->subject,$request->phone,$request->message]);
          \request()->session()->flash('status',
            'Successfully contacted Phone Friend');
          return redirect()->back();

        }

        public function testsms()
        {
          $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
          ->withData( array( 'user' => 'PHFRN', 'password' => 'Sandeep@5051', 'msisdn' => '7985762872','sid' => 'PHNFRN' , 'msg' => 'is the one-time password (OTP) for your online registration at Phone Friend. This is usable once. PLEASE DO NOT SHARE WITH ANYONE.','fl'=>'0','gwid'=>'2') )
          ->asJson()
          ->get();
          print_r($response);



        }
        public function merchant(Request $request){
          $this->validate($request,[
            'mname'=>'required',
            'email'=>'required|email',
            'phone'=>'required'
          ]);
          DB::table('merchant')->insert(
            ['mname' => $request->mname,
            'email'=> $request->email,
            'phone'=> $request->phone
          ]
        );
          \request()->session()->flash('status', 'Ola ! We will contact you soon ! ');
          return redirect()->route('merchant');
        }

        public function repair()
        {
          $rep = new Repair;
          $rep->name=$_POST['name'];
          $rep->email=$_POST['email'];
          $rep->mobile=$_POST['mobile'];
          $rep->city=$_POST['city'];

          $rep->description=$_POST['description'];
          $rep = $rep->save();
          return redirect()->route('home');


        }
        public function subsribeToOffers(Request $request)
        {
          $response = array();
          $subscription = \App\OfferSubscription::where('email',$request->offer_email)->first();
          if(is_null($subscription)){
            $subscribe = new \App\OfferSubscription;
            $subscribe->name=$request->offer_name;
            $subscribe->email=$request->offer_email;
            $subscribe->mobile=$request->offer_mobile;
            if($subscribe->save()){
              \DB::table('issued_coupons')->insert(
                [
                  'coupon' => 'Get200',
                  'email' => $request->offer_email,
                  'is_used' => 0
                ]
              );
              $response['flag'] = true;
            }else{
              $response['flag'] = false;
              $response['message'] = "Something Went Wrong";
            }
          }else{
            $response['flag'] = false;
            $response['message'] = "You are already registered for Subscription";
          }
          echo json_encode($response);
        }
        public function applyCoupon(Request $request)
        {
          if($request->coupon_code === "Get200"){
            $usedCoupon = \DB::table('issued_coupons')->where('email',\Auth::user()->email)->where('coupon',$request->coupon_code)->first();
            if(!is_null($usedCoupon)){
              if($usedCoupon->is_used == 1){
                return redirect('/cart')->with('error','You have already used this Coupon Code');
              }else{
               $request->session()->put('coupon',$request->coupon_code);
               $request->session()->put('coupon_value',200); 
             }
           }else{
            return redirect('/cart')->with('error','Invalid Or Used Coupon Code');
          }
        }else{
          return redirect('/cart')->with('error','Invalid Or Used Coupon Code');
        }
      }
      public function removeCoupon(Request $request)
      {
        $request->session()->forget('coupon');
        $request->session()->forget('coupon_value');
        return redirect('/cart')->with('success','coupon remove Successfully');
      }
    }
