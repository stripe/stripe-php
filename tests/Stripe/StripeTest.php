<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Stripe
 */
final class StripeTest extends \Stripe\TestCase
{
    use TestHelper;

    /** @var array */
    protected $orig;

    /**
     * @before
     */
    public function saveOriginalValues()
    {
        $this->orig = [
            'caBundlePath' => Stripe::$caBundlePath,
        ];
    }

    /**
     * @after
     */
    public function restoreOriginalValues()
    {
        Stripe::$caBundlePath = $this->orig['caBundlePath'];
    }

    public function testCABundlePathAccessors()
    {
        Stripe::setCABundlePath('path/to/ca/bundle');
        static::assertSame('path/to/ca/bundle', Stripe::getCABundlePath());
    }

    public function testAddBetaVersion()
    {
        Stripe::setApiVersion('2024-02-26');
        Stripe::addBetaVersion('feature_beta', 'v3');
        static::assertSame(Stripe::$apiVersion, '2024-02-26; feature_beta=v3');
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Stripe version header 2024-02-26; feature_beta=v3 already contains entry for beta feature_beta');
        Stripe::addBetaVersion('feature_beta', 'v1');
    }
}
