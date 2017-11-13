<?php

namespace Stripe;

class OAuthTest extends TestCase
{
    /**
     * @before
     */
    public function setUpClientId()
    {
        Stripe::setClientId('ca_test');
    }

    /**
     * @after
     */
    public function tearDownClientId()
    {
        Stripe::setClientId(null);
    }

    public function testAuthorizeUrl()
    {
        $uriStr = OAuth::authorizeUrl(array(
            'scope' => 'read_write',
            'state' => 'csrf_token',
            'stripe_user' => array(
                'email' => 'test@example.com',
                'url' => 'https://example.com/profile/test',
                'country' => 'US',
            ),
        ));

        $uri = parse_url($uriStr);
        parse_str($uri['query'], $params);

        $this->assertSame('https', $uri['scheme']);
        $this->assertSame('connect.stripe.com', $uri['host']);
        $this->assertSame('/oauth/authorize', $uri['path']);

        $this->assertSame('ca_test', $params['client_id']);
        $this->assertSame('read_write', $params['scope']);
        $this->assertSame('test@example.com', $params['stripe_user']['email']);
        $this->assertSame('https://example.com/profile/test', $params['stripe_user']['url']);
        $this->assertSame('US', $params['stripe_user']['country']);
    }

    public function testToken()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            array(
                'grant_type' => 'authorization_code',
                'code' => 'this_is_an_authorization_code',
            ),
            null,
            false,
            array(
                'access_token' => 'sk_access_token',
                'scope' => 'read_only',
                'livemode' => false,
                'token_type' => 'bearer',
                'refresh_token' => 'sk_refresh_token',
                'stripe_user_id' => 'acct_test',
                'stripe_publishable_key' => 'pk_test',
            ),
            200,
            Stripe::$connectBase
        );

        $resp = OAuth::token(array(
            'grant_type' => 'authorization_code',
            'code' => 'this_is_an_authorization_code',
        ));
        $this->assertSame('sk_access_token', $resp->access_token);
    }

    public function testDeauthorize()
    {
        $this->stubRequest(
            'POST',
            '/oauth/deauthorize',
            array(
                'stripe_user_id' => 'acct_test_deauth',
                'client_id' => 'ca_test',
            ),
            null,
            false,
            array(
                'stripe_user_id' => 'acct_test_deauth',
            ),
            200,
            Stripe::$connectBase
        );

        $resp = OAuth::deauthorize(array(
                'stripe_user_id' => 'acct_test_deauth',
        ));
        $this->assertSame('acct_test_deauth', $resp->stripe_user_id);
    }
}
