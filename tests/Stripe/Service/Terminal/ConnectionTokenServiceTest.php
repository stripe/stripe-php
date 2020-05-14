<?php

namespace Stripe\Service\Terminal;

/**
 * @internal
 * @covers \Stripe\Service\Terminal\ConnectionTokenService
 */
final class ConnectionTokenServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ConnectionTokenService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ConnectionTokenService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = $this->service->create();
        static::assertInstanceOf(\Stripe\Terminal\ConnectionToken::class, $resource);
    }
}
