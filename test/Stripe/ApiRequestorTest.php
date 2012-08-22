<?php

class Stripe_ApiRequestorTest extends UnitTestCase
{
  public function testEncode()
  {
    $a = array('my' => 'value', 'that' => array('your' => 'example'), 'bar' => 1, 'baz' => null);
    $enc = Stripe_APIRequestor::encode($a);
    $this->assertEqual($enc, 'my=value&that%5Byour%5D=example&bar=1');

    $a = array('that' => array('your' => 'example', 'foo' => null));
    $enc = Stripe_APIRequestor::encode($a);
    $this->assertEqual($enc, 'that%5Byour%5D=example');
  }

  public function testEncodeObjects()
  {
    // We have to do some work here because this is normally
    // private. This is just for testing! Also it only works on PHP >=
    // 5.3
    if (version_compare(PHP_VERSION, '5.3.2', '>=')) {
      $reflector = new ReflectionClass('Stripe_APIRequestor');
      $method = $reflector->getMethod('_encodeObjects');
      $method->setAccessible(true);

      $a = array('customer' => new Stripe_Customer('abcd'));
      $enc = $method->invoke(null, $a);
      $this->assertEqual($enc, array('customer' => 'abcd'));
    }
  }
}
