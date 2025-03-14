<?php

namespace Stripe\Service;

/**
 * @internal
 *
 * @covers \Stripe\Service\AbstractService
 */
final class AbstractServiceTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = '25OFF';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var CouponService */
    private $service;

    /** @var \ReflectionMethod */
    private $formatParamsReflector;

    /**
     * @before
     */
    public function setUpMockService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        // Testing with CouponService, because testing abstract classes is hard in PHP :/
        $this->service = new CouponService($this->client);
    }

    /**
     * @before
     */
    public function setUpReflectors()
    {
        $this->formatParamsReflector = new \ReflectionMethod(AbstractService::class, 'formatParams');
        $this->formatParamsReflector->setAccessible(true);
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
        $result = $this->formatParamsReflector->invoke(null, ['foo' => null]);
        self::assertTrue('' === $result['foo']);
        self::assertTrue(null !== $result['foo']);

        $result = $this->formatParamsReflector->invoke(null, ['foo' => ['bar' => null, 'baz' => 1, 'nest' => ['triplynestednull' => null, 'triplynestednonnull' => 1]]]);
        self::assertTrue('' === $result['foo']['bar']);
        self::assertTrue(null !== $result['foo']['bar']);
        self::assertTrue(1 === $result['foo']['baz']);
        self::assertTrue('' === $result['foo']['nest']['triplynestednull']);
        self::assertTrue(1 === $result['foo']['nest']['triplynestednonnull']);

        $result = $this->formatParamsReflector->invoke(null, ['foo' => ['zero', null, null, 'three'], 'toplevelnull' => null, 'toplevelnonnull' => 4]);
        self::assertTrue('zero' === $result['foo'][0]);
        self::assertTrue('' === $result['foo'][1]);
        self::assertTrue('' === $result['foo'][2]);
        self::assertTrue('three' === $result['foo'][3]);
        self::assertTrue('' === $result['toplevelnull']);
        self::assertTrue(4 === $result['toplevelnonnull']);
    }
}
