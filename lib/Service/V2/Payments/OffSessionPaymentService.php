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
     * @param null|array{application_fee_amount?: \Stripe\StripeObject, automatic_tax?: array{enabled: bool}, currency?: string, customer?: string, customer_account?: string, description?: string, items?: array{one_time_price: array{items: array{price?: string, price_data?: array{product?: string, product_data?: array{description?: string, images?: string[], metadata?: array<string, string>, name: string, tax_details?: array{performance_location?: string, tax_code?: string}, unit_label?: string}, tax_behavior?: string, unit_amount: \Stripe\StripeObject}, quantity: int}[]}, type: string}[], metadata?: array<string, string>, on_behalf_of?: string, payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, card?: array{exp_month: string, exp_year: string, last4?: string, network_token?: array{exp_month: string, exp_year: string, number: string, tokenization_method: string}, number?: string}, type: string}, payment_method_options?: array{card?: array{stored_credential_usage: string}}, raw_amount?: array{amount: \Stripe\StripeObject}, retries: array{enabled: bool}, statement_descriptor?: string, statement_descriptor_suffix?: string, target_date?: string, test_clock?: string, transfer_data?: array{amount?: int, destination: string}} $params
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

    /**
     * Updates the metadata and description of an OffSessionPayment in any status.
     *
     * @param string $id
     * @param null|array{description?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/off_session_payments/%s', $id), $params, $opts);
    }
}
