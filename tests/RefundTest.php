<?php

namespace Stripe;

class RefundTest extends TestCase
{

    public function testCreate()
    {
        $charge = self::createTestCharge();
        $ref = $charge->refunds->create(array('amount' => 100));
        $this->assertSame(100, $ref->amount);
        $this->assertSame($charge->id, $ref->charge);
    }

    public function testUpdateAndRetrieve()
    {
        $charge = self::createTestCharge();
        $ref = $charge->refunds->create(array('amount' => 100));
        $ref->metadata["key"] = "value";
        $ref->save();
        $ref = $charge->refunds->retrieve($ref->id);
        $this->assertSame("value", $ref->metadata["key"], "value");
    }

    public function testList()
    {
        $charge = self::createTestCharge();
        $refA = $charge->refunds->create(array('amount' => 50));
        $refB = $charge->refunds->create(array('amount' => 50));

        $all = $charge->refunds->all();
        $this->assertSame(false, $all['has_more']);
        $this->assertSame(2, count($all->data));
        $this->assertSame($refB->id, $all->data[0]->id);
        $this->assertSame($refA->id, $all->data[1]->id);
    }

    public function testCreateForBitcoin()
    {
        self::authorizeFromEnv();

        $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");

        $charge = Charge::create(
            array(
                'amount' => $receiver->amount,
                'currency' => $receiver->currency,
                'description' => $receiver->description,
                'source' => $receiver->id
            )
        );

        $ref = $charge->refunds->create(
            array(
                'amount' => $receiver->amount,
                'refund_address' => 'ABCDEF'
            )
        );
        $this->assertSame($receiver->amount, $ref->amount);
        $this->assertNotNull($ref->id);
    }
}
