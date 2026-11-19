<?php

namespace Stripe\Exception;

/**
 * @internal
 *
 * @covers \Stripe\Exception\ApiErrorException
 */
final class ApiErrorExceptionTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function createFixture($headers = ['Some-Header' => 'Some Value', 'Request-Id' => 'req_test'])
    {
        $mock = $this->getMockForAbstractClass(ApiErrorException::class);

        return $mock::factory(
            'message',
            200,
            '{"error": {"code": "some_code"}}',
            ['error' => ['code' => 'some_code']],
            $headers,
            'some_code'
        );
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        self::assertSame(200, $e->getHttpStatus());
        self::assertSame('{"error": {"code": "some_code"}}', $e->getHttpBody());
        self::assertSame(['error' => ['code' => 'some_code']], $e->getJsonBody());
        self::assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        self::assertSame('req_test', $e->getRequestId());
        self::assertSame('some_code', $e->getStripeCode());
        self::assertNotNull($e->getError());
        self::assertSame('some_code', $e->getError()->code);
    }

    public function testGetMessageIncludesRequestId()
    {
        $e = $this->createFixture();
        self::assertSame('[req_test] message', $e->getMessage());
    }

    public function testGetMessageWithoutRequestIdIsUnchanged()
    {
        $e = $this->createFixture(['Some-Header' => 'Some Value']);
        self::assertSame('message', $e->getMessage());
        self::assertNull($e->getRequestId());
    }

    public function testToString()
    {
        $e = $this->createFixture();
        self::compatAssertStringContainsString('[req_test]', (string) $e);
        self::compatAssertStringContainsString('Error sending request to Stripe', (string) $e);
        self::compatAssertStringContainsString('Stack trace:', (string) $e);
    }
}
