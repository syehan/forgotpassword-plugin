<?php

use Syehan\ForgotPassword\ApiControllers\ForgotPasswordController;

Route::group([
    'prefix' => env('SYEHAN_FORGOT_PASSWORD_API_PREFIX', '/api/syehan'),
], function () {
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot']);
    Route::post('/change-password', [ForgotPasswordController::class, 'change']);
});

