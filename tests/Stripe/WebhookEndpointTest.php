<?php

namespace Stripe;

class WebhookEndpointTest extends TestCase
{
    const TEST_RESOURCE_ID = 'we_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/webhook_endpoints'
        );
        $resources = WebhookEndpoint::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/webhook_endpoints/' . self::TEST_RESOURCE_ID
        );
        $resource = WebhookEndpoint::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/webhook_endpoints'
        );
        $resource = WebhookEndpoint::create([
            'enabled_events' => ['charge.succeeded'],
            'url' => 'https://stripe.com',
        ]);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = WebhookEndpoint::retrieve(self::TEST_RESOURCE_ID);
        $resource->enabled_events = ['charge.succeeded'];
        $this->expectsRequest(
            'post',
            '/v1/webhook_endpoints/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/webhook_endpoints/' . self::TEST_RESOURCE_ID
        );
        $resource = WebhookEndpoint::update(self::TEST_RESOURCE_ID, [
            'enabled_events' => ['charge.succeeded'],
        ]);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = WebhookEndpoint::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/webhook_endpoints/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $resource);
    }
}
