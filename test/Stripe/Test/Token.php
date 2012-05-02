<?php

class Stripe_TokenTest extends UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Stripe_Token::classUrl('Stripe_Token'), '/tokens');
    $token = new Stripe_Token('abcd/efgh');
    $this->assertEqual($token->instanceUrl(), '/tokens/abcd%2Fefgh');
  }
}