<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solid\SRPUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('solid')->group(function () {
    Route::post('/srp-user', [SRPUserController::class, 'store']);
});
