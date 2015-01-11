<?php
namespace Stripe;

class TokenTest extends \PHPUnit_Framework_TestCase
{
  public function testUrls()
  {
    $this->assertSame(Token::classUrl('Stripe\\Token'), '/v1/tokens');
    $token = new Token('abcd/efgh');
    $this->assertSame($token->instanceUrl(), '/v1/tokens/abcd%2Fefgh');
  }
}
