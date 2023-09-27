<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class RefundService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of all refunds you created. We return the refunds in sorted
     * order, with the most recent refunds appearing first The 10 most recent refunds
     * are always available by default on the Charge object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Refund>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/refunds', $params, $opts);
    }

    /**
     * Cancels a refund with a status of <code>requires_action</code>.
     *
     * You can’t cancel refunds in other states. Only refunds for payment methods that
     * require customer action can enter the <code>requires_action</code> state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Refund
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/refunds/%s/cancel', $id), $params, $opts);
    }

    /**
     * When you create a new refund, you must specify a Charge or a PaymentIntent
     * object on which to create it.
     *
     * Creating a new refund will refund a charge that has previously been created but
     * not yet refunded. Funds will be refunded to the credit or debit card that was
     * originally charged.
     *
     * You can optionally refund only part of a charge. You can do so multiple times,
     * until the entire charge has been refunded.
     *
     * Once entirely refunded, a charge can’t be refunded again. This method will raise
     * an error when called on an already-refunded charge, or when trying to refund
     * more money than is left on a charge.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Refund
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/refunds', $params, $opts);
    }

    /**
     * Retrieves the details of an existing refund.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Refund
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/refunds/%s', $id), $params, $opts);
    }

    /**
     * Updates the refund that you specify by setting the values of the passed
     * parameters. Any parameters that you don’t provide remain unchanged.
     *
     * This request only accepts <code>metadata</code> as an argument.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Refund
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/refunds/%s', $id), $params, $opts);
    }
}
