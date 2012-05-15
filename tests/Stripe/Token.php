<?php

namespace Stripe\Tests;

class TokenTest extends StripeTestCase
{
	public function testURLs()
	{
		$this->assertSame(\Stripe\Token::classUrl('\Stripe\Token'), '/tokens');		
		$token = new \Stripe\Token('abcd/efgh');		
		$this->assertSame($token->instanceUrl(), '/tokens/abcd%2Fefgh');
	}
}