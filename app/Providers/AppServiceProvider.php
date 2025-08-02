<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env(key: 'APP_ENV') !=='local') {
           URL::forceScheme(scheme:'https');
        }
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fix PHP 8.4 deprecation warnings with Laravel 8
        // Suppress deprecation warnings to clean up output
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        
        // Set custom error handler for deprecation warnings
        set_error_handler(function ($severity, $message, $file, $line) {
            // Skip deprecation warnings
            if ($severity === E_DEPRECATED || $severity === E_USER_DEPRECATED) {
                return true;
            }
            // Let other errors be handled normally
            return false;
        });
    }
}
