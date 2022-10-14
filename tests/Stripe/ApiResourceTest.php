<?php

namespace Stripe;

// Fake resource that calls GET /v1/coupons/{coupon} but using
// _requestStream to test the _requestStream interface.

class FooResource extends ApiResource
{
    use ApiOperations\Retrieve;
    const OBJECT_NAME = 'coupon';

    public function pdf($readBodyChunk, $params = null, $opts = null)
    {
        $url = $this->instanceUrl();
        list($opts) = $this->_requestStream('get', $url, $readBodyChunk, $params, $opts);

        return $this;
    }
}

/**
 * @internal
 * @coversNothing
 */
final class ApiResourceTest extends \Stripe\TestCase
{
    use TestHelper;

    public function testRequestStreaming()
    {
        $foo = FooResource::retrieve('foo');
        $body = '';
        $readBodyChunk = function ($chunk) use (&$body) {
            $body .= $chunk;
        };

        $foo->pdf($readBodyChunk);

        $parsed = \json_decode($body, true);
        static::assertSame($parsed['object'], 'coupon');
    }
}
