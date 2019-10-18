<?php

namespace Stripe\Service;

class PaymentIntentService extends AbstractService
{
    public function basePath()
    {
        return '/v1/payment_intents';
    }

    /**
     * List all payment intents.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = [], $opts = [])
    {
        return $this->allObjects($params, $opts);
    }

    /**
     * Capture a payment intent.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function capture($id, $params = [], $opts = [])
    {
        return $this->request('post', $this->instancePath($id) . '/capture', $params, $opts);
    }

    /**
     * Confirm a payment intent.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function confirm($id, $params = [], $opts = [])
    {
        return $this->request('post', $this->instancePath($id) . '/confirm', $params, $opts);
    }

    /**
     * Create a payment intent.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function create($params = [], $opts = [])
    {
        return $this->createObject($params, $opts);
    }

    /**
     * Retrieve a payment intent.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function retrieve($id, $params = [], $opts = [])
    {
        return $this->retrieveObject($id, $params, $opts);
    }

    /**
     * Update a payment intent.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\PaymentIntent
     */
    public function update($id, $params = [], $opts = [])
    {
        return $this->updateObject($id, $params, $opts);
    }
}
