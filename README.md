Laravel Device42
============
Laravel 5 package to interact with the [Device42 API](http://api.device42.com/). Not all of the Device42 API endpoints are completed. If you need an endpoint added feel free to submit a pull request.
 
 ### Installation
 Install with composer
 ```bash
 composer require um-flint/laravel-device42
 ```
 
 ### Register the package
 In config/app.php add the service provider.
 
```php
UMFlint/Device42/Device42ServiceProvider::class,
```

### Example usage
Basic example in a controller:
```php
use UMFlint/Device42/Contracts/Device42;
...

public function getIndex(Device42 $device42)
{
    $devices = $device42->all();
}
```
`$devices` will return an array like:
```php
[
            'Devices' =>
                [
                    [
                        'asset_no'   => null,
                        'device_id'  => 34,
                        'device_url' => '/api/1.0/devices/id/34/',
                        'name'       => '320',
                        'groups'     => 'Prod_East:no, Corp:yes',
                        'serial_no'  => null,
                        'uuid'       => '07FCE572-B2B3-B44C-BB1C-6799B509CC31',
                    ],
                    [
                        'asset_no'   => null,
                        'device_id'  => 36,
                        'device_url' => '/api/1.0/devices/id/36/',
                        'name'       => '323p1',
                        'groups'     => 'Prod_East:no, Corp:yes',
                        'serial_no'  => null,
                        'uuid'       => '22D4DEBD-6EAA-D441-89AE-047A9A60E9FB',
                    ],
                    [
                        'asset_no'   => null,
                        'device_id'  => 39,
                        'device_url' => '/api/1.0/devices/id/39/',
                        'name'       => 'd250',
                        'groups'     => 'Prod_East:no, Corp:yes',
                        'serial_no'  => null,
                        'uuid'       => '76CE2AFC-58E3-1B4E-AB7A-6FECB480154B',
                    ],
                    [
                        'asset_no'   => null,
                        'device_id'  => 33,
                        'device_url' => '/api/1.0/devices/id/33/',
                        'name'       => 'd313p1',
                        'groups'     => 'Prod_East:no, Corp:yes',
                        'serial_no'  => null,
                        'uuid'       => 'BC1E0971-9889-8946-A92B-8F1D830C1AF2',
                    ],
                ],
        ]
```