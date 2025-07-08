<?php

namespace Stripe\HttpClient;

/**
 * @internal
 *
 * @covers \Stripe\HttpClient\CurlClient
 */
final class CurlClientTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;
    use \Stripe\TestServer;

    /** @var \ReflectionProperty */
    private $initialNetworkRetryDelayProperty;

    /** @var \ReflectionProperty */
    private $maxNetworkRetryDelayProperty;

    /** @var \ReflectionProperty */
    private $curlHandle;

    /** @var float */
    private $origInitialNetworkRetryDelay;

    /** @var int */
    private $origMaxNetworkRetries;

    /** @var float */
    private $origMaxNetworkRetryDelay;

    /** @var \ReflectionMethod */
    private $sleepTimeMethod;

    /** @var \ReflectionMethod */
    private $shouldRetryMethod;

    /** @var \ReflectionMethod */
    private $constructCurlOptionsMethod;

    /**
     * @before
     */
    public function saveOriginalNetworkValues()
    {
        $this->origMaxNetworkRetries = \Stripe\Stripe::getMaxNetworkRetries();
        $this->origMaxNetworkRetryDelay = \Stripe\Stripe::getMaxNetworkRetryDelay();
        $this->origInitialNetworkRetryDelay = \Stripe\Stripe::getInitialNetworkRetryDelay();
    }

    /**
     * @before
     */
    public function setUpReflectors()
    {
        $stripeReflector = new \ReflectionClass('\Stripe\Stripe');

        $this->maxNetworkRetryDelayProperty = $stripeReflector->getProperty('maxNetworkRetryDelay');
        $this->maxNetworkRetryDelayProperty->setAccessible(true);

        $this->initialNetworkRetryDelayProperty = $stripeReflector->getProperty('initialNetworkRetryDelay');
        $this->initialNetworkRetryDelayProperty->setAccessible(true);

        $curlClientReflector = new \ReflectionClass('\Stripe\HttpClient\CurlClient');

        $this->shouldRetryMethod = $curlClientReflector->getMethod('shouldRetry');
        $this->shouldRetryMethod->setAccessible(true);

        $this->sleepTimeMethod = $curlClientReflector->getMethod('sleepTime');
        $this->sleepTimeMethod->setAccessible(true);

        $this->curlHandle = $curlClientReflector->getProperty('curlHandle');
        $this->curlHandle->setAccessible(true);

        $this->constructCurlOptionsMethod = $curlClientReflector->getMethod('constructCurlOptions');
        $this->constructCurlOptionsMethod->setAccessible(true);
    }

    /**
     * @after
     */
    public function restoreOriginalNetworkValues()
    {
        \Stripe\Stripe::setMaxNetworkRetries($this->origMaxNetworkRetries);
        $this->setMaxNetworkRetryDelay($this->origMaxNetworkRetryDelay);
        $this->setInitialNetworkRetryDelay($this->origInitialNetworkRetryDelay);
    }

    private function setMaxNetworkRetryDelay($maxNetworkRetryDelay)
    {
        $this->maxNetworkRetryDelayProperty->setValue(null, $maxNetworkRetryDelay);
    }

    private function setInitialNetworkRetryDelay($initialNetworkRetryDelay)
    {
        $this->initialNetworkRetryDelayProperty->setValue(null, $initialNetworkRetryDelay);
    }

    private function fastRetries()
    {
        $this->setInitialNetworkRetryDelay(0.001);
        $this->setMaxNetworkRetryDelay(0.002);
    }

    private function createFakeRandomGenerator($returnValue = 1.0)
    {
        $fakeRandomGenerator = $this->createMock('\Stripe\Util\RandomGenerator');
        $fakeRandomGenerator->method('randFloat')->willReturn($returnValue);

        return $fakeRandomGenerator;
    }

    public function testTimeout()
    {
        $curl = new CurlClient();
        self::assertSame(CurlClient::DEFAULT_TIMEOUT, $curl->getTimeout());
        self::assertSame(CurlClient::DEFAULT_CONNECT_TIMEOUT, $curl->getConnectTimeout());

        // implicitly tests whether we're returning the CurlClient instance
        $curl = $curl->setConnectTimeout(1)->setTimeout(10);
        self::assertSame(1, $curl->getConnectTimeout());
        self::assertSame(10, $curl->getTimeout());

        $curl->setTimeout(-1);
        $curl->setConnectTimeout(-999);
        self::assertSame(0, $curl->getTimeout());
        self::assertSame(0, $curl->getConnectTimeout());
    }

    public function testUserAgentInfo()
    {
        $curl = new CurlClient();
        $uaInfo = $curl->getUserAgentInfo();
        self::assertNotNull($uaInfo);
        self::assertNotNull($uaInfo['httplib']);
        self::assertNotNull($uaInfo['ssllib']);
    }

    public function testDefaultOptions()
    {
        // make sure options array loads/saves properly
        $optionsArray = [\CURLOPT_PROXY => 'localhost:80'];
        $withOptionsArray = new CurlClient($optionsArray);
        self::assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);

        // make sure closure-based options work properly, including argument passing
        $ref = null;
        $withClosure = new CurlClient(static function ($method, $absUrl, $headers, $params, $hasFile) use (&$ref) {
            $ref = \func_get_args();

            return [];
        });

        $withClosure->request('get', 'https://httpbin.org/status/200', [], [], false);
        self::assertSame($ref, ['get', 'https://httpbin.org/status/200', [], [], false]);

        // this is the last test case that will run, since it'll throw an exception at the end
        $withBadClosure = new CurlClient(static function () {
            return 'thisShouldNotWork';
        });
        $this->expectException('Stripe\Exception\UnexpectedValueException');
        $this->expectExceptionMessage('Non-array value returned by defaultOptions CurlClient callback');
        $withBadClosure->request('get', 'https://httpbin.org/status/200', [], [], false);
    }

    public function testSslOption()
    {
        // make sure options array loads/saves properly
        $optionsArray = [\CURLOPT_SSLVERSION => \CURL_SSLVERSION_TLSv1];
        $withOptionsArray = new CurlClient($optionsArray);
        self::assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);
    }

    public function testIpResolveOption()
    {
        // make sure options array loads/saves properly
        $optionsArray = [\CURLOPT_IPRESOLVE => \CURL_IPRESOLVE_WHATEVER];
        $withOptionsArray = new CurlClient($optionsArray);
        self::assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);
    }

    public function testShouldRetryOnTimeout()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, \CURLE_OPERATION_TIMEOUTED, 0, [], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, \CURLE_OPERATION_TIMEOUTED, 0, [], 0, null));
    }

    public function testShouldRetryOnConnectionFailure()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, \CURLE_COULDNT_CONNECT, 0, [], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, \CURLE_COULDNT_CONNECT, 0, [], 0, null));
    }

    public function testShouldRetryOnConflict()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 409, [], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 409, [], 0, null));
    }

    public function testShouldNotRetryOn429()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 429, [], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 429, [], 0, null));
    }

    public function testShouldRetryOn500()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 500, [], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 500, [], 0, null));
    }

    public function testShouldRetryOn503()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 503, [], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 503, [], 0, null));
    }

    public function testShouldRetryOnStripeShouldRetryTrue()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 400, [], 0, 2));
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 400, ['stripe-should-retry' => 'true'], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 400, [], 0, null));
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 400, ['stripe-should-retry' => 'true'], 0, null));
    }

    public function testShouldNotRetryOnStripeShouldRetryFalse()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 500, [], 0, 2));
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 500, ['stripe-should-retry' => 'false'], 0, 2));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 500, [], 0, null));
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 500, ['stripe-should-retry' => 'false'], 0, null));
    }

    public function testShouldNotRetryAtMaximumCount()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 0, [], \Stripe\Stripe::getMaxNetworkRetries(), null));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 0, [], \Stripe\Stripe::getMaxNetworkRetries(), null));
    }

    public function testShouldNotRetryOnCertValidationError()
    {
        $curlClient = new CurlClient();

        // call works when `maxNetworkRetries` is provided directly
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, \CURLE_SSL_PEER_CERTIFICATE, -1, [], 0, null));

        // and when the arg is `null` and the value is read globally instead
        \Stripe\Stripe::setMaxNetworkRetries(2);
        self::assertFalse($this->shouldRetryMethod->invoke($curlClient, \CURLE_SSL_PEER_CERTIFICATE, -1, [], 0, null));
    }

    public function testSleepTimeShouldGrowExponentially()
    {
        $this->setMaxNetworkRetryDelay(999.0);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());

        self::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 1,
            $this->sleepTimeMethod->invoke($curlClient, 1, [])
        );
        self::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 2,
            $this->sleepTimeMethod->invoke($curlClient, 2, [])
        );
        self::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 4,
            $this->sleepTimeMethod->invoke($curlClient, 3, [])
        );
        self::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 8,
            $this->sleepTimeMethod->invoke($curlClient, 4, [])
        );
    }

    public function testSleepTimeShouldEnforceMaxNetworkRetryDelay()
    {
        $this->setInitialNetworkRetryDelay(1.0);
        $this->setMaxNetworkRetryDelay(2);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());

        self::assertSame(1.0, $this->sleepTimeMethod->invoke($curlClient, 1, []));
        self::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 2, []));
        self::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 3, []));
        self::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 4, []));
    }

    public function testSleepTimeShouldRespectRetryAfter()
    {
        $this->setInitialNetworkRetryDelay(1.0);
        $this->setMaxNetworkRetryDelay(2.0);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());

        // Uses max of default and header.
        self::assertSame(10.0, $this->sleepTimeMethod->invoke($curlClient, 1, ['retry-after' => '10']));
        self::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 2, ['retry-after' => '1']));

        // Ignores excessively large values.
        self::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 2, ['retry-after' => '100']));
    }

    public function testSleepTimeShouldAddSomeRandomness()
    {
        $randomValue = 0.8;
        $this->setInitialNetworkRetryDelay(1.0);
        $this->setMaxNetworkRetryDelay(8.0);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator($randomValue));

        $baseValue = \Stripe\Stripe::getInitialNetworkRetryDelay() * (0.5 * (1 + $randomValue));

        // the initial value cannot be smaller than the base,
        // so the randomness is ignored
        self::assertSame(\Stripe\Stripe::getInitialNetworkRetryDelay(), $this->sleepTimeMethod->invoke($curlClient, 1, []));

        // after the first one, the randomness is applied
        self::assertSame($baseValue * 2, $this->sleepTimeMethod->invoke($curlClient, 2, []));
        self::assertSame($baseValue * 4, $this->sleepTimeMethod->invoke($curlClient, 3, []));
        self::assertSame($baseValue * 8, $this->sleepTimeMethod->invoke($curlClient, 4, []));
    }

    /**
     * Checks if a list of headers contains a specific header name. Copied from CurlClient.
     *
     * @param string[] $headers
     * @param string $name
     *
     * @return bool
     */
    private function hasHeader($headers, $name)
    {
        foreach ($headers as $header) {
            if (0 === \strncasecmp($header, "{$name}: ", \strlen($name) + 2)) {
                return true;
            }
        }

        return false;
    }

    public function testIdempotencyKeyV2PostRequestsNoRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(0);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'post', '', [], '', [], 'v2');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertTrue($this->hasHeader($headers, 'Idempotency-Key'));
    }

    public function testIdempotencyKeyV2DeleteRequestsNoRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(0);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'delete', '', [], '', [], 'v2');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertTrue($this->hasHeader($headers, 'Idempotency-Key'));
    }

    public function testIdempotencyKeyAllV2RequestsWithRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(3);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'post', '', [], '', [], 'v2');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertTrue($this->hasHeader($headers, 'Idempotency-Key'));
    }

    // we don't want this behavior - write requests should basically always have an IK. But until we fix it, let's test it
    public function testNoIdempotencyKeyV1PostRequestsNoRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(0);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'post', '', [], '', [], 'v1');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertFalse($this->hasHeader($headers, 'Idempotency-Key'));
    }

    public function testNoIdempotencyKeyV1DeleteRequestsNoRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(0);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'delete', '', [], '', [], 'v1');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertFalse($this->hasHeader($headers, 'Idempotency-Key'));
    }

    public function testIdempotencyKeyV1PostRequestsWithRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(3);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'post', '', [], '', [], 'v1');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertTrue($this->hasHeader($headers, 'Idempotency-Key'));
    }

    public function testNoIdempotencyKeyV1DeleteRequestsWithRetry()
    {
        \Stripe\Stripe::setMaxNetworkRetries(3);
        $curlClient = new CurlClient();
        $curlOpts = $this->constructCurlOptionsMethod->invoke($curlClient, 'delete', '', [], '', [], 'v1');
        $headers = $curlOpts[\CURLOPT_HTTPHEADER];
        self::assertFalse($this->hasHeader($headers, 'Idempotency-Key'));
    }

    public function testResponseHeadersCaseInsensitive()
    {
        $charge = \Stripe\Charge::all();

        $headers = $charge->getLastResponse()->headers;
        self::assertNotNull($headers['request-id']);
        self::assertSame($headers['request-id'], $headers['Request-Id']);
    }

    public function testSetRequestStatusCallback()
    {
        try {
            $called = false;

            $curl = new CurlClient();
            $curl->setRequestStatusCallback(function ($rbody, $rcode, $rheaders, $errno, $message, $willBeRetried, $numRetries) use (&$called) {
                $called = true;

                $this->compatAssertIsString($rbody);
                $this->assertSame(200, $rcode);
                $this->assertSame('req_123', $rheaders['request-id']);
                $this->assertSame(0, $errno);
                $this->assertNull($message);
                $this->assertFalse($willBeRetried);
                $this->assertSame(0, $numRetries);
            });

            \Stripe\ApiRequestor::setHttpClient($curl);

            \Stripe\Charge::all();

            self::assertTrue($called);
        } finally {
            \Stripe\ApiRequestor::setHttpClient(null);
        }
    }

    /**
     * @after
     */
    public function tearDownTestServer()
    {
        $this->stopTestServer();
    }

    public function testExecuteStreamingRequestWithRetriesRetries()
    {
        $serverCode = <<<'EOF'
<?php
http_response_code(500);
header("stripe-should-retry: true");
?>
{}
EOF;

        \Stripe\Stripe::setMaxNetworkRetries(3);
        $this->fastRetries();
        $absUrl = $this->startTestServer($serverCode);
        $opts = [];
        $opts[\CURLOPT_HTTPGET] = 1;
        $opts[\CURLOPT_URL] = $absUrl;
        $opts[\CURLOPT_HTTPHEADER] = ['Authorization: Basic c2tfdGVzdF94eXo6'];
        $curl = new CurlClient();
        $calls = [];
        $receivedChunks = [];

        $curl->setRequestStatusCallback(static function ($rbody, $rcode, $rheaders, $errno, $message, $willBeRetried, $numRetries) use (&$calls) {
            $calls[] = [$rcode, $numRetries];
        });

        $result = $curl->executeStreamingRequestWithRetries($opts, $absUrl, static function ($chunk) use (&$receivedChunks) {
            $receivedChunks[] = $chunk;
        });
        $nRequests = $this->stopTestServer();

        self::assertSame([], $receivedChunks);

        self::assertSame(4, $nRequests);

        self::assertSame([[500, 0], [500, 1], [500, 2], [500, 3]], $calls);
    }

    public function testExecuteStreamingRequestWithRetriesHandlesDisconnect()
    {
        $serverCode = <<<'EOF'
<?php
http_response_code(200);
header("Content-Length: 6");
echo "12345";
// explicitly do not flush or ob_flush to test the behavior of the client
// ob_flush();
// flush();
exit();
EOF;

        $this->fastRetries();
        $absUrl = $this->startTestServer($serverCode);
        $opts = [];
        $opts[\CURLOPT_HTTPGET] = 1;
        $opts[\CURLOPT_URL] = $absUrl;
        $opts[\CURLOPT_HTTPHEADER] = ['Authorization: Basic c2tfdGVzdF94eXo6'];
        $curl = new CurlClient();
        $receivedChunks = [];
        $exception = null;

        try {
            $result = $curl->executeStreamingRequestWithRetries($opts, $absUrl, static function ($chunk) use (&$receivedChunks) {
                $receivedChunks[] = $chunk;
            });
        } catch (\Exception $e) {
            $exception = $e;
        }

        $nRequests = $this->stopTestServer();
        self::assertNotNull($exception);
        self::assertSame('Stripe\Exception\ApiConnectionException', \get_class($exception));

        self::assertSame(['12345'], $receivedChunks);
        self::assertSame(1, $nRequests);
    }

    public function testExecuteStreamingRequestWithRetriesPersistentConnection()
    {
        $curl = new CurlClient();
        $coupon = \Stripe\Coupon::retrieve('coupon_xyz');

        $absUrl = \Stripe\Stripe::$apiBase . '/v1/coupons/xyz';
        $opts[\CURLOPT_HTTPGET] = 1;
        $opts[\CURLOPT_URL] = $absUrl;
        $opts[\CURLOPT_HTTPHEADER] = ['Authorization: Basic c2tfdGVzdF94eXo6'];
        $discardCallback = static function ($chunk) {};
        $curl->executeStreamingRequestWithRetries($opts, $absUrl, $discardCallback);
        $firstHandle = $this->curlHandle->getValue($curl);

        $curl->executeStreamingRequestWithRetries($opts, $absUrl, $discardCallback);
        $secondHandle = $this->curlHandle->getValue($curl);

        $curl->setEnablePersistentConnections(false);
        $curl->executeStreamingRequestWithRetries($opts, $absUrl, $discardCallback);
        $thirdHandle = $this->curlHandle->getValue($curl);

        self::assertSame($firstHandle, $secondHandle);
        self::assertNull($thirdHandle);
    }
}
