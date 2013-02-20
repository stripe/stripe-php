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

    $a = array('that' => 'example', 'foo' => array('bar', 'baz'));
    $enc = Stripe_APIRequestor::encode($a);
    $this->assertEqual($enc, 'that=example&foo%5B%5D=bar&foo%5B%5D=baz');

    $a = array('my' => 'value', 'that' => array('your' => array('cheese', 'whiz', null)), 'bar' => 1, 'baz' => null);
    $enc = Stripe_APIRequestor::encode($a);
    $this->assertEqual($enc, 'my=value&that%5Byour%5D%5B%5D=cheese&that%5Byour%5D%5B%5D=whiz&bar=1');
  }

  public function testUtf8()
  {
    // UTF-8 string
    $x = "\xc3\xa9";
    $this->assertEqual(Stripe_ApiRequestor::utf8($x), $x);

    // Latin-1 string
    $x = "\xe9";
    $this->assertEqual(Stripe_ApiRequestor::utf8($x), "\xc3\xa9");

    // Not a string
    $x = TRUE;
    $this->assertEqual(Stripe_ApiRequestor::utf8($x), $x);
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

      // Preserves UTF-8
      $v = array('customer' => "☃");
      $enc = $method->invoke(null, $v);
      $this->assertEqual($enc, $v);

      // Encodes latin-1 -> UTF-8
      $v = array('customer' => "\xe9");
      $enc = $method->invoke(null, $v);
      $this->assertEqual($enc, array('customer' => "\xc3\xa9"));
    }
  }
}
