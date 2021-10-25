<?php

namespace Stripe;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public static function compatAssertIsArray($obj)
    {
        if (method_exists(static::class, 'assertIsArray')) {
            static::assertIsArray($obj);
        } else {
            static::assertInternalType('array', $obj);
        }
    }
    public function compatExpectExceptionMessageMatches($msg) {
        if (method_exists($this, 'expectExceptionMessageMatches')) {
            $this->expectExceptionMessageMatches($msg);
        } else {
            $this->expectExceptionMessageRegExp($msg);
        }
    }
    public static function compatAssertStringContainsString($a, $b) {
        if (method_exists(static::class, 'assertStringContainsString')) {
            static::assertStringContainsString($a, $b);
        } else {
            static::assertContains($a, $b);
        }
    }
    public function compatAssertIsString($x) {
        if (method_exists($this, 'assertIsString')) {
            $this->assertIsString($x);
        } else {
            $this->assertInternalType('string', $x);
        }
    }
    public static function compatWarningClass() {
        if (class_exists('\PHPUnit\Framework\Error\Warning')) {
            return \PHPUnit\Framework\Error\Warning::class;
        } else {
            return \PHPUnit_Framework_Error_Warning::class;
        }
    }
}
