<?php

use App\Http\Controllers\Solid\OCPNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solid\SRPUserController;
use App\Http\Controllers\Solid\OCPPurchaseController;
use App\Http\Controllers\Solid\OCPReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('solid')->group(function () {
    Route::post('/srp-user', [SRPUserController::class, 'store']);
    Route::get('/ocp-purchase', [OCPPurchaseController::class, 'purchase']);
    Route::get('/ocp-notify', [OCPNotificationController::class, 'send']);
    Route::get('/ocp-report', [OCPReportController::class, 'export']);
});
