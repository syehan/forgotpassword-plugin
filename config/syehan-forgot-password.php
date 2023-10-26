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