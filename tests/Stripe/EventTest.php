<?php

namespace Stripe;

use Stripe\Events\UnknownEventNotification;
use Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification;
use Stripe\Events\V1BillingMeterNoMeterFoundEventNotification;
use Stripe\V2\Core\EventNotification;

/**
 * @internal
 *
 * @covers \Stripe\Event
 * @covers \Stripe\V2\Core\Event
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
        /** @var V1BillingMeterErrorReportTriggeredEventNotification $fullEvent */
        $meter = $fullEvent->fetchRelatedObject();
        self::assertInstanceOf(Billing\Meter::class, $meter);
        self::assertSame('mtr_123', $meter->id);
    }

    public function testV2EventNotificationFetchRelatedObject()
    {
        $jsonEvent = json_encode([
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
        ]);

        $this->stubRequest(
            'GET',
            '/v1/billing/meters/mtr_123',
            [],
            null,
            false,
            ['object' => 'billing.meter', 'id' => 'mtr_123'],
            200,
            BaseStripeClient::DEFAULT_API_BASE
        );
        $client = new StripeClient('sk_test_123');
        $event = EventNotification::fromJson($jsonEvent, $client);
        self::assertInstanceOf(StripeContext::class, $event->context);
        self::assertInstanceOf(V1BillingMeterErrorReportTriggeredEventNotification::class, $event);
        /** @var V1BillingMeterErrorReportTriggeredEventNotification $event */
        $meter = $event->fetchRelatedObject();
        self::assertInstanceOf(Billing\Meter::class, $meter);
        self::assertSame('mtr_123', $meter->id);
    }

    public function testV2EventNotificationFetchEvent()
    {
        $jsonEvent = json_encode([
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
        ]);

        $message = 'there was an error';
        $this->stubRequest(
            'GET',
            '/v2/core/events/evt_123',
            [],
            ['Stripe-Context: acct_123'],
            false,
            ['object' => 'v2.core.event', 'type' => 'v1.billing.meter.error_report_triggered', 'id' => 'mtr_123', 'data' => ['developer_message_summary' => $message]],
            200,
            BaseStripeClient::DEFAULT_API_BASE
        );
        $client = new StripeClient('sk_test_123');
        $eventNotif = EventNotification::fromJson($jsonEvent, $client);
        self::assertInstanceOf(StripeContext::class, $eventNotif->context);
        self::assertInstanceOf(V1BillingMeterErrorReportTriggeredEventNotification::class, $eventNotif);
        /** @var V1BillingMeterErrorReportTriggeredEventNotification $eventNotif */
        $fullEvent = $eventNotif->fetchEvent();
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEvent::class, $fullEvent);
        self::assertSame($message, $fullEvent->data->developer_message_summary);
    }

    public function testJsonDecodeEventNotificationObject()
    {
        $eventData = json_encode([
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'v1.billing.meter.error_report_triggered',
            'created' => '2022-02-15T00:27:45.330Z',
            'related_object' => [
                'id' => 'fa_123',
                'type' => 'financial_account',
                'url' => '/v2/financial_accounts/fa_123',
            ],
            'reason' => [
                'type' => 'request',
                'request' => [
                    'id' => 'id_123',
                    'idempotency_key' => 'key_123',
                ],
            ],
        ]);

        $event = EventNotification::fromJson($eventData, new StripeClient());
        self::assertNull($event->context);
        self::assertInstanceOf(V1BillingMeterErrorReportTriggeredEventNotification::class, $event);

        // @var V1BillingMeterErrorReportTriggeredEventNotification $event
        self::assertSame('evt_234', $event->id);
        self::assertSame('v1.billing.meter.error_report_triggered', $event->type);
        self::assertSame('2022-02-15T00:27:45.330Z', $event->created);
        self::assertSame('fa_123', $event->related_object->id);
        self::assertSame('financial_account', $event->related_object->type);
        self::assertSame('/v2/financial_accounts/fa_123', $event->related_object->url);
        self::assertInstanceOf(Reason::class, $event->reason);
        self::assertInstanceOf(ReasonRequest::class, $event->reason->request);
        self::assertInstanceOf(RelatedObject::class, $event->related_object);
        self::assertSame('id_123', $event->reason->request->id);
        self::assertSame('key_123', $event->reason->request->idempotency_key);
    }

    public function testJsonDecodeEventNotificationObjectWithNoRelatedObject()
    {
        $eventData = json_encode([
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'v1.billing.meter.no_meter_found',
            'created' => '2022-02-15T00:27:45.330Z',
        ]);

        $event = EventNotification::fromJson($eventData, new StripeClient());
        self::assertInstanceOf(V1BillingMeterNoMeterFoundEventNotification::class, $event);

        // @var V1BillingMeterNoMeterFoundEventNotification $event
        self::assertSame('evt_234', $event->id);
        self::assertSame('v1.billing.meter.no_meter_found', $event->type);
        self::assertSame('2022-02-15T00:27:45.330Z', $event->created);
    }

    public function testJsonDecodeEventNotificationObjectWithNoReasonObject()
    {
        $eventData = json_encode([
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'imaginary',
            'created' => '2022-02-15T00:27:45.330Z',
        ]);

        $event = EventNotification::fromJson($eventData, new StripeClient());
        self::assertInstanceOf(UnknownEventNotification::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('imaginary', $event->type);
        self::assertSame('2022-02-15T00:27:45.330Z', $event->created);
        self::assertNull($event->reason);
    }
}
