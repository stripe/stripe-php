<?php

namespace Stripe\Exception;

/**
 * @internal
 * @covers \Stripe\Exception\ApiErrorException
 */
final class ApiErrorExceptionTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    public function createFixture()
    {
        $mock = $this->getMockForAbstractClass(ApiErrorException::class);

        return $mock::factory(
            'message',
            200,
            '{"error": {"code": "some_code"}}',
            ['error' => ['code' => 'some_code']],
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],
            'some_code'
        );
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        static::assertSame(200, $e->getHttpStatus());
        static::assertSame('{"error": {"code": "some_code"}}', $e->getHttpBody());
        static::assertSame(['error' => ['code' => 'some_code']], $e->getJsonBody());
        static::assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        static::assertSame('req_test', $e->getRequestId());
        static::assertSame('some_code', $e->getStripeCode());
        static::assertNotNull($e->getError());
        static::assertSame('some_code', $e->getError()->code);
    }

    public function testToString()
    {
        $e = $this->createFixture();
        static::assertContains('(Request req_test)', (string) $e);
    }
}
