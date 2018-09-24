<?php

namespace Stripe\Terminal;

class ConnectionTokenTest extends \Stripe\TestCase
{
    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = ConnectionToken::create();
        $this->assertInstanceOf("Stripe\\Terminal\\ConnectionToken", $resource);
    }
}
