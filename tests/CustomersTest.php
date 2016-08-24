<?php

class CustomersTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $mock;

    /**
     * @var \UMFlint\Device42\Entities\Customers
     */
    protected $customers;

    public function setup()
    {
        $this->mock = Mockery::mock(\UMFlint\Device42\Device42::class);
        $this->customers = new \UMFlint\Device42\Entities\Customers($this->mock);
    }

    public function testAll()
    {
        $return = [
            'Customers' =>
                [
                    [
                        'Contacts'      =>
                            [
                                'address' => '123 main st',
                                'email'   => 'rick@d42.com',
                                'name'    => 'Random Guy',
                                'phone'   => '555-555-5555',
                                'type'    => 'Technical',
                            ],
                        'Custom Fields' =>
                            [
                                'key'    => 'custID',
                                'notes'  => null,
                                'value'  => '42',
                                'value2' => null,
                            ],
                        'contact_info'  => '555 Technical Lane, Cool City.',
                        'devices_url'   => '/api/1.0/devices/customer_id/1/',
                        'groups'        => 'Prod_East:no, Corp:yes',
                        'id'            => 1,
                        'name'          => 'ABC, Inc.',
                        'notes'         => 'some notes here',
                        'subnets_url'   => '/api/1.0/subnets/customer_id/1/',
                    ],
                    [
                        'Contacts'      =>
                            [
                                'address' => 'unknown',
                                'email'   => '',
                                'name'    => 'Bad Guy',
                                'phone'   => '',
                                'type'    => 'Administrative',
                            ],
                        'Custom Fields' => [],
                        'contact_info'  => '',
                        'devices_url'   => '/api/1.0/devices/customer_id/10/',
                        'id'            => 10,
                        'name'          => 'Cyberdyne Systems',
                        'notes'         => '',
                        'subnets_url'   => '/api/1.0/subnets/customer_id/10/',
                    ],
                    [
                        'Contacts'      => [],
                        'Custom Fields' => [],
                        'contact_info'  => null,
                        'devices_url'   => '/api/1.0/devices/customer_id/3/',
                        'id'            => 3,
                        'name'          => 'Finance Group',
                        'notes'         => null,
                        'subnets_url'   => '/api/1.0/subnets/customer_id/3/',
                    ],
                    [
                        'Contacts'      => [],
                        'Custom Fields' => [],
                        'contact_info'  => '',
                        'devices_url'   => '/api/1.0/devices/customer_id/9',
                        'groups'        => 'Prod_east:no, Corp:yes',
                        'id'            => 9,
                        'name'          => 'Infrastructure Services',
                        'notes'         => '',
                        'subnets_url'   => '/api/1.0/subnets/customer_id/9/',
                    ],
                ],
        ];

        $this->mock->shouldReceive('get')->once()->with('customers')->andReturn($return);

        $data = $this->customers->all();

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdate()
    {
        $return = [
            'msg'  => [
                'Customer added or updates.',
                4,
                'Skynet',
                true,
                false,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('customers', [
            'form_params' => [
                'name' => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->customers->createOrUpdate([
            'name' => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }

    public function testDelete()
    {
        $return = [
            'msg' => [
                'deleted' => true,
                'id'      => '114',
            ],
        ];

        $this->mock->shouldReceive('delete')->once()->with("customers/{$return['msg']['id']}", [
            'form_params' => [
                'id' => $return['msg']['id'],
            ],
        ])->andReturn($return);

        $data = $this->customers->delete($return['msg']['id']);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateContacts()
    {
        $return = [
            'msg'  => [
                'customer contact record added/updated successfully',
                5,
                'mickeymouse',
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('customers/contacts', [
            'form_params' => [
                'name'     => $return['msg'][2],
                'type'     => 'Technical',
                'customer' => 'Customer',
            ],
        ])->andReturn($return);

        $data = $this->customers->createOrUpdateContacts([
            'name'     => $return['msg'][2],
            'type'     => 'Technical',
            'customer' => 'Customer',
        ]);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateFields()
    {
        $return = [
            'msg'  => [
                'custom key pair values added or updated',
                4,
                'Skynet',
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('put')->once()->with('custom_fields/customer', [
            'form_params' => [
                'name' => $return['msg'][2],
                'key'  => 'Key',
            ],
        ])->andReturn($return);

        $data = $this->customers->createOrUpdateFields([
            'name' => $return['msg'][2],
            'key'  => 'Key',
        ]);

        $this->assertEquals($data, $return);
    }
}