<?php

namespace App\Notifications;

use function GuzzleHttp\Psr7\str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentProcessed extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;
    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\User $user,\App\Order $order)
    {
        $this->user=$user;
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }


    public function toSlack($notifiable){
        return (new SlackMessage)
            ->success()
            ->content('A new Payment was just processed.')
            ->attachment(function ($attachment){
                $attachment->title('Order : '. $this->order->order_id)
                    ->fields([
                        'Amount' => ' ₹'. number_format($this->order->amount,2),
                        'From' => $this->user->name,
                        'Payment Mode' => strtoupper($this->order->payment_mode)
                    ]);
            });
    }
}
