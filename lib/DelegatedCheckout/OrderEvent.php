<?php

// File generated from our OpenAPI spec

namespace Stripe\DelegatedCheckout;

/**
 * An order event represents a change to a delegated checkout order.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{amount: null|int, currency: null|string, description: string, line_items: null|(object{key: string, quantity: int}&\Stripe\StripeObject)[], status: string, type: string}&\Stripe\StripeObject) $adjustment The adjustment details for this order event.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{carrier: null|string, delivered_at: null|int, line_items: (object{key: string, quantity: int}&\Stripe\StripeObject)[], shipped_at: null|int, status: string, tracking_number: null|string, tracking_url: null|string}&\Stripe\StripeObject) $fulfillment The fulfillment details for this order event.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property int $occurred_at Time at which this event occurred. Measured in seconds since the Unix epoch.
 * @property string $order The delegated checkout order associated with this order event.
 * @property string $requested_session The requested session associated with this order event.
 * @property string $type The type of order event.
 */
class OrderEvent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'delegated_checkout.order_event';

    const TYPE_ADJUSTMENT = 'adjustment';
    const TYPE_FULFILLMENT = 'fulfillment';
}
