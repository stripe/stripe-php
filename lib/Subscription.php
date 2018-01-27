<?php

namespace Stripe;

/**
 * Class Subscription
 *
 * @property string $id
 * @property string $object
 * @property float $application_fee_percent
 * @property string $billing
 * @property bool $cancel_at_period_end
 * @property int $canceled_at
 * @property int $created
 * @property int current_period_end
 * @property int current_period_start
 * @property string $customer
 * @property int $days_until_due
 * @property mixed $discount
 * @property int $ended_at
 * @property Collection $items
 * @property boolean $livemode
 * @property AttachedObject $metadata
 * @property mixed $plan
 * @property int $quantity
 * @property int $start
 * @property string $status
 * @property float $tax_percent
 * @property int $trial_end
 * @property int $trial_start
 *
 * @package Stripe
 */
class Subscription extends ApiResource
{
    /**
     * These constants are possible representations of the status field.
     *
     * @link https://stripe.com/docs/api#subscription_object-status
     */
    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_PAST_DUE = 'past_due';
    const STATUS_TRIALING = 'trialing';
    const STATUS_UNPAID = 'unpaid';

    /**
     * @param array|string $id The ID of the subscription to retrieve, or an
     *     options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Subscription
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Subscriptions
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Subscription The created subscription.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the subscription to retrieve.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Subscription The updated subscription.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|null $params
     *
     * @return Subscription The deleted subscription.
     */
    public function cancel($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Subscription The saved subscription.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @return Subscription The updated subscription.
     */
    public function deleteDiscount()
    {
        $url = $this->instanceUrl() . '/discount';
        list($response, $opts) = $this->_request('delete', $url);
        $this->refreshFrom(array('discount' => null), $opts, true);
    }
}
