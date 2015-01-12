<?php

namespace Stripe;

class InvalidRequestErrorTest extends TestCase
{
  public function testInvalidObject()
  {
    self::authorizeFromEnv();
    try {
      Customer::retrieve('invalid');
    } catch (InvalidRequestError $e) {
      $this->assertSame(404, $e->getHttpStatus());
    }
  }

  public function testBadData()
  {
    self::authorizeFromEnv();
    try {
      Charge::create();
    } catch (InvalidRequestError $e) {
      $this->assertSame(400, $e->getHttpStatus());
    }
  }
}
