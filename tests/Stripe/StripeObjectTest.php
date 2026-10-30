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

    public function testNativeSerializationPreservesResourceStateWithoutApiKeys()
    {
        $customer = Customer::constructFrom([
            'id' => 'test_customer',
            'object' => 'customer',
            'description' => 'original',
            'metadata' => ['old' => 'value'],
        ], [
            'api_key' => 'serialization_test_secret',
            'stripe_account' => 'test_account',
            'api_base' => 'https://example.com',
            'max_network_retries' => 2,
        ]);
        $customer->description = 'changed';
        $customer->metadata = ['new' => 'value'];
        $customer['temporary'] = 'removed';
        unset($customer['temporary']);
        $customer->saveWithParent = true;
        $response = new ApiResponse('{}', 200, ['Request-Id' => 'test_request'], []);
        $customer->setLastResponse($response);
        $parameters = $customer->serializeParameters();
        self::assertSame([
            'description' => 'changed',
            'metadata' => ['old' => '', 'new' => 'value'],
        ], $parameters);

        foreach ([$customer->metadata, $customer] as $object) {
            $serialized = \serialize($object);
            self::assertStringNotContainsString('serialization_test_secret', $serialized);
            $restored = \unserialize($serialized);
            self::assertSame(\get_class($object), \get_class($restored));
            self::assertSame($object->toArray(), $restored->toArray());
            self::assertSame($object->serializeParameters(), $restored->serializeParameters());
            $opts = $this->optsReflector->getValue($restored);
            self::assertNull($opts->apiKey);
            self::assertSame('serialization_test_secret', $this->optsReflector->getValue($object)->apiKey);
        }

        self::assertInstanceOf(StripeObject::class, $restored->metadata);
        self::assertTrue($restored->saveWithParent);
        self::assertSame(\get_object_vars($response), \get_object_vars($restored->getLastResponse()));
        self::assertNull($this->optsReflector->getValue($restored->metadata)->apiKey);
        foreach (['_originalValues', '_unsavedValues', '_transientValues', '_retrieveOptions'] as $name) {
            $property = new \ReflectionProperty(StripeObject::class, $name);
            $property->setAccessible(true);
            $originalValue = $property->getValue($customer);
            $restoredValue = $property->getValue($restored);
            if ($originalValue instanceof Util\Set) {
                self::assertInstanceOf(Util\Set::class, $restoredValue);
                self::assertSame($originalValue->toArray(), $restoredValue->toArray());
            } else {
                self::assertSame($originalValue, $restoredValue);
            }
        }
        $opts = $this->optsReflector->getValue($restored);
        self::assertSame(['Stripe-Account' => 'test_account'], $opts->headers);
        self::assertSame('https://example.com', $opts->apiBase);
        self::assertSame(2, $opts->maxNetworkRetries);
    }

    public function testSetApiKeyPreservesOptionsAndDirtyState()
    {
        $object = StripeObject::constructFrom(['metadata' => ['old' => 'value']], [
            'api_key' => 'original_test_secret',
            'stripe_account' => 'test_account',
            'stripe_version' => '2020-08-27',
            'api_base' => 'https://example.com',
            'max_network_retries' => 2,
        ]);
        $object['description'] = 'changed';
        $object['metadata'] = ['new' => 'value'];
        $nestedOpts = Util\RequestOptions::parse([
            'api_key' => 'nested_test_secret',
            'stripe_account' => 'nested_test_account',
            'stripe_context' => 'nested_test_context',
            'stripe_version' => '2020-08-27',
            'api_base' => 'https://example.com/nested',
            'max_network_retries' => 0,
            'headers' => ['X-Test-Header' => 'preserved'],
        ]);
        $this->optsReflector->setValue($object['metadata'], $nestedOpts);
        $originalOpts = $this->optsReflector->getValue($object);
        $other = new StripeObject();
        $this->optsReflector->setValue($other, $originalOpts);
        self::assertSame($originalOpts, $this->optsReflector->getValue($other));
        $parameters = $object->serializeParameters();
        $values = $object->toArray();
        $globalKey = Stripe::getApiKey();

        $nestedParameters = $object['metadata']->serializeParameters();
        $object->setApiKey('rebound_test_secret');

        $opts = $this->optsReflector->getValue($object);
        self::assertNotSame($originalOpts, $opts);
        self::assertSame('rebound_test_secret', $opts->apiKey);
        self::assertSame($originalOpts->headers, $opts->headers);
        self::assertSame($originalOpts->apiBase, $opts->apiBase);
        self::assertSame($originalOpts->maxNetworkRetries, $opts->maxNetworkRetries);
        self::assertSame('original_test_secret', $this->optsReflector->getValue($other)->apiKey);
        $reboundNestedOpts = $this->optsReflector->getValue($object['metadata']);
        self::assertNotSame($nestedOpts, $reboundNestedOpts);
        self::assertSame('rebound_test_secret', $reboundNestedOpts->apiKey);
        self::assertSame($nestedOpts->headers, $reboundNestedOpts->headers);
        self::assertSame($nestedOpts->apiBase, $reboundNestedOpts->apiBase);
        self::assertSame($nestedOpts->maxNetworkRetries, $reboundNestedOpts->maxNetworkRetries);
        self::assertSame('nested_test_secret', $nestedOpts->apiKey);
        self::assertSame($nestedParameters, $object['metadata']->serializeParameters());
        self::assertSame($globalKey, Stripe::getApiKey());
        self::assertSame($parameters, $object->serializeParameters());
        self::assertSame($values, $object->toArray());
        self::assertFalse(isset($object['api_key']));
        self::assertStringNotContainsString('rebound_test_secret', $object->toJSON());
        $serialized = \serialize($object);
        self::assertStringNotContainsString('rebound_test_secret', $serialized);
        self::assertStringNotContainsString('original_test_secret', $serialized);
        self::assertStringNotContainsString('nested_test_secret', $serialized);
        $restored = \unserialize($serialized);
        self::assertNull($this->optsReflector->getValue($restored)->apiKey);
        self::assertNull($this->optsReflector->getValue($restored['metadata'])->apiKey);
        self::assertSame($parameters, $restored->serializeParameters());
    }

    public function testSetApiKeyTraversesArraysAndSharedCyclicResources()
    {
        $root = new StripeObject(null, 'root_test_secret');
        $child = new StripeObject(null, 'nested_test_secret');
        $equalChild = new StripeObject(null, 'nested_test_secret');
        $values = new \ReflectionProperty(StripeObject::class, '_values');
        $values->setAccessible(true);
        $values->setValue($root, [
            'children' => [['first' => $child, 'again' => $child, 'equal' => $equalChild]],
            'self' => $root,
            'scalar' => 'unchanged',
        ]);
        $values->setValue($child, ['parent' => $root]);
        $values->setValue($equalChild, ['parent' => $root]);
        $root = \unserialize(\serialize($root));
        $child = $root['children'][0]['first'];
        $equalChild = $root['children'][0]['equal'];
        $before = \serialize($root);

        $root->setApiKey('graph_test_secret');

        foreach ([$root, $child, $equalChild] as $object) {
            self::assertSame('graph_test_secret', $this->optsReflector->getValue($object)->apiKey);
        }
        self::assertSame($root, $root['self']);
        self::assertSame($root, $child['parent']);
        self::assertSame($child, $root['children'][0]['again']);
        self::assertNotSame($child, $equalChild);
        self::assertSame($before, \serialize($root));
        self::assertStringNotContainsString('graph_test_secret', \serialize($root));
    }

    /**
     * @dataProvider provideSetApiKeyRejectsInvalidKeysCases
     *
     * @param mixed $apiKey
     */
    public function testSetApiKeyRejectsInvalidKeys($apiKey)
    {
        $object = StripeObject::constructFrom(['metadata' => []], 'original_test_secret');
        $opts = $this->optsReflector->getValue($object);
        $nestedOpts = $this->optsReflector->getValue($object['metadata']);
        $this->expectException(Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('The API key must be a non-empty string.');

        try {
            $object->setApiKey($apiKey);
        } finally {
            self::assertSame($opts, $this->optsReflector->getValue($object));
            self::assertSame($nestedOpts, $this->optsReflector->getValue($object['metadata']));
            self::assertSame('original_test_secret', $opts->apiKey);
            self::assertSame('original_test_secret', $nestedOpts->apiKey);
        }
    }

    public static function provideSetApiKeyRejectsInvalidKeysCases(): iterable
    {
        return [[''], [null], [false], [123], [[]], [new \stdClass()]];
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
        $expected = "Stripe\\StripeObject JSON: {\n    \"foo\": \"a\"\n}";
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

    public function testDeserializeEmptyPreviousAttributes()
    {
        /** @var mixed $obj */
        $obj = StripeObject::constructFrom([
            'data' => [
                'previous_attributes' => [],
            ],
        ]);

        self::assertInstanceOf(StripeObject::class, $obj->data->previous_attributes);
    }

    public function testRefreshFromCoercesInt64ResponseValues()
    {
        $obj = StripeObjectWithInt64Fields::constructFrom([
            'id' => 'obj_123',
            'amount' => '12345',
            'currency' => 'usd',
        ]);

        self::assertSame(12345, $obj['amount']);
        self::assertSame('usd', $obj['currency']);
    }

    public function testRefreshFromCoercesNestedInt64ResponseValues()
    {
        $obj = StripeObjectWithNestedInt64Fields::constructFrom([
            'id' => 'obj_123',
            'details' => ['amount' => '999', 'label' => 'test'],
        ]);

        self::assertSame(999, $obj['details']['amount']);
        self::assertSame('test', $obj['details']['label']);
    }

    public function testRefreshFromSkipsCoercionWhenNoFieldEncodings()
    {
        $obj = StripeObject::constructFrom([
            'id' => 'obj_123',
            'amount' => '12345',
        ]);

        // Without fieldEncodings(), string values stay as strings
        self::assertSame('12345', $obj['amount']);
    }
}

/**
 * @internal
 * Test subclass that declares int64_string field encodings
 */
final class StripeObjectWithInt64Fields extends StripeObject
{
    public static function fieldEncodings()
    {
        return [
            'amount' => ['kind' => 'int64_string'],
        ];
    }
}

/**
 * @internal
 * Test subclass with nested int64_string field encodings
 */
final class StripeObjectWithNestedInt64Fields extends StripeObject
{
    public static function fieldEncodings()
    {
        return [
            'details' => [
                'kind' => 'object',
                'fields' => [
                    'amount' => ['kind' => 'int64_string'],
                ],
            ],
        ];
    }
}
