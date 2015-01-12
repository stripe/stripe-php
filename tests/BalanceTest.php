<?php

namespace Stripe;

class BalanceTest extends TestCase
{
    public function testRetrieve()
    {
        self::authorizeFromEnv();
        $d = Balance::retrieve();
        $this->assertSame($d->object, "balance");
        $this->assertTrue(Util::isList($d->available));
        $this->assertTrue(Util::isList($d->pending));
    }
}
