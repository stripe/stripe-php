<?php

// File generated from our OpenAPI spec

namespace Stripe\DelegatedCheckout;

/**
 * An order represents the post-checkout lifecycle of a delegated checkout purchase.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|OrderEvent $latest_order_event The latest order event for this order.
 * @property ((object{key: string, product_details: (object{description: null|string, images: null|string[], title: string}&\Stripe\StripeObject), quantity: (object{current: int, ordered: int, shipped: int}&\Stripe\StripeObject), sku_id: string, totals: null|(object{base_amount: null|int, discount: null|int, subtotal: null|int, tax: null|int, total: null|int}&\Stripe\StripeObject), unit_amount: int}&\Stripe\StripeObject))[] $line_items The line items in this order.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $permalink_url The permalink URL for this order.
 * @property string $requested_session The requested session associated with this order.
 * @property null|string $seller_reference The seller reference for this order.
 * @property null|(object{discount: null|int, fulfillment: null|int, subtotal: null|int, tax: null|int, total: null|int}&\Stripe\StripeObject) $totals The totals for this order.
 */
class Order extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'delegated_checkout.order';

    /**
     * Retrieves a delegated checkout order.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
