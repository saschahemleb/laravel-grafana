<?php

namespace Saschahemleb\LaravelGrafana;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Saschahemleb\PhpGrafanaApiClient\Client;

class GrafanaServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'saschahemleb');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'saschahemleb');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/grafana.php', 'grafana');

        $this->app->singleton('grafana.manager', function (Application $app) {
            return new GrafanaManager($app->get('config'));
        });
        $this->app->alias('grafana.manager', GrafanaManager::class);

        $this->app->singleton('grafana', function (Application $app) {
            return $app->get('grafana.manager')->connection();
        });
        $this->app->alias('grafana', Client::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['grafana.manager', 'grafana'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/grafana.php' => config_path('grafana.php'),
        ], 'grafana.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/saschahemleb'),
        ], 'grafana.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/saschahemleb'),
        ], 'grafana.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/saschahemleb'),
        ], 'grafana.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
