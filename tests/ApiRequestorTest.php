<?php

namespace Stripe;

class ApiRequestorTest extends TestCase
{
    public function testEncode()
    {
        $a = array(
            'my' => 'value',
            'that' => array('your' => 'example'),
            'bar' => 1,
            'baz' => null
        );

        $enc = APIRequestor::encode($a);
        $this->assertSame($enc, 'my=value&that%5Byour%5D=example&bar=1');

        $a = array('that' => array('your' => 'example', 'foo' => null));
        $enc = APIRequestor::encode($a);
        $this->assertSame($enc, 'that%5Byour%5D=example');

        $a = array('that' => 'example', 'foo' => array('bar', 'baz'));
        $enc = APIRequestor::encode($a);
        $this->assertSame($enc, 'that=example&foo%5B%5D=bar&foo%5B%5D=baz');

        $a = array(
            'my' => 'value',
            'that' => array('your' => array('cheese', 'whiz', null)),
            'bar' => 1,
            'baz' => null
        );

        $enc = APIRequestor::encode($a);
        $expected = 'my=value&that%5Byour%5D%5B%5D=cheese'
              . '&that%5Byour%5D%5B%5D=whiz&bar=1';
        $this->assertSame($enc, $expected);
    }

    public function testUtf8()
    {
        // UTF-8 string
        $x = "\xc3\xa9";
        $this->assertSame(ApiRequestor::utf8($x), $x);

        // Latin-1 string
        $x = "\xe9";
        $this->assertSame(ApiRequestor::utf8($x), "\xc3\xa9");

        // Not a string
        $x = true;
        $this->assertSame(ApiRequestor::utf8($x), $x);
    }

    public function testEncodeObjects()
    {
        $reflector = new \ReflectionClass('Stripe\\ApiRequestor');
        $method = $reflector->getMethod('_encodeObjects');
        $method->setAccessible(true);

        $a = array('customer' => new Customer('abcd'));
        $enc = $method->invoke(null, $a);
        $this->assertSame($enc, array('customer' => 'abcd'));

        // Preserves UTF-8
        $v = array('customer' => "☃");
        $enc = $method->invoke(null, $v);
        $this->assertSame($enc, $v);

        // Encodes latin-1 -> UTF-8
        $v = array('customer' => "\xe9");
        $enc = $method->invoke(null, $v);
        $this->assertSame($enc, array('customer' => "\xc3\xa9"));
    }
}
