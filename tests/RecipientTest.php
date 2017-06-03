<?php

namespace Stripe;

class RecipientTest extends TestCase
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

        $stripeRecipient = Recipient::retrieve($recipient->id);
        $this->assertSame($recipient->email, $stripeRecipient->email);
    }

    /**
     * @expectedException Stripe\Error\InvalidRequest
     */
    public function testBogusAttribute()
    {
        $recipient = self::createTestRecipient();
        $recipient->bogus = 'bogus';
        $recipient->save();
    }

    public function testRecipientAddCard()
    {
        $recipient = $this->createTestRecipient();
        $createdCard = $recipient->cards->create(array("card" => 'tok_visa_debit'));
        $recipient->save();

        $updatedRecipient = Recipient::retrieve($recipient->id);
        $updatedCards = $updatedRecipient->cards->all();
        $this->assertSame(count($updatedCards["data"]), 1);
    }

    public function testRecipientUpdateCard()
    {
        $recipient = $this->createTestRecipient();
        $createdCard = $recipient->cards->create(array("card" => 'tok_visa_debit'));
        $recipient->save();

        $createdCards = $recipient->cards->all();
        $this->assertSame(count($createdCards["data"]), 1);

        $card = $createdCards['data'][0];
        $card->name = "Jane Austen";
        $card->save();

        $updatedRecipient = Recipient::retrieve($recipient->id);
        $updatedCards = $updatedRecipient->cards->all();
        $this->assertSame($updatedCards["data"][0]->name, "Jane Austen");
    }

    public function testRecipientDeleteCard()
    {
        $recipient = $this->createTestRecipient();
        $createdCard = $recipient->cards->create(array("card" => 'tok_visa_debit'));
        $recipient->save();

        $updatedRecipient = Recipient::retrieve($recipient->id);
        $updatedCards = $updatedRecipient->cards->all();
        $this->assertSame(count($updatedCards["data"]), 1);

        $deleteStatus =
        $updatedRecipient->cards->retrieve($createdCard->id)->delete();
        $this->assertTrue($deleteStatus->deleted);
        $updatedRecipient->save();

        $postDeleteRecipient = Recipient::retrieve($recipient->id);
        $postDeleteCards = $postDeleteRecipient->cards->all();
        $this->assertSame(count($postDeleteCards["data"]), 0);
    }
}
