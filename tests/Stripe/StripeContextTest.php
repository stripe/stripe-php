<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\StripeContext
 */
final class StripeContextTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $context = new StripeContext();
        self::assertSame([], $context->getSegments());
    }

    public function testConstructorWithSegments()
    {
        $segments = ['a', 'b', 'c'];
        $context = new StripeContext($segments);
        self::assertSame($segments, $context->getSegments());
    }

    public function testConstructorWithNullSegments()
    {
        $context = new StripeContext(null);
        self::assertSame([], $context->getSegments());
    }

    public function testPush()
    {
        $context = new StripeContext(['a', 'b']);
        $newContext = $context->push('c');

        // Original context unchanged
        self::assertSame(['a', 'b'], $context->getSegments());
        // New context has added segment
        self::assertSame(['a', 'b', 'c'], $newContext->getSegments());
        // Different objects
        self::assertNotSame($context, $newContext);
    }

    public function testPushNullThrowsException()
    {
        $context = new StripeContext();
        $this->expectException(\InvalidArgumentException::class);
        $context->push(null);
    }

    public function testPopWithSegments()
    {
        $context = new StripeContext(['a', 'b', 'c']);
        $newContext = $context->pop();

        // Original context unchanged
        self::assertSame(['a', 'b', 'c'], $context->getSegments());
        // New context has removed last segment
        self::assertSame(['a', 'b'], $newContext->getSegments());
        // Different objects
        self::assertNotSame($context, $newContext);
    }

    public function testPopEmpty()
    {
        $context = new StripeContext();
        $this->expectException(Exception\BadMethodCallException::class);
        $context->pop(); // throws
    }

    public function testToStringEmpty()
    {
        $context = new StripeContext();
        self::assertSame('', (string) $context);
    }

    public function testToStringSingleSegment()
    {
        $context = new StripeContext(['a']);
        self::assertSame('a', (string) $context);
    }

    public function testToStringMultipleSegments()
    {
        $context = new StripeContext(['a', 'b', 'c']);
        self::assertSame('a/b/c', (string) $context);
    }

    public function testParseEmptyString()
    {
        $context = StripeContext::parse('');
        self::assertSame([], $context->getSegments());
    }

    public function testParseNull()
    {
        $context = StripeContext::parse(null);
        self::assertSame([], $context->getSegments());
    }

    public function testParseSingleSegment()
    {
        $context = StripeContext::parse('a');
        self::assertSame(['a'], $context->getSegments());
    }

    public function testParseMultipleSegments()
    {
        $context = StripeContext::parse('a/b/c');
        self::assertSame(['a', 'b', 'c'], $context->getSegments());
    }

    public function testContextManipulationPattern()
    {
        // Common usage: start with base context, add child contexts
        $base = StripeContext::parse('workspace_123');
        $child = $base->push('account_456');
        $grandchild = $child->push('customer_789');

        self::assertSame('workspace_123', (string) $base);
        self::assertSame('workspace_123/account_456', (string) $child);
        self::assertSame('workspace_123/account_456/customer_789', (string) $grandchild);

        // Go back up the hierarchy
        $backToChild = $grandchild->pop();
        $backToBase = $backToChild->pop();

        self::assertSame('workspace_123/account_456', (string) $backToChild);
        self::assertSame('workspace_123', (string) $backToBase);
    }

    public function testContextImmutability()
    {
        $original = new StripeContext(['a', 'b']);

        // Multiple operations on the same context
        $pushed = $original->push('c');
        $popped = $original->pop();

        // Original remains unchanged
        self::assertSame(['a', 'b'], $original->getSegments());
        self::assertSame(['a', 'b', 'c'], $pushed->getSegments());
        self::assertSame(['a'], $popped->getSegments());

        // All are different objects
        self::assertNotSame($original, $pushed);
        self::assertNotSame($original, $popped);
        self::assertNotSame($pushed, $popped);
    }
}
