<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'says hello.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Hello World');
        $this->error('Error message');
        $this->warn('This is a warning!');

        $this->line('this is a normal message');
    }
}
