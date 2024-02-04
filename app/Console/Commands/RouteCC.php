<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RouteCC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:cc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear and cache the routes';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Clearing routes...');
        Artisan::call('route:clear');

        $this->info('Caching routes...');
        Artisan::call('route:cache');

        $this->info('Routes cleared and cached successfully!');
    }
}
