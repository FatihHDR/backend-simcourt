<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    
        // Ensure all asset URLs use HTTPS
        \Illuminate\Support\Facades\Blade::directive('secure_asset', function ($expression) {
            return "<?php echo asset($expression, true); ?>";
        });
    }
}
