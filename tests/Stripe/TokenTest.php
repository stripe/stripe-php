<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Token
 */
final class TokenTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'tok_123';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tokens/' . self::TEST_RESOURCE_ID
        );
        $resource = Token::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Token::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tokens'
        );
        $resource = Token::create(['card' => 'tok_visa']);
        self::assertInstanceOf(Token::class, $resource);
    }
}
