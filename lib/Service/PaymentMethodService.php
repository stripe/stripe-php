<?php

namespace Stripe\Service;

class PaymentMethodService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of PaymentMethods for a given Customer.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->request('get', '/v1/payment_methods', $params, $opts);
    }

    /**
     * Attaches a PaymentMethod object to a Customer.
     *
     * To use this PaymentMethod as the default for invoice or subscription payments,
     * set <a
     * href="/docs/api/customers/update#update_customer-invoice_settings-default_payment_method"><code>invoice_settings.default_payment_method</code></a>,
     * on the Customer to the PaymentMethod’s ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function attach($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_methods/%s/attach', $id), $params, $opts);
    }

    /**
     * Creates a PaymentMethod object. Read the <a
     * href="/docs/stripe-js/reference#stripe-create-payment-method">Stripe.js
     * reference</a> to learn how to create PaymentMethods via Stripe.js.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_methods', $params, $opts);
    }

    /**
     * Detaches a PaymentMethod object from a Customer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function detach($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_methods/%s/detach', $id), $params, $opts);
    }

    /**
     * Retrieves a PaymentMethod object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_methods/%s', $id), $params, $opts);
    }

    /**
     * Updates a PaymentMethod object. A PaymentMethod must be attached a customer to
     * be updated.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_methods/%s', $id), $params, $opts);
    }
}
