<?php
namespace Stripe\Test;

use Stripe\Charge;
use Stripe\CardError;

class CardErrorTest extends \UnitTestCase
{
  public function testDecline()
  {
    authorizeFromEnv();
    try {
      Charge::create(array(
        'amount' => 100,
        'currency' => 'usd',
        'card' => array(
          'number' => '4000000000000002',
          'exp_month' => '3',
          'exp_year' => '2020'
        )
      ));
    } catch (CardError $e) {
      $this->assertEqual(402, $e->getHttpStatus());
      $body = $e->getJsonBody();
      $this->assertTrue($body['error']);
    }
  }
}
