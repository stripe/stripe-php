<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Treasury;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TransactionEntryService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of TransactionEntry objects.
     *
     * @param null|array{created?: array|int, effective_at?: array|int, ending_before?: string, expand?: string[], financial_account: string, limit?: int, order_by?: string, starting_after?: string, transaction?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Treasury\TransactionEntry>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/treasury/transaction_entries', $params, $opts);
    }

    /**
     * Retrieves a TransactionEntry object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\TransactionEntry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/treasury/transaction_entries/%s', $id), $params, $opts);
    }
}
