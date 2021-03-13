<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * List custom blade laravel
         */
        Blade::directive('moneyFormat', function ($expression) {
            return "<?php echo number_format($expression, 0, ',', '.'); ?>";
        });
    }
}
