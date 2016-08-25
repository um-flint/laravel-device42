<?php

class CertificatesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $mock;

    /**
     * @var \UMFlint\Device42\Entities\Certificates
     */
    protected $certificate;

    public function setup()
    {
        $this->mock = Mockery::mock(\UMFlint\Device42\Device42::class);
        $this->certificate = new \UMFlint\Device42\Entities\Certificates($this->mock);
    }

    public function testGetCertificate()
    {
        $return = [
            'total_count'         => 1,
            'certificate_details' => [
                'signature_algorithm'      => 'sha256WithRSAEncryption',
                'vendor'                   => null,
                'id'                       => 2,
                'decipher_only_usage'      => false,
                'subject'                  => '/OU=Domain Control Validated/OU=PositiveSSL/CN=registration.device42.com',
                'data_encipherment_usage'  => false,
                'valid_from'               => '2014-08-10',
                'signature_hash'           => '314159265',
                'issued_by'                => null,
                'crl_sign_usage'           => false,
                'version'                  => 2,
                'content_commitment_usage' => false,
                'key_agreement_usage'      => false,
                'serial_number'            => '8675309',
                'issued_to'                => 'registration.device42.com',
                'key_cert_sign_usage'      => false,
                'key_encipherment_usage'   => true,
                'digital_signature_usage'  => true,
                'encipher_only_message'    => false,
                'groups'                   => '',
                'custom_fields'            => [],
                'extended_key_usage'       => 'SERVERAUTH(1.3.6.1.5.5.7.3.1)\nCLIENTAUTH(1.3.6.1.5.5.7.3.2)\n',
                'valid_to'                 => '2042-08-09',
            ],
        ];

        $this->mock->shouldReceive('get')->once()->with('certificates', [
            'query' => $return['certificate_details']['id'],
        ])->andReturn($return);

        $data = $this->certificate->getCertificate($return['certificate_details']['id']);

        $this->assertEquals($data, $return);
    }

    public function testCreateOrUpdateCertificate()
    {
        $return = [
            'msg'  => [
                'certificate added/updated',
                'test.device42.com',
                'test.device42.com',
                true,
                true,
            ],
            'code' => 0,
        ];

        $this->mock->shouldReceive('post')->once()->with('certificates', [
            'form_params' => [
                'issued_to' => $return['msg'][1],
                'dns'       => $return['msg'][2],
            ],
        ])->andReturn($return);

        $data = $this->certificate->createOrUpdateCertificate([
            'issued_to' => $return['msg'][1],
            'dns'       => $return['msg'][2],
        ]);

        $this->assertEquals($data, $return);
    }
}