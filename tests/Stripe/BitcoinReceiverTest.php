<?php

namespace Stripe;

class BitcoinReceiverTest extends TestCase
{
    public function testUrls()
    {
        $classUrl = BitcoinReceiver::classUrl('Stripe_BitcoinReceiver');
        $this->assertSame($classUrl, '/v1/bitcoin/receivers');
        $receiver = new BitcoinReceiver('abcd/efgh');
        $instanceUrl = $receiver->instanceUrl();
        $this->assertSame($instanceUrl, '/v1/bitcoin/receivers/abcd%2Fefgh');
    }

    //
    // Note that there are no tests of consequences in here. The Bitcoin
    // endpoints have been deprecated in favor of the generic sources API. The
    // BitcoinReceiver class has been left in place for some backwards
    // compatibility, but all users should be migrating off of it. The tests
    // have been removed because we no longer have the API endpoints required
    // to run them.
    //
    // [1] https://stripe.com/docs/sources
    //
}
