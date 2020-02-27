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
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
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
