<?php

namespace Stripe\Exception\OAuth;

/**
 * @internal
 *
 * @covers \Stripe\Exception\OAuth\OAuthErrorException
 */
final class OAuthErrorExceptionTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function createFixture($headers = ['Some-Header' => 'Some Value', 'Request-Id' => 'req_test'])
    {
        $mock = $this->getMockForAbstractClass(OAuthErrorException::class);

        return $mock::factory(
            'description',
            200,
            '{"error": "code", "error_description": "description"}',
            ['error' => 'code', 'error_description' => 'description'],
            $headers,
            'code'
        );
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        self::assertSame(200, $e->getHttpStatus());
        self::assertSame('{"error": "code", "error_description": "description"}', $e->getHttpBody());
        self::assertSame(['error' => 'code', 'error_description' => 'description'], $e->getJsonBody());
        self::assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        self::assertSame('req_test', $e->getRequestId());
        self::assertSame('code', $e->getStripeCode());
        self::assertNotNull($e->getError());
        self::assertSame('code', $e->getError()->error);
        self::assertSame('description', $e->getError()->error_description);
    }

    public function testGetMessageIncludesRequestId()
    {
        $e = $this->createFixture();
        self::assertSame('[req_test] description', $e->getMessage());
    }

    public function testGetMessageWithoutRequestIdIsUnchanged()
    {
        $e = $this->createFixture(['Some-Header' => 'Some Value']);
        self::assertSame('description', $e->getMessage());
        self::assertNull($e->getRequestId());
    }

    public function testToString()
    {
        $e = $this->createFixture();
        self::compatAssertStringContainsString('[req_test]', (string) $e);
    }
}
