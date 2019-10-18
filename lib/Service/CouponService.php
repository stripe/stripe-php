<?php

namespace Stripe\Service;

class CouponService extends AbstractService
{
    public function basePath()
    {
        return '/v1/coupons';
    }

    /**
     * List all coupons.
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
     * Create a coupon.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Coupon
     */
    public function create($params = [], $opts = [])
    {
        return $this->createObject($params, $opts);
    }

    /**
     * Delete a coupon.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Coupon
     */
    public function delete($id, $params = [], $opts = [])
    {
        return $this->deleteObject($id, $params, $opts);
    }

    /**
     * Retrieve a coupon.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Coupon
     */
    public function retrieve($id, $params = [], $opts = [])
    {
        return $this->retrieveObject($id, $params, $opts);
    }

    /**
     * Update a coupon.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Coupon
     */
    public function update($id, $params = [], $opts = [])
    {
        return $this->updateObject($id, $params, $opts);
    }
}
