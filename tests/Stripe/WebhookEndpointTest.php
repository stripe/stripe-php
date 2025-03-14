<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\WebhookEndpoint
 */
final class WebhookEndpointTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'we_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/webhook_endpoints'
        );
        $resources = WebhookEndpoint::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(WebhookEndpoint::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/webhook_endpoints/' . self::TEST_RESOURCE_ID
        );
        $resource = WebhookEndpoint::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(WebhookEndpoint::class, $resource);
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
        self::assertInstanceOf(WebhookEndpoint::class, $resource);
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
        self::assertInstanceOf(WebhookEndpoint::class, $resource);
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
        self::assertInstanceOf(WebhookEndpoint::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = WebhookEndpoint::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/webhook_endpoints/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        self::assertInstanceOf(WebhookEndpoint::class, $resource);
    }
}
