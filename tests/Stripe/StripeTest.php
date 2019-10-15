<?php

namespace Stripe;

class StripeTest extends TestCase
{
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
        $this->assertEquals('path/to/ca/bundle', Stripe::getCABundlePath());
    }

    public function testInformCallBack()
    {
        $test = 0;

        Stripe::setRetryInformCallback(function ($arg) use (&$test) {
            $test = 3;
        });

        $this->assertTrue(is_callable(Stripe::getRetryInformCallback()));

        $stripeReflection = new \ReflectionClass(Stripe::class);
        $informMethod = $stripeReflection->getMethod('informOfRetry');
        $informMethod->setAccessible(true);
        $informMethod->invoke(null, 1);

        $this->assertEquals(3, $test);
    }
}
