<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\StripeClient
 */
final class StripeClientTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    /** @var \Stripe\StripeClient */
    private $client;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->client = new StripeClient('sk_test_123');
    }

    public function testExposesPropertiesForServices()
    {
        static::assertInstanceOf(\Stripe\Service\CouponService::class, $this->client->coupons);
        static::assertInstanceOf(\Stripe\Service\Issuing\IssuingServiceFactory::class, $this->client->issuing);
        static::assertInstanceOf(\Stripe\Service\Issuing\CardService::class, $this->client->issuing->cards);
    }

    public function testV2FinancialAccountsServiceNavigation()
    {
        $this->stubRequest(
            'get',
            '/v2/financial_accounts/fa_123/balances',
            null,
            null,
            false,
            [
                'data' => [['id' => '1', 'object' => 'account']],
                'next_page' => null,
            ],
            200,
            BaseStripeClient::DEFAULT_API_BASE
        );
        $fas = $this->client->v2->financialAccounts->balances->all('fa_123');
        static::assertInstanceOf(\Stripe\V2\Collection::class, $fas);
    }

    public function testListMethodReturnsPageableCollection()
    {
        $curlClientStub = $this->getMockBuilder(\Stripe\HttpClient\CurlClient::class)
            ->setMethods(['executeRequestWithRetries'])
            ->getMock()
        ;

        $curlClientStub->method('executeRequestWithRetries')
            ->willReturnOnConsecutiveCalls([
                '{"data": [{"id": "acct_123", "object": "account"}, {"id": "acct_456", "object": "account"}], "next_page": "page_2"}',
                200,
                [],
            ], [
                '{"data": [{"id": "acct_789", "object": "account"}], "next_page": null}',
                200,
                [],
            ])
        ;

        $cb = static::callback(function ($opts) {
            $this->assertContains('Authorization: Bearer sk_test_client', $opts[\CURLOPT_HTTPHEADER]);
            $this->assertContains('Content-Type: application/json', $opts[\CURLOPT_HTTPHEADER]);

            return true;
        });

        $curlClientStub->expects(static::exactly(2))
            ->method('executeRequestWithRetries')
            ->withConsecutive(
                [$cb, MOCK_URL . '/v2/accounts?limit=2'],
                [$cb, MOCK_URL . '/v2/accounts?limit=2&page=page_2']
            )
        ;

        ApiRequestor::setHttpClient($curlClientStub);

        $client = new StripeClient([
            'api_key' => 'sk_test_client',
            'api_base' => MOCK_URL,
        ]);

        $accounts = $client->v2->accounts->all(['limit' => 2]);
        static::assertInstanceOf(\Stripe\V2\Collection::class, $accounts);
        static::assertInstanceOf(\Stripe\V2\Account::class, $accounts->data[0]);

        $seen = [];
        foreach ($accounts->autoPagingIterator() as $account) {
            $seen[] = $account['id'];
        }

        static::assertSame(['acct_123', 'acct_456', 'acct_789'], $seen);
    }
}
