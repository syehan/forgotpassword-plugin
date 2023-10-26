<?php namespace Syehan\ForgotPassword\Classes;

use OTPHP\TOTP;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class OtpMaker
{
    protected $secret_key, $issuer, $period, $algorithm, $digits;

    public function __construct()
    {
        $this->secret_key = config('syehan-forgot-password.otp_secret_key', 'test');
        $this->issuer     = config('syehan-forgot-password.otp_issuer', 'test');
        $this->algorithm  = config('syehan-forgot-password.otp_algorithm', 'sha1');
        $this->digits     = config('syehan-forgot-password.otp_digits', 6);
        $this->period     = config('syehan-forgot-password.otp_period', 60);
    }

    public function setPeriod(int $period)
    {
        $this->period = $period;

        return $this;
    }

    public function setIssuer(string $issuer)
    {
        $this->issuer = $issuer;

        return $this;
    }

    public function setDigits(int $digits)
    {
        $this->digits = $digits;

        return $this;
    }

    public function setDigest(string $algorithm)
    {
        $this->algorithm = $algorithm;

        return $this;
    }

    public function createOtp()
    {
        $otp = TOTP::createFromSecret($this->secret_key);
        
        $otp->setIssuer($this->issuer);
        $otp->setPeriod($this->period);
        $otp->setDigest($this->algorithm);
        $otp->setDigits($this->digits);

        return $otp->now();
    }

    public function verifyOtp(string|int $otp_key)
    {
        $otp = TOTP::createFromSecret($this->secret_key);
        
        $otp->setIssuer($this->issuer);
        $otp->setPeriod($this->period);
        $otp->setDigest($this->algorithm);
        $otp->setDigits($this->digits);

        return $otp->verify($otp_key);
    }
}