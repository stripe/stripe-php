<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\DelegatedCheckout;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OrderService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a delegated checkout order.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\DelegatedCheckout\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/delegated_checkout/orders/%s', $id), $params, $opts);
    }
}
