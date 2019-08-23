<?php

namespace Stripe\Exception;

class SignatureVerificationExceptionTest extends \Stripe\TestCase
{
    public function testGetters()
    {
        $e = SignatureVerificationException::factory('message', 'payload', 'sig_header');
        $this->assertSame('message', $e->getMessage());
        $this->assertSame('payload', $e->getHttpBody());
        $this->assertSame('sig_header', $e->getSigHeader());
    }
}
