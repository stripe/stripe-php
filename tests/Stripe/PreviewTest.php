<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\PreviewTest
 */
final class PreviewTest extends \Stripe\TestCase
{
    use TestHelper;

    /** @var \Stripe\BaseStripeClient */
    private $client;

    /**
     * @before
     */
    public function setUpClient()
    {
        $this->client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
    }

    public function testPreviewGet()
    {
        $this->stubRequest(
            'GET',
            '/v1/xyz?foo=bar',
            [],
            ['Content-Type: application/json', 'Stripe-Version: ' . \Stripe\Util\ApiVersion::PREVIEW]
        );

        $this->client->preview->get('/v1/xyz?foo=bar', []);
    }

    public function testPreviewPost()
    {
        $this->stubRequest(
            'POST',
            '/v1/xyz',
            ['foo' => 'bar', 'baz' => ['qux' => false]],
            ['Content-Type: application/json', 'Stripe-Version: ' . \Stripe\Util\ApiVersion::PREVIEW]
        );

        $params = ['foo' => 'bar', 'baz' => ['qux' => false]];
        $this->client->preview->post('/v1/xyz', $params, []);
    }

    public function testPreviewDelete()
    {
        $this->stubRequest(
            'DELETE',
            '/v1/xyz/xyz_123',
            [],
            ['Content-Type: application/json', 'Stripe-Version: ' . \Stripe\Util\ApiVersion::PREVIEW]
        );

        $this->client->preview->delete('/v1/xyz/xyz_123', []);
    }

    public function testOverrideDefaultOoptions()
    {
        $stripeVersionOverride = '2022-11-15';
        $stripeContext = 'acct_123';

        $this->stubRequest(
            'GET',
            '/v1/xyz/xyz_123',
            [],
            ['Content-Type: application/json', 'Stripe-Version: ' . $stripeVersionOverride, 'Stripe-Context: ' . $stripeContext]
        );

        $this->client->preview->get('/v1/xyz/xyz_123', ['stripe_version' => $stripeVersionOverride, 'stripe_context' => $stripeContext]);
    }
}
