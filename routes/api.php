<?php

use App\Http\Controllers\KISS\GreetingController;
use App\Http\Controllers\Solid\DIPFileController;
use App\Http\Controllers\Solid\ISPMediaController;
use App\Http\Controllers\Solid\OCPNotificationController;
use App\Http\Controllers\Solid\OCPPurchaseController;
use App\Http\Controllers\Solid\OCPReportController;
use App\Http\Controllers\Solid\SRPUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('solid')->group(function () {
    Route::post('/srp-user', [SRPUserController::class, 'store']);

    Route::get('/ocp-purchase', [OCPPurchaseController::class, 'purchase']);
    Route::get('/ocp-notify', [OCPNotificationController::class, 'send']);
    Route::get('/ocp-report', [OCPReportController::class, 'export']);

    Route::prefix('isp')->group(function () {
        Route::get('/audio', [ISPMediaController::class, 'audio']);
        Route::get('/isp-audio', [ISPMediaController::class, 'ispAudio']);
        Route::get('/smart', [ISPMediaController::class, 'smart']);
    });

    Route::post('/dip-upload', [DIPFileController::class, 'upload']);
});

Route::get('/kiss/greet', [GreetingController::class, 'greet']);
