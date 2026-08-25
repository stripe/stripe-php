<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\StripeEventNotificationHandler
 */
final class StripeEventNotificationHandlerTest extends TestCase
{
    use TestHelper;

    const WEBHOOK_SECRET = 'whsec_test_secret';

    /** @var StripeClient */
    private $client;

    /** @var callable */
    private $fallbackCallback;

    /** @var StripeEventNotificationHandler */
    private $handler;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->client = new StripeClient([
            'api_key' => 'sk_test_123',
            'stripe_context' => 'original_context_123',
        ]);

        $this->fallbackCallback = static function ($event, $client, $info) {
            // Default no-op handler
        };

        $this->handler = new StripeEventNotificationHandler(
            $this->client,
            self::WEBHOOK_SECRET,
            $this->fallbackCallback
        );
    }

    private function generateHeader($payload)
    {
        return WebhookTest::generateHeader([
            'payload' => $payload,
            'secret' => self::WEBHOOK_SECRET,
        ]);
    }

    private function getV1BillingMeterPayload()
    {
        return \json_encode([
            'id' => 'evt_123',
            'object' => 'v2.core.event',
            'type' => 'v1.billing.meter.error_report_triggered',
            'livemode' => false,
            'created' => '2022-02-15T00:27:45.330Z',
            'context' => 'event_context_456',
            'related_object' => [
                'id' => 'mtr_123',
                'type' => 'billing.meter',
                'url' => '/v1/billing/meters/mtr_123',
            ],
        ]);
    }

    private function getV1BillingMeterNoMeterFoundPayload()
    {
        return \json_encode([
            'id' => 'evt_456',
            'object' => 'v2.core.event',
            'type' => 'v1.billing.meter.no_meter_found',
            'livemode' => false,
            'created' => '2022-02-15T00:27:45.330Z',
            'context' => null,
        ]);
    }

    private function getUnknownEventPayload()
    {
        return \json_encode([
            'id' => 'evt_unknown',
            'object' => 'v2.core.event',
            'type' => 'llama.created',
            'livemode' => false,
            'created' => '2022-02-15T00:27:45.330Z',
            'context' => 'event_context_unknown',
            'related_object' => [
                'id' => 'llama_123',
                'type' => 'llama',
                'url' => '/v1/llamas/llama_123',
            ],
        ]);
    }

    public function testRoutesEventToRegisteredHandler()
    {
        $callbackCalled = false;
        $receivedEvent = null;

        $callback = static function ($event, $client) use (&$callbackCalled, &$receivedEvent) {
            $callbackCalled = true;
            $receivedEvent = $event;
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertTrue($callbackCalled);
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEventNotification::class, $receivedEvent);
    }

    public function testRoutesDifferentEventsToCorrectHandlers()
    {
        $billingHandlerCalled = false;
        $billingReceivedEvent = null;
        $noMeterHandlerCalled = false;
        $noMeterReceivedEvent = null;

        $billingHandler = static function ($event, $client) use (&$billingHandlerCalled, &$billingReceivedEvent) {
            $billingHandlerCalled = true;
            $billingReceivedEvent = $event;
        };

        $noMeterHandler = static function ($event, $client) use (&$noMeterHandlerCalled, &$noMeterReceivedEvent) {
            $noMeterHandlerCalled = true;
            $noMeterReceivedEvent = $event;
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($billingHandler);
        $this->handler->onV1BillingMeterNoMeterFound($noMeterHandler);

        $payload1 = $this->getV1BillingMeterPayload();
        $sigHeader1 = $this->generateHeader($payload1);
        $this->handler->handle($payload1, $sigHeader1);

        $payload2 = $this->getV1BillingMeterNoMeterFoundPayload();
        $sigHeader2 = $this->generateHeader($payload2);
        $this->handler->handle($payload2, $sigHeader2);

        self::assertTrue($billingHandlerCalled);
        self::assertTrue($noMeterHandlerCalled);
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEventNotification::class, $billingReceivedEvent);
        self::assertInstanceOf(Events\V1BillingMeterNoMeterFoundEventNotification::class, $noMeterReceivedEvent);
    }

    public function testHandlerReceivesCorrectRuntimeType()
    {
        $receivedEvent = null;
        $receivedClient = null;

        $callback = static function ($event, $client) use (&$receivedEvent, &$receivedClient) {
            $receivedEvent = $event;
            $receivedClient = $client;
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEventNotification::class, $receivedEvent);
        self::assertSame('v1.billing.meter.error_report_triggered', $receivedEvent->type);
        self::assertSame('evt_123', $receivedEvent->id);
        self::assertSame('mtr_123', $receivedEvent->related_object->id);
        self::assertInstanceOf(StripeClient::class, $receivedClient);
    }

    public function testCannotRegisterHandlerAfterHandling()
    {
        $callback = static function ($event, $client) {
            // no-op
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        $this->expectException(Exception\BadMethodCallException::class);
        $this->compatExpectExceptionMessageMatches('/Cannot register new callbacks after an event has been handled/');

        $this->handler->onV1BillingMeterNoMeterFound($callback);
    }

    public function testCannotRegisterDuplicateHandler()
    {
        $callback1 = static function ($event, $client) {
            // no-op
        };
        $callback2 = static function ($event, $client) {
            // no-op
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback1);

        $this->expectException(Exception\InvalidArgumentException::class);
        $this->compatExpectExceptionMessageMatches('/Callback for event type "v1.billing.meter.error_report_triggered" is already registered/');

        $this->handler->onV1BillingMeterErrorReportTriggered($callback2);
    }

    public function testHandlerUsesEventStripeContext()
    {
        $receivedContext = null;

        $callback = static function ($event, $client) use (&$receivedContext) {
            $receivedContext = $client->getStripeContextHeader();
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        self::assertSame('original_context_123', $this->client->getStripeContext());

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertSame('event_context_456', $receivedContext);
    }

    public function testStripeContextRestoredAfterHandlerSuccess()
    {
        $contextDuringHandler = null;

        $callback = static function ($event, $client) use (&$contextDuringHandler) {
            $contextDuringHandler = $client->getStripeContextHeader();
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        self::assertSame('original_context_123', $this->client->getStripeContext());

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertSame('event_context_456', $contextDuringHandler);
        self::assertSame('original_context_123', $this->client->getStripeContext());
    }

    public function testStripeContextRestoredAfterHandlerError()
    {
        $contextDuringHandler = null;

        $callback = static function ($event, $client) use (&$contextDuringHandler) {
            $contextDuringHandler = $client->getStripeContextHeader();

            throw new \RuntimeException('Handler error!');
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        self::assertSame('original_context_123', $this->client->getStripeContext());

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Handler error!');

        try {
            $this->handler->handle($payload, $sigHeader);
        } finally {
            self::assertSame('event_context_456', $contextDuringHandler);
            self::assertSame('original_context_123', $this->client->getStripeContext());
        }
    }

    public function testStripeContextSetToNullWhenEventHasNoContext()
    {
        $receivedContext = 'not_set';

        $callback = static function ($event, $client) use (&$receivedContext) {
            $receivedContext = $client->getStripeContextHeader();
        };

        $this->handler->onV1BillingMeterNoMeterFound($callback);

        self::assertSame('original_context_123', $this->client->getStripeContext());

        $payload = $this->getV1BillingMeterNoMeterFoundPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertNull($receivedContext);
        self::assertSame('original_context_123', $this->client->getStripeContext());
    }

    public function testClientWithNoContextTemporarilyGetsEventContext()
    {
        $contextDuringHandler = 'not_set';

        $client = new StripeClient(['api_key' => 'sk_test_123']);

        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = new StripeEventNotificationHandler($client, self::WEBHOOK_SECRET, $fallbackCallback);

        $callback = static function ($event, $receivedClient) use (&$contextDuringHandler) {
            $contextDuringHandler = $receivedClient->getStripeContextHeader();
        };

        $handler->onV1BillingMeterErrorReportTriggered($callback);

        // Client initially has no context
        self::assertNull($client->getStripeContext());

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        // During handler, context was set to event's context
        self::assertSame('event_context_456', $contextDuringHandler);

        // After handler, context is restored to null
        self::assertNull($client->getStripeContext());
    }

    public function testUnknownEventRoutesToOnUnhandled()
    {
        $onUnhandledCalled = false;
        $receivedEvent = null;
        $receivedClient = null;
        $receivedInfo = null;

        $fallbackCallback = static function ($event, $client, $info) use (&$onUnhandledCalled, &$receivedEvent, &$receivedClient, &$receivedInfo) {
            $onUnhandledCalled = true;
            $receivedEvent = $event;
            $receivedClient = $client;
            $receivedInfo = $info;
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);

        $payload = $this->getUnknownEventPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertTrue($onUnhandledCalled);
        self::assertInstanceOf(Events\UnknownEventNotification::class, $receivedEvent);
        self::assertSame('llama.created', $receivedEvent->type);
        self::assertInstanceOf(StripeClient::class, $receivedClient);
        self::assertInstanceOf(UnhandledNotificationDetails::class, $receivedInfo);
        self::assertFalse($receivedInfo->isKnownEventType);
    }

    public function testKnownUnregisteredEventRoutesToOnUnhandled()
    {
        $onUnhandledCalled = false;
        $receivedEvent = null;
        $receivedClient = null;
        $receivedInfo = null;

        $fallbackCallback = static function ($event, $client, $info) use (&$onUnhandledCalled, &$receivedEvent, &$receivedClient, &$receivedInfo) {
            $onUnhandledCalled = true;
            $receivedEvent = $event;
            $receivedClient = $client;
            $receivedInfo = $info;
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertTrue($onUnhandledCalled);
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEventNotification::class, $receivedEvent);
        self::assertSame('v1.billing.meter.error_report_triggered', $receivedEvent->type);
        self::assertInstanceOf(StripeClient::class, $receivedClient);
        self::assertInstanceOf(UnhandledNotificationDetails::class, $receivedInfo);
        self::assertTrue($receivedInfo->isKnownEventType);
    }

    public function testFallbackAcceptsTheDocumentedNotificationType()
    {
        $received = [];

        // typed exactly as the documented callable signature. PHP enforces static function parameter types at
        // call time, so narrowing this to Events\UnknownEventNotification - as the docblock used
        // to promise - would TypeError on the known-event case below.
        $fallbackCallback = static function (V2\Core\EventNotification $event, StripeClient $client, UnhandledNotificationDetails $info) use (&$received) {
            $received[] = [$event, $info];
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);

        $knownPayload = $this->getV1BillingMeterPayload();
        $handler->handle($knownPayload, $this->generateHeader($knownPayload));

        $unknownPayload = $this->getUnknownEventPayload();
        $handler->handle($unknownPayload, $this->generateHeader($unknownPayload));

        self::assertCount(2, $received);

        // a type this SDK knows about arrives as its specific subclass...
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEventNotification::class, $received[0][0]);
        self::assertTrue($received[0][1]->isKnownEventType);

        // ...and one it doesn't arrives as UnknownEventNotification
        self::assertInstanceOf(Events\UnknownEventNotification::class, $received[1][0]);
        self::assertFalse($received[1][1]->isKnownEventType);
    }

    public function testRegisteredEventDoesNotCallOnUnhandled()
    {
        $callbackCalled = false;
        $onUnhandledCalled = false;

        $callback = static function ($event, $client) use (&$callbackCalled) {
            $callbackCalled = true;
        };

        $fallbackCallback = static function ($event, $client, $info) use (&$onUnhandledCalled) {
            $onUnhandledCalled = true;
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);
        $handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertTrue($callbackCalled);
        self::assertFalse($onUnhandledCalled);
    }

    public function testHandlerClientRetainsConfiguration()
    {
        $apiKey = 'sk_test_custom_key';
        $originalContext = 'original_context_xyz';

        $client = new StripeClient([
            'api_key' => $apiKey,
            'stripe_context' => $originalContext,
        ]);

        $receivedApiKey = null;
        $receivedContext = null;

        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = new StripeEventNotificationHandler($client, self::WEBHOOK_SECRET, $fallbackCallback);

        $callback = static function ($event, $receivedClient) use (&$receivedApiKey, &$receivedContext) {
            $receivedApiKey = $receivedClient->getApiKey();
            $receivedContext = $receivedClient->getStripeContextHeader();
        };

        $handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertSame($apiKey, $receivedApiKey);
        self::assertSame('event_context_456', $receivedContext);
        self::assertSame($originalContext, $client->getStripeContext());
    }

    public function testOnUnhandledReceivesCorrectInfoForUnknown()
    {
        $receivedInfo = null;

        $fallbackCallback = static function ($event, $client, $info) use (&$receivedInfo) {
            $receivedInfo = $info;
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);

        $payload = $this->getUnknownEventPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertInstanceOf(UnhandledNotificationDetails::class, $receivedInfo);
        self::assertFalse($receivedInfo->isKnownEventType);
    }

    public function testOnUnhandledReceivesCorrectInfoForKnownUnregistered()
    {
        $receivedInfo = null;

        $fallbackCallback = static function ($event, $client, $info) use (&$receivedInfo) {
            $receivedInfo = $info;
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertInstanceOf(UnhandledNotificationDetails::class, $receivedInfo);
        self::assertTrue($receivedInfo->isKnownEventType);
    }

    public function testValidatesWebhookSignature()
    {
        $this->expectException(Exception\SignatureVerificationException::class);

        $payload = $this->getV1BillingMeterPayload();
        $this->handler->handle($payload, 'invalid_signature');
    }

    public function testRegisteredEventTypesEmpty()
    {
        $types = $this->handler->getRegisteredHandlers();

        self::assertSame([], $types);
    }

    public function testRegisteredEventTypesSingle()
    {
        $callback = static function ($event, $client) {
            // no-op
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $types = $this->handler->getRegisteredHandlers();

        self::assertSame(['v1.billing.meter.error_report_triggered'], $types);
    }

    public function testRegisteredEventTypesMultipleAlphabetized()
    {
        $callback = static function ($event, $client) {
            // no-op
        };

        // Register in non-alphabetical order
        $this->handler->onV1BillingMeterNoMeterFound($callback);
        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $types = $this->handler->getRegisteredHandlers();

        $expected = [
            'v1.billing.meter.error_report_triggered',
            'v1.billing.meter.no_meter_found',
        ];

        self::assertSame($expected, $types);
    }

    public function testWithoutVerificationRoutesEventToHandler()
    {
        $callbackCalled = false;
        $receivedEvent = null;

        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $callback = static function ($event, $client) use (&$callbackCalled, &$receivedEvent) {
            $callbackCalled = true;
            $receivedEvent = $event;
        };

        $handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $handler->handle($payload);

        self::assertTrue($callbackCalled);
        self::assertInstanceOf(Events\V1BillingMeterErrorReportTriggeredEventNotification::class, $receivedEvent);
    }

    public function testWithoutVerificationFallbackForUnregisteredEvent()
    {
        $onUnhandledCalled = false;
        $receivedInfo = null;

        $fallbackCallback = static function ($event, $client, $info) use (&$onUnhandledCalled, &$receivedInfo) {
            $onUnhandledCalled = true;
            $receivedInfo = $info;
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $payload = $this->getV1BillingMeterPayload();
        $handler->handle($payload);

        self::assertTrue($onUnhandledCalled);
        self::assertInstanceOf(UnhandledNotificationDetails::class, $receivedInfo);
        self::assertTrue($receivedInfo->isKnownEventType);
    }

    public function testWithoutVerificationUnknownEventType()
    {
        $onUnhandledCalled = false;
        $receivedEvent = null;
        $receivedInfo = null;

        $fallbackCallback = static function ($event, $client, $info) use (&$onUnhandledCalled, &$receivedEvent, &$receivedInfo) {
            $onUnhandledCalled = true;
            $receivedEvent = $event;
            $receivedInfo = $info;
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $payload = $this->getUnknownEventPayload();
        $handler->handle($payload);

        self::assertTrue($onUnhandledCalled);
        self::assertInstanceOf(Events\UnknownEventNotification::class, $receivedEvent);
        self::assertInstanceOf(UnhandledNotificationDetails::class, $receivedInfo);
        self::assertFalse($receivedInfo->isKnownEventType);
    }

    public function testWithoutVerificationContextPropagation()
    {
        $receivedContext = null;

        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $callback = static function ($event, $client) use (&$receivedContext) {
            $receivedContext = $client->getStripeContextHeader();
        };

        $handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $handler->handle($payload);

        self::assertSame('event_context_456', $receivedContext);
    }

    public function testWithoutVerificationHandleAcceptsOnlyThePayload()
    {
        // The two handlers are siblings rather than parent and child, so this one
        // declares no signature parameter at all. PHP silently ignores extra arguments
        // to a userland method, so the guarantee has to be asserted on the signature.
        $method = new \ReflectionMethod(
            StripeEventNotificationHandlerWithoutVerification::class,
            'handle'
        );

        self::assertSame(1, $method->getNumberOfParameters());
        self::assertSame('payload', $method->getParameters()[0]->getName());
    }

    public function testWithoutVerificationStaticFactory()
    {
        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = StripeEventNotificationHandler::withoutVerification($this->client, $fallbackCallback);

        self::assertInstanceOf(StripeEventNotificationHandlerWithoutVerification::class, $handler);
    }

    public function testWithoutVerificationClientFactory()
    {
        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = $this->client->notificationHandlerWithoutVerification($fallbackCallback);

        self::assertInstanceOf(StripeEventNotificationHandlerWithoutVerification::class, $handler);
    }

    public function testConstructorRejectsEmptySecret()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $this->compatExpectExceptionMessageMatches('/webhookSecret must be a non-empty string/');

        new StripeEventNotificationHandler($this->client, '', $this->fallbackCallback);
    }

    public function testHandlerStillRunsWithNoPreHandleRegistered()
    {
        $callbackCalled = false;

        $callback = static function ($event, $client) use (&$callbackCalled) {
            $callbackCalled = true;
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertTrue($callbackCalled);
    }

    public function testPreHandleReturningTrueRunsFirstThenHandler()
    {
        $order = [];

        $this->handler->preHandle(static function ($event, $client) use (&$order) {
            $order[] = 'preHandle';

            return true;
        });

        $callback = static function ($event, $client) use (&$order) {
            $order[] = 'handler';
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertSame(['preHandle', 'handler'], $order);
    }

    public function testPreHandleReturningFalsePreventsRegisteredHandler()
    {
        $handlerCalled = false;

        $this->handler->preHandle(static function ($event, $client) {
            return false;
        });

        $callback = static function ($event, $client) use (&$handlerCalled) {
            $handlerCalled = true;
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertFalse($handlerCalled);
    }

    public function testPreHandleReturningFalsePreventsFallback()
    {
        $fallbackCalled = false;

        $fallbackCallback = static function ($event, $client, $info) use (&$fallbackCalled) {
            $fallbackCalled = true;
        };

        $handler = new StripeEventNotificationHandler($this->client, self::WEBHOOK_SECRET, $fallbackCallback);
        $handler->preHandle(static function ($event, $client) {
            return false;
        });

        $payload = $this->getUnknownEventPayload();
        $sigHeader = $this->generateHeader($payload);
        $handler->handle($payload, $sigHeader);

        self::assertFalse($fallbackCalled);
    }

    public function testPreHandleReceivesContextScopedClientAndHandlerClientIsUnmutated()
    {
        $preHandleContext = 'not_set';

        $this->handler->preHandle(static function ($event, $client) use (&$preHandleContext) {
            $preHandleContext = $client->getStripeContextHeader();

            return true;
        });

        $callback = static function ($event, $client) {
            // no-op
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        self::assertSame('original_context_123', $this->client->getStripeContext());

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        self::assertSame('event_context_456', $preHandleContext);
        self::assertSame('original_context_123', $this->client->getStripeContext());
    }

    public function testPreHandleThrowingPropagatesAndPreventsHandler()
    {
        $handlerCalled = false;

        $this->handler->preHandle(static function ($event, $client) {
            throw new \RuntimeException('preHandle error!');
        });

        $callback = static function ($event, $client) use (&$handlerCalled) {
            $handlerCalled = true;
        };

        $this->handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('preHandle error!');

        try {
            $this->handler->handle($payload, $sigHeader);
        } finally {
            self::assertFalse($handlerCalled);
        }
    }

    public function testCannotRegisterPreHandleAfterHandling()
    {
        $payload = $this->getV1BillingMeterPayload();
        $sigHeader = $this->generateHeader($payload);
        $this->handler->handle($payload, $sigHeader);

        $this->expectException(Exception\BadMethodCallException::class);
        $this->compatExpectExceptionMessageMatches('/Cannot register new callbacks after an event has been handled/');

        $this->handler->preHandle(static function ($event, $client) {
            return true;
        });
    }

    public function testCannotRegisterDuplicatePreHandle()
    {
        $this->handler->preHandle(static function ($event, $client) {
            return true;
        });

        $this->expectException(Exception\InvalidArgumentException::class);

        $this->handler->preHandle(static function ($event, $client) {
            return true;
        });
    }

    public function testWithoutVerificationPreHandleReturningFalsePreventsHandler()
    {
        $handlerCalled = false;

        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $handler->preHandle(static function ($event, $client) {
            return false;
        });

        $callback = static function ($event, $client) use (&$handlerCalled) {
            $handlerCalled = true;
        };

        $handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $handler->handle($payload);

        self::assertFalse($handlerCalled);
    }

    public function testWithoutVerificationPreHandleReturningFalsePreventsFallback()
    {
        $fallbackCalled = false;

        $fallbackCallback = static function ($event, $client, $info) use (&$fallbackCalled) {
            $fallbackCalled = true;
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $handler->preHandle(static function ($event, $client) {
            return false;
        });

        $payload = $this->getUnknownEventPayload();
        $handler->handle($payload);

        self::assertFalse($fallbackCalled);
    }

    public function testWithoutVerificationPreHandleReturningTrueRunsHandler()
    {
        $order = [];

        $fallbackCallback = static function ($event, $client, $info) {
            // no-op
        };

        $handler = new StripeEventNotificationHandlerWithoutVerification(
            $this->client,
            $fallbackCallback
        );

        $handler->preHandle(static function ($event, $client) use (&$order) {
            $order[] = 'preHandle';

            return true;
        });

        $callback = static function ($event, $client) use (&$order) {
            $order[] = 'handler';
        };

        $handler->onV1BillingMeterErrorReportTriggered($callback);

        $payload = $this->getV1BillingMeterPayload();
        $handler->handle($payload);

        self::assertSame(['preHandle', 'handler'], $order);
    }
}
