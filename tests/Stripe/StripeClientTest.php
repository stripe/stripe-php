<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\StripeClient
 */
final class StripeClientTest extends TestCase
{
    use TestHelper;

    /** @var StripeClient */
    private $client;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->client = new StripeClient('sk_test_123');
    }

    public function testExposesPropertiesForServices()
    {
        self::assertInstanceOf(Service\CouponService::class, $this->client->coupons);
        self::assertInstanceOf(Service\Issuing\IssuingServiceFactory::class, $this->client->issuing);
        self::assertInstanceOf(Service\Issuing\CardService::class, $this->client->issuing->cards);
    }

    public function testListMethodReturnsPageableCollection()
    {
        $curlClientStub = $this->getMockBuilder(HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturnOnConsecutiveCalls([
                '{"data": [{"id": "evnt_123", "object": "v2.core.event", "type": "v1.billing.meter.no_meter_found"}, {"id": "evnt_456", "object": "v2.core.event", "type": "v1.billing.meter.no_meter_found"}], "next_page_url": "/v2/core/events?limit=2&page=page_2"}',
                200,
                [],
            ], [
                '{"data": [{"id": "evnt_789", "object": "v2.core.event", "type": "v1.billing.meter.no_meter_found"}], "next_page_url": null}',
                200,
                [],
            ])
        ;

        $cb = self::callback(function ($opts) {
            $this->assertContains('Authorization: Bearer sk_test_client', $opts[\CURLOPT_HTTPHEADER]);
            $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

            return true;
        });

        $curlClientStub->expects(self::exactly(2))
            ->method('executeRequestWithRetries')
            ->withConsecutive(
                [$cb, MOCK_URL . '/v2/core/events?limit=2'],
                [$cb, MOCK_URL . '/v2/core/events?limit=2&page=page_2']
            )
        ;

        ApiRequestor::setHttpClient($curlClientStub);

        $client = new StripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);

        $events = $client->v2->core->events->all(['limit' => 2]);
        self::assertInstanceOf(V2\Collection::class, $events);
        self::assertInstanceOf(Events\V1BillingMeterNoMeterFoundEvent::class, $events->data[0]);

        $seen = [];
        foreach ($events->autoPagingIterator() as $event) {
            $seen[] = $event['id'];
        }

        self::assertSame(['evnt_123', 'evnt_456', 'evnt_789'], $seen);
    }
}
