<?php
namespace Stripe\Test;

use Stripe\ApiRequestor;

class Stripe_ApiRequestorTest extends \UnitTestCase
{
  public function testEncode()
  {
    $a = array('my' => 'value', 'that' => array('your' => 'example'), 'bar' => 1, 'baz' => null);
    $enc = APIRequestor::encode($a);
    $this->assertEqual($enc, 'my=value&that%5Byour%5D=example&bar=1');

    $a = array('that' => array('your' => 'example', 'foo' => null));
    $enc = APIRequestor::encode($a);
    $this->assertEqual($enc, 'that%5Byour%5D=example');
  }
}
