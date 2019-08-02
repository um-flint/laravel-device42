<?php

namespace UMFlint\Device42;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use UMFlint\Device42\Contracts\Device42 as Device42Contract;
use UMFlint\Device42\Entities\Buildings;
use UMFlint\Device42\Entities\Certificates;
use UMFlint\Device42\Entities\Customers;
use UMFlint\Device42\Entities\Devices;
use UMFlint\Device42\Entities\OperatingSystems;

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
            $config => config_path('device42.php'),
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
        $this->registerEntities();
    }

    /**
     * Register the main device42 class.
     *
     * @return void
     */
    protected function registerDevice42()
    {
        $this->app->singleton(Device42Contract::class, function ($app) {
            $config = $app['config']['device42'];
            $url = rtrim($config['url'], '/');

            $clientConfig = array_merge($app['config']['device42']['http'], [
                'base_uri' => "{$url}/api/1.0/",
                'auth'     => [
                    $config['auth']['user'],
                    $config['auth']['password'],
                ],
            ]);

            $client = new Client($clientConfig);

            return new Device42($client);
        });
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

        $this->app->bind(Customers::class, function ($app) {
            return new Customers($app->make(Device42Contract::class));
        });

        $this->app->bind(Software::class, function ($app) {
            return new Software($app->make(Device42Contract::class));
        });

        $this->app->bind(Certificates::class, function ($app) {
            return new Certificates($app->make(Device42Contract::class));
        });

        $this->app->bind(OperatingSystems::class, function ($app) {
            return new OperatingSystems($app->make(Device42Contract::class));
        });
    }
}