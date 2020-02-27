<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\StripeClient
 */
final class StripeClientTest extends \PHPUnit\Framework\TestCase
{
    public function testCtorDoesNotThrowIfApiKeyIsNull()
    {
        $client = new StripeClient(null);
        static::assertNotNull($client);
        static::assertNull($client->getApiKey());
    }

    public function testCtorThrowsIfApiKeyIsEmpty()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('API key cannot be the empty string.');

        $client = new StripeClient('');
    }

    public function testCtorThrowsIfApiKeyContainsWhitespace()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('API key cannot contain whitespace.');

        $client = new StripeClient("sk_test_123\n");
    }

    public function testRequestWithClientApiKey()
    {
        $client = new StripeClient('sk_test_client', null, MOCK_URL);
        $charge = $client->request('get', '/v1/charges/ch_123', [], []);
        static::assertNotNull($charge);
        $optsReflector = new \ReflectionProperty(\Stripe\StripeObject::class, '_opts');
        $optsReflector->setAccessible(true);
        static::assertSame('sk_test_client', $optsReflector->getValue($charge)->apiKey);
    }

    public function testRequestWithOptsApiKey()
    {
        $client = new StripeClient(null, null, MOCK_URL);
        $charge = $client->request('get', '/v1/charges/ch_123', [], ['api_key' => 'sk_test_opts']);
        static::assertNotNull($charge);
        static::assertNotNull($charge);
        $optsReflector = new \ReflectionProperty(\Stripe\StripeObject::class, '_opts');
        $optsReflector->setAccessible(true);
        static::assertSame('sk_test_opts', $optsReflector->getValue($charge)->apiKey);
    }

    public function testRequestThrowsIfNoApiKeyInClientAndOpts()
    {
        $this->expectException(\Stripe\Exception\AuthenticationException::class);
        $this->expectExceptionMessage('No API key provided.');

        $client = new StripeClient(null, null, MOCK_URL);
        $charge = $client->request('get', '/v1/charges/ch_123', [], []);
        static::assertNotNull($charge);
        static::assertSame('ch_123', $charge->id);
    }
}
