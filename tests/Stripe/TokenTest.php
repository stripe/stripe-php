<?php

class Stripe_TokenTest extends Stripe_TestCase
{
  public function testUrls()
  {
    $this->assertSame(Stripe_Token::classUrl('Stripe_Token'), '/v1/tokens');
    $token = new Stripe_Token('abcd/efgh');
    $this->assertSame($token->instanceUrl(), '/v1/tokens/abcd%2Fefgh');
  }
}
