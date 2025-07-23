<?php

namespace App\Http\Controllers\KISS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GreetingService;

class GreetingController extends Controller
{
    // ❌ This method violates the KISS principle:
    // - It contains business logic (greeting generation) directly inside the controller.
    // - Makes the method longer and harder to test or reuse.
    // - A better approach would be to move the greeting logic into a separate service or class.
    // - Keeping controllers thin improves readability and maintainability.
    public function greetUser(Request $request)
    {
        $hour = now()->format('H');
        $greeting = '';

        if ($hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour >= 12 && $hour < 17) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }

        $name = $request->input('name');

        return response()->json([
            'message' => $greeting . ', ' . $name
        ]);
    }

    // ✅ This method follows the KISS principle:
    // - It is simple and easy to understand.
    // - The logic is delegated to the GreetingService, keeping the controller clean.
    // - It handles input, delegates work, and returns a response — no unnecessary complexity.
    public function greet(Request $request, GreetingService $service)
    {
        $name = $request->input('name', 'Guest');
        $greeting = $service->generateGreeting($name);

        return response()->json(['message' => $greeting]);
    }
}

