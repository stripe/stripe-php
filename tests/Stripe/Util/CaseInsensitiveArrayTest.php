<?php

namespace Stripe\Util;

/**
 * @internal
 *
 * @covers \Stripe\Util\CaseInsensitiveArray
 */
final class CaseInsensitiveArrayTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testArrayAccess()
    {
        $arr = new CaseInsensitiveArray(['One' => '1', 'TWO' => '2']);

        $arr['thrEE'] = '3';

        self::assertSame('1', $arr['one']);
        self::assertSame('1', $arr['One']);
        self::assertSame('1', $arr['ONE']);

        self::assertSame('2', $arr['two']);
        self::assertSame('2', $arr['twO']);
        self::assertSame('2', $arr['TWO']);

        self::assertSame('3', $arr['three']);
        self::assertSame('3', $arr['ThReE']);
        self::assertSame('3', $arr['THREE']);
    }

    public function testCount()
    {
        $arr = new CaseInsensitiveArray(['One' => '1', 'TWO' => '2']);

        self::assertCount(2, $arr);
    }

    public function testIterable()
    {
        $arr = new CaseInsensitiveArray(['One' => '1', 'TWO' => '2']);

        $seen = [];

        foreach ($arr as $k => $v) {
            $seen[$k] = $v;
        }

        self::assertSame('1', $seen['one']);
        self::assertSame('2', $seen['two']);
    }
}
