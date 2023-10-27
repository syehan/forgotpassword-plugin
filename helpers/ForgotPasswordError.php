<?php namespace Syehan\ForgotPassword\Helpers;

class ForgotPasswordError
{
    CONST HTTP_CODE  = 500;
    CONST ERROR_CODE = 'FORGOT_PASSWORD_ERROR';

    public static function render($exception)
    {
        $data = [
            'status'    => static::ERROR_CODE,
            'http_code' => static::HTTP_CODE,
            'message'   => $exception->getMessage()
        ];

        if(env('APP_DEBUG') === true){
            $data['trace'] = $exception->getTrace();
        }

        return response()->json($data, static::HTTP_CODE, ['Accept' => 'application/json']);
    }
}