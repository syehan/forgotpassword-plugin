<?php namespace Syehan\ForgotPassword\Classes;

use Syehan\ForgotPassword\Classes\{ForgotMailMaker, ChangePasswordMaker};

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class ForgotPasswordController
{
    public function forgot()
    {
        $email = request()->get('email');

        (new ForgotMailMaker)->setEmail($email)->hit();

        return response()->json([
            'status'    => 'success',
            'http_code' => 200,
            'message'   => "We've sent the OTP into your email account, please ensure your email is registered"
        ]);
    }

    public function change()
    {
        $email                 = request()->get('email');
        $password              = request()->get('password');
        $password_confirmation = request()->get('password_confirmation');

        $change = (new ChangePasswordMaker)
        ->setEmail($email)
        ->setPassword($password)
        ->setPasswordConfirmation($password_confirmation)
        ->change();

        if($change) {
            return response()->json([
                'status'    => 'success',
                'http_code' => 200,
                'message'   => 'Your password has been changed.'
            ]);
        }
    }
}