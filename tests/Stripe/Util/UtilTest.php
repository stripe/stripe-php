<?php

namespace Stripe\Util;

use Stripe\ThinEvent;

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
            'a=3&b=%2Bfoo%3F&c=bar%26baz&d[a]=a&d[b]=b&e=0&e=1&f=',
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

    public function testJsonDecodeThinEventObject()
    {
        $eventData = json_encode([
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'financial_account.balance.opened',
            'created' => '2022-02-15T00:27:45.330Z',
            'related_object' => [
                'id' => 'fa_123',
                'type' => 'financial_account',
                'url' => '/v2/financial_accounts/fa_123',
            ],
            'reason' => [
                'id' => 'id_123',
                'idempotency_key' => 'key_123',
            ],
        ]);

        $event = Util::json_decode_thin_event_object($eventData, ThinEvent::class);
        self::assertInstanceOf(ThinEvent::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('financial_account.balance.opened', $event->type);
        self::assertSame('2022-02-15T00:27:45.330Z', $event->created);
        self::assertSame('fa_123', $event->related_object->id);
        self::assertSame('financial_account', $event->related_object->type);
        self::assertSame('/v2/financial_accounts/fa_123', $event->related_object->url);
        self::assertSame('id_123', $event->reason->id);
        self::assertSame('key_123', $event->reason->idempotency_key);
    }

    public function testJsonDecodeThinEventObjectWithNoRelatedObject()
    {
        $eventData = json_encode([
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'financial_account.balance.opened',
            'created' => '2022-02-15T00:27:45.330Z',
        ]);

        $event = Util::json_decode_thin_event_object($eventData, ThinEvent::class);
        self::assertInstanceOf(ThinEvent::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('financial_account.balance.opened', $event->type);
        self::assertSame('2022-02-15T00:27:45.330Z', $event->created);
        self::assertNull($event->related_object);
    }

    public function testJsonDecodeThinEventObjectWithNoReasonObject()
    {
        $eventData = json_encode([
            'id' => 'evt_234',
            'object' => 'event',
            'type' => 'financial_account.balance.opened',
            'created' => '2022-02-15T00:27:45.330Z',
        ]);

        $event = Util::json_decode_thin_event_object($eventData, ThinEvent::class);
        self::assertInstanceOf(ThinEvent::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('financial_account.balance.opened', $event->type);
        self::assertSame('2022-02-15T00:27:45.330Z', $event->created);
        self::assertNull($event->reason);
    }
}
