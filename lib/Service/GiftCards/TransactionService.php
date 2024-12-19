<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\GiftCards;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TransactionService extends \Stripe\Service\AbstractService
{
    /**
     * List gift card transactions for a gift card.
     *
     * @param null|array{ending_before?: string, expand?: string[], gift_card?: string, limit?: int, starting_after?: string, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\GiftCards\Transaction>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/gift_cards/transactions', $params, $opts);
    }

    /**
     * Cancel a gift card transaction.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Transaction
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/transactions/%s/cancel', $id), $params, $opts);
    }

    /**
     * Confirm a gift card transaction.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Transaction
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/transactions/%s/confirm', $id), $params, $opts);
    }

    /**
     * Create a gift card transaction.
     *
     * @param null|array{amount: int, confirm?: bool, created_by?: array{payment: array{payment_intent: string}, type: string}, currency: string, description?: string, expand?: string[], gift_card: string, metadata?: \Stripe\StripeObject, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Transaction
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/gift_cards/transactions', $params, $opts);
    }

    /**
     * Retrieves the gift card transaction.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Transaction
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/gift_cards/transactions/%s', $id), $params, $opts);
    }

    /**
     * Update a gift card transaction.
     *
     * @param string $id
     * @param null|array{description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Transaction
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/transactions/%s', $id), $params, $opts);
    }
}
