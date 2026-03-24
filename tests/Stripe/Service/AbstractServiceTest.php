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
        $result = $this->formatParamsReflector->invoke(null, ['foo' => null], 'v1');
        self::assertTrue('' === $result['foo']);
        self::assertTrue(null !== $result['foo']);

        $result = $this->formatParamsReflector->invoke(null, ['foo' => ['bar' => null, 'baz' => 1, 'nest' => ['triplynestednull' => null, 'triplynestednonnull' => 1]]], 'v1');
        self::assertTrue('' === $result['foo']['bar']);
        self::assertTrue(null !== $result['foo']['bar']);
        self::assertTrue(1 === $result['foo']['baz']);
        self::assertTrue('' === $result['foo']['nest']['triplynestednull']);
        self::assertTrue(1 === $result['foo']['nest']['triplynestednonnull']);

        $result = $this->formatParamsReflector->invoke(null, ['foo' => ['zero', null, null, 'three'], 'toplevelnull' => null, 'toplevelnonnull' => 4], 'v1');
        self::assertTrue('zero' === $result['foo'][0]);
        self::assertTrue('' === $result['foo'][1]);
        self::assertTrue('' === $result['foo'][2]);
        self::assertTrue('three' === $result['foo'][3]);
        self::assertTrue('' === $result['toplevelnull']);
        self::assertTrue(4 === $result['toplevelnonnull']);
    }

    public function testFormatParamsV1ConvertsNullToEmptyString()
    {
        // v1 behavior: null → '' (unchanged from previous behavior)
        $result = $this->formatParamsReflector->invoke(null, ['foo' => null], 'v1');
        self::assertSame('', $result['foo']);
    }

    public function testFormatParamsV2PreservesNull()
    {
        // v2 behavior: null values are preserved for JSON encoding
        $result = $this->formatParamsReflector->invoke(null, ['foo' => null], 'v2');
        self::assertArrayHasKey('foo', $result);
        self::assertNull($result['foo']);
    }

    public function testFormatParamsV2PreservesNestedNull()
    {
        $result = $this->formatParamsReflector->invoke(null, [
            'name' => 'test',
            'description' => null,
            'nested' => ['inner' => null, 'value' => 42],
        ], 'v2');
        self::assertSame('test', $result['name']);
        self::assertNull($result['description']);
        self::assertNull($result['nested']['inner']);
        self::assertSame(42, $result['nested']['value']);
    }

    public function testFormatParamsV2NullParamsReturnsNull()
    {
        $result = $this->formatParamsReflector->invoke(null, null, 'v2');
        self::assertNull($result);
    }

    public function testRequestPreservesNullForV2Path()
    {
        $capturedParams = null;
        $mockClient = $this->createMock(\Stripe\StripeClientInterface::class);
        $mockClient->expects(self::once())
            ->method('request')
            ->with(
                self::equalTo('post'),
                self::equalTo('/v2/test/resource'),
                self::callback(static function ($params) use (&$capturedParams) {
                    $capturedParams = $params;

                    return true;
                }),
                self::anything()
            )
            ->willReturn(\Stripe\StripeObject::constructFrom([]))
        ;

        $service = new ConcreteTestService($mockClient);
        $service->publicRequest('post', '/v2/test/resource', [
            'name' => 'test',
            'description' => null,
        ], []);

        self::assertSame('test', $capturedParams['name']);
        self::assertArrayHasKey('description', $capturedParams);
        self::assertNull($capturedParams['description']);
    }

    public function testRequestConvertsNullToEmptyStringForV1Path()
    {
        $capturedParams = null;
        $mockClient = $this->createMock(\Stripe\StripeClientInterface::class);
        $mockClient->expects(self::once())
            ->method('request')
            ->with(
                self::equalTo('post'),
                self::equalTo('/v1/test/resource'),
                self::callback(static function ($params) use (&$capturedParams) {
                    $capturedParams = $params;

                    return true;
                }),
                self::anything()
            )
            ->willReturn(\Stripe\StripeObject::constructFrom([]))
        ;

        $service = new ConcreteTestService($mockClient);
        $service->publicRequest('post', '/v1/test/resource', [
            'name' => 'test',
            'description' => null,
        ], []);

        self::assertSame('test', $capturedParams['name']);
        self::assertSame('', $capturedParams['description']);
    }

    public function testRequestCoercesInt64ParamsWhenSchemaProvided()
    {
        $capturedParams = null;
        $mockClient = $this->createMock(\Stripe\StripeClientInterface::class);
        $mockClient->expects(self::once())
            ->method('request')
            ->with(
                self::equalTo('post'),
                self::equalTo('/v2/test'),
                self::callback(static function ($params) use (&$capturedParams) {
                    $capturedParams = $params;

                    return true;
                }),
                self::anything()
            )
            ->willReturn(\Stripe\StripeObject::constructFrom([]))
        ;

        $service = new ConcreteTestService($mockClient);
        $schemas = [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'amount' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $service->publicRequest('post', '/v2/test', ['amount' => 100, 'currency' => 'usd'], [], $schemas);

        self::assertSame('100', $capturedParams['amount']);
        self::assertSame('usd', $capturedParams['currency']);
    }

    public function testRequestDoesNotCoerceWithoutSchema()
    {
        $capturedParams = null;
        $mockClient = $this->createMock(\Stripe\StripeClientInterface::class);
        $mockClient->expects(self::once())
            ->method('request')
            ->with(
                self::anything(),
                self::anything(),
                self::callback(static function ($params) use (&$capturedParams) {
                    $capturedParams = $params;

                    return true;
                }),
                self::anything()
            )
            ->willReturn(\Stripe\StripeObject::constructFrom([]))
        ;

        $service = new ConcreteTestService($mockClient);
        $service->publicRequest('post', '/v2/test', ['amount' => 100], []);

        self::assertSame(100, $capturedParams['amount']);
    }

    public function testRequestCollectionCoercesInt64Params()
    {
        $capturedParams = null;
        $mockClient = $this->createMock(\Stripe\StripeClientInterface::class);
        $mockClient->expects(self::once())
            ->method('requestCollection')
            ->with(
                self::anything(),
                self::anything(),
                self::callback(static function ($params) use (&$capturedParams) {
                    $capturedParams = $params;

                    return true;
                }),
                self::anything()
            )
            ->willReturn(\Stripe\Collection::constructFrom(['data' => []]))
        ;

        $service = new ConcreteTestService($mockClient);
        $schemas = [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'limit' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $service->publicRequestCollection('get', '/v2/test', ['limit' => 50], [], $schemas);

        self::assertSame('50', $capturedParams['limit']);
    }

    public function testRequestSearchResultCoercesInt64Params()
    {
        $capturedParams = null;
        $mockClient = $this->createMock(\Stripe\StripeClientInterface::class);
        $mockClient->expects(self::once())
            ->method('requestSearchResult')
            ->with(
                self::anything(),
                self::anything(),
                self::callback(static function ($params) use (&$capturedParams) {
                    $capturedParams = $params;

                    return true;
                }),
                self::anything()
            )
            ->willReturn(\Stripe\SearchResult::constructFrom(['data' => []]))
        ;

        $service = new ConcreteTestService($mockClient);
        $schemas = [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'amount_gte' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $service->publicRequestSearchResult('get', '/v2/test', ['amount_gte' => 1000], [], $schemas);

        self::assertSame('1000', $capturedParams['amount_gte']);
    }
}

/**
 * @internal
 * Concrete subclass that exposes protected methods for testing
 */
final class ConcreteTestService extends AbstractService
{
    public function publicRequest($method, $path, $params, $opts, $schemas = null)
    {
        return $this->request($method, $path, $params, $opts, $schemas);
    }

    public function publicRequestCollection($method, $path, $params, $opts, $schemas = null)
    {
        return $this->requestCollection($method, $path, $params, $opts, $schemas);
    }

    public function publicRequestSearchResult($method, $path, $params, $opts, $schemas = null)
    {
        return $this->requestSearchResult($method, $path, $params, $opts, $schemas);
    }
}
