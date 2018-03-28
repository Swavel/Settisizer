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
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/create_settisizer_table.php.stub' => database_path('/migrations/'.date('Y_m_d_His', time()).'_create_settisizer_table.php'),
        ], 'migrations');
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
