<?php

namespace :uc:vendor\:uc:package\Providers;

use Illuminate\Support\ServiceProvider;

class :uc:packageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
         $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', ':lc:vendor');
         $this->loadViewsFrom(__DIR__.'/../Resources/views', ':lc:vendor');
         //$this->loadMigrationsFrom(__DIR__.'/../Database/migrations');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        //app('router')->aliasMiddleware('middlewareSample',:uc:vendor\:uc:package\Http\middleware\middlewareSample::class);

        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/:lc:package.php', ':uc:vendor/:lc:package');

        // Register the service the package provides.
        $this->app->singleton(':lc:package', function ($app) {
            return new :uc:package;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [':lc:package'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../../config/:lc:package.php' => config_path(':lc:package.php'),
        ], ':lc:package.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../Resources/views' => base_path('Resources/views/vendor/:lc:vendor'),
        ], ':lc:package.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../Resources/assets' => public_path('vendor/:lc:vendor'),
        ], ':lc:package.assets');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../Resources/lang' => resource_path('lang/vendor/:lc:vendor'),
        ], ':lc:package.lang');

    }
}
