<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\BaseStripeClient
 */
final class BaseStripeClientTest extends \PHPUnit\Framework\TestCase
{
    /** @var \ReflectionProperty */
    private $optsReflector;

    /** @before */
    protected function setUpOptsReflector()
    {
        $this->optsReflector = new \ReflectionProperty(\Stripe\StripeObject::class, '_opts');
        $this->optsReflector->setAccessible(true);
    }

    public function testCtorDoesNotThrowWhenNoParams()
    {
        $client = new BaseStripeClient();
        static::assertNotNull($client);
        static::assertNull($client->getApiKey());
    }

    public function testCtorThrowsIfApiKeyIsEmpty()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('API key cannot be the empty string.');

        $client = new BaseStripeClient('');
    }

    public function testCtorThrowsIfApiKeyContainsWhitespace()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('API key cannot contain whitespace.');

        $client = new BaseStripeClient("sk_test_123\n");
    }

    public function testRequestWithClientApiKey()
    {
        $client = new BaseStripeClient(['api_key' => 'sk_test_client', 'api_base' => MOCK_URL]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], []);
        static::assertNotNull($charge);
        static::assertSame('sk_test_client', $this->optsReflector->getValue($charge)->apiKey);
    }

    public function testRequestWithOptsApiKey()
    {
        $client = new BaseStripeClient(['api_base' => MOCK_URL]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], ['api_key' => 'sk_test_opts']);
        static::assertNotNull($charge);
        static::assertSame('sk_test_opts', $this->optsReflector->getValue($charge)->apiKey);
    }

    public function testRequestThrowsIfNoApiKeyInClientAndOpts()
    {
        $this->expectException(\Stripe\Exception\AuthenticationException::class);
        $this->expectExceptionMessage('No API key provided.');

        $client = new BaseStripeClient(['api_base' => MOCK_URL]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], []);
        static::assertNotNull($charge);
        static::assertSame('ch_123', $charge->id);
    }

    public function testRequestThrowsIfOptsIsString()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('#Do not pass a string for request options.#');

        $client = new BaseStripeClient(['api_base' => MOCK_URL]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], 'foo');
        static::assertNotNull($charge);
        static::assertSame('ch_123', $charge->id);
    }

    public function testRequestThrowsIfOptsIsArrayWithUnexpectedKeys()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('Got unexpected keys in options array: foo');

        $client = new BaseStripeClient(['api_base' => MOCK_URL]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], ['foo' => 'bar']);
        static::assertNotNull($charge);
        static::assertSame('ch_123', $charge->id);
    }

    public function testRequestWithClientStripeVersion()
    {
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_version' => '2020-03-02',
            'api_base' => MOCK_URL,
        ]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], []);
        static::assertNotNull($charge);
        static::assertSame('2020-03-02', $this->optsReflector->getValue($charge)->headers['Stripe-Version']);
    }

    public function testRequestWithOptsStripeVersion()
    {
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_version' => '2020-03-02',
            'api_base' => MOCK_URL,
        ]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], ['stripe_version' => '2019-12-03']);
        static::assertNotNull($charge);
        static::assertSame('2019-12-03', $this->optsReflector->getValue($charge)->headers['Stripe-Version']);
    }

    public function testRequestWithClientStripeAccount()
    {
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], []);
        static::assertNotNull($charge);
        static::assertSame('acct_123', $this->optsReflector->getValue($charge)->headers['Stripe-Account']);
    }

    public function testRequestWithOptsStripeAccount()
    {
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $charge = $client->request('get', '/v1/charges/ch_123', [], ['stripe_account' => 'acct_456']);
        static::assertNotNull($charge);
        static::assertSame('acct_456', $this->optsReflector->getValue($charge)->headers['Stripe-Account']);
    }
}
