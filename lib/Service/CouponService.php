<?php

namespace Stripe\Service;

class CouponService extends AbstractService
{
    /**
     * List all coupons.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->request('get', '/v1/coupons', $params, $opts);
    }

    /**
     * Create a coupon.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Coupon
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/coupons', $params, $opts);
    }

    /**
     * Delete a coupon.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Coupon
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/coupons/%s', $id), $params, $opts);
    }

    /**
     * Retrieve a coupon.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Coupon
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/coupons/%s', $id), $params, $opts);
    }

    /**
     * Update a coupon.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Coupon
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/coupons/%s', $id), $params, $opts);
    }
}
