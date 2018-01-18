<?php

namespace Stripe;

use Stripe\HttpClient\CurlClient;

class CurlClientTest extends TestCase
{
    /**
     * @before
     */
    public function saveOriginalNetworkValues()
    {
        $this->origMaxNetworkRetries = Stripe::getMaxNetworkRetries();
        $this->origMaxNetworkRetryDelay = Stripe::getMaxNetworkRetryDelay();
        $this->origInitialNetworkRetryDelay = Stripe::getInitialNetworkRetryDelay();
    }

    /**
     * @after
     */
    public function restoreOriginalNetworkValues()
    {
        Stripe::setMaxNetworkRetries($this->origMaxNetworkRetries);
        $this->setMaxNetworkRetryDelay($this->origMaxNetworkRetryDelay);
        $this->setInitialNetworkRetryDelay($this->origInitialNetworkRetryDelay);
    }

    private function setMaxNetworkRetryDelay($maxNetworkRetryDelay)
    {
        $property = $this->getPrivateProperty('Stripe\Stripe', 'maxNetworkRetryDelay');
        $property->setValue(null, $maxNetworkRetryDelay);
    }

    private function setInitialNetworkRetryDelay($initialNetworkRetryDelay)
    {
        $property = $this->getPrivateProperty('Stripe\Stripe', 'initialNetworkRetryDelay');
        $property->setValue(null, $initialNetworkRetryDelay);
    }

    private function createFakeRandomGenerator($returnValue = 1.0)
    {
        $fakeRandomGenerator = $this->getMock('Stripe\Util\RandomGenetator', ['randFloat']);
        $fakeRandomGenerator->method('randFloat')->willReturn($returnValue);
        return $fakeRandomGenerator;
    }

    public function testTimeout()
    {
        $curl = new CurlClient();
        $this->assertSame(CurlClient::DEFAULT_TIMEOUT, $curl->getTimeout());
        $this->assertSame(CurlClient::DEFAULT_CONNECT_TIMEOUT, $curl->getConnectTimeout());

        // implicitly tests whether we're returning the CurlClient instance
        $curl = $curl->setConnectTimeout(1)->setTimeout(10);
        $this->assertSame(1, $curl->getConnectTimeout());
        $this->assertSame(10, $curl->getTimeout());

        $curl->setTimeout(-1);
        $curl->setConnectTimeout(-999);
        $this->assertSame(0, $curl->getTimeout());
        $this->assertSame(0, $curl->getConnectTimeout());
    }

    public function testUserAgentInfo()
    {
        $curl = new CurlClient();
        $uaInfo = $curl->getUserAgentInfo();
        $this->assertNotNull($uaInfo);
        $this->assertNotNull($uaInfo['httplib']);
        $this->assertNotNull($uaInfo['ssllib']);
    }

    public function testDefaultOptions()
    {
        // make sure options array loads/saves properly
        $optionsArray = [CURLOPT_PROXY => 'localhost:80'];
        $withOptionsArray = new CurlClient($optionsArray);
        $this->assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);

        // make sure closure-based options work properly, including argument passing
        $ref = null;
        $withClosure = new CurlClient(function ($method, $absUrl, $headers, $params, $hasFile) use (&$ref) {
            $ref = func_get_args();
            return [];
        });

        $withClosure->request('get', 'https://httpbin.org/status/200', [], [], false);
        $this->assertSame($ref, ['get', 'https://httpbin.org/status/200', [], [], false]);

