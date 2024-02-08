<?php

namespace NairanOmura\NotificationApi;

use Illuminate\Support\ServiceProvider;

class NotificationApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/services.php' => base_path('config/services.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/../config/services.php', 'services');
    }

    public function register(): void
    {
        require_once(__DIR__.'/helpers.php');
    }
}
