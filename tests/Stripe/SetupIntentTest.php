<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\SetupIntent
 */
final class SetupIntentTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'seti_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/setup_intents'
        );
        $resources = SetupIntent::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(SetupIntent::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/setup_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = SetupIntent::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(SetupIntent::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/setup_intents'
        );
        $resource = SetupIntent::create([
            'payment_method_types' => ['card'],
        ]);
        self::assertInstanceOf(SetupIntent::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = SetupIntent::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertInstanceOf(SetupIntent::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = SetupIntent::update(
            self::TEST_RESOURCE_ID,
            [
                'metadata' => ['key' => 'value'],
            ]
        );
        self::assertInstanceOf(SetupIntent::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = SetupIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource->cancel();
        self::assertInstanceOf(SetupIntent::class, $resource);
    }

    public function testIsConfirmable()
    {
        $resource = SetupIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/' . self::TEST_RESOURCE_ID . '/confirm'
        );
        $resource->confirm();
        self::assertInstanceOf(SetupIntent::class, $resource);
    }
}
