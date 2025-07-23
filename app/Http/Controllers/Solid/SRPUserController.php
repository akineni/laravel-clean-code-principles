<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SRPUserController extends Controller
{
    /**
     * Single Responsibility Principle (SRP)
     *
     * This controller follows SRP by delegating each responsibility to a separate class:
     * - Validation is handled by a Form Request (StoreUserRequest)
     * - User creation and email logic are handled by a Service class (UserService)
     * 
     * Each class has one reason to change, making the code easier to test, maintain, and extend.
    */

    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  \App\Services\UserService  $userService
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(StoreUserRequest $request, UserService $userService): JsonResponse
    {
        $user = $userService->createUser($request->validated());
        return response()->json(['message' => 'User created', 'user' => $user]);
    }

    /**
     * ❌ This method violates the Single Responsibility Principle (SRP).
     *
     * The controller is handling multiple responsibilities:
     * - Validating input
     * - Creating the user
     * - Sending a welcome email
     *
     * Any change in validation, user creation logic, or mailing behavior
     * would require modifying this method — making it harder to maintain and test.
     *
     * ✅ Instead, these responsibilities should be separated into:
     * - A FormRequest for validation
     * - A Service class for user creation and email sending
    */

    public function store2(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        // Save user
        $user = User::create($validated);

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeMail($user));
    }
}
