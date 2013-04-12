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

    $recipient2 = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual($recipient->email, $recipient2->email);
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
}
