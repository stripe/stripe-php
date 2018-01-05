<?php

namespace Stripe;

class SourceTest extends TestCase
{
    const TEST_RESOURCE_ID = 'src_123';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Source", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources'
        );
        $resource = Source::create(array(
            "type" => "card"
        ));
        $this->assertInstanceOf("Stripe\\Source", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Source", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = Source::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertInstanceOf("Stripe\\Source", $resource);
    }

    public function testCanSaveCardExpiryDate()
    {
        $response = array(
            'id' => 'src_foo',
            'object' => 'source',
            'card' => array(
                'exp_month' => 8,
                'exp_year' => 2019,
            ),
        );
        $source = Source::constructFrom(
            $response,
            new Util\RequestOptions()
        );

        $response['card']['exp_month'] = 12;
        $response['card']['exp_year'] = 2022;
        $this->stubRequest(
            'POST',
            '/v1/sources/src_foo',
            array(
                'card' => array(
                    'exp_month' => 12,
                    'exp_year' => 2022,
                )
            ),
            null,
            false,
            $response
        );

        $source->card->exp_month = 12;
        $source->card->exp_year = 2022;
        $source->save();

        $this->assertSame(12, $source->card->exp_month);
        $this->assertSame(2022, $source->card->exp_year);
    }

    public function testIsDetachableWhenAttached()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $resource->customer = "cus_123";
        $this->expectsRequest(
            'delete',
            '/v1/customers/cus_123/sources/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf("Stripe\\Source", $resource);
    }

    /**
     * @expectedException \Stripe\Error\Api
     */
    public function testIsNotDetachableWhenUnattached()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $resource->detach();
    }

    public function testCanListSourceTransactions()
    {
        $source = Source::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/sources/' . $source->id . "/source_transactions"
        );
        $resources = $source->sourceTransactions();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\SourceTransaction", $resources->data[0]);
    }

    public function testCanVerify()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID . "/verify"
        );
        $resource->verify(array("values" => array(32,45)));
        $this->assertInstanceOf("Stripe\\Source", $resource);
    }
}
