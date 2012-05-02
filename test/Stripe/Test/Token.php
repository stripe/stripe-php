<?php
namespace Stripe\Test;

use Stripe\Token;

class TokenTest extends \UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Token::classUrl('Stripe_Token'), '/tokens');
    $token = new Token('abcd/efgh');
    $this->assertEqual($token->instanceUrl(), '/tokens/abcd%2Fefgh');
  }
}