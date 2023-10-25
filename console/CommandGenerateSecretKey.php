<?php namespace Syehan\ForgotPassword\Console;

use ApplicationException;
use Illuminate\Console\Command;
use ParagonIE\ConstantTime\Base32;

/**
 * SeedBenefit Command
 *
 * @link https://docs.octobercms.com/3.x/extend/console-commands.html
 */
class CommandGenerateSecretKey extends Command
{
    /**
     * @var string signature for the console command.
     */
    protected $signature = 'syehan:generate-otp-secret-key';

    /**
     * @var string description is the console command description
     */
    protected $description = 'This will generate base32 secret key';

    /**
     * handle executes the console command.
     */
    public function handle()
    {
        $base32 = trim(Base32::encodeUpper(random_bytes(128)), '=');
        $this->output->writeln(sprintf('Your Forgot Password OTP Secret Key is : <bg=yellow;fg=black>%s</>', $base32));
    }
}
