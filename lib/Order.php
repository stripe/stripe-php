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
 * @property StripeObject $metadata
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
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const OBJECT_NAME = "order";

    /**
     * @param $params
     * @param $opts
     *
     * @return Order The paid order.
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function pay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/pay';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param $params
     * @param $opts
     *
     * @return OrderReturn The newly created return.
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function returnOrder($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/returns';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        return Util\Util::convertToStripeObject($response, $opts);
    }
}
