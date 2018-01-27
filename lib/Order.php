<?php

namespace Stripe;

/**
 * Class Order
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $amount_returned
 * @property string $application
 * @property int $application_fee
 * @property string $charge
 * @property int $created
 * @property string $currency
 * @property string $customer
 * @property string $email
 * @property string $external_coupon_code
 * @property mixed $items
 * @property bool $livemode
 * @property AttachedObject $metadata
 * @property Collection $returns
 * @property string $selected_shipping_method
 * @property mixed $shipping
 * @property mixed $shipping_methods
 * @property string $status
 * @property mixed $status_transitions
 * @property int $updated
 * @property string $upstream_id
 *
 * @package Stripe
 */
class Order extends ApiResource
{
    /**
     * @param array|string $id The ID of the order to retrieve, or an options
     *     array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Order
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Order The created Order.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the order to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Order The updated order.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Order The saved Order.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Orders
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @return Order The paid order.
     */
    public function pay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/pay';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @return OrderReturn The newly created return.
     */
    public function returnOrder($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/returns';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        return Util\Util::convertToStripeObject($response, $opts);
    }
}
