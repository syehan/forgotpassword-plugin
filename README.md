## OctoberCMS Forgot Password 

Use `syehan/forgotpassword-plugin`. Allows users who have forgotten their password to unlock, retrieve, or reset it, usually by answering account security questions or sending them an e-mail. This plugin Currently verifying by OTP.


### Installation

**1** - You can install the package via composer:

```bash
$ composer require syehan/forgotpassword-plugin
```

### Generating Secret Key Base32 for OTP

In this plugin, we have some command to generate base32 for your secret key, after that save into your `config/syehan-otp-password.php` in `otp_secret_key` key like this : 

```
php artisan syehan:generate-otp-secret-key

// the output would be like this
Your Forgot Password OTP Secret Key is : Z566IV6FIMMANIKQQOIJDZNWREKJKAWKGTK3WGGBSFTOIOG4UFCN2QVDJNHUJKKT44JRDSPWTX6JNBYDGMIJHLKCD6UM4WJGFIVPU3VSLTXP6J45PG4V5Q2NMKY3H5FCXGXK4BAXHWX4PX3YDC6VYF5EB25GZJCS2LTKED5GA467HIEJHZW6XPVGXPQVMWITQVHILMDQHI7JE
```

### Usage

**1** - You can send the forgot password email using this API:

```
POST https://yourdomain.com/api/syehan/forgot-password
```

Add body Param `email` to deliver Forgot Password mail to your account.

**2** - Or you can put this function into your function: 

```php

use Syehan\ForgotPassword\Classes\ForgotMailMaker;

(new ForgotMailMaker)->setEmail($email)->hit();

// You also can change the mail template and mail data for your custom mail like this below. Also we will ensure that otp code and email user added into your mail data.
(new ForgotMailMaker)->setMailTemplateCode('author.plugin::mail.forgot')->setMailData(['data' => 'test'])->setEmail($email)->hit();

// You also can change send mail mode in queue() rather than send(), just change the var like this :
(new ForgotMailMaker)->setEmail($email)->hit('queue'); //<- only allow set `queue` or `send` mode
```

### Usage (Verifying OTP)

**1** - You can verify the OTP password into your function like this:

```php
$is_otp_match = (new \Syehan\ForgotPassword\Classes\OtpMaker)->setIssuer($email)->verifyOtp($input_otp);
```

### Usage (Change Password)

**1** - by this plugin you can also change after verification by using this API:

```
POST https://yourdomain.com/api/syehan/change-password
```

Add body Param `email`, `password` and `password_confirmation` to make sure that change password for your account succeed. Additionally you can verify OTP simultaneously while change password by adding body `otp` request parameter.

or, you can put in any function like this :

```php
use Syehan\ForgotPassword\Classes\ChangePasswordMaker;

(new ChangePasswordMaker)
        ->setEmail($email)
        ->setPassword($password)
        ->setPasswordConfirmation($password_confirmation)
        ->change();

// You can verify OTP simultaneously when changing password like this
(new ChangePasswordMaker)
        ->setEmail($email)
        ->setPassword($password)
        ->setPasswordConfirmation($password_confirmation)
        ->withVerifyOtp(true, $otp_input)
        ->change();
```

lastly, you can able to change your own user model by changing `user_model` in `config/syehan-forgot-password.php`



### Config Forgot Password


If your have any setup for forgot password, please make sure to copy our config below and paste in `config/syehan-forgot-password.php`.

```php
<?php 

return [
    /**
     * The User Model, default is rainlab.user plugin.
     * this would be the model that allow us to change the password.
     * 
     */
    'user_model' => env('SYEHAN_FORGOT_PASSWORD_USER_MODEL', \RainLab\User\Models\User::class),

    /**
     * The OTP secret key, identity of your app
     */
    'otp_secret_key' => env('SYEHAN_FORGOT_PASSWORD_OTP_SECRET_KEY', 'XFT35ETTPHPIBIAMIUEZ7SRE5K4YZLSQP3LU4DZFWW7NDUSRSGAR3JK2ETCXY4BYQIQQQRLX4GI2ZSUT4YQDWEEPMAMI75IHN6NBKBQYCCKPQZGBTJQJYBIBU4LGEBGMVRUW6XZFVSOUUVRL66NFIZ55CH7GIGWUJ5DMR2JRYCTMXUN2ZMVFCBWEJNOOJIMGLIAGZXIJOVGIY'),

    /**
     * The OTP issuer
     */
    'otp_issuer' => env('SYEHAN_FORGOT_PASSWORD_OTP_ISSUER', 'SyehanProductIssuer'),

    /**
     * Length of OTP digits, by default is 6.
     */
    'otp_digits' => env('SYEHAN_FORGOT_PASSWORD_OTP_DIGITS', 6),

    /**
     * The OTP digest algorithm, by default is sha1.
     */
    'otp_algorithm' => env('SYEHAN_FORGOT_PASSWORD_OTP_ALGORITHM', 'sha1'),

    /**
     * The Interval of OTP will be valid, by default is 60 second.
     */
    'otp_period' => env('SYEHAN_FORGOT_PASSWORD_OTP_PERIOD', 60),

    /**
     * Company Name is basically for using our default mail template which must include the company name.
     * Otherwise, the mail looks like sent by empty company.
     */
    'company_name' => env('SYEHAN_FORGOT_PASSWORD_COMPANY_NAME', 'Syehan Company'), 

    /**
     * Company Site/Website is basically for using our default mail template which must include the company link.
     */
    'company_site' => env('SYEHAN_FORGOT_PASSWORD_COMPANY_SITE', 'syehan.com'), 

    /**
     * Company Location is basically for using our default mail template which must include the company location.
     */
    'company_location' => env('SYEHAN_FORGOT_PASSWORD_COMPANY_LOCATION', 'Jakarta, Indonesia'), 

    /**
     * Company Sender Name is basically for using our default mail template which must include the company sender name.
     */
    'company_sender_name' => env('SYEHAN_FORGOT_PASSWORD_COMPANY_SENDER_NAME', 'Syehan CS'), 
];
```
