<?php

use Syehan\ForgotPassword\ApiControllers\ForgotPasswordController;
use Syehan\ForgotPassword\Middleware\AlwaysAcceptJson;

Route::group([
    'prefix'     => env('SYEHAN_FORGOT_PASSWORD_API_PREFIX', '/api/syehan'),
    'middleware' => [AlwaysAcceptJson::class]
], function () {
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot']);
    Route::post('/change-password', [ForgotPasswordController::class, 'change']);
});


