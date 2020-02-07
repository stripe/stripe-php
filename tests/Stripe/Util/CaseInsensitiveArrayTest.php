<?php

namespace Stripe\Util;

class CaseInsensitiveArrayTest extends \Stripe\TestCase
{
    public function testArrayAccess()
    {
        $arr = new CaseInsensitiveArray(["One" => "1", "TWO" => "2"]);

        $arr["thrEE"] = "3";

        static::assertSame("1", $arr["one"]);
        static::assertSame("1", $arr["One"]);
        static::assertSame("1", $arr["ONE"]);

        static::assertSame("2", $arr["two"]);
        static::assertSame("2", $arr["twO"]);
        static::assertSame("2", $arr["TWO"]);

        static::assertSame("3", $arr["three"]);
        static::assertSame("3", $arr["ThReE"]);
        static::assertSame("3", $arr["THREE"]);
    }

    public function testCount()
    {
        $arr = new CaseInsensitiveArray(["One" => "1", "TWO" => "2"]);

        static::assertCount(2, $arr);
    }

    public function testIterable()
    {
        $arr = new CaseInsensitiveArray(["One" => "1", "TWO" => "2"]);

        $seen = [];

        foreach ($arr as $k => $v) {
            $seen[$k] = $v;
        }

        static::assertSame("1", $seen["one"]);
        static::assertSame("2", $seen["two"]);
    }
}
