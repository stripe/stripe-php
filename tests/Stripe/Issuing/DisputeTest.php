<?php

namespace Stripe\Issuing;

/**
 * @internal
 * @covers \Stripe\Issuing\Dispute
 */
final class DisputeTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'idp_123';

    public function testIsCreatable()
    {
        $params = [
            'transaction' => 'ipi_123',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes',
            $params
        );
        $resource = Dispute::create($params);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes'
        );
        $resources = Dispute::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID,
            []
        );
        $resource = Dispute::update(self::TEST_RESOURCE_ID, []);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testIsSubmittable()
    {
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID . '/submit'
        );
        $resource->submit();
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }
}
