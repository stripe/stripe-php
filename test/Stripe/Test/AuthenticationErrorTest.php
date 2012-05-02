<?php
namespace Stripe\Test;

use Stripe\Customer;
use Stripe\Base;
use Stripe\AuthenticationError;

class AuthenticationErrorTest extends \UnitTestCase
{
  public function testInvalidCredentials()
  {
    Base::setApiKey('invalid');
    try {
      Customer::create();
    } catch (AuthenticationError $e) {
      $this->assertEqual(401, $e->getHttpStatus());
    }
  }
}
