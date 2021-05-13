<?php


namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SubscribersChannel
{

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return true
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSubscribers($notifiable);
        $message->send();
        return true;
    }
}
