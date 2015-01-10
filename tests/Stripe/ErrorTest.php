<?php

class Stripe_ErrorTest extends Stripe_TestCase
{
  public function testCreation()
  {
    try {
      throw new Stripe_Error(
          "hello",
          500,
          "{'foo':'bar'}",
          array('foo' => 'bar')
      );
      $this->fail("Did not raise error");
    } catch (Stripe_Error $e) {
      $this->assertSame("hello", $e->getMessage());
      $this->assertSame(500, $e->getHttpStatus());
      $this->assertSame("{'foo':'bar'}", $e->getHttpBody());
      $this->assertSame(array('foo' => 'bar'), $e->getJsonBody());
    }
  }
}
