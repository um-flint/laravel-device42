<?php

namespace UMFlint\Device42;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use UMFlint\Device42\Contracts\Device42 as Device42Contract;
use UMFlint\Device42\Entities\Buildings;
use UMFlint\Device42\Entities\Devices;

class Device42ServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../config/device42.php');

        $this->publishes([
            $config => config_path('device42'),
        ]);

        $this->mergeConfigFrom($config, 'device42');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDevice42();
    }

    /**
     * Register the main device42 class.
     *
     * @return void
     */
    protected function registerDevice42()
    {
        $this->app->singleton(Device42::class, function ($app) {
            $config = $app['config']['device42'];
            $url = rtrim($config['url'], '/');

            $client = new Client([
                'base_uri' => "{$url}/api/1.0/",
                'auth'     => [
                    $config['auth']['user'],
                    $config['auth']['password'],
                ],
            ]);

            return new Device42($client);
        });

        $this->app->bind(Device42Contract::class, $this->app->make(Device42::class));
    }

    /**
     * Register API endpoints.
     *
     * @return void
     */
    protected function registerEntities()
    {
        $this->app->bind(Buildings::class, function ($app) {
            return new Buildings($app->make(Device42Contract::class));
        });

        $this->app->bind(Devices::class, function ($app) {
            return new Devices($app->make(Device42Contract::class));
        });
    }
}