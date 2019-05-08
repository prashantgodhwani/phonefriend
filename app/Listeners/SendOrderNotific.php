<?php

namespace App\Listeners;

use App\Events\OrderConfirmed;
use App\Order;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\PaymentProcessedNot;

class SendOrderNotific implements ShouldQueue
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
     * @param  =OrderConfirmed  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        $admin=User::find(73);
        $user=User::find($event->order->user_id);
        $order=Order::find($event->order->id);
        $admin->notify((new PaymentProcessedNot($user,$order)));
//        \Notification::send(User::find(73),(new \App\Notifications\PaymentProcessedNot($user,$order)));

    }
}
