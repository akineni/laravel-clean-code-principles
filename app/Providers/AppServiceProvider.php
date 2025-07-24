<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the FileStorageInterface with the LocalFileStorage implementation
        $this->app->bind(
            \App\Contracts\FileStorageInterface::class,
            \App\Services\FileStorage\LocalFileStorage::class
        );

        // You can also bind to S3FileStorage if needed
        // $this->app->bind(
        //     \App\Contracts\FileStorageInterface::class,
        //     \App\Services\FileStorage\S3FileStorage::class
        // );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
