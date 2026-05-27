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
     * @param null|array{components: array{buy_button?: array{enabled: bool}, customer_sheet?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_remove?: string}}, mobile_payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_remove?: string, payment_method_save?: string, payment_method_save_allow_redisplay_override?: string}}, payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_redisplay_limit?: int, payment_method_remove?: string, payment_method_save?: string, payment_method_save_usage?: string}}, pricing_table?: array{enabled: bool}, tax_id_element?: array{enabled: bool, features?: array{tax_id_redisplay?: string, tax_id_save?: string}}}, customer?: string, customer_account?: string, expand?: string[]} $params
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

    /**
     * Serializes a CustomerSession create request into a batch job JSONL line.
     *
     * @param null|array{components: array{buy_button?: array{enabled: bool}, customer_sheet?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_remove?: string}}, mobile_payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_remove?: string, payment_method_save?: string, payment_method_save_allow_redisplay_override?: string}}, payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_redisplay_limit?: int, payment_method_remove?: string, payment_method_save?: string, payment_method_save_usage?: string}}, pricing_table?: array{enabled: bool}, tax_id_element?: array{enabled: bool, features?: array{tax_id_redisplay?: string, tax_id_save?: string}}}, customer?: string, customer_account?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeBatchCreate($params = null, $opts = null)
    {
        $itemId = (new \Stripe\Util\RandomGenerator())->uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = isset($opts->headers['Stripe-Version']) ? $opts->headers['Stripe-Version'] : \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        $stripeContext = isset($opts->headers['Stripe-Context']) ? $opts->headers['Stripe-Context'] : null;
        if (null !== $stripeContext) {
            $item['context'] = $stripeContext;
        }

        return \json_encode($item);
    }
}
