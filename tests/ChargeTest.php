<?php

namespace Stripe;

class ChargeTest extends TestCase
{
    public function testUrls()
    {
        $this->assertSame(Charge::classUrl('Stripe\\Charge'), '/v1/charges');
        $charge = new Charge('abcd/efgh');
        $this->assertSame($charge->instanceUrl(), '/v1/charges/abcd%2Fefgh');
    }

    public function testCreate()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $c = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            )
        );
        $this->assertTrue($c->paid);
        $this->assertFalse($c->refunded);
    }

    public function testIdempotentCreate()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $c = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            ),
            array(
                'idempotency_key' => self::generateRandomString(),
            )
        );

        $this->assertTrue($c->paid);
        $this->assertFalse($c->refunded);
    }

    public function testRetrieve()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $c = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            )
        );
        $d = Charge::retrieve($c->id);
        $this->assertSame($d->id, $c->id);
    }

    public function testUpdateMetadata()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $charge = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            )
        );

        $charge->metadata['test'] = 'foo bar';
        $charge->save();

        $updatedCharge = Charge::retrieve($charge->id);
        $this->assertSame('foo bar', $updatedCharge->metadata['test']);
    }

    public function testUpdateMetadataAll()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $charge = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            )
        );

        $charge->metadata = array('test' => 'foo bar');
        $charge->save();

        $updatedCharge = Charge::retrieve($charge->id);
        $this->assertSame('foo bar', $updatedCharge->metadata['test']);
    }

    public function testMarkAsFraudulent()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $charge = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            )
        );

        $charge->refunds->create();
        $charge->markAsFraudulent();

        $updatedCharge = Charge::retrieve($charge->id);
        $this->assertSame(
            'fraudulent',
            $updatedCharge['fraud_details']['user_report']
        );
    }

    public function markAsSafe()
    {
        self::authorizeFromEnv();

        $card = array(
            'number' => '4242424242424242',
            'exp_month' => 5,
            'exp_year' => 2015
        );

        $charge = Charge::create(
            array(
                'amount' => 100,
                'currency' => 'usd',
                'card' => $card
            )
        );

        $charge->markAsSafe();

        $updatedCharge = Charge::retrieve($charge->id);
        $this->assertSame('safe', $updatedCharge['fraud_details']['user_report']);
    }
}
