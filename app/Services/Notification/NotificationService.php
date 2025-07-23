<?php

namespace App\Services\Notification;

use App\Services\Notification\Interfaces\NotificationChannelInterface;

class NotificationService
{
    protected NotificationChannelInterface $channel;

    public function __construct(NotificationChannelInterface $channel)
    {
        $this->channel = $channel;
    }

    public function notify($user, string $message): void
    {
        $this->channel->send($user, $message);
    }
}
