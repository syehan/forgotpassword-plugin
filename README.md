## OctoberCMS Forgot Password 

Use `syehan/forgot-password-plugin`. Allows users who have forgotten their password to unlock, retrieve, or reset it, usually by answering account security questions or sending them an e-mail. This plugin Currently verifying by OTP.


### Installation

**1** - You can install the package via composer:

```bash
$ composer require syehan/forgot-password-plugin
```

### Usage

**1** - You can send the forgot password email using this API:

```
POST https://yourdomain.com/api/syehan/forgot-password
```

Add body Param 'email' to deliver Forgot Password mail to your account.

**2** - Or you can put this function into your function: 

```php

use Syehan\ForgotPassword\Classes\ForgotMailMaker;

(new ForgotMailMaker)->setEmail($email)->hit();

// You also change the mail template by doing this
(new ForgotMailMaker)->setMailTemplateCode('author.plugin::mail.forgot')->setEmail($email)->hit();
```

### Config Forgot Password


If your have any setup for forgot password, please make sure to copy our config below and paste in `config/syehan-forgot-password.php`.

```php
<?php 

return [
    'otp_secret_key' => env('SYEHAN_FORGOT_PASSWORD_OTP_SECRET_KEY', 'XFT35ETTPHPIBIAMIUEZ7SRE5K4YZLSQP3LU4DZFWW7NDUSRSGAR3JK2ETCXY4BYQIQQQRLX4GI2ZSUT4YQDWEEPMAMI75IHN6NBKBQYCCKPQZGBTJQJYBIBU4LGEBGMVRUW6XZFVSOUUVRL66NFIZ55CH7GIGWUJ5DMR2JRYCTMXUN2ZMVFCBWEJNOOJIMGLIAGZXIJOVGIY'),
    'otp_issuer'     => env('SYEHAN_FORGOT_PASSWORD_OTP_ISSUER', 'SyehanProductIssuer'),
    'otp_digits'     => env('SYEHAN_FORGOT_PASSWORD_OTP_DIGITS', 6),
    'otp_algorithm'  => env('SYEHAN_FORGOT_PASSWORD_OTP_ALGORITHM', 'sha1'),
    'otp_period'     => env('SYEHAN_FORGOT_PASSWORD_OTP_PERIOD', 60),

    'company_name'        => env('SYEHAN_FORGOT_PASSWORD_COMPANY_NAME', 'Syehan Company'), 
    'company_site'        => env('SYEHAN_FORGOT_PASSWORD_COMPANY_SITE', 'syehan.com'), 
    'company_location'    => env('SYEHAN_FORGOT_PASSWORD_COMPANY_LOCATION', 'Jakarta, Indonesia'), 
    'company_sender_name' => env('SYEHAN_FORGOT_PASSWORD_COMPANY_SENDER_NAME', 'Syehan CS'), 
];
```
