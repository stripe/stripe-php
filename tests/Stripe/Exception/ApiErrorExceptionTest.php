<?php

namespace Stripe\Exception;

class ApiErrorExceptionTest extends \Stripe\TestCase
{
    public function createFixture()
    {
        $mock = $this->getMockForAbstractClass(ApiErrorException::class);
        $instance = $mock::factory(
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
        return $instance;
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        $this->assertSame(200, $e->getHttpStatus());
        $this->assertSame('{"error": {"code": "some_code"}}', $e->getHttpBody());
        $this->assertSame(['error' => ['code' => 'some_code']], $e->getJsonBody());
        $this->assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        $this->assertSame('req_test', $e->getRequestId());
        $this->assertSame('some_code', $e->getStripeCode());
        $this->assertNotNull($e->getError());
        $this->assertSame('some_code', $e->getError()->code);
    }

    public function testToString()
    {
        $e = $this->createFixture();
        $this->assertContains("(Request req_test)", (string) $e);
    }
}
