<?php

namespace Stripe;

/**
 * Class Coupon
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int|null $amount_off Amount (in the <code>currency</code> specified) that will be taken off the subtotal of any invoices for this customer.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|null $currency If <code>amount_off</code> has been set, the three-letter <a href="https://stripe.com/docs/currencies">ISO code for the currency</a> of the amount to take off.
 * @property string $duration One of <code>forever</code>, <code>once</code>, and <code>repeating</code>. Describes how long a customer who applies this coupon will get the discount.
 * @property int|null $duration_in_months If <code>duration</code> is <code>repeating</code>, the number of months the coupon applies. Null if coupon <code>duration</code> is <code>forever</code> or <code>once</code>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int|null $max_redemptions Maximum number of times this coupon can be redeemed, in total, across all customers, before it is no longer valid.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|null $name Name of the coupon displayed to customers on for instance invoices or receipts.
 * @property float|null $percent_off Percent that will be taken off the subtotal of any invoices for this customer for the duration of the coupon. For example, a coupon with percent_off of 50 will make a %s100 invoice %s50 instead.
 * @property int|null $redeem_by Date after which the coupon can no longer be redeemed.
 * @property int $times_redeemed Number of times this coupon has been applied to a customer.
 * @property bool $valid Taking account of the above properties, whether this coupon can still be applied to a customer.
 *
 * @package Stripe
 */
class Coupon extends ApiResource
{
    const OBJECT_NAME = 'coupon';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
