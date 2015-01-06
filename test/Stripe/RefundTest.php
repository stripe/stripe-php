<?php

class Stripe_RefundTest extends StripeTestCase
{

  public function testCreate()
  {
    $charge = self::createTestCharge();
    $ref = $charge->refunds->create(array('amount' => 100));
    $this->assertEqual(100, $ref->amount);
    $this->assertEqual($charge->id, $ref->charge);
  }

  public function testUpdateAndRetrieve()
  {
    $charge = self::createTestCharge();
    $ref = $charge->refunds->create(array('amount' => 100));
    $ref->metadata["key"] = "value";
    $ref->save();
    $ref = $charge->refunds->retrieve($ref->id);
    $this->assertEqual("value", $ref->metadata["key"], "value");
  }

  public function testList()
  {
    $charge = self::createTestCharge();
    $refA = $charge->refunds->create(array('amount' => 50));
    $refB = $charge->refunds->create(array('amount' => 50));

    $all = $charge->refunds->all();
    $this->assertEqual(false, $all['has_more']);
    $this->assertEqual(2, count($all->data));
    $this->assertEqual($refB->id, $all->data[0]->id);
    $this->assertEqual($refA->id, $all->data[1]->id);
  }

  public function testCreateForBitcoin()
  {
    self::authorizeFromEnv();

    $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");

    $charge = Stripe_Charge::create(
        array(
          "amount" => $receiver->amount,
          "currency" => $receiver->currency,
          "description" => $receiver->description,
          'source' => $receiver->id
        )
    );

    $ref = $charge->refunds->create(
        array(
          'amount' => $receiver->amount,
          'refund_address' => 'ABCDEF'
        )
    );
    $this->assertEqual($receiver->amount, $ref->amount);
    $this->assertNotNull($ref->id);
  }
}
