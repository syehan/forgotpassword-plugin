<?php namespace Syehan\ForgotPassword\Helpers;

class ForgotPasswordError
{
    CONST HTTP_CODE  = 500;
    CONST ERROR_CODE = 'FORGOT_PASSWORD_ERROR';

    public static function render($exception)
    {
        $data = [
            'message' => $exception->getMessage(),
            'code'    => static::HTTP_CODE,
            'status'  => static::ERROR_CODE,
        ];

        if(env('APP_DEBUG') === true){
            $data['trace'] = $exception->getTrace();
        }

        return response()->json($data, static::HTTP_CODE, ['Accept' => 'application/json']);
    }
}