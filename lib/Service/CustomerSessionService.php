<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CustomerSessionService extends AbstractService
{
    /**
     * Creates a Customer Session object that includes a single-use client secret that
     * you can use on your front-end to grant client-side API access for certain
     * customer resources.
     *
     * @param null|array{components: array{buy_button?: array{enabled: bool}, payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_redisplay_limit?: int, payment_method_remove?: string, payment_method_save?: string, payment_method_save_usage?: string}}, pricing_table?: array{enabled: bool}}, customer: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/customer_sessions', $params, $opts);
    }
}
