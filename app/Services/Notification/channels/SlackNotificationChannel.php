<?php

namespace App\Services\Notification\Channels;

use App\Services\Notification\Interfaces\NotificationChannelInterface;
use Illuminate\Support\Facades\Http;

class SlackNotificationChannel implements NotificationChannelInterface
{
    public function send($user, string $message): void
    {
        Http::post(config('services.slack.webhook'), [
            'text' => $message,
        ]);
    }
}
