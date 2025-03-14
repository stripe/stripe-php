<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Event
 * @covers \Stripe\V2\Event
 */
final class EventTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'evt_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/events'
        );
        $resources = Event::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Event::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/events/' . self::TEST_RESOURCE_ID
        );
        $resource = Event::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Event::class, $resource);
    }

    public function testV2EventDataDeserializesIntoType()
    {
        $jsonEvent = [
            'id' => 'evt_123',
            'object' => 'v2.core.event',
            'type' => 'v1.billing.meter.error_report_triggered',
            'created' => '2022-02-15T00:27:45.330Z',
            'related_object' => [
                'id' => 'mtr_123',
                'type' => 'billing.meter',
                'url' => '/v1/billing/meters/mtr_123',
            ],
            'data' => [
                'reason' => [
                    'error_count' => 1,
                ],
            ],
        ];

        $this->stubRequest(
            'GET',
            '/v2/core/events/evt_123',
            [],
            null,
            false,
            $jsonEvent,
            200,
            BaseStripeClient::DEFAULT_API_BASE
        );
        $client = new StripeClient(['api_key' => 'sk_test_client']);

        $event = $client->v2->core->events->retrieve('evt_123');

        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEvent::class, $event);
        self::assertInstanceOf(EventData\V1BillingMeterErrorReportTriggeredEventData::class, $event->data);
    }

    public function testV2EventFetchRelatedObject()
    {
        $jsonEvent = [
            'id' => 'evt_123',
            'object' => 'v2.core.event',
            'type' => 'v1.billing.meter.error_report_triggered',
            'created' => '2022-02-15T00:27:45.330Z',
            'context' => 'acct_123',
            'related_object' => [
                'id' => 'mtr_123',
                'type' => 'billing.meter',
                'url' => '/v1/billing/meters/mtr_123',
            ],
            'data' => [],
        ];

        // right now PHP only supports one request per unit test
        $fullEvent = Util\Util::convertToStripeObject($jsonEvent, [], 'v2');
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEvent::class, $fullEvent);
        $this->stubRequest(
            'GET',
            '/v1/billing/meters/mtr_123',
            [],
            null,
            false,
            ['object' => 'billing.meter', 'id' => 'mtr_123'],
            200,
            MOCK_URL
        );
        $meter = $fullEvent->fetchRelatedObject();
        self::assertInstanceOf(Billing\Meter::class, $meter);
        self::assertSame('mtr_123', $meter->id);
    }
}
