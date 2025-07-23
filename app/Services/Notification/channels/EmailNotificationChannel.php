<?php

namespace App\Services\Notification\Channels;

use App\Services\Notification\Interfaces\NotificationChannelInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class EmailNotificationChannel implements NotificationChannelInterface
{
    public function send($user, string $message): void
    {
        Mail::to($user->email)->send(new NotificationMail($message));
    }
}
