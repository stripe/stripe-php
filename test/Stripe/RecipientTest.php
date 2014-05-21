<?php

class Stripe_RecipientTest extends StripeTestCase
{
  public function testDeletion()
  {
    $recipient = self::createTestRecipient();
    $recipient->delete();

    $this->assertTrue($recipient->deleted);
  }

  public function testSave()
  {
    $recipient = self::createTestRecipient();

    $recipient->email = 'gdb@stripe.com';
    $recipient->save();
    $this->assertEqual($recipient->email, 'gdb@stripe.com');

    $stripeRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual($recipient->email, $stripeRecipient->email);
  }

  public function testBogusAttribute()
  {
    $recipient = self::createTestRecipient();
    $recipient->bogus = 'bogus';

    $caught = null;
    try {
      $recipient->save();
    } catch (Stripe_InvalidRequestError $exception) {
      $caught = $exception;
    }

    $this->assertTrue($caught instanceof Stripe_InvalidRequestError);
  }

  public function testRecipientAddCard()
  {
    $token = Stripe_Token::create(array(
      "card" => array(
        "number" => "4000056655665556",
        "exp_month" => 5,
        "exp_year" => 2015,
        "cvc" => "314"
      )
    ));

    $recipient = $this->createTestRecipient();
    $createdCard = $recipient->cards->create(array("card" => $token->id));
    $recipient->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual(count($updatedRecipient->cards->all()["data"]), 1);

  }

  public function testRecipientUpdateCard()
  {
    $token = Stripe_Token::create(array(
      "card" => array(
        "number" => "4000056655665556",
        "exp_month" => 5,
        "exp_year" => 2015,
        "cvc" => "314"
      )
    ));
    
    $recipient = $this->createTestRecipient();
    $createdCard = $recipient->cards->create(array("card" => $token->id));
    $recipient->save();

    $this->assertEqual(count($recipient->cards->all()["data"]), 1);

    $card = $recipient->cards->all()['data'][0];
    $card->name = "Jane Austen";
    $card->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual($updatedRecipient->cards->all()["data"][0]->name, "Jane Austen");
  }

  public function testRecipientDeleteCard()
  {
    $token = Stripe_Token::create(array(
      "card" => array(
        "number" => "4000056655665556",
        "exp_month" => 5,
        "exp_year" => 2015,
        "cvc" => "314"
      )
    ));

    $recipient = $this->createTestRecipient();
    $createdCard = $recipient->cards->create(array("card" => $token->id));
    $recipient->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual(count($updatedRecipient->cards->all()["data"]), 1);

    $deleteStatus = $updatedRecipient->cards->retrieve($createdCard->id)->delete();
    $this->assertEqual($deleteStatus->deleted, 1);
    $updatedRecipient->save();

    $postDeleteRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual(count($postDeleteRecipient->cards->all()["data"]), 0);
  }
}
