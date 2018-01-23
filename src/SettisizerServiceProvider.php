<?php

namespace Settisizer;

use Illuminate\Support\ServiceProvider;

class SettisizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/settisizer.php' => config_path('settisizer.php'),
        ]);

        $configPath = __DIR__ . '/../config/settisizer.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('settisizer.php');
        } else {
            $publishPath = base_path('config/settisizer.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/settisizer.php';
        $this->mergeConfigFrom($configPath, 'settisizer');
    }
}
