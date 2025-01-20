<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DeployProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy the project on the server';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting deployment process...');

        try {
            // Pull latest changes from the repository
            $this->info('Pulling the latest changes from Git...');
            exec('git pull origin main');

            // Install/update composer dependencies
            $this->info('Installing composer dependencies...');
            exec('composer install --no-dev --optimize-autoloader');

            // Run migrations
            $this->info('Running database migrations...');
            Artisan::call('migrate', ['--force' => true]);
            $this->info(Artisan::output());

            // Clear caches
            $this->info('Clearing application cache...');
            Artisan::call('cache:clear');
            $this->info(Artisan::output());

            // Clear and re-cache the configuration
            $this->info('Caching configuration...');
            Artisan::call('config:cache');
            $this->info(Artisan::output());

            // Optimize the application
            $this->info('Optimizing the application...');
            Artisan::call('optimize');
            $this->info(Artisan::output());

            // Set the correct permissions
            $this->info('Setting file permissions...');
            exec('chmod -R 775 storage bootstrap/cache');

            $this->info('Deployment completed successfully!');
        } catch (\Exception $e) {
            $this->error('An error occurred during deployment: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
