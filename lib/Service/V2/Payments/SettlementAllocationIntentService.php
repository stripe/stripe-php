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
     * Cancels an existing SettlementAllocationIntent. Only SettlementAllocationIntent
     * with status `pending`, `submitted` and `errored` can be `canceled`.
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
     * Create a new SettlementAllocationIntent.
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
     * Retrieve an existing SettlementAllocationIntent.
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
     * Submits a SettlementAllocationIntent. Only SettlementAllocationIntent with
     * status `pending` can be `submitted`. The net sum of
     * SettlementAllocationIntentSplit amount must be equal to
     * SettlementAllocationIntent amount to be eligible to be submitted.
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
     * Updates SettlementAllocationIntent. Only SettlementAllocationIntent with status
     * `pending`, `submitted` and `errored` can be updated. Only amount and reference
     * fields can be updated for a SettlementAllocationIntent and at least one must be
     * present. Updating an `amount` moves the SettlementAllocationIntent `pending`
     * status and updating the `reference` for `errored` SettlementAllocationIntent
     * moves it to `submitted`.
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
