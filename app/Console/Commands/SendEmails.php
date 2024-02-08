<?php

namespace App\Console\Commands;

use App\Mail\TestEmail;
use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user}';
    // protected $signature = 'mail:send {user} {--queue}';  // command with the option with no inputs = switch
    // if the --queue is specified in the command then the switch is true = on

    // protected $signature = 'mail:send {user} {--queue=}'; // command with the option with input
    // --queue = value

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a welcome mail to the users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = $this->argument('user');
        
        Mail::to('d04bd1b134-4df0b6+1@inbox.mailtrap.io')->send(new TestEmail(User::find($user)));
        $this->info("Mail has been sent to the $user successfully!");
    }
}
