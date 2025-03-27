<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Stripe
 */
final class StripeTest extends TestCase
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
        self::assertSame('path/to/ca/bundle', Stripe::getCABundlePath());
    }

    public function testAddBetaVersion()
    {
        Stripe::setApiVersion('2024-02-26');
        Stripe::addBetaVersion('feature_beta', 'v3');
        self::assertSame(Stripe::$apiVersion, '2024-02-26; feature_beta=v3');

        // adding the same version should be a no-op
        Stripe::addBetaVersion('feature_beta', 'v3');
        self::assertSame(Stripe::$apiVersion, '2024-02-26; feature_beta=v3');

        // adding a higher version should use the higher version
        Stripe::addBetaVersion('feature_beta', 'v5');
        self::assertSame(Stripe::$apiVersion, '2024-02-26; feature_beta=v5');

        // adding a lower version should be a no-op
        Stripe::addBetaVersion('feature_beta', 'v2');
        self::assertSame(Stripe::$apiVersion, '2024-02-26; feature_beta=v5');

        // adding another beta will append
        Stripe::addBetaVersion('another_feature_beta', 'v2');
        self::assertSame(Stripe::$apiVersion, '2024-02-26; feature_beta=v5; another_feature_beta=v2');

    }
}
