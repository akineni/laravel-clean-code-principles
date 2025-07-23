<?php

namespace App\Services;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function createUser(array $data): User
    {
        $user = User::create($data);
        Mail::to($user->email)->send(new WelcomeMail($user));
        
        return $user;
    }
}