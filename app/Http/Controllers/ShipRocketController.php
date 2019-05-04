<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class ShipRocketController extends Controller
{
    public $token;
    public function __construct()
    {
        $this->middleware(['isAdmin','isBanned'],['except' => ['getAwb']]);
        $this->middleware(['auth','LastActivity','RecordActivity'],['except' => ['checkLock','getAwb']]);
        $response = Curl::to('https://apiv2.shiprocket.in/v1/external/auth/login')
        ->withData( array( 'email' => 'sandeepchawla.stn@gmail.com', 'password' => 'sandeep7171') )
        ->asJson( false )
        ->post();

        $this->token= $response->token;
    }

    public function getShipShipments()
    {
        $responses = Curl::to('https://apiv2.shiprocket.in/v1/external/shipments')
        ->withHeader('Authorization: Bearer '.$this->token)
        ->asJson( false )
        ->get();
        $responses = json_decode(json_encode($responses),true);
        return view('admin.shipments',compact('responses'));
    }

    public function createShipOrder(Order $order, $id)
    {
        $city = DB::table('statelist')->select(['city_name','state'])->where('city_id',$order->deliver_cityid)->get();

        $response = Curl::to('https://apiv2.shiprocket.in/v1/external/orders/create')
        ->withHeader('Authorization: Bearer '.$this->token)
        ->withData( array( 'order_id' => $order->id,'channel_id'=>59847, 'order_date' => $order->created_at->toDateString(),'billing_customer_name'=>$order->deliver_fname,'billing_last_name'=>$order->deliver_lname,'billing_email'=>User::find($order->user_id)->email,'billing_phone'=>$order->deliver_phone,'billing_address'=>$order->deliver_add1.", ".$order->deliver_add2,'billing_city'=>$city[0]->city_name,'billing_state'=>$city[0]->state,'billing_country'=>'India','shipping_is_billing'=>1,'payment_method'=>strtoupper($order->payment_mode),'sub_total'=>$order->amount,'billing_pincode'=>$order->postcode,'order_items'=>json_encode(array(['sku'=>$id,'units'=>1,'selling_price'=>\App\Phone::find($id)->price,'name'=>ucwords(\App\Data::find(\App\Phone::find($id)->data_id)->company." ".\App\Data::find(\App\Phone::find($id)->data_id)->model." ".\App\Data::find(\App\Phone::find($id)->data_id)->storage." GB")])),'length'=>'12','breadth'=>'7','height'=>'5','weight'=>'1') )
        ->asJson( false )
        ->post();

        dd($response);
    }

    public function getAwb(Request $request){
        $this->validate($request,['awb'=>'required']);
        $response = Curl::to('https://apiv2.shiprocket.in/v1/tracking/'.$request->awb)
        ->withHeader('Authorization: Bearer '.$this->token)
        ->asJson( false )
        ->get();

        
        // dd($response);

        if($response->tracking_data->track_status!=0) {
            if ($response->tracking_data->shipment_status < 6 ) {
                $ship_stat = 0;
            } else if ($response->tracking_data->shipment_status == 6 ) {
                $ship_stat = 1;
            } elseif ($response->tracking_data->shipment_status == 18) {
                $ship_stat = 2;
            } elseif ($response->tracking_data->shipment_status == 17) {
                $ship_stat = 3;
            } elseif ($response->tracking_data->shipment_status == 7) {
                $ship_stat = 4;
            }else{
                $ship_stat = 0;
            }
            return view('other/track', compact('response', 'ship_stat'));
        }
        else{
            return view('other/track', compact('response'));
        }
    }


}
