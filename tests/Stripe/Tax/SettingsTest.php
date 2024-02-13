<?php

namespace Stripe\Tax;

/**
 * @internal
 * @covers \Stripe\Terminal\ConnectionToken
 */
final class SettingsTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testIsUpdateable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tax/settings'
        );
        $resource = Settings::update([
            'defaults' => [
                'tax_behavior' => 'exclusive',
            ],
        ]);
        static::assertInstanceOf(\Stripe\Tax\Settings::class, $resource);
    }
}
