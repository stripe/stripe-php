<?php

namespace Stripe\Service;

class PaymentIntentService extends AbstractService
{
    /**
     * List all payment intents.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->request('get', '/v1/payment_intents', $params, $opts);
    }

    /**
     * Capture a payment intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function capture($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/capture', $id), $params, $opts);
    }

    /**
     * Confirm a payment intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Create a payment intent.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_intents', $params, $opts);
    }

    /**
     * Retrieve a payment intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_intents/%s', $id), $params, $opts);
    }

    /**
     * Update a payment intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s', $id), $params, $opts);
    }
}
