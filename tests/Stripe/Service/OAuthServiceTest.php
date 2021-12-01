<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\OAuthService
 */
final class OAuthServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var OAuthService */
    private $service;

    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL, 'client_id' => 'ca_123']);
        $this->service = new OAuthService($this->client);
    }

    protected function setUpServiceWithNoClientId()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new OAuthService($this->client);
    }

    public function testAuthorizeUrl()
    {
        $this->setUpService();
        $uriStr = $this->service->authorizeUrl([
            'scope' => 'read_write',
            'state' => 'csrf_token',
            'stripe_user' => [
                'email' => 'test@example.com',
                'url' => 'https://example.com/profile/test',
                'country' => 'US',
            ],
        ]);

        $uri = \parse_url($uriStr);
        \parse_str($uri['query'], $params);

        static::assertSame('https', $uri['scheme']);
        static::assertSame('connect.stripe.com', $uri['host']);
        static::assertSame('/oauth/authorize', $uri['path']);

        static::assertSame('ca_123', $params['client_id']);
        static::assertSame('read_write', $params['scope']);
        static::assertSame('test@example.com', $params['stripe_user']['email']);
        static::assertSame('https://example.com/profile/test', $params['stripe_user']['url']);
        static::assertSame('US', $params['stripe_user']['country']);
    }

    public function testAuthorizeUrlRaisesAuthenticationErrorWhenNoClientId()
    {
        $this->setUpServiceWithNoClientId();
        $this->expectException(\Stripe\Exception\AuthenticationException::class);
        $this->compatExpectExceptionMessageMatches('#No client_id provided#');
        $uriStr = $this->service->authorizeUrl();
    }

    public function testAuthorizeUrlRaisesInvalidArgumentExceptionWhenConnectBase()
    {
        $this->setUpService();
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->compatExpectExceptionMessageMatches('#Use `api_base`#');
        $uriStr = $this->service->authorizeUrl(null, ['connect_base' => 'foo']);
    }

    public function testDeauthorizeRaisesAuthenticationErrorWhenNoClientId()
    {
        $this->setUpServiceWithNoClientId();
        $this->expectException(\Stripe\Exception\AuthenticationException::class);
        $this->compatExpectExceptionMessageMatches('#No client_id provided#');
        $this->service->deauthorize();
    }

    public function testToken()
    {
        $this->setUpService();
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [
                'grant_type' => 'authorization_code',
                'code' => 'this_is_an_authorization_code',
                'client_secret' => 'sk_test_123',
            ],
            null,
            false,
            [
                'access_token' => 'sk_access_token',
                'scope' => 'read_only',
                'livemode' => false,
                'token_type' => 'bearer',
                'refresh_token' => 'sk_refresh_token',
                'stripe_user_id' => 'acct_test',
                'stripe_publishable_key' => 'pk_test',
            ],
            200,
            $this->client->getConnectBase()
        );

        $resp = $this->client->oauth->token([
            'grant_type' => 'authorization_code',
            'code' => 'this_is_an_authorization_code',
        ]);
        static::assertSame('sk_access_token', $resp->access_token);
    }

    public function testDeauthorize()
    {
        $this->setUpService();
        $this->stubRequest(
            'POST',
            '/oauth/deauthorize',
            [
                'client_id' => 'ca_123',
                'stripe_user_id' => 'acct_test',
            ],
            null,
            false,
            [
                'stripe_user_id' => 'acct_test',
            ],
            200,
            $this->client->getConnectBase()
        );

        $resp = $this->client->oauth->deauthorize([
            'client_id' => 'ca_123',
            'stripe_user_id' => 'acct_test',
        ]);
        static::assertSame('acct_test', $resp->stripe_user_id);
    }
}
