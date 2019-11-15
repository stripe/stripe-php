<?php

namespace Stripe\Util;

class RequestOptionsTest extends \Stripe\TestCase
{
    public function testStringAPIKey()
    {
        $opts = RequestOptions::parse("foo");
        $this->assertSame("foo", $opts->apiKey);
        $this->assertSame([], $opts->headers);
    }

    public function testNull()
    {
        $opts = RequestOptions::parse(null);
        $this->assertSame(null, $opts->apiKey);
        $this->assertSame([], $opts->headers);
    }

    public function testEmptyArray()
    {
        $opts = RequestOptions::parse([]);
        $this->assertSame(null, $opts->apiKey);
        $this->assertSame([], $opts->headers);
    }

    public function testAPIKeyArray()
    {
        $opts = RequestOptions::parse(
            [
                'api_key' => 'foo',
            ]
        );
        $this->assertSame('foo', $opts->apiKey);
        $this->assertSame([], $opts->headers);
    }

    public function testIdempotentKeyArray()
    {
        $opts = RequestOptions::parse(
            [
                'idempotency_key' => 'foo',
            ]
        );
        $this->assertSame(null, $opts->apiKey);
        $this->assertSame(['Idempotency-Key' => 'foo'], $opts->headers);
    }

    public function testKeyArray()
    {
        $opts = RequestOptions::parse(
            [
                'idempotency_key' => 'foo',
                'api_key' => 'foo'
            ]
        );
        $this->assertSame('foo', $opts->apiKey);
        $this->assertSame(['Idempotency-Key' => 'foo'], $opts->headers);
    }

    /**
     * @expectedException Stripe\Exception\InvalidArgumentException
     */
    public function testWrongType()
    {
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
        $this->assertSame(['Stripe-Account' => 'foo'], $opts->headers);
    }

    public function testDebugInfo()
    {
        $opts = RequestOptions::parse(['api_key' => 'sk_test_1234567890abcdefghijklmn']);
        $debugInfo = \print_r($opts, true);
        $this->assertContains("[apiKey] => sk_test_********************klmn", $debugInfo);

        $opts = RequestOptions::parse(['api_key' => 'sk_1234567890abcdefghijklmn']);
        $debugInfo = \print_r($opts, true);
        $this->assertContains("[apiKey] => sk_********************klmn", $debugInfo);

        $opts = RequestOptions::parse(['api_key' => '1234567890abcdefghijklmn']);
        $debugInfo = \print_r($opts, true);
        $this->assertContains("[apiKey] => ********************klmn", $debugInfo);
    }
}
