<?php

class OperatingSystemsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $mock;

    /**
     * @var \UMFlint\Device42\Entities\OperatingSystems
     */
    protected $operatingSystem;

    public function setup()
    {
        $this->mock = Mockery::mock(\UMFlint\Device42\Device42::class);
        $this->operatingSystem = new \UMFlint\Device42\Entities\OperatingSystems($this->mock);
    }

    public function testAll()
    {
        $return = [
            'operatingsystems' => [
                'notes'        => null,
                'id'           => 15,
                'name'         => 'Asad-Dev-Machine',
                'manufacturer' => null,
            ],
            [
                'notes'        => null,
                'id'           => 13,
                'name'         => 'avocent',
                'manufacturer' => null,
            ],
        ];

        $this->mock->shouldReceive('get')->once()->with('operatingsystems', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->operatingSystem->all();

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateOperatingSystem()
    {
        $return = [
            'msg'  => [
                'Operating System added/updated',
                77,
                'ESX6.0',
                false,
                false,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('operatingsystems', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->operatingSystem->createOrUpdateOperatingSystem([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDelete()
    {
        $return = [
            'deleted' => true,
            'id'      => 114,
        ];

        $this->mock->shouldReceive('delete')->once()->with("operatingsystems/{$return['id']}", [
            'id' => $return['id'],
        ])->andReturn($return);

        $data = $this->operatingSystem->delete($return['id']);

        $this->assertEquals($data, $return);
    }

    public function testGetByDevice()
    {
        $return = [
            'device_os' => [
                [
                    'count_in_licensing' => 'yes',
                    'device'             => 'Marko-Dev',
                    'device_id'          => 9,
                    'device_os_id'       => 9,
                    'license_key'        => null,
                    'os'                 => 'Ubuntu Linux (32-bit)',
                    'os_id'              => 5,
                    'osver'              => null,
                    'osverno'            => null,
                ],
                [
                    'count_in_licensing' => 'yes',
                    'device'             => 'IE9 - Win7',
                    'device_id'          => 11,
                    'device_os_id'       => 11,
                    'license_key'        => null,
                    'os'                 => 'Microsoft Windows 7 (32-bit)',
                    'os_id'              => 7,
                    'osver'              => null,
                    'osverno'            => null,
                ],
            ],
        ];

        $this->mock->shouldReceive('get')->once()->with('device_os', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->operatingSystem->getByDevice();

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateOnDevice()
    {
        $return = [
            'msg'  => [
                'device_os added/updated',
                9,
                'Production-server (Ubuntu Linux 16.04 (64-bit))',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('device_os', [
            'form_params' => [
                'device_os_id' => $return['msg'][2],
                'device_id'    => $return['msg'][1],
            ],
        ])->andReturn($return);

        $data = $this->operatingSystem->createOrUpdateOnDevice([
            'device_os_id' => $return['msg'][2],
            'device_id'    => $return['msg'][1],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDeleteOnDevice()
    {
        $return = [
            'deleted' => true,
            'id'      => 9,
        ];

        $this->mock->shouldReceive('delete')->once()->with("device_os/{$return['id']}", [
            'device_os_id' => $return['id'],
        ])->andReturn($return);

        $data = $this->operatingSystem->deleteOnDevice($return['id']);

        $this->assertEquals($data, $return);
    }
}