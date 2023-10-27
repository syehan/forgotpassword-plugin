<?php namespace Syehan\ForgotPassword\ApiControllers;

use Syehan\ForgotPassword\Classes\{ForgotMailMaker, ChangePasswordMaker};
use Syehan\ForgotPassword\Helpers\ForgotPasswordError;

class ForgotPasswordController
{
    public function forgot()
    {
        try {
            $email = request()->get('email');

            (new ForgotMailMaker)->setEmail($email)->hit();

            return response()->json([
                'status'    => 'success',
                'http_code' => 200,
                'message'   => "We've sent the OTP into your email account, please ensure your email is registered."
            ]);
        } catch (\Throwable $th) {
            return ForgotPasswordError::render($th);
        }
    }

    public function change()
    {
        try {
            $email                 = request()->get('email');
            $password              = request()->get('password');
            $password_confirmation = request()->get('password_confirmation');
            $otp                   = request()->get('otp');

            $change = (new ChangePasswordMaker)
            ->setEmail($email)
            ->setPassword($password)
            ->setPasswordConfirmation($password_confirmation)
            ->withVerifyOtp(!is_null($otp), $otp)
            ->change();

            if($change) {
                return response()->json([
                    'status'    => 'success',
                    'http_code' => 200,
                    'message'   => 'Your password has been changed.'
                ]);
            }
        } catch (\Throwable $th) {
            return ForgotPasswordError::render($th);
        }
    }
}