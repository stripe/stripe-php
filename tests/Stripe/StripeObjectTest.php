<?php

namespace Stripe;

class StripeObjectTest extends TestCase
{
    public function testArrayAccessorsSemantics()
    {
        $s = new StripeObject();
        $s['foo'] = 'a';
        $this->assertSame($s['foo'], 'a');
        $this->assertTrue(isset($s['foo']));
        unset($s['foo']);
        $this->assertFalse(isset($s['foo']));
    }

    public function testNormalAccessorsSemantics()
    {
        $s = new StripeObject();
        $s->foo = 'a';
        $this->assertSame($s->foo, 'a');
        $this->assertTrue(isset($s->foo));
        unset($s->foo);
        $this->assertFalse(isset($s->foo));
    }

    public function testArrayAccessorsMatchNormalAccessors()
    {
        $s = new StripeObject();
        $s->foo = 'a';
        $this->assertSame($s['foo'], 'a');

        $s['bar'] = 'b';
        $this->assertSame($s->bar, 'b');
    }

    public function testKeys()
    {
        $s = new StripeObject();
        $s->foo = 'a';
        $this->assertSame($s->keys(), array('foo'));
    }

    public function testToArray()
    {
        $s = new StripeObject();
        $s->foo = 'a';

        $converted = $s->__toArray();

        $this->assertInternalType('array', $converted);
        $this->assertArrayHasKey('foo', $converted);
        $this->assertEquals('a', $converted['foo']);
    }

    public function testRecursiveToArray()
    {
        $s = new StripeObject();
        $z = new StripeObject();

        $s->child = $z;
        $z->foo = 'a';

        $converted = $s->__toArray(true);

        $this->assertInternalType('array', $converted);
        $this->assertArrayHasKey('child', $converted);
        $this->assertInternalType('array', $converted['child']);
        $this->assertArrayHasKey('foo', $converted['child']);
        $this->assertEquals('a', $converted['child']['foo']);
    }

    public function testNonexistentProperty()
    {
        $s = new StripeObject();
        $this->assertNull($s->nonexistent);
    }

    public function testPropertyDoesNotExists()
    {
        $s = new StripeObject();
        $this->assertNull($s['nonexistent']);
    }

    public function testJsonEncode()
    {
        // We can only JSON encode our objects in PHP 5.4+. 5.3 must use ->__toJSON()
        if (version_compare(phpversion(), '5.4.0', '<')) {
            return;
        }

        $s = new StripeObject();
        $s->foo = 'a';

        $this->assertEquals('{"foo":"a"}', json_encode($s->__toArray()));
    }

    public function testReplaceNewNestedUpdatable()
    {
        $s = new StripeObject();

        $s->metadata = array('bar');
        $this->assertSame($s->metadata, array('bar'));
        $s->metadata = array('baz', 'qux');
        $this->assertSame($s->metadata, array('baz', 'qux'));
    }

    public function testSerializeParametersEmptyObject()
    {
        $obj = new StripeObject();
        $this->assertSame(array(), $obj->serializeParameters());
    }

    public function testSerializeParametersOnNewObjectWithSubObject()
    {
        $obj = new StripeObject();
        $obj->metadata = array('foo' => 'bar');
        $this->assertSame(array('metadata' => array('foo' => 'bar')), $obj->serializeParameters());
    }

    public function testSerializeParametersOnMoreComplexObject()
    {
        $obj = StripeObject::constructFrom(array(
            'metadata' => StripeObject::constructFrom(array(
                'bar' => null,
                'baz' => null,
            ), new Util\RequestOptions()),
        ), new Util\RequestOptions());
        $obj->metadata->bar = 'newbar';
        $this->assertSame(array('metadata' => array('bar' => 'newbar')), $obj->serializeParameters());
    }

    public function testSerializeParametersOnArray()
    {
        $obj = StripeObject::constructFrom(array(
            'foo' => null,
        ), new Util\RequestOptions());
        $obj->foo = array('new-value');
        $this->assertSame(array('foo' => array('new-value')), $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatShortens()
    {
        $obj = StripeObject::constructFrom(array(
            'foo' => array('0-index', '1-index', '2-index'),
        ), new Util\RequestOptions());
        $obj->foo = array('new-value');
        $this->assertSame(array('foo' => array('new-value')), $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatLengthens()
    {
        $obj = StripeObject::constructFrom(array(
            'foo' => array('0-index', '1-index', '2-index'),
        ), new Util\RequestOptions());
        $obj->foo = array_fill(0, 4, 'new-value');
        $this->assertSame(array('foo' => array_fill(0, 4, 'new-value')), $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayOfHashes()
    {
        $obj = StripeObject::constructFrom(array(
            'additional_owners' => array(
                StripeObject::constructFrom(array('bar' => null), new Util\RequestOptions())
            ),
        ), new Util\RequestOptions());
        $obj->additional_owners[0]->bar = 'baz';
        $this->assertSame(array('additional_owners' => array(array('bar' => 'baz'))), $obj->serializeParameters());
    }

    public function testSerializeParametersDoesNotIncludeUnchangedValues()
    {
        $obj = StripeObject::constructFrom(array(
            'foo' => null,
        ), new Util\RequestOptions());
        $this->assertSame(array(), $obj->serializeParameters());
    }

    public function testSerializeParametersOnReplacedAttachedObject()
    {
        $obj = StripeObject::constructFrom(array(
            'metadata' => AttachedObject::constructFrom(array(
                'bar' => 'foo',
            ), new Util\RequestOptions()),
        ), new Util\RequestOptions());
        $obj->metadata = array('baz' => 'foo');
        $this->assertSame(array('metadata' => array('bar' => '', 'baz' => 'foo')), $obj->serializeParameters());
    }
}
