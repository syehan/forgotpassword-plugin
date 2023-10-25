<?php

use Syehan\ForgotPassword\Classes\ForgotMailMaker;

Route::group([
    'prefix' => env('SYEHAN_FORGOT_PASSWORD_API_PREFIX', '/api/syehan'),
], function () {
    Route::post('/forgot-password', function() {
        $email = request()->get('email');

        (new ForgotMailMaker)->setEmail($email)->hit();

        return response()->json([
            'status' => 'success',
            'http_code' => 200,
            'message' => "We've sent the OTP into your email account, please ensure your email is registered"
        ]);
    });
});

