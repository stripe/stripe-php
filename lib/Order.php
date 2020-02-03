<?php

namespace Stripe;

/**
 * Class Order
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int|null $amount_returned
 * @property string|null $application
 * @property int|null $application_fee
 * @property string|null $charge
 * @property int $created
 * @property string $currency
 * @property string|null $customer
 * @property string|null $email
 * @property string $external_coupon_code
 * @property \Stripe\OrderItem[] $items
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property \Stripe\Collection|null $returns
 * @property string|null $selected_shipping_method
 * @property \Stripe\StripeObject|null $shipping
 * @property \Stripe\StripeObject[]|null $shipping_methods
 * @property string $status
 * @property \Stripe\StripeObject|null $status_transitions
 * @property int|null $updated
 * @property string $upstream_id
 *
 * @package Stripe
 */
class Order extends ApiResource
{
    const OBJECT_NAME = 'order';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\OrderReturn The newly created return.
     */
    public function returnOrder($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/returns';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Order The paid order.
     */
    public function pay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/pay';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
