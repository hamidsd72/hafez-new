<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionReport extends Notification
{
    use Queueable;

    public $counter;
    public $type;
    public function __construct($counter, $type)
    {
        $this->counter = $counter;
        $this->type = $type;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Transaction Report')
                    ->line('the '.$this->type.' transaction was done in the amount of '.$this->counter)
                    ->action('Notification Action', url('/'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
