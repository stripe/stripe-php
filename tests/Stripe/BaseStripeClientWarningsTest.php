<?php

namespace Stripe;

/**
 * Separate from BaseStripeClientTest.php because PHPUnit only supports
 * class-scoped setUp/tearDown.
 *
 * @internal
 * @covers \Stripe\BaseStripeClient
 */
final class BaseStripeClientWarningsTest extends \Stripe\TestCase
{
    public $client = null;

    public static $seenWarning = null;

    public static $oldStripeVersion = null;

    public static $oldHandler = null;

    public static $oldHasCalledSetApiVersion = null;

    public $requestOpts = null;

    public $clientOpts = null;

    public static function setUpBeforeClass(): void
    {
        self::$oldHasCalledSetApiVersion = Stripe::$_hasCalledSetApiVersion;
        self::$oldStripeVersion = Stripe::$apiVersion;
        // PHPUnit has deprecated ->expectWarning() and ->expectDeprecation()
        // so, here we are.
        self::$oldHandler = set_error_handler(function ($errno, $errstr) {
            self::$seenWarning = $errstr;
        }, \E_USER_DEPRECATED);
    }

    public static function tearDownAfterClass(): void
    {
        Stripe::$_hasCalledSetApiVersion = self::$oldHasCalledSetApiVersion;
        Stripe::$apiVersion = self::$oldStripeVersion;
        set_error_handler(self::$oldHandler, \E_USER_DEPRECATED);
    }

    protected function setUp(): void
    {
        $this->requestOpts = [];
        $this->clientOpts = ['api_key' => 'sk_test_client', 'api_base' => MOCK_URL];
        Stripe::$_hasCalledSetApiVersion = false;
        self::$seenWarning = null;
        \Stripe\BaseStripeClient::$_globalApiVersionWarningSent = false;
    }

    public function sendRequestAndGetWarning()
    {
        $client = new BaseStripeClient($this->clientOpts);
        $client->request('get', '/v1/charges/ch_123', [], $this->requestOpts);

        return self::$seenWarning;
    }
    private static $DIFFERENT_VERSION = '2222-22-22';
    private static $VERY_DIFFERENT_VERSION = '1234-56-78';
    private static $SAME_VERSION = \Stripe\Util\ApiVersion::CURRENT;

    public function testSetterToDifferentWarns()
    {
        Stripe::setApiVersion(self::$DIFFERENT_VERSION);
        static::assertNotNull($this->sendRequestAndGetWarning());
    }

    public function testSetterToSameWarns()
    {
        Stripe::setApiVersion(self::$SAME_VERSION);
        static::assertNotNull($this->sendRequestAndGetWarning());
    }

    public function testDirectSetToDifferentWarns()
    {
        Stripe::$apiVersion = self::$DIFFERENT_VERSION;
        static::assertNotNull($this->sendRequestAndGetWarning());
    }

    public function testDirectSetToSameCantWarn()
    {
        Stripe::$apiVersion = self::$SAME_VERSION;
        static::assertNull($this->sendRequestAndGetWarning());
    }

    public function testVersionInClientOptsWontWarn()
    {
        $this->clientOpts['stripe_version'] = self::$VERY_DIFFERENT_VERSION;
        Stripe::setApiVersion(self::$DIFFERENT_VERSION);
        static::assertNull($this->sendRequestAndGetWarning());
    }

    public function testVersionInRequestOptsWontWarn()
    {
        $this->requestOpts['stripe_version'] = self::$VERY_DIFFERENT_VERSION;
        Stripe::setApiVersion(self::$DIFFERENT_VERSION);
        static::assertNull($this->sendRequestAndGetWarning());
    }
}
