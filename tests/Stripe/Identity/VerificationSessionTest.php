<?php

namespace Stripe\Identity;

/**
 * @internal
 *
 * @coversNothing
 */
final class VerificationSessionTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;
    const TEST_RESOURCE_ID = 'vs_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_sessions'
        );
        $resources = VerificationSession::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(VerificationSession::class, $resources->data[0]);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/identity/verification_sessions'
        );
        $resource = VerificationSession::create([
            'type' => 'id_number',
        ]);
        self::assertInstanceOf(VerificationSession::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_sessions/' . self::TEST_RESOURCE_ID
        );
        $resource = VerificationSession::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(VerificationSession::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/identity/verification_sessions/' . self::TEST_RESOURCE_ID
        );
        $resource = VerificationSession::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(VerificationSession::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = VerificationSession::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/identity/verification_sessions/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource->cancel();
        self::assertInstanceOf(VerificationSession::class, $resource);
    }

    public function testIsRedactable()
    {
        $resource = VerificationSession::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/identity/verification_sessions/' . self::TEST_RESOURCE_ID . '/redact'
        );
        $resource->redact();
        self::assertInstanceOf(VerificationSession::class, $resource);
    }
}
