<?php

class BuildingsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $mock;

    /**
     * @var \UMFlint\Device42\Entities\Buildings
     */
    protected $buildings;

    public function setup()
    {
        $this->mock = Mockery::mock(\UMFlint\Device42\Device42::class);
        $this->buildings = new \UMFlint\Device42\Entities\Buildings($this->mock);
    }

    public function testAll()
    {
        $this->mock->shouldReceive('get')->once()->with('buildings', ['query' => []])->andReturn([
            'buildings' =>
                [
                    [
                        'address'       => '879 main st',
                        'building_id'   => 3,
                        'contact_name'  => 'roger',
                        'contact_phone' => '1234567890',
                        'custom_fields' => [],
                        'groups'        => 'Prod_East:no, Corp:yes',
                        'name'          => 'Las Vegas Office',
                        'notes'         => 'super critical',
                    ],
                    [
                        'address'       => '123 main st',
                        'building_id'   => 1,
                        'contact_name'  => 'roger',
                        'contact_phone' => '1234567890',
                        'custom_fields' => [],
                        'groups'        => 'Prod_East:no, Corp:yes',
                        'name'          => 'New Haven DC',
                        'notes'         => 'super critical',
                    ],
                    [
                        'address'       => '456 main st',
                        'building_id'   => 2,
                        'contact_name'  => 'roger',
                        'contact_phone' => '1234567890',
                        'custom_fields' => [],
                        'groups'        => 'Prod_East:no, Corp:yes',
                        'name'          => 'Palm Beach Bldg',
                        'notes'         => 'super critical',
                    ],
                ],
        ]);

        $data = $this->buildings->all();

        $this->assertEquals(true, isset($data['buildings']));
        $this->assertEquals([
            'address'       => '879 main st',
            'building_id'   => 3,
            'contact_name'  => 'roger',
            'contact_phone' => '1234567890',
            'custom_fields' => [],
            'groups'        => 'Prod_East:no, Corp:yes',
            'name'          => 'Las Vegas Office',
            'notes'         => 'super critical',
        ], $data['buildings'][0]);
    }

    public function testCreateOrUpdate()
    {
        $postData = [
            'name' => 'Testing Create',
        ];

        $this->mock->shouldReceive('post')->once()->with('buildings', [
            'form_params' => $postData,
        ])->andReturn([
            'msg'  => [
                'Building added/updated successfully',
                4,
                $postData['name'],
            ],
            'code' => 0,
        ]);

        $data = $this->buildings->createOrUpdate($postData);

        $this->assertEquals($postData['name'], $data['msg'][2]);
        $this->assertEquals(0, $data['code']);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')->once()->with('buildings/211', [
            'form_params' => [
                'id' => 211,
            ],
        ])->andReturn([
            'deleted' => true,
            'id'      => 211,
        ]);

        $data = $this->buildings->delete(211);

        $this->assertEquals(true, $data['deleted']);
        $this->assertEquals(211, $data['id']);
    }

    public function testCreateOrUpdateFields()
    {
        $postData = [
            'name' => 'Building',
            'key'  => 'field',
        ];

        $this->mock->shouldReceive('put')->once()->with('custom_fields/building', [
            'form_params' => $postData,
        ])->andReturn([
            'msg'  => [
                'custom key pair values added or updated',
                4,
                $postData['name'],
            ],
            'code' => 0,
        ]);

        $data = $this->buildings->createOrUpdateFields($postData);

        $this->assertEquals($postData['name'], $data['msg'][2]);
        $this->assertEquals(0, $data['code']);
    }
}