<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\BaseStripeClient
 */
final class BaseStripeClientTest extends \Stripe\TestCase
{
    /** @var \ReflectionProperty */
    private $optsReflector;

    protected function headerStartsWith($header, $name)
    {
        return substr($header, 0, \strlen($name)) === $name;
    }

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

    public function testCtorThrowsIfConfigIsUnexpectedType()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('$config must be a string or an array');

        $client = new BaseStripeClient(234);
    }

    public function testCtorThrowsIfApiKeyIsEmpty()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('api_key cannot be the empty string');

        $client = new BaseStripeClient('');
    }

    public function testCtorThrowsIfApiKeyContainsWhitespace()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('api_key cannot contain whitespace');

        $client = new BaseStripeClient("sk_test_123\n");
    }

    public function testCtorThrowsIfApiKeyIsUnexpectedType()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('api_key must be null or a string');

        $client = new BaseStripeClient(['api_key' => 234]);
    }

    public function testCtorThrowsIfConfigArrayContainsUnexpectedKey()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('Found unknown key(s) in configuration array: \'foo\', \'foo2\'');

        $client = new BaseStripeClient(['foo' => 'bar', 'foo2' => 'bar2']);
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
        $this->compatExpectExceptionMessageMatches('#Do not pass a string for request options.#');

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

    public function testRequestCollectionWithClientApiKey()
    {
        $client = new BaseStripeClient(['api_key' => 'sk_test_client', 'api_base' => MOCK_URL]);
        $charges = $client->requestCollection('get', '/v1/charges', [], []);
        static::assertNotNull($charges);
        static::assertSame('sk_test_client', $this->optsReflector->getValue($charges)->apiKey);
    }

    public function testRequestCollectionThrowsForNonList()
    {
        $this->expectException(\Stripe\Exception\UnexpectedValueException::class);
        $this->expectExceptionMessage('Expected to receive `Stripe\Collection` object from Stripe API. Instead received `Stripe\Charge`.');

        $client = new BaseStripeClient(['api_key' => 'sk_test_client', 'api_base' => MOCK_URL]);
        $client->requestCollection('get', '/v1/charges/ch_123', [], []);
    }

    public function testRequestWithOptsInParamsWarns()
    {
        $this->compatExpectWarning(static::compatWarningClass());
        $this->expectExceptionMessage('Options found in $params: api_key, stripe_account, api_base. Options should be '
            . 'passed in their own array after $params. (HINT: pass an empty array to $params if you do not have any.)');
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $charge = $client->request(
            'get',
            '/v1/charges/ch_123',
            [
                'api_key' => 'sk_test_client',
                'stripe_account' => 'acct_123',
                'api_base' => MOCK_URL,
            ],
            ['stripe_account' => 'acct_456']
        );
        static::assertNotNull($charge);
        static::assertSame('acct_456', $this->optsReflector->getValue($charge)->headers['Stripe-Account']);
    }

    public function testJsonRawRequestGetWithURLParams()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;
        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $opts = null;
        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts_) use (&$opts) {
                $opts = $opts_;

                return true;
            }), MOCK_URL . '/v1/xyz?foo=bar')
        ;

        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $client->rawRequest('get', '/v1/xyz?foo=bar', null, []);
        static::assertArrayNotHasKey(\CURLOPT_POST, $opts);
        static::assertArrayNotHasKey(\CURLOPT_POSTFIELDS, $opts);
        $content_type = null;
        foreach ($opts[\CURLOPT_HTTPHEADER] as $header) {
            if (self::headerStartsWith($header, 'Content-Type:')) {
                $content_type = $header;
            }
        }
        // The library sends Content-Type even with no body, so assert this
        // But it would be more correct to not send Content-Type
        static::assertStringStartsWith('Content-Type: application/x-www-form-urlencoded', $content_type);
    }

    public function testJsonRawRequestPost()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;
        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "xyz", "isPHPBestLanguage": true, "abc": {"object": "abc", "a": 2}}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_POST]);
                $this->assertSame('{"foo":"bar","baz":{"qux":false}}', $opts[\CURLOPT_POSTFIELDS]);
                $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v1/xyz')
        ;

        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = ['foo' => 'bar', 'baz' => ['qux' => false]];
        $resp = $client->rawRequest('post', '/v1/xyz', $params, [
            'api_mode' => 'preview',
        ]);

        $decoded = \json_decode($resp->body, true);
        $xyz = \Stripe\StripeObject::constructFrom($decoded);

        static::assertSame('xyz', $xyz->object); // @phpstan-ignore-line
        static::assertTrue($xyz->isPHPBestLanguage); // @phpstan-ignore-line
        static::assertSame(2, $xyz->abc->a); // @phpstan-ignore-line
        static::assertInstanceof(\Stripe\StripeObject::class, $xyz->abc); // @phpstan-ignore-line
    }

    public function testFormRawRequestPost()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;
        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_POST]);
                $this->assertSame('foo=bar&baz[qux]=false', $opts[\CURLOPT_POSTFIELDS]);
                $this->assertContains('Content-Type: application/x-www-form-urlencoded', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v1/xyz')
        ;

        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = ['foo' => 'bar', 'baz' => ['qux' => false]];
        $client->rawRequest('post', '/v1/xyz', $params, [
            'api_mode' => 'standard',
        ]);
    }

    public function testJsonRawRequestGetWithNonNullParams()
    {
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = [];
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: rawRequest only supports $params on post requests. Please pass null and add your parameters to $path');
        $client->rawRequest('get', '/v1/xyz', $params, [
            'api_mode' => 'preview',
        ]);
    }

    public function testRawRequestWithStripeContextOption()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;
        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertContains('Stripe-Context: acct_123', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v1/xyz')
        ;

        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = [];
        $client->rawRequest('post', '/v1/xyz', $params, [
            'api_mode' => 'preview',
            'stripe_context' => 'acct_123',
        ]);
    }

    public function testPreviewGetRequest()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;
        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $opts = null;
        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts_) use (&$opts) {
                $opts = $opts_;

                return true;
            }), MOCK_URL . '/v1/xyz?foo=bar')
        ;

        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $client->preview->get('/v1/xyz?foo=bar', []);
        static::assertArrayNotHasKey(\CURLOPT_POST, $opts);
        static::assertArrayNotHasKey(\CURLOPT_POSTFIELDS, $opts);
        $content_type = null;
        $stripe_version = null;
        foreach ($opts[\CURLOPT_HTTPHEADER] as $header) {
            if (self::headerStartsWith($header, 'Content-Type:')) {
                $content_type = $header;
            }
            if (self::headerStartsWith($header, 'Stripe-Version:')) {
                $stripe_version = $header;
            }
        }
        // The library sends Content-Type even with no body, so assert this
        // But it would be more correct to not send Content-Type
        static::assertStringStartsWith('Content-Type: application/json', $content_type);
        static::assertStringStartsWith('Stripe-Version: ' . \Stripe\Util\ApiVersion::PREVIEW, $stripe_version);
    }
}
