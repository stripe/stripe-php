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
        $this->assertSame($s->keys(), ['foo']);
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
        $s = new StripeObject();
        $s->foo = 'a';

        $this->assertEquals('{"foo":"a"}', json_encode($s->__toArray()));
    }

    public function testReplaceNewNestedUpdatable()
    {
        $s = new StripeObject();

        $s->metadata = ['bar'];
        $this->assertSame($s->metadata, ['bar']);
        $s->metadata = ['baz', 'qux'];
        $this->assertSame($s->metadata, ['baz', 'qux']);
    }

    public function testSerializeParametersEmptyObject()
    {
        $obj = new StripeObject();
        $this->assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersOnNewObjectWithSubObject()
    {
        $obj = new StripeObject();
        $obj->metadata = ['foo' => 'bar'];
        $this->assertSame(['metadata' => ['foo' => 'bar']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnMoreComplexObject()
    {
        $obj = StripeObject::constructFrom([
            'metadata' => StripeObject::constructFrom([
                'bar' => null,
                'baz' => null,
            ], new Util\RequestOptions()),
        ], new Util\RequestOptions());
        $obj->metadata->bar = 'newbar';
        $this->assertSame(['metadata' => ['bar' => 'newbar']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArray()
    {
        $obj = StripeObject::constructFrom([
            'foo' => null,
        ], new Util\RequestOptions());
        $obj->foo = ['new-value'];
        $this->assertSame(['foo' => ['new-value']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatShortens()
    {
        $obj = StripeObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ], new Util\RequestOptions());
        $obj->foo = ['new-value'];
        $this->assertSame(['foo' => ['new-value']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatLengthens()
    {
        $obj = StripeObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ], new Util\RequestOptions());
        $obj->foo = array_fill(0, 4, 'new-value');
        $this->assertSame(['foo' => array_fill(0, 4, 'new-value')], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayOfHashes()
    {
        $obj = StripeObject::constructFrom([
            'additional_owners' => [
                StripeObject::constructFrom(['bar' => null], new Util\RequestOptions())
            ],
        ], new Util\RequestOptions());
        $obj->additional_owners[0]->bar = 'baz';
        $this->assertSame(['additional_owners' => [['bar' => 'baz']]], $obj->serializeParameters());
    }

    public function testSerializeParametersDoesNotIncludeUnchangedValues()
    {
        $obj = StripeObject::constructFrom([
            'foo' => null,
        ], new Util\RequestOptions());
        $this->assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersOnReplacedAttachedObject()
    {
        $obj = StripeObject::constructFrom([
            'metadata' => AttachedObject::constructFrom([
                'bar' => 'foo',
            ], new Util\RequestOptions()),
        ], new Util\RequestOptions());
        $obj->metadata = ['baz' => 'foo'];
        $this->assertSame(['metadata' => ['bar' => '', 'baz' => 'foo']], $obj->serializeParameters());
    }
}
