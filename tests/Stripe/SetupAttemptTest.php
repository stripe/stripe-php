<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\SetupAttempt
 */
final class SetupAttemptTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/setup_attempts'
        );
        $resources = SetupAttempt::all([
            'setup_intent' => 'si_123',
        ]);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\SetupAttempt::class, $resources->data[0]);
    }
}
