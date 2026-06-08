<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class GiftCardService extends AbstractService
{
    /**
     * Activates a third-party gift card and optionally sets its balance.
     *
     * @param string $id
     * @param null|array{balance?: array{amount: int, currency: string}, expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCardOperation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/%s/activate', $id), $params, $opts);
    }

    /**
     * Cashout a third-party gift card by zeroing its balance.
     *
     * @param string $id
     * @param null|array{expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCardOperation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cashout($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/%s/cashout', $id), $params, $opts);
    }

    /**
     * Checks the balance of a third-party gift card.
     *
     * @param string $id
     * @param null|array{expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCardOperation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function checkBalance($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/%s/check_balance', $id), $params, $opts);
    }

    /**
     * Creates a gift card object.
     *
     * @param null|array{brand: string, exp_month?: int, exp_year?: int, expand?: string[], number?: string, pin?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCard
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/gift_cards', $params, $opts);
    }

    /**
     * Reloads a third-party gift card by adding the specified amount to its balance.
     *
     * @param string $id
     * @param null|array{amount: int, currency: string, expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCardOperation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reload($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/%s/reload', $id), $params, $opts);
    }

    /**
     * Retrieves a third-party gift card object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCard
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/gift_cards/%s', $id), $params, $opts);
    }

    /**
     * Voids a previously performed gift card operation.
     *
     * @param string $id
     * @param null|array{expand?: string[], on_behalf_of?: string, operation: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\GiftCardOperation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function voidOperation($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/gift_cards/%s/void_operation', $id), $params, $opts);
    }
}
