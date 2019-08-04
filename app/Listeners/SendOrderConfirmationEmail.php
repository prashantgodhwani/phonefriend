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
use Mockery\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        \Log::warning("Order by ".Order::find($event->order->id)->deliver_email);
        Mail::to(Order::findOrFail($event->order->id)->deliver_email)->send(new OrderConfirmedMail($event->order));

    }

    public function failed(OrderConfirmed $event, $exception)
    {
        throw new Exception("Exception is queue for SendEmail : " . $exception->getMessage());
    }
}
