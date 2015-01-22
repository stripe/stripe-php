<?php

class Stripe_BitcoinReceiverTest extends StripeTestCase
{
  public function testUrls()
  {
    $classUrl = Stripe_BitcoinReceiver::classUrl('Stripe_BitcoinReceiver');
    $this->assertEqual($classUrl, '/v1/bitcoin/receivers');
    $receiver = new Stripe_BitcoinReceiver('abcd/efgh');
    $instanceUrl = $receiver->instanceUrl();
    $this->assertEqual($instanceUrl, '/v1/bitcoin/receivers/abcd%2Fefgh');
  }

  public function testCreate()
  {
    self::authorizeFromEnv();

    $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");

    $this->assertEqual(100, $receiver->amount);
    $this->assertNotNull($receiver->id);
  }

  public function testRetrieve()
  {
    self::authorizeFromEnv();

    $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");

    $r = Stripe_BitcoinReceiver::retrieve($receiver->id);
    $this->assertEqual($receiver->id, $r->id);

    $this->assertIsA($r->transactions->data[0], 'Stripe_BitcoinTransaction');
  }

  public function testList()
  {
    self::authorizeFromEnv();

    $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");

    $receivers = Stripe_BitcoinReceiver::all();
    $this->assertTrue(count($receivers->data) > 0);
  }

  public function testListTransactions()
  {
    self::authorizeFromEnv();

    $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");
    $this->assertEqual(0, count($receiver->transactions->data));

    $transactions = $receiver->transactions->all(array("limit" => 1));
    $this->assertEqual(1, count($transactions->data));
  }
}
