<?php

namespace Stripe;

class CurlClientTest extends TestCase
{
    public function testEncode()
    {
        $a = array(
            'my' => 'value',
            'that' => array('your' => 'example'),
            'bar' => 1,
            'baz' => null
        );

        $enc = HttpClient\CurlClient::encode($a);
        $this->assertSame($enc, 'my=value&that%5Byour%5D=example&bar=1');

        $a = array('that' => array('your' => 'example', 'foo' => null));
        $enc = HttpClient\CurlClient::encode($a);
        $this->assertSame($enc, 'that%5Byour%5D=example');

        $a = array('that' => 'example', 'foo' => array('bar', 'baz'));
        $enc = HttpClient\CurlClient::encode($a);
        $this->assertSame($enc, 'that=example&foo%5B%5D=bar&foo%5B%5D=baz');

        $a = array(
            'my' => 'value',
            'that' => array('your' => array('cheese', 'whiz', null)),
            'bar' => 1,
            'baz' => null
        );

        $enc = HttpClient\CurlClient::encode($a);
        $expected = 'my=value&that%5Byour%5D%5B%5D=cheese'
              . '&that%5Byour%5D%5B%5D=whiz&bar=1';
        $this->assertSame($enc, $expected);
    }
}
