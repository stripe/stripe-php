<?php

namespace Stripe\Exception;

/**
 * @internal
 *
 * @covers \Stripe\Exception\SignatureVerificationException
 */
final class SignatureVerificationExceptionTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testGetters()
    {
        $e = SignatureVerificationException::factory('message', 'payload', 'sig_header');
        self::assertSame('message', $e->getMessage());
        self::assertSame('payload', $e->getHttpBody());
        self::assertSame('sig_header', $e->getSigHeader());
    }
}
