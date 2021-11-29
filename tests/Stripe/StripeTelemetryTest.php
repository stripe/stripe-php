<?php

namespace Stripe;

/**
 * @internal
 * @coversNothing
 */
final class StripeTelemetryTest extends \Stripe\TestCase
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
            ->getMockBuilder('HttpClient\\ClientInterface')
            ->setMethods(['request'])
            ->getMock()
        ;

        $stub->expects(static::any())
            ->method('request')
            ->with(
                static::anything(),
                static::anything(),
                static::callback(function ($headers) use (&$requestheaders) {
                    foreach ($headers as $index => $header) {
                        // capture the requested headers and format back to into an assoc array
                        $components = \explode(': ', $header, 2);
                        $requestheaders[$components[0]] = $components[1];
                    }

                    return true;
                }),
                static::anything(),
                static::anything()
            )->willReturn([self::FAKE_VALID_RESPONSE, 200, ['request-id' => '123']]);

        ApiRequestor::setHttpClient($stub);

        // make one request to capture its result
        Charge::all();
        static::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        // make another request and verify telemetry isn't sent
        Charge::all();
        static::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        ApiRequestor::setHttpClient(null);
    }

    public function testTelemetrySetIfEnabled()
    {
        Stripe::setEnableTelemetry(true);

        $requestheaders = null;

        $stub = $this
            ->getMockBuilder('HttpClient\\ClientInterface')
            ->setMethods(['request'])
            ->getMock()
        ;

        $stub->expects(static::any())
            ->method('request')
            ->with(
                static::anything(),
                static::anything(),
                static::callback(function ($headers) use (&$requestheaders) {
                    // capture the requested headers and format back to into an assoc array
                    foreach ($headers as $index => $header) {
                        $components = \explode(': ', $header, 2);
                        $requestheaders[$components[0]] = $components[1];
                    }

                    return true;
                }),
                static::anything(),
                static::anything()
            )->willReturn([self::FAKE_VALID_RESPONSE, 200, ['request-id' => 'req_123']]);

        ApiRequestor::setHttpClient($stub);

        // make one request to capture its result
        Charge::all();
        static::assertArrayNotHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        // make another request to send the previous
        Charge::all();
        static::assertArrayHasKey('X-Stripe-Client-Telemetry', $requestheaders);

        $data = \json_decode($requestheaders['X-Stripe-Client-Telemetry'], true);
        static::assertSame('req_123', $data['last_request_metrics']['request_id']);
        static::assertNotNull($data['last_request_metrics']['request_duration_ms']);

        ApiRequestor::setHttpClient(null);
    }
}
