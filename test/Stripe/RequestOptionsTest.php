<?php

class Stripe_RequestOptionsTest extends StripeTestCase
{
  public function testStringAPIKey()
  {
    $opts = Stripe_RequestOptions::parse("foo");
    $this->assertEqual("foo", $opts->apiKey);
    $this->assertEqual(array(), $opts->headers);
  }

  public function testNull()
  {
    $opts = Stripe_RequestOptions::parse(null);
    $this->assertEqual(null, $opts->apiKey);
    $this->assertEqual(array(), $opts->headers);
  }

  public function testEmptyArray()
  {
    $opts = Stripe_RequestOptions::parse(array());
    $this->assertEqual(null, $opts->apiKey);
    $this->assertEqual(array(), $opts->headers);
  }

  public function testAPIKeyArray()
  {
    $opts = Stripe_RequestOptions::parse(
        array(
            'api_key' => 'foo',
        )
    );
    $this->assertEqual('foo', $opts->apiKey);
    $this->assertEqual(array(), $opts->headers);
  }

  public function testIdempotentKeyArray()
  {
    $opts = Stripe_RequestOptions::parse(
        array(
            'idempotency_key' => 'foo',
        )
    );
    $this->assertEqual(null, $opts->apiKey);
    $this->assertEqual(array('Idempotency-Key' => 'foo'), $opts->headers);
  }

  public function testKeyArray()
  {
    $opts = Stripe_RequestOptions::parse(
        array(
            'idempotency_key' => 'foo',
            'api_key' => 'foo'
        )
    );
    $this->assertEqual('foo', $opts->apiKey);
    $this->assertEqual(array('Idempotency-Key' => 'foo'), $opts->headers);
  }

  public function testWrongType()
  {
    $caught = false;
    try {
      $opts = Stripe_RequestOptions::parse(5);
    } catch (Stripe_Error $e) {
      $caught = true;
    }
    $this->assertTrue($caught);
  }
}
