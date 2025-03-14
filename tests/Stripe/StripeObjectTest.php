<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\StripeObject
 */
final class StripeObjectTest extends TestCase
{
    use TestHelper;

    /** @var \ReflectionMethod */
    private $deepCopyReflector;

    /** @var \ReflectionProperty */
    private $optsReflector;

    /** @var \ReflectionProperty */
    private $retrieveOptionsReflector;

    /**
     * @before
     */
    public function setUpReflectors()
    {
        // Sets up reflectors needed by some tests to access protected or
        // private attributes.

        // This is used to invoke the `deepCopy` protected function
        $this->deepCopyReflector = new \ReflectionMethod(StripeObject::class, 'deepCopy');
        $this->deepCopyReflector->setAccessible(true);

        // This is used to access the `_opts` protected variable
        $this->optsReflector = new \ReflectionProperty(StripeObject::class, '_opts');
        $this->optsReflector->setAccessible(true);

        // This is used to access the `_retrieveOptions` protected variable
        $this->retrieveOptionsReflector = new \ReflectionProperty(StripeObject::class, '_retrieveOptions');
        $this->retrieveOptionsReflector->setAccessible(true);
    }

    public function testArrayAccessorsSemantics()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s['foo'] = 'a';
        self::assertSame($s['foo'], 'a');
        self::assertTrue(isset($s['foo']));
        unset($s['foo']);
        self::assertFalse(isset($s['foo']));
    }

    public function testNormalAccessorsSemantics()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = 'a';
        self::assertSame($s->foo, 'a');
        self::assertTrue(isset($s->foo));
        $s->foo = null;
        self::assertFalse(isset($s->foo));
    }

    public function testArrayAccessorsMatchNormalAccessors()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = 'a';
        self::assertSame($s['foo'], 'a');

        $s['bar'] = 'b';
        self::assertSame($s->bar, 'b');
    }

    public function testCount()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        self::assertCount(0, $s);

        $s['key1'] = 'value1';
        self::assertCount(1, $s);

        $s['key2'] = 'value2';
        self::assertCount(2, $s);

        unset($s['key1']);
        self::assertCount(1, $s);
    }

    public function testKeys()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = 'bar';
        self::assertSame($s->keys(), ['foo']);
    }

    public function testValues()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = 'bar';
        self::assertSame($s->values(), ['bar']);
    }

    public function testToArray()
    {
        $array = [
            'foo' => 'a',
            'list' => [1, 2, 3],
            'null' => null,
            'metadata' => [
                'key' => 'value',
                1 => 'one',
            ],
        ];
        $s = StripeObject::constructFrom($array);

        $converted = $s->toArray();

        self::compatAssertIsArray($converted);
        self::assertSame($array, $converted);
    }

    public function testToArrayRecursive()
    {
        // deep nested associative array (when contained in an indexed array)
        // or StripeObject
        $nestedArray = ['id' => 7, 'foo' => 'bar'];
        $nested = StripeObject::constructFrom($nestedArray);

        $obj = StripeObject::constructFrom([
            'id' => 1,
            // simple associative array that contains a StripeObject to help us
            // test deep recursion
            'nested' => ['object' => 'list', 'data' => [$nested]],
            'list' => [$nested],
        ]);

        $expected = [
            'id' => 1,
            'nested' => ['object' => 'list', 'data' => [$nestedArray]],
            'list' => [$nestedArray],
        ];

        self::assertSame($expected, $obj->toArray());
    }

    public function testNonexistentProperty()
    {
        $capture = \tmpfile();
        $origErrorLog = \ini_set('error_log', \stream_get_meta_data($capture)['uri']);

        try {
            /** @var mixed $s */
            $s = new StripeObject();
            self::assertNull($s->nonexistent);

            self::compatAssertMatchesRegularExpression(
                '/Stripe Notice: Undefined property of Stripe\\\StripeObject instance: nonexistent/',
                \stream_get_contents($capture)
            );
        } finally {
            \ini_set('error_log', $origErrorLog);
            \fclose($capture);
        }
    }

    public function testPropertyDoesNotExists()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        self::assertNull($s['nonexistent']);
    }

    public function testJsonEncode()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = 'a';

        self::assertSame('{"foo":"a"}', \json_encode($s));
    }

    public function testToString()
    {
        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = 'a';

        $string = (string) $s;
        $expected = <<<'EOS'
Stripe\StripeObject JSON: {
    "foo": "a"
}
EOS;
        self::assertSame($expected, $string);
    }

    public function testReplaceNewNestedUpdatable()
    {
        /** @var mixed $s */
        $s = new StripeObject();

        $s->metadata = ['bar'];
        self::assertSame($s->metadata, ['bar']);
        $s->metadata = ['baz', 'qux'];
        self::assertSame($s->metadata, ['baz', 'qux']);
    }

    public function testSetPermanentAttribute()
    {
        $this->expectException(\InvalidArgumentException::class);

        /** @var mixed $s */
        $s = new StripeObject();
        $s->id = 'abc_123';
    }

    public function testSetEmptyStringValue()
    {
        $this->expectException(\InvalidArgumentException::class);

        /** @var mixed $s */
        $s = new StripeObject();
        $s->foo = '';
    }

    public function testSerializeParametersOnEmptyObject()
    {
        $obj = StripeObject::constructFrom([]);
        self::assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersOnNewObjectWithSubObject()
    {
        /** @var mixed $obj */
        $obj = new StripeObject();
        $obj->metadata = ['foo' => 'bar'];
        self::assertSame(['metadata' => ['foo' => 'bar']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnBasicObject()
    {
        $obj = StripeObject::constructFrom(['foo' => null]);
        $obj->updateAttributes(['foo' => 'bar']);
        self::assertSame(['foo' => 'bar'], $obj->serializeParameters());
    }

    public function testSerializeParametersOnMoreComplexObject()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'foo' => StripeObject::constructFrom([
                'bar' => null,
                'baz' => null,
            ]),
        ]);
        $obj->foo->bar = 'newbar';
        self::assertSame(['foo' => ['bar' => 'newbar']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArray()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'foo' => null,
        ]);
        $obj->foo = ['new-value'];
        self::assertSame(['foo' => ['new-value']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatShortens()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ]);
        $obj->foo = ['new-value'];
        self::assertSame(['foo' => ['new-value']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatLengthens()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ]);
        $obj->foo = \array_fill(0, 4, 'new-value');
        self::assertSame(['foo' => \array_fill(0, 4, 'new-value')], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayOfHashes()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom(['foo' => null]);
        $obj->foo = [
            StripeObject::constructFrom(['bar' => null]),
        ];

        /** @var mixed $first */
        $first = $obj->foo[0];
        $first->bar = 'baz';
        self::assertSame(['foo' => [['bar' => 'baz']]], $obj->serializeParameters());
    }

    public function testSerializeParametersDoesNotIncludeUnchangedValues()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'foo' => null,
        ]);
        self::assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersOnUnchangedArray()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ]);
        $obj->foo = ['0-index', '1-index', '2-index'];
        self::assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersWithStripeObject()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([]);
        $obj->metadata = StripeObject::constructFrom(['foo' => 'bar']);

        $serialized = $obj->serializeParameters();
        self::assertSame(['foo' => 'bar'], $serialized['metadata']);
    }

    public function testSerializeParametersOnReplacedStripeObject()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'source' => StripeObject::constructFrom(['bar' => 'foo']),
        ]);
        $obj->source = StripeObject::constructFrom(['baz' => 'foo']);

        $serialized = $obj->serializeParameters();
        self::assertSame(['baz' => 'foo'], $serialized['source']);
    }

    public function testSerializeParametersOnReplacedStripeObjectWhichIsMetadata()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'metadata' => StripeObject::constructFrom(['bar' => 'foo']),
        ]);
        $obj->metadata = StripeObject::constructFrom(['baz' => 'foo']);

        $serialized = $obj->serializeParameters();
        self::assertSame(['bar' => '', 'baz' => 'foo'], $serialized['metadata']);
    }

    public function testSerializeParametersOnArrayOfStripeObjects()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([]);
        $obj->metadata = [
            StripeObject::constructFrom(['foo' => 'bar']),
        ];

        $serialized = $obj->serializeParameters();
        self::assertSame([['foo' => 'bar']], $serialized['metadata']);
    }

    public function testSerializeParametersOnSetApiResource()
    {
        $customer = Customer::constructFrom(['id' => 'cus_123']);
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([]);

        // the key here is that the property is set explicitly (and therefore
        // marked as unsaved), which is why it gets included below
        $obj->customer = $customer;

        $serialized = $obj->serializeParameters();
        self::assertSame(['customer' => $customer], $serialized);
    }

    public function testSerializeParametersOnNotSetApiResource()
    {
        $customer = Customer::constructFrom(['id' => 'cus_123']);
        $obj = StripeObject::constructFrom(['customer' => $customer]);

        $serialized = $obj->serializeParameters();
        self::assertSame([], $serialized);
    }

    public function testSerializeParametersOnApiResourceFlaggedWithSaveWithParent()
    {
        $customer = Customer::constructFrom(['id' => 'cus_123']);
        $customer->saveWithParent = true;

        $obj = StripeObject::constructFrom(['customer' => $customer]);

        $serialized = $obj->serializeParameters();
        self::assertSame(['customer' => []], $serialized);
    }

    public function testSerializeParametersRaisesExceotionOnOtherEmbeddedApiResources()
    {
        // This customer doesn't have an ID and therefore the library doesn't know
        // what to do with it and throws an InvalidArgumentException because it's
        // probably not what the user expected to happen.
        $customer = Customer::constructFrom([]);

        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([]);
        $obj->customer = $customer;

        try {
            $serialized = $obj->serializeParameters();
            self::fail('Did not raise error');
        } catch (\InvalidArgumentException $e) {
            self::assertSame(
                'Cannot save property `customer` containing an API resource of type Stripe\Customer. '
                . "It doesn't appear to be persisted and is not marked as `saveWithParent`.",
                $e->getMessage()
            );
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testSerializeParametersForce()
    {
        $obj = StripeObject::constructFrom([
            'id' => 'id',
            'metadata' => StripeObject::constructFrom([
                'bar' => 'foo',
            ]),
        ]);

        $serialized = $obj->serializeParameters(true);
        self::assertSame(['id' => 'id', 'metadata' => ['bar' => 'foo']], $serialized);
    }

    public function testDirty()
    {
        $obj = StripeObject::constructFrom([
            'id' => 'id',
            'metadata' => StripeObject::constructFrom([
                'bar' => 'foo',
            ]),
        ]);

        // note that `$force` and `dirty()` are for different things, but are
        // functionally equivalent
        $obj->dirty();

        $serialized = $obj->serializeParameters();
        self::assertSame(['id' => 'id', 'metadata' => ['bar' => 'foo']], $serialized);
    }

    public function testDeepCopy()
    {
        $opts = [
            'api_base' => Stripe::$apiBase,
            'api_key' => 'apikey',
        ];
        $values = [
            'id' => 1,
            'name' => 'Stripe',
            'arr' => [
                StripeObject::constructFrom(['id' => 'index0'], $opts),
                'index1',
                2,
            ],
            'map' => [
                '0' => StripeObject::constructFrom(['id' => 'index0'], $opts),
                '1' => 'index1',
                '2' => 2,
            ],
        ];

        $copyValues = $this->deepCopyReflector->invoke(null, $values);

        // we can't compare the hashes directly because they have embedded
        // objects which are different from each other
        self::assertSame($values['id'], $copyValues['id']);
        self::assertSame($values['name'], $copyValues['name']);
        self::assertSame(\count($values['arr']), \count($copyValues['arr']));

        // internal values of the copied StripeObject should be the same,
        // but the object itself should be new (hence the assertNotSame)
        self::assertSame($values['arr'][0]['id'], $copyValues['arr'][0]['id']);
        self::assertNotSame($values['arr'][0], $copyValues['arr'][0]);

        // likewise, the Util\RequestOptions instance in _opts should have
        // copied values but be a new instance
        self::assertSame(
            $this->optsReflector->getValue($values['arr'][0])->apiKey,
            $this->optsReflector->getValue($copyValues['arr'][0])->apiKey
        );
        self::assertNotSame(
            $this->optsReflector->getValue($values['arr'][0]),
            $this->optsReflector->getValue($copyValues['arr'][0])
        );

        // scalars however, can be compared
        self::assertSame($values['arr'][1], $copyValues['arr'][1]);
        self::assertSame($values['arr'][2], $copyValues['arr'][2]);

        // and a similar story with the hash
        self::assertSame($values['map']['0']['id'], $copyValues['map']['0']['id']);
        self::assertNotSame($values['map']['0'], $copyValues['map']['0']);
        self::assertNotSame(
            $this->optsReflector->getValue($values['arr'][0]),
            $this->optsReflector->getValue($copyValues['arr'][0])
        );
        self::assertSame(
            $this->optsReflector->getValue($values['map']['0'])->apiKey,
            $this->optsReflector->getValue($copyValues['map']['0'])->apiKey
        );
        self::assertNotSame(
            $this->optsReflector->getValue($values['map']['0']),
            $this->optsReflector->getValue($copyValues['map']['0'])
        );
        self::assertSame($values['map']['1'], $copyValues['map']['1']);
        self::assertSame($values['map']['2'], $copyValues['map']['2']);
    }

    public function testDeepCopyMaintainClass()
    {
        $charge = Charge::constructFrom(['id' => 1], null);
        $copyCharge = $this->deepCopyReflector->invoke(null, $charge);
        self::assertSame(\get_class($charge), \get_class($copyCharge));
    }

    public function testIsDeleted()
    {
        $obj = StripeObject::constructFrom([]);
        self::assertFalse($obj->isDeleted());

        $obj = StripeObject::constructFrom(['deleted' => false]);
        self::assertFalse($obj->isDeleted());

        $obj = StripeObject::constructFrom(['deleted' => true]);
        self::assertTrue($obj->isDeleted());
    }

    public function testConstructorIdPassing()
    {
        $obj = new StripeObject(['id' => 'id_foo', 'other' => 'bar']);
        self::assertSame('id_foo', $obj->id);
        self::assertSame(['other' => 'bar'], $this->retrieveOptionsReflector->getValue($obj));

        $obj = new StripeObject('id_foo');
        self::assertSame('id_foo', $obj->id);
        self::assertSame([], $this->retrieveOptionsReflector->getValue($obj));

        $obj = new StripeObject(['id' => 'id_foo']);
        self::assertSame('id_foo', $obj->id);
        self::assertSame([], $this->retrieveOptionsReflector->getValue($obj));

        $obj = new StripeObject(['id' => ['foo' => 'bar']]);
        self::assertSame(['foo' => 'bar'], $obj->id);
        self::assertSame([], $this->retrieveOptionsReflector->getValue($obj));
    }

    public function testConstructFromIdPassing()
    {
        $obj = StripeObject::constructFrom(['inner' => ['id' => ['foo' => 'bar']]]);

        self::assertSame(['foo' => 'bar'], $obj['inner']->id->toArray());
        self::assertSame([], $this->retrieveOptionsReflector->getValue($obj));
    }

    public function testDeserializeEmptyMetadata()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'metadata' => [],
        ]);

        self::assertInstanceOf(StripeObject::class, $obj->metadata);
    }

    public function testDeserializeMetadataWithKeyNamedMetadata()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'metadata' => ['metadata' => 'value'],
        ]);

        self::assertInstanceOf(StripeObject::class, $obj->metadata);
        /** @var mixed $inner */
        $inner = $obj->metadata;
        self::assertSame('value', $inner->metadata);
    }
}
