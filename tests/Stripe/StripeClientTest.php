<?php

namespace Stripe;

class StripeClientTest extends TestCase
{
    public function testCtorDoesNotThrowIfApiKeyIsNull()
    {
        $client = new StripeClient(null);
        $this->assertNotNull($client);
        $this->assertNull($client->getApiKey());
    }

    /**
     * @expectedException \Stripe\Exception\InvalidArgumentException
     * @expectedExceptionMessage API key cannot be the empty string.
     */
    public function testCtorThrowsIfApiKeyIsEmpty()
    {
        $client = new StripeClient("");
    }

    /**
     * @expectedException \Stripe\Exception\InvalidArgumentException
     * @expectedExceptionMessage API key cannot contain whitespace.
     */
    public function testCtorThrowsIfApiKeyContainsWhitespace()
    {
        $client = new StripeClient("sk_test_123\n");
    }

    public function testRequestWithClientApiKey()
    {
        $client = new StripeClient("sk_test_client", null, MOCK_URL);
        $charge = $client->request("get", "/v1/charges/ch_123", [], []);
        $this->assertNotNull($charge);
        $optsReflector = new \ReflectionProperty(\Stripe\StripeObject::class, '_opts');
        $optsReflector->setAccessible(true);
        $this->assertEquals("sk_test_client", $optsReflector->getValue($charge)->apiKey);
    }

    public function testRequestWithOptsApiKey()
    {
        $client = new StripeClient(null, null, MOCK_URL);
        $charge = $client->request("get", "/v1/charges/ch_123", [], ["api_key" => "sk_test_opts"]);
        $this->assertNotNull($charge);
        $this->assertNotNull($charge);
        $optsReflector = new \ReflectionProperty(\Stripe\StripeObject::class, '_opts');
        $optsReflector->setAccessible(true);
        $this->assertEquals("sk_test_opts", $optsReflector->getValue($charge)->apiKey);
    }

    /**
     * @expectedException Stripe\Exception\AuthenticationException
     * @expectedExceptionMessage No API key provided.
     */
    public function testRequestThrowsIfNoApiKeyInClientAndOpts()
    {
        $client = new StripeClient(null, null, MOCK_URL);
        $charge = $client->request("get", "/v1/charges/ch_123", [], []);
        $this->assertNotNull($charge);
        $this->assertEquals("ch_123", $charge->id);
    }
}
