<?php

class Stripe_CustomerTest extends Stripe_TestCase
{
  public function testDeletion()
  {
    $customer = self::createTestCustomer();
    $customer->delete();

    $this->assertTrue($customer->deleted);
    $this->assertNull($customer['active_card']);
  }

  public function testSave()
  {
    $customer = self::createTestCustomer();

    $customer->email = 'gdb@stripe.com';
    $customer->save();
    $this->assertSame($customer->email, 'gdb@stripe.com');

    $stripeCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame($customer->email, $stripeCustomer->email);

    Stripe::setApiKey(null);
    $customer = Stripe_Customer::create(null, self::API_KEY);
    $customer->email = 'gdb@stripe.com';
    $customer->save();

    self::authorizeFromEnv();
    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame($updatedCustomer->email, 'gdb@stripe.com');
  }

  /**
   * @expectedException Stripe_InvalidRequestError
   */
  public function testBogusAttribute()
  {
    $customer = self::createTestCustomer();
    $customer->bogus = 'bogus';
    $customer->save();
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function testUpdateDescriptionEmpty()
  {
    $customer = self::createTestCustomer();
    $customer->description = '';
  }

  public function testUpdateDescriptionNull()
  {
    $customer = self::createTestCustomer(array('description' => 'foo bar'));
    $customer->description = NULL;

    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame(NULL, $updatedCustomer->description);
  }

  public function testUpdateMetadata()
  {
    $customer = self::createTestCustomer();

    $customer->metadata['test'] = 'foo bar';
    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame('foo bar', $updatedCustomer->metadata['test']);
  }

  public function testDeleteMetadata()
  {
    $customer = self::createTestCustomer();

    $customer->metadata = NULL;
    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame(0, count($updatedCustomer->metadata->keys()));
  }

  public function testUpdateSomeMetadata()
  {
    $customer = self::createTestCustomer();
    $customer->metadata['shoe size'] = '7';
    $customer->metadata['shirt size'] = 'XS';
    $customer->save();

    $customer->metadata['shoe size'] = '9';
    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame('XS', $updatedCustomer->metadata['shirt size']);
    $this->assertSame('9', $updatedCustomer->metadata['shoe size']);
  }

  public function testUpdateAllMetadata()
  {
    $customer = self::createTestCustomer();
    $customer->metadata['shoe size'] = '7';
    $customer->metadata['shirt size'] = 'XS';
    $customer->save();

    $customer->metadata = array('shirt size' => 'XL');
    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertSame('XL', $updatedCustomer->metadata['shirt size']);
    $this->assertFalse(isset($updatedCustomer->metadata['shoe size']));
  }

  /**
   * @expectedException Stripe_InvalidRequestError
   */
  public function testUpdateInvalidMetadata()
  {
    $customer = self::createTestCustomer();
    $customer->metadata = 'something';
    $customer->save();
  }

  public function testCancelSubscription()
  {
    $planID = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($planID);

    $customer = self::createTestCustomer(
        array(
            'plan' => $planID,
        )
    );

    $customer->cancelSubscription(array('at_period_end' => true));
    $this->assertSame($customer->subscription->status, 'active');
    $this->assertTrue($customer->subscription->cancel_at_period_end);
    $customer->cancelSubscription();
    $this->assertSame($customer->subscription->status, 'canceled');
  }

  public function testCustomerAddCard()
  {
    $token = Stripe_Token::create(
        array("card" => array(
          "number" => "4242424242424242",
          "exp_month" => 5,
          "exp_year" => date('Y') + 3,
          "cvc" => "314"
        ))
    );

    $customer = $this->createTestCustomer();
    $createdCard = $customer->cards->create(array("card" => $token->id));
    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $updatedCards = $updatedCustomer->cards->all();
    $this->assertSame(count($updatedCards["data"]), 2);

  }

  public function testCustomerUpdateCard()
  {
    $customer = $this->createTestCustomer();
    $customer->save();

    $cards = $customer->cards->all();
    $this->assertSame(count($cards["data"]), 1);

    $card = $cards['data'][0];
    $card->name = "Jane Austen";
    $card->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $updatedCards = $updatedCustomer->cards->all();
    $this->assertSame($updatedCards["data"][0]->name, "Jane Austen");
  }

  public function testCustomerDeleteCard()
  {
    $token = Stripe_Token::create(
        array("card" => array(
          "number" => "4242424242424242",
          "exp_month" => 5,
          "exp_year" => date('Y') + 3,
          "cvc" => "314"
        ))
    );

    $customer = $this->createTestCustomer();
    $createdCard = $customer->cards->create(array("card" => $token->id));
    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $updatedCards = $updatedCustomer->cards->all();
    $this->assertSame(count($updatedCards["data"]), 2);

    $deleteStatus =
      $updatedCustomer->cards->retrieve($createdCard->id)->delete();
    $this->assertTrue($deleteStatus->deleted);
    $updatedCustomer->save();

    $postDeleteCustomer = Stripe_Customer::retrieve($customer->id);
    $postDeleteCards = $postDeleteCustomer->cards->all();
    $this->assertSame(count($postDeleteCards["data"]), 1);
  }

}
