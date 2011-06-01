<?php

require_once('simpletest/autorun.php');
require_once(dirname(__FILE__) . '/../src/stripe.php');

function authorizeFromEnv() {
  $apiKey = getenv('STRIPE_API_KEY');
  if (!$apiKey)
    throw new StripeError('You need to set STRIPE_API_KEY');
  Stripe::$apiKey = $apiKey;
}


class TestStripeUtil extends UnitTestCase {
  public function testIsList() {
    $list = array(5, 'nstaoush', array());
    $this->assertTrue(StripeUtil::isList($list));

    $notlist = array(5, 'nstaoush', array(), 'bar' => 'baz');
    $this->assertFalse(StripeUtil::isList($notlist));
  }
}

class TestStripeAPIRequestor extends UnitTestCase {
  public function testEncode() {
    $a = array('my' => 'value', 'that' => array('your' => 'example'), 'bar' => 1, 'baz' => null);
    $enc = StripeAPIRequestor::encode($a);
    $this->assertEqual($enc, 'my=value&that%5Byour%5D=example&bar=1');
  }
}

class TestStripeObject extends UnitTestCase {
  public function testArrayAccessorsSemantics() {
    $s = new StripeObject();
    $s['foo'] = 'a';
    $this->assertEqual($s['foo'], 'a');
    $this->assertTrue(isset($s['foo']));
    unset($s['foo']);
    $this->assertFalse(isset($s['foo']));
  }

  public function testNormalAccessorsSemantics() {
    $s = new StripeObject();
    $s->foo = 'a';
    $this->assertEqual($s->foo, 'a');
    $this->assertTrue(isset($s->foo));
    unset($s->foo);
    $this->assertFalse(isset($s->foo));
  }

  public function testArrayAccessorsMatchNormalAccessors() {
    $s = new StripeObject();
    $s->foo = 'a';
    $this->assertEqual($s['foo'], 'a');

    $s['bar'] = 'b';
    $this->assertEqual($s->bar, 'b');
  }

  public function testToString() {
    $s = new StripeObject();
    $s->foo = 'a';
    $s->bar = 'b';
    $this->assertEqual("$s", "<StripeObject bar=b (unsaved), foo=a (unsaved)>");

    $s->id = '12345';
    $this->assertEqual("$s", "<StripeObject[12345] bar=b (unsaved), foo=a (unsaved)>");

    $t = new StripeObject();
    $t->id = 'test';
    $t->bar = 'bar';
    $s->baz = $t;
    $this->assertEqual("$s", "<StripeObject[12345] bar=b (unsaved), baz=<StripeObject[test] ...> (unsaved), foo=a (unsaved)>");
  }
}

class TestCharge extends UnitTestCase {
  public function testUrls() {
    $this->assertEqual(StripeCharge::classUrl(), '/charges');
    $charge = new StripeCharge('abcd/efgh');
    $this->assertEqual($charge->instanceUrl(), '/charges/abcd%2Fefgh');
  }

  public function testToString() {
    $charge = new StripeCharge('a');
    $this->assertEqual("$charge", "<StripeCharge[a] (no attributes)>");
  }

  public function testCreate() {
    authorizeFromEnv();
    $c = StripeCharge::create(array('amount' => 100,
				    'currency' => 'usd',
				    'card' => array('number' => 4242424242424242,
						    'exp_month' => 5,
						    'exp_year' => 2015)));
    $this->assertTrue($c->paid);
    $this->assertFalse($c->refunded);
  }
}

class TestCustomer extends UnitTestCase {
  public function testDeletion() {
    authorizeFromEnv();
    $c = StripeCustomer::create(array('amount' => 100,
				      'currency' => 'usd',
				      'card' => array('number' => 4242424242424242,
						      'exp_month' => 5,
						      'exp_year' => 2015)));
    $c->delete();
    $this->assertTrue($c->deleted);
    $this->assertNull($c['active_card']);
  }
}

?>