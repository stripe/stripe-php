<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OutboundPaymentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of OutboundPayments that match the provided filters.
     *
     * @param null|array{created?: string, created_gt?: string, created_gte?: string, created_lt?: string, created_lte?: string, limit?: int, recipient?: string, status?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\OutboundPayment>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/outbound_payments', $params, $opts);
    }

    /**
     * Cancels an OutboundPayment. Only processing OutboundPayments can be canceled.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundPayment
     *
     * @throws \Stripe\Exception\AlreadyCanceledException
     * @throws \Stripe\Exception\NotCancelableException
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/outbound_payments/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates an OutboundPayment.
     *
     * @param null|array{amount: array{value?: int, currency?: string}, delivery_options?: array{speed?: string, bank_account?: string, paper_check?: array{memo?: string, shipping_speed?: string, signature: string}}, description?: string, from: array{currency: string, financial_account: string}, metadata?: array<string, string>, outbound_payment_quote?: string, recipient_notification?: array{setting: string}, recipient_verification?: string, to: array{currency?: string, payout_method?: string, recipient: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundPayment
     *
     * @throws \Stripe\Exception\InsufficientFundsException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     * @throws \Stripe\Exception\QuotaExceededException
     * @throws \Stripe\Exception\RecipientNotNotifiableException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/outbound_payments', $params, $opts);
    }

    /**
     * Retrieves the details of an existing OutboundPayment by passing the unique
     * OutboundPayment ID from either the OutboundPayment create or list response.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/outbound_payments/%s', $id), $params, $opts);
    }
}
