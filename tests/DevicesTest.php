<?php

class DevicesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $mock;

    /**
     * @var \UMFlint\Device42\Entities\Devices
     */
    protected $devices;

    public function setup()
    {
        $this->mock = Mockery::mock(\UMFlint\Device42\Device42::class);
        $this->devices = new \UMFlint\Device42\Entities\Devices($this->mock);
    }

    public function testAll()
    {
        $this->mock->shouldReceive('get')->once()->with('devices', [
            'query' => [],
        ])->andReturn([
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
        ]);

        $data = $this->devices->all();

        $this->assertEquals(true, isset($data['Devices']));
        $this->assertEquals([
            'asset_no'   => null,
            'device_id'  => 34,
            'device_url' => '/api/1.0/devices/id/34/',
            'name'       => '320',
            'groups'     => 'Prod_East:no, Corp:yes',
            'serial_no'  => null,
            'uuid'       => '07FCE572-B2B3-B44C-BB1C-6799B509CC31',
        ], $data['Devices'][0]);
    }

    public function testAllDetailed()
    {
        $return = [
            'total_count' => 8305,
            'limit'       => 1,
            'Devices'     =>
                [
                    [
                        'last_updated'               => '2014-03-21T00:03:34.488Z',
                        'ip_addresses'               =>
                            [
                                [
                                    'subnet_id' => 115,
                                    'ip'        => '10.10.2.2',
                                    'label'     => '',
                                    'type'      => null,
                                    'subnet'    => 'undefined-::/0',
                                ],
                            ],
                        'ram'                        => null,
                        'hw_depth'                   => 2,
                        'device_external_links'      => [],
                        'hw_size'                    => 5,
                        'custom_fields'              =>
                            [
                                [
                                    'notes' => null,
                                    'key'   => 'virtualizationType',
                                    'value' => '',
                                ],
                                [
                                    'notes' => null,
                                    'key'   => 'vle',
                                    'value' => '',
                                ],
                                [
                                    'notes' => null,
                                    'key'   => 'VMotion_Ready',
                                    'value' => '',
                                ],
                            ],
                        'aliases'                    => [],
                        'uuid'                       => null,
                        'location'                   => null,
                        'cpuspeed'                   => null,
                        'hw_model'                   => 'RJ12',
                        'hddraid_type'               => null,
                        'type'                       => 'physical',
                        'hddcount'                   => null,
                        'service_level'              => 'Production',
                        'device_purchase_line_items' => [],
                        'tags'                       => [],
                        'in_service'                 => true,
                        'hddsize'                    => null,
                        'mac_addresses'              => [],
                        'cpucount'                   => null,
                        'hddraid'                    => null,
                        'osverno'                    => '6.0.3',
                        'customer'                   => null,
                        'serial_no'                  => '',
                        'name'                       => 'rajlog-lab-PC',
                        'notes'                      => '',
                        'asset_no'                   => 'NH0011',
                        'osver'                      => 'SP3',
                        'device_id'                  => 1,
                        'cpucore'                    => null,
                        'os'                         => 'Windows Server 2008 R2',
                    ],
                ],
            'offset'      => 0,
        ];

        $this->mock->shouldReceive('get')->once()->with('devices/all', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->allDetailed();

        $this->assertEquals(true, isset($data['total_count']));
        $this->assertEquals(true, isset($data['limit']));
        $this->assertEquals(true, isset($data['Devices']));
        $this->assertEquals($data['Devices'][0], $return['Devices'][0]);
        $this->assertEquals(true, isset($data['offset']));
    }

    public function testFind()
    {
        $return = [
            'asset_no'                   => null,
            'custom_fields'              =>
                [],
            'customer'                   => null,
            'device_external_links'      =>
                [],
            'device_purchase_line_items' =>
                [
                    [
                        'line_cancel_policy' => null,
                        'line_cost'          => 0,
                        'line_end_date'      => '2014-01-01',
                        'line_frequency'     => 'One Time',
                        'line_item_type'     => 'Device',
                        'line_no'            => 1,
                        'line_notes'         => 'test',
                        'line_quantity'      => 2,
                        'line_renew_date'    => '2014-01-01',
                        'line_start_date'    => '2012-12-21',
                        'line_type'          => 'Contract',
                        'purchase_id'        => 4,
                        'purchase_order_no'  => 'cisco support contract',
                    ],
                ],
            'hw_depth'                   => 1,
            'hw_model'                   => '2924XL',
            'hw_size'                    => 1,
            'id'                         => 8,
            'in_service'                 => true,
            'ip_addresses'               => [],
            'last_updated'               => '2013-08-20T13:22:08.335Z',
            'location'                   => null,
            'mac_addresses'              => [],
            'manufacturer'               => 'Cisco',
            'name'                       => 'nh-switch-01',
            'notes'                      => null,
            'os'                         => null,
            'serial_no'                  => 'D42142S01',
            'service_level'              => 'Production',
            'type'                       => 'physical',
            'uuid'                       => null,
        ];

        $this->mock->shouldReceive('get')->once()->with("devices/id/{$return['id']}", [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->find($return['id']);

        $this->assertEquals($data, $return);
    }

    public function testFindByCustomer()
    {
        $return = [
            'Devices' =>
                [
                    [
                        'asset_no'                   => null,
                        'cpucore'                    => 3,
                        'cpucount'                   => 1,
                        'cpuspeed'                   => '',
                        'custom_fields'              => [],
                        'customer'                   => 'Finance Group',
                        'customer_id'                => 3,
                        'device_external_links'      => [],
                        'device_purchase_line_items' => [],
                        'groups'                     => 'Prod_East:no, Corp:yes',
                        'hddcount'                   => '',
                        'hddsize'                    => '',
                        'hw_model'                   => null,
                        'hw_size'                    => null,
                        'id'                         => 30,
                        'in_service'                 => false,
                        'ip_addresses'               => [],
                        'last_updated'               => '2014-01-07T02:23:36.350Z',
                        'mac_addresses'              =>
                            [
                                [
                                    'mac' => '00:15:5d:0b:72:0b',
                                ],
                            ],
                        'manufacturer'               => null,
                        'name'                       => 'd42-231',
                        'notes'                      => null,
                        'os'                         => null,
                        'ram'                        => 512,
                        'serial_no'                  => null,
                        'service_level'              => 'QA',
                        'type'                       => 'virtual',
                        'uuid'                       => '6BB7DC86-D744-8943-B991-B6BF82B55F99',
                        'virtual_host_name'          => 'HYPER01',
                    ],
                    [
                        'asset_no'                   => null,
                        'cpucore'                    => 3,
                        'cpucount'                   => 1,
                        'cpuspeed'                   => '',
                        'custom_fields'              => [],
                        'customer'                   => 'Finance Group',
                        'customer_id'                => 3,
                        'device_external_links'      => [],
                        'device_purchase_line_items' => [],
                        'groups'                     => 'Prod_East:no, Corp:yes',
                        'hddcount'                   => '',
                        'hddsize'                    => '',
                        'hw_model'                   => null,
                        'hw_size'                    => null,
                        'id'                         => 37,
                        'in_service'                 => false,
                        'ip_addresses'               => [],
                        'last_updated'               => '2014-01-07T02:23:30.141Z',
                        'mac_addresses'              =>
                            [
                                [
                                    'mac' => '00:15:5d:0b:72:0d',
                                ],
                            ],
                        'manufacturer'               => null,
                        'name'                       => 'D42_250_IMPORETD',
                        'notes'                      => null,
                        'os'                         => null,
                        'ram'                        => 512,
                        'serial_no'                  => null,
                        'service_level'              => 'QA',
                        'type'                       => 'virtual',
                        'uuid'                       => 'D3260495-90E8-D940-8D21-D2108DC29E86',
                        'virtual_host_name'          => 'HYPER01',
                    ],
                    [
                        'asset_no'                   => null,
                        'cpucore'                    => 3,
                        'cpucount'                   => 1,
                        'cpuspeed'                   => 3200,
                        'custom_fields'              => [],
                        'customer'                   => 'Finance Group',
                        'customer_id'                => 3,
                        'device_external_links'      => [],
                        'device_purchase_line_items' => [],
                        'groups'                     => 'Prod_East:no, Corp:yes',
                        'hddcount'                   => '',
                        'hddsize'                    => '',
                        'hw_model'                   => null,
                        'hw_size'                    => null,
                        'id'                         => 41,
                        'in_service'                 => true,
                        'ip_addresses'               => [],
                        'last_updated'               => '2014-01-07T02:23:30.612Z',
                        'mac_addresses'              =>
                            [
                                [
                                    'mac' => '00:15:5d:0b:72:24',
                                ],
                            ],
                        'manufacturer'               => null,
                        'name'                       => 'dcm',
                        'notes'                      => null,
                        'os'                         => null,
                        'ram'                        => 2048,
                        'serial_no'                  => null,
                        'service_level'              => 'QA',
                        'type'                       => 'virtual',
                        'uuid'                       => 'D89CB60C-999F-1C4D-BD06-57E959293227',
                        'virtual_host_name'          => 'HYPER01',
                    ],
                ],
        ];

        $this->mock->shouldReceive('get')->once()->with("devices/customer_id/{$return['Devices'][0]['customer_id']}", [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->findByCustomer($return['Devices'][0]['customer_id']);

        $this->assertEquals($data, $return);
    }

    public function testFindByName()
    {
        $return = [
            'asset_no'                   => null,
            'cpucore'                    => 3,
            'cpucount'                   => 1,
            'cpuspeed'                   => 3200,
            'custom_fields'              => [],
            'customer'                   => 'Finance Group',
            'customer_id'                => 3,
            'device_external_links'      => [],
            'device_purchase_line_items' => [],
            'groups'                     => 'Prod_East:no, Corp:yes',
            'hddcount'                   => '',
            'hddsize'                    => '',
            'hw_model'                   => null,
            'hw_size'                    => null,
            'id'                         => 32,
            'in_service'                 => true,
            'ip_addresses'               => [],
            'last_updated'               => '2014-01-07T02:23:29.789Z',
            'mac_addresses'              =>
                [
                    [
                        'mac' => '00:15:5d:0b:72:1f',
                    ],
                ],
            'manufacturer'               => null,
            'name'                       => 'OpenVPN01',
            'notes'                      => null,
            'os'                         => null,
            'ram'                        => 256,
            'serial_no'                  => null,
            'service_level'              => 'QA',
            'type'                       => 'virtual',
            'uuid'                       => '16D1ABD8-13E9-C847-A605-AD894BEF6FFE',
            'virtual_host_name'          => 'HYPER01',
        ];

        $this->mock->shouldReceive('get')->once()->with("devices/name/{$return['name']}", [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->findByName($return['name']);

        $this->assertEquals($data, $return);
    }

    public function testFindBySerialNumber()
    {
        $return = [
            'asset_no'                   => null,
            'custom_fields'              => [],
            'customer'                   => null,
            'device_external_links'      => [],
            'device_purchase_line_items' => [],
            'groups'                     => 'Prod_East:no, Corp:yes',
            'hw_depth'                   => 1,
            'hw_model'                   => 'PE 2950',
            'hw_size'                    => 2,
            'id'                         => 2,
            'in_service'                 => true,
            'ip_addresses'               => [],
            'last_updated'               => '2013-08-20T13:21:59.831Z',
            'location'                   => null,
            'mac_addresses'              => [],
            'manufacturer'               => 'Dell',
            'name'                       => 'nh-demo-02',
            'notes'                      => null,
            'os'                         => null,
            'serial_no'                  => 'D4214213',
            'service_level'              => 'Production',
            'type'                       => 'physical',
            'uuid'                       => null,
        ];

        $this->mock->shouldReceive('get')->once()->with("devices/serial/{$return['serial_no']}", [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->findBySerialNumber($return['serial_no']);

        $this->assertEquals($data, $return);
    }

    public function testFindByAssetNumber()
    {
        $return = [
            'asset_no'                   => null,
            'custom_fields'              => [],
            'customer'                   => null,
            'device_external_links'      => [],
            'device_purchase_line_items' => [],
            'groups'                     => 'Prod_East:no, Corp:yes',
            'hw_depth'                   => 1,
            'hw_model'                   => 'PE 2950',
            'hw_size'                    => 2,
            'id'                         => 2,
            'in_service'                 => true,
            'ip_addresses'               => [],
            'last_updated'               => '2013-08-20T13:21:59.831Z',
            'location'                   => null,
            'mac_addresses'              => [],
            'manufacturer'               => 'Dell',
            'name'                       => 'nh-demo-02',
            'notes'                      => null,
            'os'                         => null,
            'serial_no'                  => 'D4214213',
            'service_level'              => 'Production',
            'type'                       => 'physical',
            'uuid'                       => null,
        ];

        $this->mock->shouldReceive('get')->once()->with("devices/asset/{$return['asset_no']}", [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->findByAssetNumber($return['asset_no']);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateByName()
    {
        $return = [
            'msg'  => [
                'device added or updated',
                45,
                'db-080-westport',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('devices', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->devices->createOrUpdateByName([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateMultiSerialByName()
    {
        $return = [
            'msg'  => [
                'device added or updated',
                7246,
                'server-42',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('multiserial', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->devices->createOrUpdateMultiSerialByName([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateMultiNodeByName()
    {
        $return = [
            'msg'  => [
                'device added or updated',
                7246,
                'server-42',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('multinodes', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->devices->createOrUpdateMultiNodeByName([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testUpdateByNameOrIdOrserialOrAsset()
    {
        $return = [
            'msg'  => [
                'device added or updated',
                46,
                'db-080-westport',
                true,
                false,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('put')->once()->with('device', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->devices->updateByNameOrIdOrSerialOrAsset([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDelete()
    {
        $return = [
            'deleted' => true,
            'id'      => 'abc1006',
        ];

        $this->mock->shouldReceive('delete')->once()->with("devices/{$return['id']}", [
            'form_params' => [
                'id' => $return['id'],
            ],
        ])->andReturn($return);

        $data = $this->devices->delete($return['id']);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateFields()
    {
        $return = [
            'msg'  => [
                'custom key pair values added or updated',
                8,
                'nh-switch-01',
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('put')->once()->with('device/custom_field', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->devices->createOrUpdateFields([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testGetUrls()
    {
        $return = [
            'device_weblinks' =>
                [
                    [
                        'notes'      => '',
                        'id'         => 1,
                        'host'       => '{{device.name}}',
                        'device'     => 'nh-fujitsu-02',
                        'type'       => 'HTTP',
                        'port'       => 80,
                        'url_suffix' => 'aset',
                    ],
                    [
                        'notes'      => '',
                        'id'         => 93,
                        'host'       => '{{device.name}}',
                        'device'     => 'nh-fujitsu-02',
                        'type'       => 'HTTP',
                        'port'       => 80,
                        'url_suffix' => 'aset',
                    ],
                    [
                        'notes'      => '',
                        'id'         => 94,
                        'host'       => '{{device.name}}',
                        'device'     => 'nh-fujitsu-02',
                        'type'       => 'HTTPS',
                        'port'       => '',
                        'url_suffix' => '',
                    ],
                ],
        ];

        $this->mock->shouldReceive('get')->once()->with('device/url', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->devices->getUrls();

        $this->assertEquals($data, $return);
    }

    public function testAddUrl()
    {
        $return = [
            'msg'  => [
                'Device url saved successfully.',
                2,
                'http://device42.com:8080/awesome',
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('device/url', [
            'form_params' => [
                'type' => 'http',
                'name' => 'nh-switch-01',
            ],
        ])->andReturn($return);

        $data = $this->devices->addUrl([
            'type' => 'http',
            'name' => 'nh-switch-01',
        ]);

        $this->assertEquals($data, $return);
    }

    public function testUpdateUrl()
    {
        $return = [
            'msg'  => [
                'Device url updated.',
                2,
                'http://www.device42.com:8080/awesome',
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('put')->once()->with("device/url/{$return['msg'][1]}", [
            'form_params' => [
                'id'   => $return['msg'][1],
                'type' => 'http',
            ],
        ])->andReturn($return);

        $data = $this->devices->updateUrl([
            'id'   => $return['msg'][1],
            'type' => 'http',
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDeleteUrl()
    {
        $return = [
            'deleted' => true,
            'id'      => 142,
        ];

        $this->mock->shouldReceive('delete')->once()->with("device/url/{$return['id']}")->andReturn($return);

        $data = $this->devices->deleteUrl($return['id']);

        $this->assertEquals($data, $return);
    }

    public function testAddOrUpdateInRack()
    {
        $return = [
            'msg'  => [
                'device added or updated in the rack',
                2,
                "[2.0] - RA1 -1st floor",
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('device/rack', [
            'form_params' => [
                'device'  => 'Test Device',
                'rack_id' => $return['msg'][1],
            ],
        ])->andReturn($return);

        $data = $this->devices->addOrUpdateInRack([
            'device'  => 'Test Device',
            'rack_id' => $return['msg'][1],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDeleteFromRack()
    {
        $return = [
            'deleted' => true,
            'id'      => 142,
        ];

        $this->mock->shouldReceive('delete')->once()->with("device/rack/{$return['id']}")->andReturn($return);

        $data = $this->devices->deleteFromRack($return['id']);

        $this->assertEquals($data, $return);
    }
}