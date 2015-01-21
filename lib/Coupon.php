<?php

namespace Stripe;

class Coupon extends ApiResource
{
    /**
     * @param string $id The ID of the coupon to retrieve.
     * @param string|null $apiKey
     *
     * @return Coupon
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Coupon The created coupon.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }

    /**
     * @param array|null $params
     *
     * @return Coupon The deleted coupon.
     */
    public function delete($params = null)
    {
        return self::_delete($params);
    }

    /**
     * @return Coupon The saved coupon.
     */
    public function save()
    {
        return self::_save();
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of Coupons.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }
}
