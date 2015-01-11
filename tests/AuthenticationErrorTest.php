<?php
namespace Stripe;

class AuthenticationErrorTest extends \PHPUnit_Framework_TestCase
{
  public function testInvalidCredentials()
  {
    Stripe::setApiKey('invalid');
    try {
      Customer::create();
    } catch (AuthenticationError $e) {
      $this->assertSame(401, $e->getHttpStatus());
    }
  }
}
