<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OutboundPaymentQuoteService extends \Stripe\Service\AbstractService
{
    /**
     * Creates an OutboundPaymentQuote usable in an OutboundPayment.
     *
     * @param null|array{amount: array{value?: int, currency?: string}, delivery_options?: array{speed?: string, bank_account?: string}, from: array{currency: string, financial_account: string}, to: array{currency?: string, payout_method?: string, recipient: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundPaymentQuote
     *
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/outbound_payment_quotes', $params, $opts);
    }

    /**
     * Retrieves the details of an existing OutboundPaymentQuote by passing the unique
     * OutboundPaymentQuote ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundPaymentQuote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/outbound_payment_quotes/%s', $id), $params, $opts);
    }
}
