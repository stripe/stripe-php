<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A (partner) margin represents a specific discount distributed in partner reseller programs to business partners who
 * resell products and services and earn a discount (margin) for doing so.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the margin can be applied to invoices, invoice items, or invoice line items. Defaults to <code>true</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $name Name of the margin that's displayed on, for example, invoices.
 * @property float $percent_off Percent that will be taken off the subtotal before tax (after all other discounts and promotions) of any invoice to which the margin is applied.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 */
class Margin extends ApiResource
{
    const OBJECT_NAME = 'margin';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