        // this is the last test case that will run, since it'll throw an exception at the end
        $withBadClosure = new CurlClient(function () {
            return 'thisShouldNotWork';
        });
        $this->setExpectedException('Stripe\Error\Api', "Non-array value returned by defaultOptions CurlClient callback");
        $withBadClosure->request('get', 'https://httpbin.org/status/200', [], [], false);
    }

    public function testSslOption()
    {
        // make sure options array loads/saves properly
        $optionsArray = [CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1];
        $withOptionsArray = new CurlClient($optionsArray);
        $this->assertSame($withOptionsArray->getDefaultOptions(), $optionsArray);
    }

    public function testShouldRetryOnTimeout()
    {
        Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();
        $shouldRetryReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'shouldRetry');

        $this->assertTrue($shouldRetryReflector->invoke($curlClient, CURLE_OPERATION_TIMEOUTED, 0, 0));
    }

    public function testShouldRetryOnConnectionFailure()
    {
        Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();
        $shouldRetryReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'shouldRetry');

        $this->assertTrue($shouldRetryReflector->invoke($curlClient, CURLE_COULDNT_CONNECT, 0, 0));
    }

    public function testShouldRetryOnConflict()
    {
        Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();
        $shouldRetryReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'shouldRetry');

        $this->assertTrue($shouldRetryReflector->invoke($curlClient, 0, 409, 0));
    }

    public function testShouldNotRetryAtMaximumCount()
    {
        Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();
        $shouldRetryReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'shouldRetry');

        $this->assertFalse($shouldRetryReflector->invoke($curlClient, 0, 0, Stripe::getMaxNetworkRetries()));
    }

    public function testShouldNotRetryOnCertValidationError()
    {
        Stripe::setMaxNetworkRetries(2);

        $curlClient = new CurlClient();
        $shouldRetryReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'shouldRetry');

        $this->assertFalse($shouldRetryReflector->invoke($curlClient, CURLE_SSL_PEER_CERTIFICATE, -1, 0));
    }

    public function testSleepTimeShouldGrowExponentially()
    {
        $this->setMaxNetworkRetryDelay(999);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());
        $sleepTimeReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'sleepTime');

        $this->assertEquals(Stripe::getInitialNetworkRetryDelay() * 1, $sleepTimeReflector->invoke($curlClient, 1));
        $this->assertEquals(Stripe::getInitialNetworkRetryDelay() * 2, $sleepTimeReflector->invoke($curlClient, 2));
        $this->assertEquals(Stripe::getInitialNetworkRetryDelay() * 4, $sleepTimeReflector->invoke($curlClient, 3));
        $this->assertEquals(Stripe::getInitialNetworkRetryDelay() * 8, $sleepTimeReflector->invoke($curlClient, 4));
    }

    public function testSleepTimeShouldEnforceMaxNetworkRetryDelay()
    {
        $this->setInitialNetworkRetryDelay(1);
        $this->setMaxNetworkRetryDelay(2);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator());
        $sleepTimeReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'sleepTime');

        $this->assertEquals(1, $sleepTimeReflector->invoke($curlClient, 1));
        $this->assertEquals(2, $sleepTimeReflector->invoke($curlClient, 2));
        $this->assertEquals(2, $sleepTimeReflector->invoke($curlClient, 3));
        $this->assertEquals(2, $sleepTimeReflector->invoke($curlClient, 4));
    }

    public function testSleepTimeShouldAddSomeRandomness()
    {
        $randomValue = 0.8;
        $this->setInitialNetworkRetryDelay(1);
        $this->setMaxNetworkRetryDelay(8);

        $curlClient = new CurlClient(null, $this->createFakeRandomGenerator($randomValue));
        $sleepTimeReflector = $this->getPrivateMethod('Stripe\HttpClient\CurlClient', 'sleepTime');

        $baseValue = Stripe::getInitialNetworkRetryDelay() * (0.5 * (1 + $randomValue));

        // the initial value cannot be smaller than the base,
        // so the randomness is ignored
        $this->assertEquals(Stripe::getInitialNetworkRetryDelay(), $sleepTimeReflector->invoke($curlClient, 1));

        // after the first one, the randomness is applied
        $this->assertEquals($baseValue * 2, $sleepTimeReflector->invoke($curlClient, 2));
        $this->assertEquals($baseValue * 4, $sleepTimeReflector->invoke($curlClient, 3));
        $this->assertEquals($baseValue * 8, $sleepTimeReflector->invoke($curlClient, 4));
    }
}
