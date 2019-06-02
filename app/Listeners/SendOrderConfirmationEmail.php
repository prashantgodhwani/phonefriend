<?php

namespace App\Listeners;

use App\Events\OrderConfirmed;
use App\Mail\OrderConfirmedMail;
use App\User;
use App\Order;
use App\Phone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;

class SendOrderConfirmationEmail implements ShouldQueue
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
     * @param  OrderConfirmed  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
       // echo "Order by ".User::find($event->order->user_id)->role." successfull";
        Mail::to(Order::find($event->order)->deliver_email)->send(new OrderConfirmedMail($event->order));
        
    }
}
