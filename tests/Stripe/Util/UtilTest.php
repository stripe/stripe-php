<?php

namespace Stripe;

class UtilTest extends TestCase
{
    public function testIsList()
    {
        $list = [5, 'nstaoush', []];
        $this->assertTrue(Util\Util::isList($list));

        $notlist = [5, 'nstaoush', [], 'bar' => 'baz'];
        $this->assertFalse(Util\Util::isList($notlist));
    }

    public function testThatPHPHasValueSemanticsForArrays()
    {
        $original = ['php-arrays' => 'value-semantics'];
        $derived = $original;
        $derived['php-arrays'] = 'reference-semantics';

        $this->assertSame('value-semantics', $original['php-arrays']);
    }

    public function testConvertStripeObjectToArrayIncludesId()
    {
        $customer = Util\Util::convertToStripeObject(
            [
                'id' => 'cus_123',
                'object' => 'customer',
            ],
            null
        );
        $this->assertTrue(array_key_exists("id", $customer->__toArray(true)));
    }

    public function testUtf8()
    {
        // UTF-8 string
        $x = "\xc3\xa9";
        $this->assertSame(Util\Util::utf8($x), $x);

        // Latin-1 string
        $x = "\xe9";
        $this->assertSame(Util\Util::utf8($x), "\xc3\xa9");

        // Not a string
        $x = true;
        $this->assertSame(Util\Util::utf8($x), $x);
    }

    public function testObjectsToIds()
    {
        $params = [
            'foo' => 'bar',
            'customer' => Util\Util::convertToStripeObject(
                [
                    'id' => 'cus_123',
                    'object' => 'customer',
                ],
                null
            ),
            'null_value' => null,
        ];

        $this->assertSame(
            [
                'foo' => 'bar',
                'customer' => 'cus_123',
            ],
            Util\Util::objectsToIds($params)
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

        $this->assertSame(
            "a=3&b=%2Bfoo%3F&c=bar%26baz&d[a]=a&d[b]=b&e[0]=0&e[1]=1&f=",
            Util\Util::encodeParameters($params)
        );
    }

    public function testUrlEncode()
    {
        $this->assertSame("foo", Util\Util::urlEncode("foo"));
        $this->assertSame("foo%2B", Util\Util::urlEncode("foo+"));
        $this->assertSame("foo%26", Util\Util::urlEncode("foo&"));
        $this->assertSame("foo[bar]", Util\Util::urlEncode("foo[bar]"));
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

        $this->assertSame(
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
            Util\Util::flattenParams($params)
        );
    }
}
