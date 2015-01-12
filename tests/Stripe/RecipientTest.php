<?php

class Stripe_RecipientTest extends Stripe_TestCase
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
    $this->assertSame($recipient->email, 'gdb@stripe.com');

    $stripeRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertSame($recipient->email, $stripeRecipient->email);
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
    $token = Stripe_Token::create(
        array("card" => array(
          "number" => "4000056655665556",
          "exp_month" => 5,
          "exp_year" => date('Y') + 3,
          "cvc" => "314"
        ))
    );

    $recipient = $this->createTestRecipient();
    $createdCard = $recipient->cards->create(array("card" => $token->id));
    $recipient->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $updatedCards = $updatedRecipient->cards->all();
    $this->assertSame(count($updatedCards["data"]), 1);

  }

  public function testRecipientUpdateCard()
  {
    $token = Stripe_Token::create(
        array("card" => array(
          "number" => "4000056655665556",
          "exp_month" => 5,
          "exp_year" => date('Y') + 3,
          "cvc" => "314"
        ))
    );

    $recipient = $this->createTestRecipient();
    $createdCard = $recipient->cards->create(array("card" => $token->id));
    $recipient->save();

    $createdCards = $recipient->cards->all();
    $this->assertSame(count($createdCards["data"]), 1);

    $card = $createdCards['data'][0];
    $card->name = "Jane Austen";
    $card->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $updatedCards = $updatedRecipient->cards->all();
    $this->assertSame($updatedCards["data"][0]->name, "Jane Austen");
  }

  public function testRecipientDeleteCard()
  {
    $token = Stripe_Token::create(
        array("card" => array(
          "number" => "4000056655665556",
          "exp_month" => 5,
          "exp_year" => date('Y') + 3,
          "cvc" => "314"
        ))
    );

    $recipient = $this->createTestRecipient();
    $createdCard = $recipient->cards->create(array("card" => $token->id));
    $recipient->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $updatedCards = $updatedRecipient->cards->all();
    $this->assertSame(count($updatedCards["data"]), 1);

    $deleteStatus =
      $updatedRecipient->cards->retrieve($createdCard->id)->delete();
    $this->assertTrue($deleteStatus->deleted);
    $updatedRecipient->save();

    $postDeleteRecipient = Stripe_Recipient::retrieve($recipient->id);
    $postDeleteCards = $postDeleteRecipient->cards->all();
    $this->assertSame(count($postDeleteCards["data"]), 0);
  }
}
