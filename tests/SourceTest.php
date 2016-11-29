<?php

namespace Stripe;

class SourceTest extends TestCase
{
    public function testRetrieve()
    {
        $this->mockRequest(
            'GET',
            '/v1/sources/src_foo',
            array(),
            array(
                'id' => 'src_foo',
                'object' => 'source',
            )
        );
        $source = Source::retrieve('src_foo');
        $this->assertSame($source->id, 'src_foo');
    }

    public function testCreate()
    {
        $this->mockRequest(
            'POST',
            '/v1/sources',
            array(
                'type' => 'bitcoin',
                'amount' => 1000,
                'currency' => 'usd',
                'owner' => array('email' => 'jenny.rosen@example.com'),
            ),
            array(
                'id' => 'src_foo',
                'object' => 'source'
            )
        );
        $source = Source::create(array(
            'type' => 'bitcoin',
            'amount' => 1000,
            'currency' => 'usd',
            'owner' => array('email' => 'jenny.rosen@example.com'),
        ));
        $this->assertSame($source->id, 'src_foo');
    }

    public function testVerify()
    {
        $response = array(
            'id' => 'src_foo',
            'object' => 'source',
            'verification' => array('status' => 'pending'),
        );
        $this->mockRequest(
            'GET',
            '/v1/sources/src_foo',
            array(),
            $response
        );

        $response['verification']['status'] = 'succeeded';
        $this->mockRequest(
            'POST',
            '/v1/sources/src_foo/verify',
            array(
                'values' => array(32, 45),
            ),
            $response
        );

        $source = Source::retrieve('src_foo');
        $this->assertSame($source->verification->status, 'pending');
        $source->verify(array(
            'values' => array(32, 45),
        ));
        $this->assertSame($source->verification->status, 'succeeded');
    }
}
