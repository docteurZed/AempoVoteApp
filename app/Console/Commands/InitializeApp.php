<?php

namespace App\Console\Commands;

use App\Services\InitialAdmin;
use Illuminate\Console\Command;

class InitializeApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initialize:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Initializing the application...');

        $initialAdmin = InitialAdmin::create();

        $this->info('Application initialized successfully.');
        return Command::SUCCESS;
    }
}
