<?php

class Stripe_TokenTest extends UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Stripe_Token::classUrl('Stripe_Token'), '/v1/tokens');
    $token = new Stripe_Token('abcd/efgh');
    $this->assertEqual($token->instanceUrl(), '/v1/tokens/abcd%2Fefgh');
  }
}