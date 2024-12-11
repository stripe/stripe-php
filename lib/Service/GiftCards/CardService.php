<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\GiftCards;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CardService extends \Stripe\Service\AbstractService
{
    /**
     * List gift cards for an account.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\GiftCards\Card>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/gift_cards/cards', $params, $opts);
    }

    /**
     * Creates a new gift card object.
     *
     * @param null|array{active?: bool, created_by?: array{payment: array{payment_intent: string}, type: string}, currency: string, expand?: string[], initial_amount?: int, metadata?: \Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Card
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/gift_cards/cards', $params, $opts);
    }

    /**
     * Retrieve a gift card by id.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Card
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/gift_cards/cards/%s', $id), $params, $opts);
    }

    /**
     * Update a gift card.
     *
     * @param string $id
     * @param null|array{active?: bool, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Card
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/cards/%s', $id), $params, $opts);
    }

    /**
     * Validates a gift card code, returning the matching gift card object if it
     * exists.
     *
     * @param null|array{code: string, expand?: string[], giftcard_pin?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Card
     */
    public function validate($params = null, $opts = null)
    {
        return $this->request('post', '/v1/gift_cards/cards/validate', $params, $opts);
    }
}
