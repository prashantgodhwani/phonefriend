<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\OrderConfirmed;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;
use App\Phone;
use App\Order;
use App\User;
use Carbon\Carbon;


class SendOrderConfirmationMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        $order=Order::find($event->order->id);
        $str='';

        if($order->orderdevices->count() > 1) {
            foreach ($order->orderdevices as $device) {
                $str .= ucwords(Phone::find($device->phone_id)->data->company) . ' ' . Phone::find($device->phone_id)->data->model . ', ';
            }
            $str = substr($str, 0, -2);
        }
        else{
            $str .= ucwords(Phone::find($order->orderdevices[0]->phone_id)->data->company) . ' ' . Phone::find($order->orderdevices[0]->phone_id)->data->model;
        }
        $response = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
            ->withData( array( 'user' => 'pra.godh', 'password' => 'R@dhasoami30', 'msisdn' => $order->deliver_phone,'sid' => 'PHNFRN' , 'msg' => 'Order Received: We have received your order for '.$str.' with order id '.$order->order_id.' amounting to Rs.'.number_format($order->amount).'. The order shall be delivered within 5-6 business days. You can manage your order at https://goo.gl/Hkvifi .','fl'=>'0','gwid'=>'2') )
            ->asJson()
            ->get();
        foreach($order->orderdevices as $device){
            $phone = User::find(Phone::find($device->phone_id)->user_id)->phone;
            $date = Carbon::now();
            $date = $date->addDays(2)->toFormattedDateString();
            $responsem = Curl::to('http://103.8.127.46/vendorsms/pushsms.aspx')
                ->withData( array( 'user' => 'pra.godh', 'password' => 'R@dhasoami30', 'msisdn' => $phone,'sid' => 'PHNFRN' , 'msg' => 'Dear Merchant, Your product with ID #TT-0A'.$device->phone_id.' has been sold. The pickup of your order is scheduled on '.$date.'. Please carefully pack the product keep it ready with all the accessories.','fl'=>'0','gwid'=>'2') )
                ->asJson()
                ->get();
        }
    }
}
