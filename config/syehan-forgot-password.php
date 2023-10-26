<?php 

return [
    'user_model'     => env('SYEHAN_FORGOT_PASSWORD_USER_MODEL', \RainLab\User\Models\User::class),
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