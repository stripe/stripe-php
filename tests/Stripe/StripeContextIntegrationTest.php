<?php

namespace Stripe;

use Stripe\Util\RequestOptions;
use Stripe\V2\Core\EventNotification;

/**
 * @internal
 *
 * @covers \Stripe\StripeContext
 */
final class StripeContextIntegrationTest extends TestCase
{
    public function testRequestOptionsWithStringContext()
    {
        $options = RequestOptions::parse(['stripe_context' => 'a/b/c']);
        self::assertSame('a/b/c', $options->headers['Stripe-Context']);
    }

    public function testRequestOptionsWithContextObject()
    {
        $context = new StripeContext(['a', 'b', 'c']);
        $options = RequestOptions::parse(['stripe_context' => $context]);
        self::assertSame('a/b/c', $options->headers['Stripe-Context']);
    }

    public function testRequestOptionsWithNullContext()
    {
        $options = RequestOptions::parse(['stripe_context' => null]);
        self::assertArrayNotHasKey('Stripe-Context', $options->headers);
    }

    public function testStripeClientWithStringContext()
    {
        $client = new StripeClient(['api_key' => 'sk_test_123', 'stripe_context' => 'a/b/c']);
        self::assertSame('a/b/c', $client->getStripeContext());
    }

    public function testStripeClientWithContextObject()
    {
        $context = new StripeContext(['a', 'b', 'c']);
        $client = new StripeClient(['api_key' => 'sk_test_123', 'stripe_context' => $context]);
        self::assertSame(['a', 'b', 'c'], $client->getStripeContext()->getSegments());
    }

    public function testStripeClientWithNullContext()
    {
        $client = new StripeClient(['api_key' => 'sk_test_123', 'stripe_context' => null]);
        self::assertNull($client->getStripeContext());
    }

    public function testStripeClientRejectsInvalidContext()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        new StripeClient(['api_key' => 'sk_test_123', 'stripe_context' => 123]);
    }

    public function testEventNotificationParsing()
    {
        $payload = '{"id":"evt_123","type":"test.event","created":"2023-01-01T00:00:00Z","livemode":false,"context":"a/b/c"}';
        $client = new StripeClient(['api_key' => 'sk_test_123']);

        $notification = EventNotification::fromJson($payload, $client);

        self::assertInstanceOf(StripeContext::class, $notification->context);
        self::assertSame(['a', 'b', 'c'], $notification->context->getSegments());
        self::assertSame('a/b/c', (string) $notification->context);
    }

    public function testEventNotificationNoContext()
    {
        $payload = '{"id":"evt_123","type":"test.event","created":"2023-01-01T00:00:00Z","livemode":false}';
        $client = new StripeClient(['api_key' => 'sk_test_123']);

        $notification = EventNotification::fromJson($payload, $client);

        self::assertNull($notification->context);
    }

    public function testEventNotificationEmptyContext()
    {
        $payload = '{"id":"evt_123","type":"test.event","created":"2023-01-01T00:00:00Z","livemode":false,"context":""}';
        $client = new StripeClient(['api_key' => 'sk_test_123']);

        $notification = EventNotification::fromJson($payload, $client);

        self::assertInstanceOf(StripeContext::class, $notification->context);
        self::assertEmpty($notification->context->getSegments());
        self::assertSame('', (string) $notification->context);
    }

    public function testEventNotificationNullContext()
    {
        $payload = '{"id":"evt_123","type":"test.event","created":"2023-01-01T00:00:00Z","livemode":false,"context":null}';
        $client = new StripeClient(['api_key' => 'sk_test_123']);

        $notification = EventNotification::fromJson($payload, $client);

        self::assertNull($notification->context);
    }

    public function testContextBuilderPattern()
    {
        // Test the builder pattern works well with StripeContext
        $baseContext = StripeContext::parse('workspace_123');

        $options = RequestOptions::parse(['stripe_context' => $baseContext->push('account_456')]);

        self::assertSame('workspace_123/account_456', $options->headers['Stripe-Context']);
    }

    public function testContextCompatibility()
    {
        // Test that both string and StripeContext work equivalently
        $stringOptions = RequestOptions::parse(['stripe_context' => 'a/b/c']);

        $context = new StripeContext(['a', 'b', 'c']);
        $contextOptions = RequestOptions::parse(['stripe_context' => $context]);

        self::assertSame($stringOptions->headers['Stripe-Context'], $contextOptions->headers['Stripe-Context']);
    }

    public function testRequestOptionsMergeWithContext()
    {
        $baseOptions = new RequestOptions('sk_test_123', [], null);
        $contextOptions = RequestOptions::parse(['stripe_context' => 'workspace_123']);

        $merged = $baseOptions->merge($contextOptions);

        self::assertSame('workspace_123', $merged->headers['Stripe-Context']);
    }

    public function testRequestOptionsMergeWithStripeContext()
    {
        $baseOptions = new RequestOptions('sk_test_123', [], null);
        $contextOptions = RequestOptions::parse(['stripe_context' => new StripeContext(['workspace', '123'])]);

        $merged = $baseOptions->merge($contextOptions);

        self::assertSame('workspace/123', $merged->headers['Stripe-Context']);
    }

    public function testRequestOptionsUnsetsContext()
    {
        $baseOptions = RequestOptions::parse(['stripe_context' => new StripeContext(['client', 'context'])]);
        $reqOpts = RequestOptions::parse(['stripe_context' => new StripeContext()]);

        $merged = $baseOptions->merge($reqOpts);

        self::assertNotContains('Stripe-Context: ', $merged->headers);
    }

    public function testRequestOptionsUnsetsStringContext()
    {
        $baseOptions = RequestOptions::parse(['stripe_context' => 'some_context']);
        $reqOpts = RequestOptions::parse(['stripe_context' => new StripeContext()]);

        $merged = $baseOptions->merge($reqOpts);

        self::assertNotContains('Stripe-Context: ', $merged->headers);
    }
}
