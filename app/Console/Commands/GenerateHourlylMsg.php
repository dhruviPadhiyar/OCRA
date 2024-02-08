<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateHourlylMsg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genrate:msg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a message every hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Hourly message generated successfully!");
    }
}
