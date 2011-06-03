<?php

class Stripe_ApiRequestorTest extends UnitTestCase
{
  public function testEncode()
  {
    $a = array('my' => 'value', 'that' => array('your' => 'example'), 'bar' => 1, 'baz' => null);
    $enc = Stripe_APIRequestor::encode($a);
    $this->assertEqual($enc, 'my=value&that%5Byour%5D=example&bar=1');
  }
}
