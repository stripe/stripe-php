<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Payments;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OffSessionPaymentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of OffSessionPayments matching a filter.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Payments\OffSessionPayment>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/payments/off_session_payments', $params, $opts);
    }

    /**
     * Cancel an OffSessionPayment that has previously been created.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/off_session_payments/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates an OffSessionPayment object.
     *
     * @param null|array{amount: \Stripe\StripeObject, amount_details?: array{discount_amount?: int, line_items: array{discount_amount?: int, product_code?: string, product_name: string, quantity: int, tax?: array{total_tax_amount?: int}, unit_cost: int}[], shipping?: array{amount?: int, from_postal_code?: string, to_postal_code?: string}, tax?: array{total_tax_amount?: int}}, cadence: string, customer: string, mandate_data?: array{customer_acceptance: array{accepted_at?: string, type: string}}, metadata: array<string, string>, on_behalf_of?: string, payment_method: string, payment_method_options?: array{card?: array{network_transaction_id: string}}, payments_orchestration?: array{enabled: bool}, retry_details?: array{retry_policy?: string, retry_strategy: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, test_clock?: string, transfer_data?: array{amount?: int, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/payments/off_session_payments', $params, $opts);
    }

    /**
     * Retrieves the details of an OffSessionPayment that has previously been created.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/payments/off_session_payments/%s', $id), $params, $opts);
    }
}
