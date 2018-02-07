<?php

namespace Stripe;

/**
 * Class Plan
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $created
 * @property string $currency
 * @property string $interval
 * @property int $interval_count
 * @property bool $livemode
 * @property AttachedObject $metadata
 * @property string $nickname
 * @property string $product
 * @property int $trial_period_days
 */
class Plan extends ApiResource
{
    /**
     * @param array|string $id The ID of the plan to retrieve, or an options
     *     array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Plan
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Plan The created plan.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the plan to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Plan The updated plan.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Plan The deleted plan.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Plan The saved plan.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Plans
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }
}
