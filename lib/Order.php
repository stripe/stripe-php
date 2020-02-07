<?php

namespace Stripe;

/**
 * Class Order
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the total amount for the order.
 * @property int|null $amount_returned The total amount that was returned to the customer.
 * @property string|null $application ID of the Connect Application that created the order.
 * @property int|null $application_fee A fee in cents that will be applied to the order and transferred to the application owner’s Stripe account. The request must be made with an OAuth key or the Stripe-Account header in order to take an application fee. For more information, see the application fees documentation.
 * @property string|\Stripe\Charge|null $charge The ID of the payment used to pay for the order. Present if the order status is <code>paid</code>, <code>fulfilled</code>, or <code>refunded</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|\Stripe\Customer|null $customer The customer used for the order.
 * @property string|null $email The email address of the customer placing the order.
 * @property string $external_coupon_code External coupon code to load for this order.
 * @property \Stripe\OrderItem[] $items List of items constituting the order. An order can have up to 25 items.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\Collection|null $returns A list of returns that have taken place for this order.
 * @property string|null $selected_shipping_method The shipping method that is currently selected for this order, if any. If present, it is equal to one of the <code>id</code>s of shipping methods in the <code>shipping_methods</code> array. At order creation time, if there are multiple shipping methods, Stripe will automatically selected the first method.
 * @property \Stripe\StripeObject|null $shipping The shipping address for the order. Present if the order is for goods to be shipped.
 * @property \Stripe\StripeObject[]|null $shipping_methods A list of supported shipping methods for this order. The desired shipping method can be specified either by updating the order, or when paying it.
 * @property string $status Current order status. One of <code>created</code>, <code>paid</code>, <code>canceled</code>, <code>fulfilled</code>, or <code>returned</code>. More details in the <a href="https://stripe.com/docs/orders/guide#understanding-order-statuses">Orders Guide</a>.
 * @property \Stripe\StripeObject|null $status_transitions The timestamps at which the order status was updated.
 * @property int|null $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 * @property string $upstream_id The user's order ID if it is different from the Stripe order ID.
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
