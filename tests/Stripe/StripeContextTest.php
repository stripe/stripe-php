<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\StripeContext
 */
final class StripeContextTest extends \Stripe\TestCase
{
    public function testEmptyContext()
    {
        $context = new StripeContext();
        static::assertSame('', (string) $context);
    }

    public function testContextWithSegments()
    {
        $context = new StripeContext(['a', 'b', 'c']);
        static::assertSame('a/b/c', (string) $context);
    }

    public function testParseEmptyString()
    {
        $context = StripeContext::parse('');
        static::assertSame('', (string) $context);
    }

    public function testParseNull()
    {
        $context = StripeContext::parse(null);
        static::assertSame('', (string) $context);
    }

    public function testParseSingleSegment()
    {
        $context = StripeContext::parse('a');
        static::assertSame('a', (string) $context);
    }

    public function testParseMultipleSegments()
    {
        $context = StripeContext::parse('a/b/c');
        static::assertSame('a/b/c', (string) $context);
    }

    public function testParentReturnsNewInstance()
    {
        $context = StripeContext::parse('a/b/c');
        $parent = $context->parent();

        // Original unchanged
        static::assertSame('a/b/c', (string) $context);
        // New instance with removed segment
        static::assertSame('a/b', (string) $parent);
    }

    public function testParentOfSingleSegment()
    {
        $context = StripeContext::parse('a');
        $parent = $context->parent();
        static::assertSame('', (string) $parent);
    }

    public function testParentOfEmptyContextThrowsException()
    {
        $context = new StripeContext();

        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot get parent of empty context');

        $context->parent();
    }

    public function testChildReturnsNewInstance()
    {
        $context = StripeContext::parse('a/b');
        $child = $context->child('c');

        // Original unchanged
        static::assertSame('a/b', (string) $context);
        // New instance with added segment
        static::assertSame('a/b/c', (string) $child);
    }

    public function testChildOnEmptyContext()
    {
        $context = new StripeContext();
        $child = $context->child('a');
        static::assertSame('a', (string) $child);
    }

    public function testMethodChaining()
    {
        $context = StripeContext::parse('a');
        $result = $context->child('b')->child('c')->parent();
        static::assertSame('a/b', (string) $result);
    }

    public function testInitWithNullSegments()
    {
        $context = new StripeContext(null);
        static::assertSame('', (string) $context);
    }

    public function testInitWithEmptyArray()
    {
        $context = new StripeContext([]);
        static::assertSame('', (string) $context);
    }

    public function testRequestOptionsWithStripeContext()
    {
        $context = StripeContext::parse('org_123/proj_456');

        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => $context,
            'api_key' => 'sk_test_123'
        ]);

        static::assertSame('org_123/proj_456', $options->headers['Stripe-Context']);
    }

    public function testRequestOptionsWithStripeContextString()
    {
        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => 'org_123/proj_456',
            'api_key' => 'sk_test_123'
        ]);

        static::assertSame('org_123/proj_456', $options->headers['Stripe-Context']);
    }

    public function testRequestOptionsWithEmptyStripeContext()
    {
        $context = new StripeContext();

        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => $context,
            'api_key' => 'sk_test_123'
        ]);

        static::assertArrayNotHasKey('Stripe-Context', $options->headers);
    }

    public function testRequestOptionsWithEmptyStripeContextString()
    {
        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => '',
            'api_key' => 'sk_test_123'
        ]);

        static::assertArrayNotHasKey('Stripe-Context', $options->headers);
    }

    public function testRequestOptionsWithNullStripeContext()
    {
        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => null,
            'api_key' => 'sk_test_123'
        ]);

        static::assertArrayNotHasKey('Stripe-Context', $options->headers);
    }

    public function testEmptyContextDoesNotSetHeader()
    {
        $emptyContext = new StripeContext();
        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => $emptyContext,
            'api_key' => 'sk_test_123'
        ]);

        // Empty context should not set Stripe-Context header
        static::assertArrayNotHasKey('Stripe-Context', $options->headers);
    }

    public function testNonEmptyContextSetsHeader()
    {
        $context = StripeContext::parse('org_123/proj_456');
        $options = \Stripe\Util\RequestOptions::parse([
            'stripe_context' => $context,
            'api_key' => 'sk_test_123'
        ]);

        // Non-empty context should set the header
        static::assertSame('org_123/proj_456', $options->headers['Stripe-Context']);
    }
}