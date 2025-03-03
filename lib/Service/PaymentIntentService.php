<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentIntentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of PaymentIntents.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentIntent>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_intents', $params, $opts);
    }

    /**
     * Manually reconcile the remaining amount for a <code>customer_balance</code>
     * PaymentIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function applyCustomerBalance($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/apply_customer_balance', $id), $params, $opts);
    }

    /**
     * You can cancel a PaymentIntent object when it’s in one of these statuses:
     * <code>requires_payment_method</code>, <code>requires_capture</code>,
     * <code>requires_confirmation</code>, <code>requires_action</code> or, <a
     * href="/docs/payments/intents">in rare cases</a>, <code>processing</code>.
     *
     * After it’s canceled, no additional charges are made by the PaymentIntent and any
     * operations on the PaymentIntent fail with an error. For PaymentIntents with a
     * <code>status</code> of <code>requires_capture</code>, the remaining
     * <code>amount_capturable</code> is automatically refunded.
     *
     * You can’t cancel the PaymentIntent for a Checkout Session. <a
     * href="/docs/api/checkout/sessions/expire">Expire the Checkout Session</a>
     * instead.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Capture the funds of an existing uncaptured PaymentIntent when its status is
     * <code>requires_capture</code>.
     *
     * Uncaptured PaymentIntents are cancelled a set number of days (7 by default)
     * after their creation.
     *
     * Learn more about <a href="/docs/payments/capture-later">separate authorization
     * and capture</a>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function capture($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/capture', $id), $params, $opts);
    }

    /**
     * Confirm that your customer intends to pay with current or provided payment
     * method. Upon confirmation, the PaymentIntent will attempt to initiate a payment.
     * If the selected payment method requires additional authentication steps, the
     * PaymentIntent will transition to the <code>requires_action</code> status and
     * suggest additional actions via <code>next_action</code>. If payment fails, the
     * PaymentIntent transitions to the <code>requires_payment_method</code> status or
     * the <code>canceled</code> status if the confirmation limit is reached. If
     * payment succeeds, the PaymentIntent will transition to the
     * <code>succeeded</code> status (or <code>requires_capture</code>, if
     * <code>capture_method</code> is set to <code>manual</code>). If the
     * <code>confirmation_method</code> is <code>automatic</code>, payment may be
     * attempted using our <a
     * href="/docs/stripe-js/reference#stripe-handle-card-payment">client SDKs</a> and
     * the PaymentIntent’s <a
     * href="#payment_intent_object-client_secret">client_secret</a>. After
     * <code>next_action</code>s are handled by the client, no additional confirmation
     * is required to complete the payment. If the <code>confirmation_method</code> is
     * <code>manual</code>, all payment attempts must be initiated using a secret key.
     * If any actions are required for the payment, the PaymentIntent will return to
     * the <code>requires_confirmation</code> state after those actions are completed.
     * Your server needs to then explicitly re-confirm the PaymentIntent to initiate
     * the next payment attempt. There is a variable upper limit on how many times a
     * PaymentIntent can be confirmed. After this limit is reached, any further calls
     * to this endpoint will transition the PaymentIntent to the <code>canceled</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a PaymentIntent object.
     *
     * After the PaymentIntent is created, attach a payment method and <a
     * href="/docs/api/payment_intents/confirm">confirm</a> to continue the payment.
     * Learn more about <a href="/docs/payments/payment-intents">the available payment
     * flows with the Payment Intents API</a>.
     *
     * When you use <code>confirm=true</code> during creation, it’s equivalent to
     * creating and confirming the PaymentIntent in the same call. You can use any
     * parameters available in the <a href="/docs/api/payment_intents/confirm">confirm
     * API</a> when you supply <code>confirm=true</code>.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_intents', $params, $opts);
    }

    /**
     * Perform an incremental authorization on an eligible <a
     * href="/docs/api/payment_intents/object">PaymentIntent</a>. To be eligible, the
     * PaymentIntent’s status must be <code>requires_capture</code> and <a
     * href="/docs/api/charges/object#charge_object-payment_method_details-card_present-incremental_authorization_supported">incremental_authorization_supported</a>
     * must be <code>true</code>.
     *
     * Incremental authorizations attempt to increase the authorized amount on your
     * customer’s card to the new, higher <code>amount</code> provided. Similar to the
     * initial authorization, incremental authorizations can be declined. A single
     * PaymentIntent can call this endpoint multiple times to further increase the
     * authorized amount.
     *
     * If the incremental authorization succeeds, the PaymentIntent object returns with
     * the updated <a
     * href="/docs/api/payment_intents/object#payment_intent_object-amount">amount</a>.
     * If the incremental authorization fails, a <a
     * href="/docs/error-codes#card-declined">card_declined</a> error returns, and no
     * other fields on the PaymentIntent or Charge update. The PaymentIntent object
     * remains capturable for the previously authorized amount.
     *
     * Each PaymentIntent can have a maximum of 10 incremental authorization attempts,
     * including declines. After it’s captured, a PaymentIntent can no longer be
     * incremented.
     *
     * Learn more about <a
     * href="/docs/terminal/features/incremental-authorizations">incremental
     * authorizations</a>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function incrementAuthorization($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/increment_authorization', $id), $params, $opts);
    }

    /**
     * Retrieves the details of a PaymentIntent that has previously been created.
     *
     * You can retrieve a PaymentIntent client-side using a publishable key when the
     * <code>client_secret</code> is in the query string.
     *
     * If you retrieve a PaymentIntent with a publishable key, it only returns a subset
     * of properties. Refer to the <a href="#payment_intent_object">payment intent</a>
     * object reference for more details.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_intents/%s', $id), $params, $opts);
    }

    /**
     * Search for PaymentIntents you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<\Stripe\PaymentIntent>
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/payment_intents/search', $params, $opts);
    }

    /**
     * Updates properties on a PaymentIntent object without confirming.
     *
     * Depending on which properties you update, you might need to confirm the
     * PaymentIntent again. For example, updating the <code>payment_method</code>
     * always requires you to confirm the PaymentIntent again. If you prefer to update
     * and confirm at the same time, we recommend updating properties through the <a
     * href="/docs/api/payment_intents/confirm">confirm API</a> instead.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s', $id), $params, $opts);
    }

    /**
     * Verifies microdeposits on a PaymentIntent object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentIntent
     */
    public function verifyMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/verify_microdeposits', $id), $params, $opts);
    }
}
