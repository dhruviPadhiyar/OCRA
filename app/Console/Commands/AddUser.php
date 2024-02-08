<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Str;
class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    //    try{
    //     $user = new User();
    //     $user->name = $this->argument("name");
    //     $user->email = $this->argument("email");
    //     $user->userName = $this->argument("username");
    //     $user->password = bcrypt("password");
    //     $user->email_verified_at = now();
    //     $user->remember_token = Str::random(10);
    //     $user->save();

    //     $this->info("User $user->name created successfully!");
    //    }
    //    catch(\Exception $e){
    //     $this->error($e->getMessage());
    //    }


        $name = $this->ask("Enter Name");
        $email = $this->ask("Enter Email");
        $username = $this->ask("Enter Username");
        $pwd = $this->secret("Enter Password");

        if($this->confirm("Do you wish to continue?").true){
            $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->userName = $username;
                $user->password = bcrypt($pwd);
                $user->email_verified_at = now();
                $user->remember_token = Str::random(10);
                $user->save();
        
                $this->info("User $user->name created successfully!");
        }
        else{
            $this->warn("Creation cancelled.");
        }

    }
}
