<?php namespace Syehan\ForgotPassword\Classes;

class ChangePasswordMaker
{

    protected $password, $password_confirmation, $email, $is_otp_match;
    protected $with_verify_otp = false;

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function setPasswordConfirmation(string $password_confirmation)
    {
        $this->password_confirmation = $password_confirmation;

        return $this;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function withVerifyOtp(bool $with_verify_otp, $otp = null)
    {
        throw_if(!isset($this->email), \ApplicationException::class, 'This function must required email, please setEmail() before use this function.');

        if($with_verify_otp){
            throw_if(blank($otp), \ApplicationException::class, 'You using change password with verify OTP, The OTP is required!');

            $this->is_otp_match    = (new OtpMaker)->setIssuer($this->email)->verifyOtp($otp);
            $this->with_verify_otp = $with_verify_otp;
        }

        return $this;
    }

    public function change()
    {
        if($this->with_verify_otp){
            throw_if(!$this->is_otp_match, \ApplicationException::class, 'OTP is invalid, please try again.');
        }

        try {
            $model = config('syehan-forgot-password.user_model', \RainLab\User\Models\User::class);
            $user  = $model::whereEmail($this->email)->first();

            throw_if(!$user, \ApplicationException::class, 'We detect that your account is unable to change the password.');

            $user->password              = $this->password;
            $user->password_confirmation = $this->password_confirmation;
            
            $user->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}