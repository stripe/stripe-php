<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class SetupIntentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of SetupIntents.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SetupIntent>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/setup_intents', $params, $opts);
    }

    /**
     * A SetupIntent object can be canceled when it is in one of these statuses:
     * `requires_payment_method`, `requires_confirmation`, or
     * `requires_action`.
     *
     * Once canceled, setup is abandoned and any operations on the SetupIntent will
     * fail with an error.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Confirm that your customer intends to set up the current or provided payment
     * method. For example, you would confirm a SetupIntent when a customer hits the
     * “Save” button on a payment method management page on your website.
     *
     * If the selected payment method does not require any additional steps from the
     * customer, the SetupIntent will transition to the `succeeded` status.
     *
     * Otherwise, it will transition to the `requires_action` status and
     * suggest additional actions via `next_action`. If setup fails, the
     * SetupIntent will transition to the `requires_payment_method` status.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a SetupIntent object.
     *
     * After the SetupIntent is created, attach a payment method and <a
     * href="/docs/api/setup_intents/confirm">confirm</a> to collect any required
     * permissions to charge the payment method later.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/setup_intents', $params, $opts);
    }

    /**
     * Retrieves the details of a SetupIntent that has previously been created.
     *
     * Client-side retrieval using a publishable key is allowed when the
     * `client_secret` is provided in the query string.
     *
     * When retrieved with a publishable key, only a subset of properties will be
     * returned. Please refer to the <a href="#setup_intent_object">SetupIntent</a>
     * object reference for more details.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/setup_intents/%s', $id), $params, $opts);
    }

    /**
     * Updates a SetupIntent object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s', $id), $params, $opts);
    }

    /**
     * Verifies microdeposits on a SetupIntent object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function verifyMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s/verify_microdeposits', $id), $params, $opts);
    }
}
