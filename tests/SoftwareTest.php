<?php

class SoftwareTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $mock;

    /**
     * @var \UMFlint\Device42\Entities\Software
     */
    protected $software;

    public function setup()
    {
        $this->mock = Mockery::mock(\UMFlint\Device42\Device42::class);
        $this->software = new \UMFlint\Device42\Entities\Software($this->mock);
    }

    public function testDetails()
    {
        $return = [
            'total_count'      => 2016,
            'software_details' => [
                'software_alias'     => 'cifs-utils 4.8.1',
                'last_updated'       => '2015-06-01T18:14:08.4142',
                'user_id'            => null,
                'first_detected'     => '2015-05-27T13:05:51.389Z',
                'vendor_id'          => null,
                'install_date'       => '2015-05-22',
                'version'            => '4.8.1',
                'license_use_count'  => 1,
                'user'               => null,
                'device'             => 'Redhat64x86.d42sus.pvt',
                'vendor'             => null,
                'software_id'        => 10671,
                'device_id'          => 10670,
                'id'                 => 12596,
                'count_in_licensing' => true,
                'software'           => 'cifs-utils',
            ],
        ];

        $this->mock->shouldReceive('get')->once()->with('software_details', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->software->details();

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateDetails()
    {
        $return = [
            'msg'  => [
                'software_detail added/updated',
                1,
                'Some Enterprise DB',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('software_details', [
            'form_params' => [
                'software' => $return['msg'][2],
                'device'   => 'Some Device',
            ],
        ])->andReturn($return);

        $data = $this->software->createOrUpdateDetails([
            'software' => $return['msg'][2],
            'device'   => 'Some Device',
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDeleteDetails()
    {
        $return = [
            'deleted' => true,
            'id'      => 1,
        ];

        $this->mock->shouldReceive('delete')->once()->with("software_details/{$return['id']}", [
            'form_params' => [
                'id' => $return['id'],
            ],
        ])->andReturn($return);

        $data = $this->software->deleteDetails($return['id']);

        $this->assertEquals($data, $return);
    }

    public function testComponentDetails()
    {
        $return = [
            'total_count' => 2016,
            'software'    => [
                'aliases'                      => '3pay, 4pay',
                'category'                     => 'past_time2',
                'discovered_count'             => null,
                'id'                           => 583,
                'licensed_count'               => null,
                'licensing_model'              => 'Individual - Device/Perpetual',
                'name'                         => '2pay',
                'notes'                        => 'test',
                'software_type'                => 'prohibited',
                'tags'                         => ['def'],
                'track_licensed_count_by_keys' => 'yes',
                'vendor'                       => 'cisco',
            ],
        ];

        $this->mock->shouldReceive('get')->once()->with('software', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->software->componentDetails();

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateComponent()
    {
        $return = [
            'msg'  => [
                'software added/updated',
                1,
                'New_Software',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('software', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->software->createOrUpdateComponent([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDeleteComponent()
    {
        $return = [
            'msg' => [
                'deleted' => true,
                'id'      => 1,
            ],
        ];

        $this->mock->shouldReceive('delete')->once()->with("software/{$return['msg']['id']}", [
            'form_params' => [
                'id' => $return['msg']['id'],
            ],
        ])->andReturn($return);

        $data = $this->software->deleteComponent($return['msg']['id']);

        $this->assertEquals($data, $return);
    }

    public function testLicenseKeys()
    {
        $return = [
            [
                'count'         => 1,
                'id'            => 1,
                'key'           => '124124',
                'notes'         => '',
                'software_id'   => 114,
                'software_name' => 'accountsservice',
            ],
            [
                'count'         => 1,
                'id'            => 2,
                'key'           => 124124,
                'notes'         => '',
                'software_id'   => 114,
                'software_name' => 'accountsservice',
            ],
        ];

        $this->mock->shouldReceive('get')->once()->with('software/licence_keys', [
            'query' => [],
        ])->andReturn($return);

        $data = $this->software->licenseKeys();

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateLicenseKey()
    {
        $return = [
            'msg'  => [
                'software license key added/updated',
                2,
                1618,
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('software/license_keys', [
            'form_params' => [
                'id' => $return['msg'][1],
            ],
        ])->andReturn($return);

        $data = $this->software->createOrUpdateLicenceKey([
            'id' => $return['msg'][1],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDeleteLicenseKey()
    {
        $return = [
            'deleted' => true,
            'id'      => 1,
        ];

        $this->mock->shouldReceive('delete')->once()->with("software/license_keys/{$return['id']}", [
            'form_params' => [
                'id' => $return['id'],
            ],
        ])->andReturn($return);

        $data = $this->software->deleteLicenseKey($return['id']);

        $this->assertEquals($data, $return);
    }
}