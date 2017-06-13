<?php

namespace Stripe;

class EphemeralKeyTest extends TestCase
{
    private $oldApiVersion = null;

    /**
     * @before
     */
    public function setUpApiVersion()
    {
        $this->oldApiVersion = Stripe::getApiVersion();
    }

    /**
     * @after
     */
    public function tearDownApiVersion()
    {
        Stripe::setApiVersion($this->oldApiVersion);
    }

    public function testVersionlessCreateWithoutGlobalVersion()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $key = EphemeralKey::create(
            array('customer' => 'cus_123')
        );
    }

    public function testVersionedCreateWithoutGlobalVersion()
    {
        $response = $this->ephemeralKeyResponse('cus_123');
        $this->mockCreate($response);

        $key = EphemeralKey::create(
            array('customer' => 'cus_123'),
            array('stripe_version' => '2017-05-25')
        );
        $this->assertSame($key->id, $response['id']);
    }

    public function testVersionlessCreateWithGlobalVersion()
    {
        Stripe::setApiVersion('2017-06-05');
        $this->setExpectedException('\InvalidArgumentException');
        $key = EphemeralKey::create(
            array('customer' => 'cus_123')
        );
    }

    public function testVersionedCreateWithGlobalVersion()
    {
        Stripe::setApiVersion('2017-06-05');
        $response = $this->ephemeralKeyResponse('cus_123');
        $this->mockCreate($response);

        $key = EphemeralKey::create(
            array('customer' => 'cus_123'),
            array('stripe_version' => '2017-05-25')
        );
        $this->assertSame($key->id, $response['id']);
    }

    public function testDelete()
    {
        $response = $this->ephemeralKeyResponse('cus_123');
        $this->mockCreate($response);
        $this->mockDelete($response);

        $key = EphemeralKey::create(
            array('customer' => 'cus_123'),
            array('stripe_version' => '2017-05-25')
        );

        $deleted = $key->delete();
        $this->assertSame($key->id, $deleted->id);
    }

    protected function mockCreate($response)
    {
        $this->mockRequest(
            'POST',
            '/v1/ephemeral_keys',
            array('customer' => $response['associated_objects'][0]['id']),
            $response
        );
    }

    protected function mockDelete($response)
    {
        $this->mockRequest(
            'DELETE',
            sprintf('/v1/ephemeral_keys/%s', $response['id']),
            array(),
            $response
        );
    }

    protected function ephemeralKeyResponse($customer)
    {
        return array(
            'id' => 'ephkey_123',
            'object' => 'ephemeral_key',
            'associated_objects' => array(array(
                'type' => 'customer',
                'id' => $customer
            )),
            'created' => 1496957039,
            'expires' => 1496960639,
            'livemode' => false,
            'secret' => 'ek_test_supersecretstring'
        );
    }
}
