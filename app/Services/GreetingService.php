<?php

namespace App\Services;

class GreetingService
{
    public function generateGreeting(string $name): string
    {
        $hour = now()->format('H');

        if ($hour < 12) return "Good morning, $name";
        if ($hour < 17) return "Good afternoon, $name";
        
        return "Good evening, $name";
    }
}
