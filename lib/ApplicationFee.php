<?php

namespace Stripe;

/**
 * Class ApplicationFee
 *
 * @package Stripe
 */
class ApplicationFee extends ApiResource
{
    const PATH_REFUNDS = '/refunds';

    /**
     * This is a special case because the application fee endpoint has an
     *    underscore in it. The parent `className` function strips underscores.
     *
     * @return string The name of the class.
     */
    public static function className()
    {
        return 'application_fee';
    }

    /**
     * @param array|string $id The ID of the application fee to retrieve, or an
     *     options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return ApplicationFee
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of ApplicationFees
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApplicationFee The refunded application fee.
     */
    public function refund($params = null, $opts = null)
    {
        $this->refunds->create($params, $opts);
        $this->refresh();
        return $this;
    }

    /**
     * @param array|null $id The ID of the application fee on which to create the refund.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApplicationFeeRefund
     */
    public static function createRefund($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_REFUNDS, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the application fee to which the refund belongs.
     * @param array|null $refundId The ID of the refund to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApplicationFeeRefund
     */
    public static function retrieveRefund($id, $refundId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_REFUNDS, $refundId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the application fee to which the refund belongs.
     * @param array|null $refundId The ID of the refund to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApplicationFeeRefund
     */
    public static function updateRefund($id, $refundId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_REFUNDS, $refundId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the application fee on which to retrieve the refunds.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApplicationFeeRefund
     */
    public static function allRefunds($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_REFUNDS, $params, $opts);
    }
}
