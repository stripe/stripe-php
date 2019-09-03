<?php

namespace Stripe\Exception\OAuth;

class OAuthErrorExceptionTest extends \Stripe\TestCase
{
    public function createFixture()
    {
        $mock = $this->getMockForAbstractClass(OAuthErrorException::class);
        $instance = $mock::factory(
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
        return $instance;
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        $this->assertSame(200, $e->getHttpStatus());
        $this->assertSame('{"error": "code", "error_description": "description"}', $e->getHttpBody());
        $this->assertSame(['error' => 'code', 'error_description' => 'description'], $e->getJsonBody());
        $this->assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        $this->assertSame('req_test', $e->getRequestId());
        $this->assertSame('code', $e->getStripeCode());
        $this->assertNotNull($e->getError());
        $this->assertSame('code', $e->getError()->error);
        $this->assertSame('description', $e->getError()->error_description);
    }

    public function testToString()
    {
        $e = $this->createFixture();
        $this->assertContains("(Request req_test)", (string)$e);
    }
}
