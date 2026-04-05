<?php

namespace Stripe\Util;

/**
 * @internal
 *
 * @covers \Stripe\Util\Util
 */
final class UtilTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testIsList()
    {
        $list = [5, 'nstaoush', []];
        self::assertTrue(Util::isList($list));

        $notlist = [5, 'nstaoush', [], 'bar' => 'baz'];
        self::assertFalse(Util::isList($notlist));
    }

    public function testThatPHPHasValueSemanticsForArrays()
    {
        $original = ['php-arrays' => 'value-semantics'];
        $derived = $original;
        $derived['php-arrays'] = 'reference-semantics';

        self::assertSame('value-semantics', $original['php-arrays']);
    }

    public function testConvertStripeObjectToArrayIncludesId()
    {
        $customer = Util::convertToStripeObject(
            [
                'id' => 'cus_123',
                'object' => 'customer',
            ],
            null
        );
        self::assertArrayHasKey('id', $customer->toArray());
    }

    public function testUtf8()
    {
        // UTF-8 string
        $x = "\xc3\xa9";
        self::assertSame(Util::utf8($x), $x);

        // Latin-1 string
        $x = "\xe9";
        self::assertSame(Util::utf8($x), "\xc3\xa9");

        // Not a string
        $x = true;
        self::assertSame(Util::utf8($x), $x);
    }

    public function testObjectsToIds()
    {
        $params = [
            'foo' => 'bar',
            'customer' => Util::convertToStripeObject(
                [
                    'id' => 'cus_123',
                    'object' => 'customer',
                ],
                null
            ),
            'null_value' => null,
        ];

        self::assertSame(
            [
                'foo' => 'bar',
                'customer' => 'cus_123',
            ],
            Util::objectsToIds($params, false)
        );
    }

    public function testObjectsToIdsSerializeNullPreservesNulls()
    {
        $params = [
            'foo' => 'bar',
            'null_value' => null,
        ];

        $result = Util::objectsToIds($params, true);
        self::assertArrayHasKey('null_value', $result);
        self::assertNull($result['null_value']);
        self::assertSame('bar', $result['foo']);
    }

    public function testObjectsToIdsSerializeNullPreservesNestedNulls()
    {
        $params = [
            'metadata' => ['key' => 'value', 'to_delete' => null],
            'name' => 'test',
        ];

        $result = Util::objectsToIds($params, true);
        self::assertSame('test', $result['name']);
        self::assertSame('value', $result['metadata']['key']);
        self::assertArrayHasKey('to_delete', $result['metadata']);
        self::assertNull($result['metadata']['to_delete']);
    }

    public function testObjectsToIdsDefaultStripsNulls()
    {
        // serializeEmpty=false: null values are stripped
        $params = [
            'foo' => 'bar',
            'null_value' => null,
        ];

        $result = Util::objectsToIds($params, false);
        self::assertArrayNotHasKey('null_value', $result);
        self::assertSame('bar', $result['foo']);
    }

    public function testObjectsToIdsSerializeNullWithApiResource()
    {
        // ApiResource replacement should still work with serializeEmpty
        $params = [
            'customer' => Util::convertToStripeObject(
                [
                    'id' => 'cus_123',
                    'object' => 'customer',
                ],
                null
            ),
            'description' => null,
        ];

        $result = Util::objectsToIds($params, true);
        self::assertSame('cus_123', $result['customer']);
        self::assertArrayHasKey('description', $result);
        self::assertNull($result['description']);
    }

    public function testObjectsToIdsEmptyAssocArrayBecomesObject()
    {
        // When all values are stripped from an associative array,
        // the result should be an object (for correct JSON encoding
        // as {} instead of [])
        $params = [
            'metadata' => ['only_null' => null],
        ];

        $result = Util::objectsToIds($params, false);
        // metadata's only value was null and got stripped; the result
        // for metadata should be an object (stdClass) not an empty array
        self::assertInstanceOf(\stdClass::class, $result['metadata']);
        self::assertSame('{}', \json_encode($result['metadata']));
    }

    public function testObjectsToIdsSerializeNullInList()
    {
        // Lists should pass through serializeEmpty to nested elements
        $params = [
            ['key' => null, 'name' => 'test'],
        ];

        $result = Util::objectsToIds($params, true);
        self::assertArrayHasKey('key', $result[0]);
        self::assertNull($result[0]['key']);
        self::assertSame('test', $result[0]['name']);
    }

    public function testEncodeParameters()
    {
        $params = [
            'a' => 3,
            'b' => '+foo?',
            'c' => 'bar&baz',
            'd' => ['a' => 'a', 'b' => 'b'],
            'e' => [0, 1],
            'f' => '',

            // note the empty hash won't even show up in the request
            'g' => [],
        ];

        self::assertSame(
            'a=3&b=%2Bfoo%3F&c=bar%26baz&d[a]=a&d[b]=b&e[0]=0&e[1]=1&f=',
            Util::encodeParameters($params)
        );
    }

    public function testEncodeParametersForV2Api()
    {
        $params = [
            'a' => 3,
            'b' => '+foo?',
            'c' => 'bar&baz',
            'd' => ['a' => 'a', 'b' => 'b'],
            'e' => [0, 1],
            'f' => '',

            // note the empty hash won't even show up in the request
            'g' => [],
        ];

        self::assertSame(
            'a=3&b=%2Bfoo%3F&c=bar%26baz&d[a]=a&d[b]=b&e[0]=0&e[1]=1&f=',
            Util::encodeParameters($params, 'v2')
        );
    }

    public function testUrlEncode()
    {
        self::assertSame('foo', Util::urlEncode('foo'));
        self::assertSame('foo%2B', Util::urlEncode('foo+'));
        self::assertSame('foo%26', Util::urlEncode('foo&'));
        self::assertSame('foo[bar]', Util::urlEncode('foo[bar]'));
    }

    public function testFlattenParams()
    {
        $params = [
            'a' => 3,
            'b' => '+foo?',
            'c' => 'bar&baz',
            'd' => ['a' => 'a', 'b' => 'b'],
            'e' => [0, 1],
            'f' => [
                ['foo' => '1', 'ghi' => '2'],
                ['foo' => '3', 'bar' => '4'],
            ],
        ];

        self::assertSame(
            [
                ['a', 3],
                ['b', '+foo?'],
                ['c', 'bar&baz'],
                ['d[a]', 'a'],
                ['d[b]', 'b'],
                ['e[0]', 0],
                ['e[1]', 1],
                ['f[0][foo]', '1'],
                ['f[0][ghi]', '2'],
                ['f[1][foo]', '3'],
                ['f[1][bar]', '4'],
            ],
            Util::flattenParams($params)
        );
    }

    public function testFlattenParamsNestedArrays()
    {
        $params = [
            'a' => [[1, 2], [3, 4]],
        ];

        self::assertSame(
            [
                ['a[0][0]', 1],
                ['a[0][1]', 2],
                ['a[1][0]', 3],
                ['a[1][1]', 4],
            ],
            Util::flattenParams($params)
        );
    }

    public function testConvertToStripeObjectReturnsRefForRefShapedV2Array()
    {
        $resp = [
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ];

        $result = Util::convertToStripeObject($resp, [], 'v2');

        self::assertInstanceOf(\Stripe\V2\Ref::class, $result);
        self::assertSame('v2.core.account', $result->type);
        self::assertSame('acct_123', $result->id);
        self::assertSame('/v2/core/accounts/acct_123', $result->url);
    }

    public function testConvertToStripeObjectPassesClientToRef()
    {
        $resp = [
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ];

        $client = new \Stripe\StripeClient('sk_test_123');
        $result = Util::convertToStripeObject($resp, ['client' => $client], 'v2');

        self::assertInstanceOf(\Stripe\V2\Ref::class, $result);

        // Verify the client was threaded through by checking that fetch() does
        // not throw the "no client" exception (it will throw on the HTTP call
        // instead, which we stub out via reflection — so we just confirm the
        // client property was set by calling setClient and confirming it replaces).
        $refWithoutClient = new \Stripe\V2\Ref($resp);
        try {
            $refWithoutClient->fetch();
            self::fail('Expected UnexpectedValueException');
        } catch (\Stripe\Exception\UnexpectedValueException $e) {
            self::assertStringContainsString('no client', $e->getMessage());
        }

        // The Ref returned from convertToStripeObject had a client set, so
        // accessing the protected $client property via reflection should not be null.
        $reflProp = new \ReflectionProperty(\Stripe\V2\Ref::class, 'client');
        $reflProp->setAccessible(true);
        self::assertSame($client, $reflProp->getValue($result));
    }

    public function testConvertToStripeObjectDoesNotTreatRefShapeAsRefInV1()
    {
        // A v1 array with type/id/url but no object key should fall through to
        // StripeObject, not become a Ref.
        $resp = [
            'type' => 'some_type',
            'id' => 'obj_123',
            'url' => '/v1/things/obj_123',
        ];

        $result = Util::convertToStripeObject($resp, [], 'v1');

        self::assertInstanceOf(\Stripe\StripeObject::class, $result);
        self::assertNotInstanceOf(\Stripe\V2\Ref::class, $result);
    }

    public function testConvertToStripeObjectDoesNotTreatObjectKeyedArrayAsRef()
    {
        // A v2 array that has an `object` key must not be treated as a Ref even
        // if it also has type/id/url, because it's a normal typed v2 object.
        $resp = [
            'object' => 'v2.core.account',
            'type' => 'some_type',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ];

        $result = Util::convertToStripeObject($resp, [], 'v2');

        self::assertNotInstanceOf(\Stripe\V2\Ref::class, $result);
    }
}
