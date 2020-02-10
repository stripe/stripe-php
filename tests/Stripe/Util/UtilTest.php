<?php

namespace Stripe\Util;

class UtilTest extends \Stripe\TestCase
{
    public function testIsList()
    {
        $list = [5, 'nstaoush', []];
        static::assertTrue(Util::isList($list));

        $notlist = [5, 'nstaoush', [], 'bar' => 'baz'];
        static::assertFalse(Util::isList($notlist));
    }

    public function testThatPHPHasValueSemanticsForArrays()
    {
        $original = ['php-arrays' => 'value-semantics'];
        $derived = $original;
        $derived['php-arrays'] = 'reference-semantics';

        static::assertSame('value-semantics', $original['php-arrays']);
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
        static::assertArrayHasKey("id", $customer->toArray());
    }

    public function testUtf8()
    {
        // UTF-8 string
        $x = "\xc3\xa9";
        static::assertSame(Util::utf8($x), $x);

        // Latin-1 string
        $x = "\xe9";
        static::assertSame(Util::utf8($x), "\xc3\xa9");

        // Not a string
        $x = true;
        static::assertSame(Util::utf8($x), $x);
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

        static::assertSame(
            [
                'foo' => 'bar',
                'customer' => 'cus_123',
            ],
            Util::objectsToIds($params)
        );
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

        static::assertSame(
            "a=3&b=%2Bfoo%3F&c=bar%26baz&d[a]=a&d[b]=b&e[0]=0&e[1]=1&f=",
            Util::encodeParameters($params)
        );
    }

    public function testUrlEncode()
    {
        static::assertSame("foo", Util::urlEncode("foo"));
        static::assertSame("foo%2B", Util::urlEncode("foo+"));
        static::assertSame("foo%26", Util::urlEncode("foo&"));
        static::assertSame("foo[bar]", Util::urlEncode("foo[bar]"));
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

        static::assertSame(
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
}
