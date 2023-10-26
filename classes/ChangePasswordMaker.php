<?php namespace Syehan\ForgotPassword\Classes;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class ChangePasswordMaker
{

    protected $password, $password_confirmation, $email;

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

    public function change()
    {
        try {
            $model = config('syehan-forgot-password.user_model', \RainLab\User\Models\User::class);

            $user = $model::whereEmail($this->email)->first();

            $user->password = $this->password;
            $user->password_confirmation = $this->password_confirmation;
            
            $user->save();

            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}