<?php

namespace Stripe\Service;

class PayoutService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of existing payouts sent to third-party bank accounts or that
     * Stripe has sent you. The payouts are returned in sorted order, with the most
     * recently created payouts appearing first.
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
        return $this->request('get', '/v1/payouts', $params, $opts);
    }

    /**
     * A previously created payout can be canceled if it has not yet been paid out.
     * Funds will be refunded to your available balance. You may not cancel automatic
     * Stripe payouts.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Payout
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payouts/%s/cancel', $id), $params, $opts);
    }

    /**
     * To send funds to your own bank account, you create a new payout object. Your <a
     * href="#balance">Stripe balance</a> must be able to cover the payout amount, or
     * you’ll receive an “Insufficient Funds” error.
     *
     * If your API key is in test mode, money won’t actually be sent, though everything
     * else will occur as if in live mode.
     *
     * If you are creating a manual payout on a Stripe account that uses multiple
     * payment source types, you’ll need to specify the source type balance that the
     * payout should draw from. The <a href="#balance_object">balance object</a>
     * details available and pending amounts by source type.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Payout
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payouts', $params, $opts);
    }

    /**
     * Retrieves the details of an existing payout. Supply the unique payout ID from
     * either a payout creation request or the payout list, and Stripe will return the
     * corresponding payout information.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Payout
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payouts/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified payout by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged. This request accepts only the
     * metadata as arguments.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Payout
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payouts/%s', $id), $params, $opts);
    }
}
