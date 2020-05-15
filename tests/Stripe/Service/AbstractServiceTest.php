<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\AbstractService
 */
final class AbstractServiceTest extends \PHPUnit\Framework\TestCase
{
    const TEST_RESOURCE_ID = '25OFF';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var CouponService */
    private $service;

    /**
     * @before
     */
    public function setUpMockService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        // Testing with CouponService, because testing abstract classes is hard in PHP :/
        $this->service = new \Stripe\Service\CouponService($this->client);
    }

    public function testNullGetsEmptyStringified()
    {
        $this->expectException(\Stripe\Exception\InvalidRequestException::class);
        $this->service->update('id', [
            'doesnotexist' => null,
        ]);
    }

    public function testRetrieveThrowsIfIdNullIsNull()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('The resource ID cannot be null or whitespace.');

        $this->service->retrieve(null);
    }

    public function testRetrieveThrowsIfIdNullIsEmpty()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('The resource ID cannot be null or whitespace.');

        $this->service->retrieve('');
    }

    public function testRetrieveThrowsIfIdNullIsWhitespace()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('The resource ID cannot be null or whitespace.');

        $this->service->retrieve(' ');
    }

    public function testFormatParams()
    {
        $result = \Stripe\Service\AbstractService::formatParams(['foo' => null]);
        static::assertTrue('' === $result['foo']);
        static::assertTrue(null !== $result['foo']);

        $result = \Stripe\Service\AbstractService::formatParams(['foo' => ['bar' => null, 'baz' => 1, 'nest' => ["triplynestednull" => null, "triplynestednonnull" => 1]]]);
        static::assertTrue('' === $result['foo']['bar']);
        static::assertTrue(null !== $result['foo']['bar']);
        static::assertTrue(1 === $result['foo']['baz']);
        static::assertTrue('' === $result['foo']['nest']['triplynestednull']);
        static::assertTrue(1 === $result['foo']['nest']['triplynestednonnull']);

        $result = \Stripe\Service\AbstractService::formatParams(['foo' => ["zero", null, null, "three"], 'toplevelnull' => null, 'toplevelnonnull' => 4]);
        static::assertTrue('zero' === $result['foo'][0]);
        static::assertTrue('' === $result['foo'][1]);
        static::assertTrue('' === $result['foo'][2]);
        static::assertTrue('three' === $result['foo'][3]);
        static::assertTrue('' === $result['toplevelnull']);
        static::assertTrue(4 === $result['toplevelnonnull']);
    }
}
