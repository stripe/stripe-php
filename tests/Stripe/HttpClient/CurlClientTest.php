<?php

namespace Stripe\HttpClient;

/**
 * @internal
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
        static::assertSame(CurlClient::DEFAULT_TIMEOUT, $curl->getTimeout());
        static::assertSame(CurlClient::DEFAULT_CONNECT_TIMEOUT, $curl->getConnectTimeout());

        // implicitly tests whether we're returning the CurlClient instance
        $curl = $curl->setConnectTimeout(1)->setTimeout(10);
        static::assertSame(1, $curl->getConnectTimeout());
        static::assertSame(10, $curl->getTimeout());

        $curl->setTimeout(-1);
        $curl->setConnectTimeout(-999);
        static::assertSame(0, $curl->getTimeout());
        static::assertSame(0, $curl->getConnectTimeout());
    }

    public function testUserAgentInfo()
    {
        $curl = new CurlClient();
        $uaInfo = $curl->getUserAgentInfo();
        static::assertNotNull($uaInfo);
        static::assertNotNull($uaInfo['httplib']);
        static::assertNotNull($uaInfo['ssllib']);
    }

    public function testDefaultOptions()
    {
        // make sure options array loads/saves properly
        $optionsArray = [\CURLOPT_PROXY => 'localhost:80'];
        $withOptionsArray = new CurlClient($optionsArray);
        static::assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);

        // make sure closure-based options work properly, including argument passing
        $ref = null;
        $withClosure = new CurlClient(function ($method, $absUrl, $headers, $params, $hasFile) use (&$ref) {
            $ref = \func_get_args();

            return [];
        });

        $withClosure->request('get', 'https://httpbin.org/status/200', [], [], false);
        static::assertSame($ref, ['get', 'https://httpbin.org/status/200', [], [], false]);

        // this is the last test case that will run, since it'll throw an exception at the end
        $withBadClosure = new CurlClient(function () {
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
        static::assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);
    }

    public function testIpResolveOption()
    {
        // make sure options array loads/saves properly
        $optionsArray = [\CURLOPT_IPRESOLVE => \CURL_IPRESOLVE_WHATEVER];
        $withOptionsArray = new CurlClient($optionsArray);
        static::assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);
    }

    public function testShouldRetryOnTimeout()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, \CURLE_OPERATION_TIMEOUTED, 0, [], 0));
    }

    public function testShouldRetryOnConnectionFailure()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, \CURLE_COULDNT_CONNECT, 0, [], 0));
    }

    public function testShouldRetryOnConflict()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 409, [], 0));
    }

    public function testShouldNotRetryOn429()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 429, [], 0));
    }

    public function testShouldRetryOn500()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 500, [], 0));
    }

    public function testShouldRetryOn503()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 503, [], 0));
    }

    public function testShouldRetryOnStripeShouldRetryTrue()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 400, [], 0));
        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 400, ['stripe-should-retry' => 'true'], 0));
    }

    public function testShouldNotRetryOnStripeShouldRetryFalse()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertTrue($this->shouldRetryMethod->invoke($curlClient, 0, 500, [], 0));
        static::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 500, ['stripe-should-retry' => 'false'], 0));
    }

    public function testShouldNotRetryAtMaximumCount()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertFalse($this->shouldRetryMethod->invoke($curlClient, 0, 0, [], \Stripe\Stripe::getMaxNetworkRetries()));
    }

    public function testShouldNotRetryOnCertValidationError()
    {
        \Stripe\Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();

        static::assertFalse($this->shouldRetryMethod->invoke($curlClient, \CURLE_SSL_PEER_CERTIFICATE, -1, [], 0));
    }

    public function testSleepTimeShouldGrowExponentially()
    {
        $this->setMaxNetworkRetryDelay(999.0);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());

        static::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 1,
            $this->sleepTimeMethod->invoke($curlClient, 1, [])
        );
        static::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 2,
            $this->sleepTimeMethod->invoke($curlClient, 2, [])
        );
        static::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 4,
            $this->sleepTimeMethod->invoke($curlClient, 3, [])
        );
        static::assertSame(
            \Stripe\Stripe::getInitialNetworkRetryDelay() * 8,
            $this->sleepTimeMethod->invoke($curlClient, 4, [])
        );
    }

    public function testSleepTimeShouldEnforceMaxNetworkRetryDelay()
    {
        $this->setInitialNetworkRetryDelay(1.0);
        $this->setMaxNetworkRetryDelay(2);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());

        static::assertSame(1.0, $this->sleepTimeMethod->invoke($curlClient, 1, []));
        static::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 2, []));
        static::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 3, []));
        static::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 4, []));
    }

    public function testSleepTimeShouldRespectRetryAfter()
    {
        $this->setInitialNetworkRetryDelay(1.0);
        $this->setMaxNetworkRetryDelay(2.0);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());

        // Uses max of default and header.
        static::assertSame(10.0, $this->sleepTimeMethod->invoke($curlClient, 1, ['retry-after' => '10']));
        static::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 2, ['retry-after' => '1']));

        // Ignores excessively large values.
        static::assertSame(2.0, $this->sleepTimeMethod->invoke($curlClient, 2, ['retry-after' => '100']));
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
        static::assertSame(\Stripe\Stripe::getInitialNetworkRetryDelay(), $this->sleepTimeMethod->invoke($curlClient, 1, []));

        // after the first one, the randomness is applied
        static::assertSame($baseValue * 2, $this->sleepTimeMethod->invoke($curlClient, 2, []));
        static::assertSame($baseValue * 4, $this->sleepTimeMethod->invoke($curlClient, 3, []));
        static::assertSame($baseValue * 8, $this->sleepTimeMethod->invoke($curlClient, 4, []));
    }

    public function testResponseHeadersCaseInsensitive()
    {
        $charge = \Stripe\Charge::all();

        $headers = $charge->getLastResponse()->headers;
        static::assertNotNull($headers['request-id']);
        static::assertSame($headers['request-id'], $headers['Request-Id']);
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

            static::assertTrue($called);
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
header("stripe-should-retry", "true");
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

        $curl->setRequestStatusCallback(function ($rbody, $rcode, $rheaders, $errno, $message, $willBeRetried, $numRetries) use (&$calls) {
            $calls[] = [$rcode, $numRetries];
        });

        $result = $curl->executeStreamingRequestWithRetries($opts, $absUrl, function ($chunk) use (&$receivedChunks) {
            $receivedChunks[] = $chunk;
        });
        $nRequests = $this->stopTestServer();

        static::assertSame([], $receivedChunks);

        static::assertSame(4, $nRequests);

        static::assertSame([[500, 0], [500, 1], [500, 2], [500, 3]], $calls);
    }

    public function testExecuteStreamingRequestWithRetriesHandlesDisconnect()
    {
        $serverCode = <<<'EOF'
<?php
http_response_code(200);
header("Content-Length: 6");
echo "12345";
ob_flush();
flush();
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
            $result = $curl->executeStreamingRequestWithRetries($opts, $absUrl, function ($chunk) use (&$receivedChunks) {
                $receivedChunks[] = $chunk;
            });
        } catch (\Exception $e) {
            $exception = $e;
        }

        $nRequests = $this->stopTestServer();
        static::assertNotNull($exception);
        static::assertSame('Stripe\Exception\ApiConnectionException', \get_class($exception));

        static::assertSame(['12345'], $receivedChunks);
        static::assertSame(1, $nRequests);
    }

    public function testExecuteStreamingRequestWithRetriesPersistentConnection()
    {
        $curl = new CurlClient();
        $coupon = \Stripe\Coupon::retrieve('coupon_xyz');

        $absUrl = \Stripe\Stripe::$apiBase . '/v1/coupons/xyz';
        $opts[\CURLOPT_HTTPGET] = 1;
        $opts[\CURLOPT_URL] = $absUrl;
        $opts[\CURLOPT_HTTPHEADER] = ['Authorization: Basic c2tfdGVzdF94eXo6'];
        $discardCallback = function ($chunk) {};
        $curl->executeStreamingRequestWithRetries($opts, $absUrl, $discardCallback);
        $firstHandle = $this->curlHandle->getValue($curl);

        $curl->executeStreamingRequestWithRetries($opts, $absUrl, $discardCallback);
        $secondHandle = $this->curlHandle->getValue($curl);

        $curl->setEnablePersistentConnections(false);
        $curl->executeStreamingRequestWithRetries($opts, $absUrl, $discardCallback);
        $thirdHandle = $this->curlHandle->getValue($curl);

        static::assertSame($firstHandle, $secondHandle);
        static::assertNull($thirdHandle);
    }
}
