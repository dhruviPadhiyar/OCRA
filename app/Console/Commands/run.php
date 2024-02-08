<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class run extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the project';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $run = Artisan::call('serve');
        if($run){
            $this->info("App running!");
        }
        else{
            $this->error("App is not running!");
        }
        
    }
}
