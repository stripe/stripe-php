<?php
namespace Stripe\Test;

use Stripe\Customer;
use Stripe\InvalidRequestError;
use Stripe\Charge;

class InvalidRequestErrorTest extends \UnitTestCase
{
  public function testInvalidObject()
  {
    authorizeFromEnv();
    try {
      Customer::retrieve('invalid');
    } catch (InvalidRequestError $e) {
      $this->assertEqual(404, $e->getHttpStatus());
    }
  }

  public function testBadData()
  {
    authorizeFromEnv();
    try {
      Charge::create();
    } catch (InvalidRequestError $e) {
      $this->assertEqual(400, $e->getHttpStatus());
    }
  }
}
