<?php

namespace Stripe;

class SourceTest extends TestCase
{
    public function testSave()
    {
        Stripe::setApiKey('sk_test_JieJALRz7rPz7boV17oMma7a');

        $s = Source::create(
            array(
                'type' => 'bitcoin',
                'currency' => 'usd',
                'amount' => '100',
                'owner[email]' => 'gdb@stripe.com',
            )
        );

        $this->assertSame('bitcoin', $s->type);
        $source = Source::retrieve($s->id);
        $this->assertSame(100, $source->amount);
    }
}
