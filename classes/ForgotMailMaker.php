<?php namespace Syehan\ForgotPassword\Classes;

use Mail;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class ForgotMailMaker
{

    protected $email, $subject, $type;

    protected $mail_template_code = 'syehan.forgotpassword::mail.forgot';
    protected $types              = ['otp'];

    public function __construct()
    {
        $this->type = 'otp';
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function setSendType($type)
    {
        throw_if(!in_array($type, $this->types), \Application::class, sprintf("There's no %s type in our modules.", $type));

        $this->type = $type;

        return $this;
    }

    public function setMailTemplateCode($code)
    {
        $this->mail_template_code = $code;

        return $this;
    }

    public function hit($mode = 'send')
    {
        try {
            $otp = (new OtpMaker)->setIssuer($this->email)->createOtp();

            $mail_data = [
                'otp'                 => $otp, 
                'email'               => $this->email,
                'otp_period'          => config('syehan-forgot-password.otp_period', 60),
                'company_name'        => config('syehan-forgot-password.company_name', 'Syehan Company'),
                'company_site'        => config('syehan-forgot-password.company_site', 'syehan.com'),
                'company_location'    => config('syehan-forgot-password.company_location', 'Jakarta, Indonesia'),
                'company_sender_name' => config('syehan-forgot-password.company_sender_name', 'Syehan CS'),
            ];
            
            Mail::{$mode}($this->mail_template_code, $mail_data, function($message){
                $message->to($this->email);
            });

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}