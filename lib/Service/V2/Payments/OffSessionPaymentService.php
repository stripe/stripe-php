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
     * Captures an OffSessionPayment that has previously been created.
     *
     * @param string $id
     * @param null|array{amount_details?: array{discount_amount?: int, enforce_arithmetic_validation?: bool, line_items?: array{discount_amount?: int, product_code?: string, product_name: string, quantity: int, tax?: array{total_tax_amount: int}, unit_cost: int, unit_of_measure?: string}[], shipping?: array{amount?: int, from_postal_code?: string, to_postal_code?: string}, tax?: array{total_tax_amount: int}}, amount_to_capture?: int, application_fee_amount?: \Stripe\StripeObject, metadata?: array<string, string>, payment_details?: array{customer_reference?: string, order_reference?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function capture($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/off_session_payments/%s/capture', $id), $params, $opts);
    }

    /**
     * Creates an OffSessionPayment object.
     *
     * @param null|array{amount: \Stripe\StripeObject, amount_details?: array{discount_amount?: int, enforce_arithmetic_validation?: bool, line_items?: array{discount_amount?: int, product_code?: string, product_name: string, quantity: int, tax?: array{total_tax_amount: int}, unit_cost: int, unit_of_measure?: string}[], shipping?: array{amount?: int, from_postal_code?: string, to_postal_code?: string}, tax?: array{total_tax_amount: int}}, application_fee_amount?: \Stripe\StripeObject, cadence: string, capture?: array{capture_method: string}, customer: string, description?: string, metadata?: array<string, string>, on_behalf_of?: string, payment_details?: array{customer_reference?: string, order_reference?: string}, payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, card?: array{cvc?: string, exp_month: string, exp_year: string, number?: string}, type: string}, payment_method_options?: array{card?: array{mcc?: string, network_transaction_id?: string}}, payments_orchestration?: array{enabled: bool}, retry_details?: array{retry_policy?: string, retry_strategy?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, test_clock?: string, transfer_data?: array{amount?: int, destination: string}} $params
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
     * Pauses an OffSessionPayment that has previously been created.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function pause($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/off_session_payments/%s/pause', $id), $params, $opts);
    }

    /**
     * Resumes an OffSessionPayment that has previously been paused.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function resume($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/off_session_payments/%s/resume', $id), $params, $opts);
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
