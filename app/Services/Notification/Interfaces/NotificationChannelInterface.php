<?php

namespace App\Services\Notification\Interfaces;

interface NotificationChannelInterface
{
    public function send($user, string $message): void;
}
