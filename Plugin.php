<?php namespace Syehan\ForgotPassword;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Forgot Password Plugin',
            'description' => ' Allows users who have forgotten their password to unlock, retrieve, or reset it, usually by answering account security questions or sending them an e-mail.',
            'author' => 'Syehan',
            'icon' => 'icon-lock'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->registerConsoleCommand('forgot_password.generate_secret_key', \Syehan\ForgotPassword\Console\CommandGenerateSecretKey::class);
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }
}
