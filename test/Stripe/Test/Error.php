<?php
namespace Stripe\Test;

use Stripe\Error;

class ErrorTest extends \UnitTestCase
{
  public function testCreation()
  {
    try {
      throw new Error("hello", 500, "{'foo':'bar'}", array('foo' => 'bar'));
    } catch (Error $e) {
      $this->assertEqual("hello", $e->getMessage());
      $this->assertEqual(500, $e->getHttpStatus());
      $this->assertEqual("{'foo':'bar'}", $e->getHttpBody());
      $this->assertEqual(array('foo' => 'bar'), $e->getJsonBody());
    }
  }
}