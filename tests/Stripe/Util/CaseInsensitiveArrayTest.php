<?php

namespace Stripe\Util;

class CaseInsensitiveArrayTest extends \Stripe\TestCase
{
    public function testArrayAccess()
    {
        $arr = new CaseInsensitiveArray(["One" => "1", "TWO" => "2"]);

        $arr["thrEE"] = "3";

        $this->assertSame("1", $arr["one"]);
        $this->assertSame("1", $arr["One"]);
        $this->assertSame("1", $arr["ONE"]);

        $this->assertSame("2", $arr["two"]);
        $this->assertSame("2", $arr["twO"]);
        $this->assertSame("2", $arr["TWO"]);

        $this->assertSame("3", $arr["three"]);
        $this->assertSame("3", $arr["ThReE"]);
        $this->assertSame("3", $arr["THREE"]);
    }

    public function testCount()
    {
        $arr = new CaseInsensitiveArray(["One" => "1", "TWO" => "2"]);

        $this->assertSame(2, count($arr));
    }

    public function testIterable()
    {
        $arr = new CaseInsensitiveArray(["One" => "1", "TWO" => "2"]);

        $seen = [];

        foreach ($arr as $k => $v) {
            $seen[$k] = $v;
        }

        $this->assertSame("1", $seen["one"]);
        $this->assertSame("2", $seen["two"]);
    }
}
