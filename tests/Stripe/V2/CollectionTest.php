<?php

namespace Stripe\V2;

/**
 * @internal
 *
 * @covers \Stripe\Collection
 */
final class CollectionTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    /** @var Collection */
    private $fixture;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->fixture = Collection::constructFrom([
            'data' => [
                ['id' => 'pm_123', 'object' => 'pageablemodel'],
                ['id' => 'pm_456', 'object' => 'pageablemodel'],
            ],
            'next_page_url' => '/v2/pageablemodel?page=page_2',
            'previous_page_url' => null,
        ], ['api_key' => 'sk_test', 'stripe_context' => 'wksp_123'], 'v2');
    }

    public function testOffsetGetNumericIndex()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->compatExpectExceptionMessageMatches('/You tried to access the \d index/');

        $this->fixture[0];
    }

    public function testCanCount()
    {
        $collection = Collection::constructFrom([
            'data' => [['id' => '1']],
        ]);
        self::assertCount(1, $collection);

        $collection = Collection::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
        ]);
        self::assertCount(3, $collection);
    }

    public function testCanIterate()
    {
        $collection = Collection::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
            'next_page_url' => null,
            'previous_page_url' => null,
        ]);

        $seen = [];
        foreach ($collection as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['1', '2', '3'], $seen);
    }

    public function testCanIterateBackwards()
    {
        $collection = Collection::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
            'next_page_url' => null,
            'previous_page_url' => null,
        ]);

        $seen = [];
        foreach ($collection->getReverseIterator() as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['3', '2', '1'], $seen);
    }

    public function testSupportsIteratorToArray()
    {
        $seen = [];
        foreach (\iterator_to_array($this->fixture) as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['pm_123', 'pm_456'], $seen);
    }

    public function testAutoPagingIteratorSupportsOnePage()
    {
        $lo = Collection::constructFrom([
            'data' => [
                ['id' => '1'],
                ['id' => '2'],
                ['id' => '3'],
            ],
            'next_page_url' => null,
            'previous_page_url' => null,
        ]);

        $seen = [];
        foreach ($lo->autoPagingIterator() as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['1', '2', '3'], $seen);
    }

    public function testAutoPagingIteratorSupportsTwoPages()
    {
        $lo = Collection::constructFrom([
            'data' => [
                ['id' => '1'],
            ],
            'next_page_url' => '/v2/pageablemodel?foo=bar&page=page_2',
            'previous_page_url' => null,
        ]);

        $this->stubRequest(
            'GET',
            '/v2/pageablemodel?foo=bar&page=page_2',
            null,
            null,
            false,
            [
                'data' => [
                    ['id' => '2'],
                    ['id' => '3'],
                ],
                'next_page_url' => null,
                'previous_page_url' => null,
            ]
        );

        $seen = [];
        foreach ($lo->autoPagingIterator() as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['1', '2', '3'], $seen);
    }

    public function testAutoPagingIteratorSupportsIteratorToArray()
    {
        $this->stubRequest(
            'GET',
            '/v2/pageablemodel?page=page_2',
            null,
            null,
            false,
            [
                'data' => [['id' => 'pm_789']],
                'next_page_url' => null,
                'previous_page_url' => null,
            ]
        );

        $seen = [];
        foreach (\iterator_to_array($this->fixture->autoPagingIterator()) as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['pm_123', 'pm_456', 'pm_789'], $seen);
    }

    public function testForwardsRequestOpts()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturnOnConsecutiveCalls([
                '{"data": [{"id": "pm_777"}], "next_page_url": "/v2/pageablemodel?page_3", "previous_page_url": "/v2/pageablemodel?page_1"}',
                200,
                [],
            ], [
                '{"data": [{"id": "pm_888"}], "next_page_url": null, "previous_page_url": "/v2/pageablemodel?page_2"}',
                200,
                [],
            ])
        ;

        $curlClientStub->expects(self::exactly(2))
            ->method('executeRequestWithRetries')
            ->with(self::callback(function ($opts) {
                $this->assertContains('Authorization: Bearer sk_test', $opts[\CURLOPT_HTTPHEADER]);
                $this->assertContains('Stripe-Context: wksp_123', $opts[\CURLOPT_HTTPHEADER]);

                return true;
            }))
        ;

        \Stripe\ApiRequestor::setHttpClient($curlClientStub);

        $seen = [];
        foreach ($this->fixture->autoPagingIterator() as $item) {
            $seen[] = $item['id'];
        }

        self::assertSame(['pm_123', 'pm_456', 'pm_777', 'pm_888'], $seen);
    }
}
