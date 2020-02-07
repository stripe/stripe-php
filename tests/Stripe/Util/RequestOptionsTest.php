<?php

namespace Stripe\Util;

class RequestOptionsTest extends \Stripe\TestCase
{
    public function testStringAPIKey()
    {
        $opts = RequestOptions::parse("foo");
        static::assertSame("foo", $opts->apiKey);
        static::assertSame([], $opts->headers);
    }

    public function testNull()
    {
        $opts = RequestOptions::parse(null);
        static::assertNull($opts->apiKey);
        static::assertSame([], $opts->headers);
    }

    public function testEmptyArray()
    {
        $opts = RequestOptions::parse([]);
        static::assertNull($opts->apiKey);
        static::assertSame([], $opts->headers);
    }

    public function testAPIKeyArray()
    {
        $opts = RequestOptions::parse(
            [
                'api_key' => 'foo',
            ]
        );
        static::assertSame('foo', $opts->apiKey);
        static::assertSame([], $opts->headers);
    }

    public function testIdempotentKeyArray()
    {
        $opts = RequestOptions::parse(
            [
                'idempotency_key' => 'foo',
            ]
        );
        static::assertNull($opts->apiKey);
        static::assertSame(['Idempotency-Key' => 'foo'], $opts->headers);
    }

    public function testKeyArray()
    {
        $opts = RequestOptions::parse(
            [
                'idempotency_key' => 'foo',
                'api_key' => 'foo'
            ]
        );
        static::assertSame('foo', $opts->apiKey);
        static::assertSame(['Idempotency-Key' => 'foo'], $opts->headers);
    }

    public function testWrongType()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);

        $opts = RequestOptions::parse(5);
    }

    public function testDiscardNonPersistentHeaders()
    {
        $opts = RequestOptions::parse(
            [
                'stripe_account' => 'foo',
                'idempotency_key' => 'foo',
            ]
        );
        $opts->discardNonPersistentHeaders();
        static::assertSame(['Stripe-Account' => 'foo'], $opts->headers);
    }

    public function testDebugInfo()
    {
        $opts = RequestOptions::parse(['api_key' => 'sk_test_1234567890abcdefghijklmn']);
        $debugInfo = \print_r($opts, true);
        static::assertContains("[apiKey] => sk_test_********************klmn", $debugInfo);

        $opts = RequestOptions::parse(['api_key' => 'sk_1234567890abcdefghijklmn']);
        $debugInfo = \print_r($opts, true);
        static::assertContains("[apiKey] => sk_********************klmn", $debugInfo);

        $opts = RequestOptions::parse(['api_key' => '1234567890abcdefghijklmn']);
        $debugInfo = \print_r($opts, true);
        static::assertContains("[apiKey] => ********************klmn", $debugInfo);
    }
}
