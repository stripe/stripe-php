<?php

namespace Stripe\Terminal;

/**
 * @internal
 * @covers \Stripe\Terminal\ConnectionToken
 */
final class ConnectionTokenTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = ConnectionToken::create();
        static::assertInstanceOf(\Stripe\Terminal\ConnectionToken::class, $resource);
    }
}
