<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\SetupAttempt
 */
final class SetupAttemptTest extends TestCase
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
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(SetupAttempt::class, $resources->data[0]);
    }
}
