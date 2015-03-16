<?php

namespace Stripe;

class AccountTest extends TestCase
{
    public function testBasicRetrieve()
    {
        self::authorizeFromEnv();
        $d = Account::retrieve();
        $this->assertSame($d->id, "cuD9Rwx8pgmRZRpVe02lsuR9cwp2Bzf7");
        $this->assertSame($d->email, "test+bindings@stripe.com");
        // @codingStandardsIgnoreStart
        $this->assertSame($d->charges_enabled, false);
        $this->assertSame($d->details_submitted, false);
        // @codingStandardsIgnoreEnd
    }

    public function testIDRetrieve()
    {
        self::authorizeFromEnv();
        $d = Account::retrieve('cuD9Rwx8pgmRZRpVe02lsuR9cwp2Bzf7');
        $this->assertSame($d->id, "cuD9Rwx8pgmRZRpVe02lsuR9cwp2Bzf7");
        $this->assertSame($d->email, "test+bindings@stripe.com");
    }

    public function testCreate()
    {
        self::authorizeFromEnv();
        $d = Account::create(array(
            'managed' => true
        ));
    }

    public function testUpdateLegalEntity()
    {
        self::authorizeFromEnv();
        $d = Account::create(array('managed' => true));
        $id = $d->id;

        $d->legal_entity->first_name = 'Bob';
        $d->save();

        $d = Account::retrieve($id);
        $this->assertSame('Bob', $d->legal_entity->first_name);
    }

    public function testUpdateAdditionalOwners()
    {
        self::authorizeFromEnv();
        $d = Account::create(array('managed' => true));
        $id = $d->id;

        $d->legal_entity->additional_owners = array(array('first_name' => 'Bob'));
        $d->save();

        $d = Account::retrieve($id);
        $this->assertSame(1, count($d->legal_entity->additional_owners));
        $this->assertSame('Bob', $d->legal_entity->additional_owners[0]->first_name);

        $d->legal_entity->additional_owners[0]->last_name = 'Smith';
        $d->save();

        $d = Account::retrieve($id);
        $this->assertSame(1, count($d->legal_entity->additional_owners));
        $this->assertSame('Smith', $d->legal_entity->additional_owners[0]->last_name);
    }
}
