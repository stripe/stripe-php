<?php

namespace Stripe;

use Stripe\Util\ApiVersion;

/**
 * @internal
 * @covers \Stripe\BaseStripeClient
 */
final class BaseStripeClientTest extends \Stripe\TestCase
{
    use TestHelper;

    /** @var \ReflectionProperty */
    private $optsReflector;

    /** @var \ReflectionClass */
    private $apiRequestorReflector;

    private $curlClientStub;

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

    /** @before */
    protected function setUpApiRequestorReflector()
    {
        $this->apiRequestorReflector = new \ReflectionClass(\Stripe\ApiRequestor::class);
    }

    /** @before */
    protected function setUpCurlClientStub()
    {
        $this->curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;
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

    public function testRequestWithNoVersionDefaultsToPinnedVersion()
    {
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);
        $this->expectsRequest('get', '/v1/charges/ch_123', null, [
            'Stripe-Version: ' . \Stripe\Util\ApiVersion::CURRENT,
        ]);
        $charge = $client->request(
            'get',
            '/v1/charges/ch_123',
            [],
            []
        );
    }

    public function testJsonRawRequestGetWithURLParams()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $opts = null;
        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts_) use (&$opts) {
                $opts = $opts_;

                return true;
            }), MOCK_URL . '/v1/xyz?foo=bar')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $client->rawRequest('get', '/v1/xyz?foo=bar', null, []);
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
        static::assertSame('Content-Type: application/x-www-form-urlencoded', $content_type);
        static::assertSame('Stripe-Version: ' . ApiVersion::CURRENT, $stripe_version);
    }

    public function testRawRequestUsageTelemetry()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, ['request-id' => 'req_123']])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                return true;
            }), MOCK_URL . '/v1/xyz')
        ;
        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);
        $client->rawRequest('post', '/v1/xyz', [], []);
        // Can't use ->getStaticPropertyValue because this has a bug until PHP 7.4.9: https://bugs.php.net/bug.php?id=69804
        static::assertSame(['raw_request'], $this->apiRequestorReflector->getStaticProperties()['requestTelemetry']->usage);
    }

    public function testJsonRawRequestPost()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "xyz", "isPHPBestLanguage": true, "abc": {"object": "abc", "a": 2}}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_POST]);
                $this->assertSame('{"foo":"bar","baz":{"qux":false}}', $opts[\CURLOPT_POSTFIELDS]);
                $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/xyz')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = ['foo' => 'bar', 'baz' => ['qux' => false]];
        $resp = $client->rawRequest('post', '/v2/xyz', $params, []);

        $xyz = $client->deserialize($resp->body, 'v2');

        static::assertSame('xyz', $xyz->object); // @phpstan-ignore-line
        static::assertTrue($xyz->isPHPBestLanguage); // @phpstan-ignore-line
        static::assertSame(2, $xyz->abc->a); // @phpstan-ignore-line
        static::assertInstanceof(\Stripe\StripeObject::class, $xyz->abc); // @phpstan-ignore-line
    }

    public function testFormRawRequestPost()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_POST]);
                $this->assertSame('foo=bar&baz[qux]=false', $opts[\CURLOPT_POSTFIELDS]);
                $this->assertContains('Content-Type: application/x-www-form-urlencoded', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v1/xyz')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = ['foo' => 'bar', 'baz' => ['qux' => false]];
        $client->rawRequest('post', '/v1/xyz', $params, []);
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
        $client->rawRequest('get', '/v2/xyz', $params, []);
    }

    public function testRawRequestWithStripeContextOption()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertContains('Stripe-Context: acct_123', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/xyz')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_account' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);
        $params = [];
        $client->rawRequest('post', '/v2/xyz', $params, [
            'stripe_context' => 'acct_123',
        ]);
    }

    public function testV2GetRequest()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "v2.billing.meter_event_session"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_HTTPGET]);

                // The library sends Content-Type even with no body, so assert this
                // But it would be more correct to not send Content-Type
                $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/billing/meter_event_session')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_version' => '2222-22-22.preview-v2',
            'api_base' => MOCK_URL,
        ]);
        $meterEventSession = $client->request('get', '/v2/billing/meter_event_session', [], []);
        static::assertNotNull($meterEventSession);
        static::assertInstanceOf(\Stripe\V2\Billing\MeterEventSession::class, $meterEventSession);
    }

    public function testV2PostRequest()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "v2.billing.meter_event_session"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_POST]);
                $this->assertSame('{"foo":"bar"}', $opts[\CURLOPT_POSTFIELDS]);
                $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/billing/meter_event_session')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_version' => '2222-22-22.preview-v2',
            'api_base' => MOCK_URL,
        ]);

        $meterEventSession = $client->request('post', '/v2/billing/meter_event_session', ['foo' => 'bar'], []);
        static::assertNotNull($meterEventSession);
        static::assertInstanceOf(\Stripe\V2\Billing\MeterEventSession::class, $meterEventSession);
    }

    public function testV2PostRequestWithEmptyParams()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "v2.billing.meter_event_session"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertSame(1, $opts[\CURLOPT_POST]);
                $this->assertArrayNotHasKey(\CURLOPT_POSTFIELDS, $opts);
                $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/billing/meter_event_session')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_version' => '2222-22-22.preview-v2',
            'api_base' => MOCK_URL,
        ]);

        $meterEventSession = $client->request('post', '/v2/billing/meter_event_session', [], []);
        static::assertNotNull($meterEventSession);
        static::assertInstanceOf(\Stripe\V2\Billing\MeterEventSession::class, $meterEventSession);
    }

    public function testV2RequestWithClientStripeContext()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "account"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertContains('Stripe-Context: acct_123', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/accounts')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_context' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);

        $client->request('post', '/v2/accounts', [], []);
    }

    public function testV2RequestWithOptsStripeContext()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "account"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertContains('Stripe-Context: acct_456', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/accounts')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_context' => 'acct_123',
            'api_base' => MOCK_URL,
        ]);

        $client->request('post', '/v2/accounts', [], ['stripe_context' => 'acct_456']);
    }

    private function assertAppInfo($ua, $ua_dict, $headers)
    {
        static::assertContains($ua, $headers);
        foreach ($headers as $element) {
            if (strpos($element, 'X-Stripe-Client-User-Agent')) {
                static::assertStringContainsString($ua_dict, $element);

                break;
            }
        }
    }

    public function testSetClientAppInfo()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "charge"}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertAppInfo(
                    'User-Agent: ' . 'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp/1.2.34 (https://mytestapp.example)',
                    '{"name": "MyTestApp","version":"1.2.34","url":"https://mytestapp.example","partner_id":"partner_1234"}',
                    $opts[\CURLOPT_HTTPHEADER]
                );

                return true;
            }), MOCK_URL . '/v1/charges/ch_123')
        ;
        $appInfo = [
            'name' => 'MyTestApp',
            'version' => '1.2.34',
            'url' => 'https://mytestapp.example',
            'partner_id' => 'partner_1234',
        ];
        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_appinfo',
            'api_base' => MOCK_URL,
            'app_info' => $appInfo,
        ]);

        $client->request('get', '/v1/charges/ch_123', [], []);
    }

    public function testSetClientAppInfoOnlyName()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "charge"}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertAppInfo(
                    'User-Agent: ' . 'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp',
                    '{"name": "MyTestApp"}',
                    $opts[\CURLOPT_HTTPHEADER]
                );

                return true;
            }), MOCK_URL . '/v1/charges/ch_123')
        ;
        ApiRequestor::setHttpClient($curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_appinfo',
            'api_base' => MOCK_URL,
            'app_info' => [
                'name' => 'MyTestApp',
            ],
        ]);
        $client->request('get', '/v1/charges/ch_123', [], []);
    }

    public function testClientAppInfoFallsBackToGlobal()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "charge"}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertAppInfo(
                    'User-Agent: ' . 'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp/1.2.34 (https://mytestapp.example)',
                    '{"name": "MyTestApp","version":"1.2.34","url":"https://mytestapp.example"}',
                    $opts[\CURLOPT_HTTPHEADER]
                );

                return true;
            }), MOCK_URL . '/v1/charges/ch_123')
        ;
        ApiRequestor::setHttpClient($curlClientStub);
        Stripe::setAppInfo('MyTestApp', '1.2.34', 'https://mytestapp.example');
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_appinfo',
            'api_base' => MOCK_URL,
        ]);
        $client->request('get', '/v1/charges/ch_123', [], []);
    }

    public function testClientAppInfoOverridesGlobal()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "charge"}', 200, []])
        ;

        $curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $headers = $opts[\CURLOPT_HTTPHEADER];
                $this->assertAppInfo(
                    'User-Agent: ' . 'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp/2.3.45 (https://mytestapp.example)',
                    '{"name": "MyTestApp","version":"2.3.45","url":"https://mytestapp.example"}',
                    $opts[\CURLOPT_HTTPHEADER]
                );

                return true;
            }), MOCK_URL . '/v1/charges/ch_123')
        ;

        ApiRequestor::setHttpClient($curlClientStub);
        Stripe::setAppInfo('NotMyTestApp', '1.2.34', 'https://notmytestapp.example');
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_appinfo',
            'api_base' => MOCK_URL,
            'app_info' => [
                'name' => 'MyTestApp',
                'version' => '2.3.45',
                'url' => 'https://mytestapp.example',
            ],
        ]);

        $client->request('get', '/v1/charges/ch_123', [], []);
    }

    public function testConfigValidationFindsExtraAppInfoKeys()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_appinfo',
            'app_info' => [
                'name' => 'MyTestApp',
                'foo' => 'bar',
            ],
        ]);
    }

    public function testParseThinEvent()
    {
        $jsonEvent = [
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'financial_account.balance.opened',
            'created' => '2022-02-15T00:27:45.330Z',
            'related_object' => [
                'id' => 'fa_123',
                'type' => 'financial_account',
                'url' => '/v2/financial_accounts/fa_123',
                'stripe_context' => 'acct_123',
            ],
        ];

        $eventData = json_encode($jsonEvent);
        $client = new BaseStripeClient(['api_key' => 'sk_test_client', 'api_base' => MOCK_URL, 'stripe_account' => 'acc_123']);

        $sigHeader = WebhookTest::generateHeader(['payload' => $eventData]);
        $event = $client->parseThinEvent($eventData, $sigHeader, WebhookTest::SECRET);

        static::assertNotInstanceOf(\Stripe\StripeObject::class, $event);
        static::assertSame('evt_234', $event->id);
        static::assertSame('financial_account.balance.opened', $event->type);
        static::assertSame('2022-02-15T00:27:45.330Z', $event->created);
        static::assertSame('fa_123', $event->related_object->id);
    }

    public function testV2OverridesPreviewVersionIfPassedInRawRequestOptions()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "account"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertContains('Stripe-Version: 2222-22-22.preview-v2', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/accounts/acct_123')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);
        $params = [];
        $client->rawRequest('post', '/v2/accounts/acct_123', $params, [
            'stripe_version' => '2222-22-22.preview-v2',
        ]);
    }

    public function testV2OverridesPreviewVersionIfPassedInRequestOptions()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{"object": "v2.billing.meter_event_session"}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                $this->assertContains('Stripe-Version: 2222-22-22.preview-v2', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/billing/meter_event_session/bmes_123')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);
        $meterEventSession = $client->request('get', '/v2/billing/meter_event_session/bmes_123', [], ['stripe_version' => '2222-22-22.preview-v2']);
        static::assertNotNull($meterEventSession);
        static::assertInstanceOf(\Stripe\V2\Billing\MeterEventSession::class, $meterEventSession);
    }

    public function testV1AndV2Request()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturnOnConsecutiveCalls(['{"object": "v2.billing.meter_event_session"}', 200, []], ['{"object": "billing.meter_event"}', 200, []])
        ;

        $this->curlClientStub
            ->method('executeRequestWithRetries')
            ->withConsecutive([static::callback(function ($opts) {
                $this->assertContains('Stripe-Version: ' . ApiVersion::CURRENT, $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }), MOCK_URL . '/v2/billing/meter_event_session/bmes_123'], [
                static::callback(function ($opts) {
                    $this->assertContains('Stripe-Version: ' . ApiVersion::CURRENT, $opts[\CURLOPT_HTTPHEADER]);

                    return true;
                }),
                MOCK_URL . '/v1/billing/meter_event/bmes_123',
            ])
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);
        $meterEventSession = $client->request('get', '/v2/billing/meter_event_session/bmes_123', [], []);
        static::assertNotNull($meterEventSession);
        static::assertInstanceOf(\Stripe\V2\Billing\MeterEventSession::class, $meterEventSession);

        $meterEvent = $client->request('get', '/v1/billing/meter_event/bmes_123', [], []);
        static::assertNotNull($meterEvent);
        static::assertInstanceOf(\Stripe\Billing\MeterEvent::class, $meterEvent);
    }

    public function testV2RequestWithEmptyResponse()
    {
        $this->curlClientStub->method('executeRequestWithRetries')
            ->willReturn(['{}', 200, []])
        ;

        $this->curlClientStub->expects(static::once())
            ->method('executeRequestWithRetries')
            ->with(static::callback(function ($opts) {
                return true;
            }), MOCK_URL . '/v2/billing/meter_event_stream')
        ;

        ApiRequestor::setHttpClient($this->curlClientStub);
        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
            'stripe_version' => '2222-22-22.preview-v2',
            'api_base' => MOCK_URL,
        ]);

        $meterEventStream = $client->request('post', '/v2/billing/meter_event_stream', [], []);
        static::assertNotNull($meterEventStream);
        static::assertInstanceOf(\Stripe\StripeObject::class, $meterEventStream);
    }
}
