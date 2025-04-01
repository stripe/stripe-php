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
     * @param null|array{amount: \Stripe\StripeObject, delivery_options?: array{bank_account?: string}, from: array{currency: string, financial_account: string}, to: array{currency?: string, payout_method?: string, recipient: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundPaymentQuote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/outbound_payment_quotes', $params, $opts);
    }
}
