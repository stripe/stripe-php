<?php

namespace Stripe;

/**
 * @internal
 *
 * @coversNothing
 */
final class StripeTelemetryTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'acct_123';
    const TEST_EXTERNALACCOUNT_ID = 'ba_123';
    const TEST_PERSON_ID = 'person_123';

    const FAKE_VALID_RESPONSE = '{
      "data": [],
      "has_more": false,
      "object": "list",
      "url": "/v1/accounts"
    }';

    /**
     * @before
     */
    protected function setUpTelemetry()
    {
        // clear static telemetry data
        ApiRequestor::resetTelemetry();
    }

    public function testNoTelemetrySentIfNotEnabled()
    {
        Stripe::setEnableTelemetry(false);

        $requestheaders = null;

        $stub = $this
            ->getMockBuilder('\Stripe\HttpClient\ClientInterface')
            ->setMethods(['request'])
            ->getMock()
        ;

        $stub->expects(self::any())
            ->method('request')
            ->with(
                self::anything(),
                self::anything(),
                self::callback(static function ($headers) use (&$requestheaders) {
                    foreach ($headers as $index => $header) {
                        // capture the requested headers and format back to into an assoc array
                        $components = \explode(': ', $header, 2);
                        $requestheaders[$components[0]] = $components[1];
                    }

                    return true;
                }),
                self::anything(),
                self::anything()
            )->willReturn([self::FAKE_VALID_RESPONSE, 200, ['request-id' => '123']])
        ;

        ApiRequestor::setHttpClient($stub);

        // make one request to capture its result
        Charge::all();
        self::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        // make another request and verify telemetry isn't sent
        Charge::all();
        self::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        ApiRequestor::setHttpClient(null);
    }

    public function testTelemetrySetIfEnabledGlobalInterface()
    {
        Stripe::setEnableTelemetry(true);

        $requestheaders = null;

        $stub = $this
            ->getMockBuilder('\Stripe\HttpClient\ClientInterface')
            ->setMethods(['request'])
            ->getMock()
        ;

        $stub->expects(self::any())
            ->method('request')
            ->with(
                self::anything(),
                self::anything(),
                self::callback(static function ($headers) use (&$requestheaders) {
                    // capture the requested headers and format back to into an assoc array
                    foreach ($headers as $index => $header) {
                        $components = \explode(': ', $header, 2);
                        $requestheaders[$components[0]] = $components[1];
                    }

                    return true;
                }),
                self::anything(),
                self::anything()
            )->willReturn([self::FAKE_VALID_RESPONSE, 200, ['request-id' => 'req_123']])
        ;

        ApiRequestor::setHttpClient($stub);

        $cus = new Customer('cus_xyz');
        $cus->description = 'test';
        // make one request to capture its result
        $cus->save();
        self::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        // make another request to send the previous
        Charge::all();
        self::assertArrayHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        $data = \json_decode($requestheaders['X-Stripe-Client-Telemetry'], true);
        self::assertSame('req_123', $data['last_request_metrics']['request_id']);
        self::assertSame(['save'], $data['last_request_metrics']['usage']);
        self::assertNotNull($data['last_request_metrics']['request_duration_ms']);

        ApiRequestor::setHttpClient(null);
    }

    public function testTelemetrySetIfEnabledStripeClient()
    {
        Stripe::setEnableTelemetry(true);

        $requestheaders = null;

        $stub = $this
            ->getMockBuilder('\Stripe\HttpClient\ClientInterface')
            ->setMethods(['request'])
            ->getMock()
        ;

        $stub->expects(self::any())
            ->method('request')
            ->with(
                self::anything(),
                self::anything(),
                self::callback(static function ($headers) use (&$requestheaders) {
                    // capture the requested headers and format back to into an assoc array
                    foreach ($headers as $index => $header) {
                        $components = \explode(': ', $header, 2);
                        $requestheaders[$components[0]] = $components[1];
                    }

                    return true;
                }),
                self::anything(),
                self::anything()
            )->willReturn([self::FAKE_VALID_RESPONSE, 200, ['request-id' => 'req_123']])
        ;

        ApiRequestor::setHttpClient($stub);

        $client = new StripeClient('sk_test_123');
        $client->customers->create(['description' => 'test']);
        self::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);
        $client->customers->create(['description' => 'test2']);
        self::assertArrayHasKey('X-Stripe-Client-Telemetry', $requestheaders);
        $data = \json_decode($requestheaders['X-Stripe-Client-Telemetry'], true);
        self::assertSame('req_123', $data['last_request_metrics']['request_id']);
        self::assertSame(['stripe_client'], $data['last_request_metrics']['usage']);
        self::assertNotNull($data['last_request_metrics']['request_duration_ms']);

        ApiRequestor::setHttpClient(null);
    }
}
