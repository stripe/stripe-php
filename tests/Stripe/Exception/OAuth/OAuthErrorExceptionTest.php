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

    public function createFixture()
    {
        $mock = $this->getMockForAbstractClass(OAuthErrorException::class);

        return $mock::factory(
            'description',
            200,
            '{"error": "code", "error_description": "description"}',
            ['error' => 'code', 'error_description' => 'description'],
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],
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

    public function testToString()
    {
        $e = $this->createFixture();
        self::compatAssertStringContainsString('(Request req_test)', (string) $e);
    }
}
