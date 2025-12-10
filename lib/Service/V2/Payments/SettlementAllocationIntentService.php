<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Payments;

/**
 * @property SettlementAllocationIntents\SplitService $splits
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SettlementAllocationIntentService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'splits' => SettlementAllocationIntents\SplitService::class,
    ];

    /**
     * Cancel SettlementAllocationIntent API.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/settlement_allocation_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Create SettlementAllocationIntent API.
     *
     * @param null|array{amount: array{value?: int, currency?: string}, expected_settlement_date: string, financial_account: string, metadata?: array<string, string>, reference: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/payments/settlement_allocation_intents', $params, $opts);
    }

    /**
     * Retrieve SettlementAllocationIntent API.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/payments/settlement_allocation_intents/%s', $id), $params, $opts);
    }

    /**
     * Submit SettlementAllocationIntent API.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/settlement_allocation_intents/%s/submit', $id), $params, $opts);
    }

    /**
     * Update SettlementAllocationIntent API.
     *
     * @param string $id
     * @param null|array{amount?: array{value?: int, currency?: string}, reference?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/settlement_allocation_intents/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
