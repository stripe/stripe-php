<?php

namespace Stripe;

class TokenTest extends TestCase
{
    public function testUrls()
    {
        $this->assertSame(Token::classUrl(), '/v1/tokens');
        $token = new Token('abcd/efgh');
        $this->assertSame($token->instanceUrl(), '/v1/tokens/abcd%2Fefgh');
    }

    public function testNestedCardObject()
    {
        $token = Token::constructFrom(
            array(
                'id' => 'tok_foo',
                'object' => 'token',
                'card' => array(
                    'id' => 'card_foo',
                    'object' => 'card',
                ),
            ),
            new Util\RequestOptions()
        );
        $this->assertSame("Stripe\\Token", get_class($token));
        $this->assertSame("Stripe\\Card", get_class($token->card));
    }
}
