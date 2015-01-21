<?php

namespace Stripe;

class RequestOptionsTest extends TestCase
{
    public function testStringAPIKey()
    {
        $opts = RequestOptions::parse("foo");
        $this->assertSame("foo", $opts->apiKey);
        $this->assertSame(array(), $opts->headers);
    }

    public function testNull()
    {
        $opts = RequestOptions::parse(null);
        $this->assertSame(null, $opts->apiKey);
        $this->assertSame(array(), $opts->headers);
    }

    public function testEmptyArray()
    {
        $opts = RequestOptions::parse(array());
        $this->assertSame(null, $opts->apiKey);
        $this->assertSame(array(), $opts->headers);
    }

    public function testAPIKeyArray()
    {
        $opts = RequestOptions::parse(
            array(
                'api_key' => 'foo',
            )
        );
        $this->assertSame('foo', $opts->apiKey);
        $this->assertSame(array(), $opts->headers);
    }

    public function testIdempotentKeyArray()
    {
        $opts = RequestOptions::parse(
            array(
                'idempotency_key' => 'foo',
            )
        );
        $this->assertSame(null, $opts->apiKey);
        $this->assertSame(array('Idempotency-Key' => 'foo'), $opts->headers);
    }

    public function testKeyArray()
    {
        $opts = RequestOptions::parse(
            array(
                'idempotency_key' => 'foo',
                'api_key' => 'foo'
            )
        );
        $this->assertSame('foo', $opts->apiKey);
        $this->assertSame(array('Idempotency-Key' => 'foo'), $opts->headers);
    }

    public function testWrongType()
    {
        $caught = false;
        try {
            $opts = RequestOptions::parse(5);
        } catch (Error $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
    }
}
