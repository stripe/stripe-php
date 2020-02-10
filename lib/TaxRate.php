<?php

namespace Stripe;

/**
 * Class TaxRate
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Defaults to <code>true</code>. When set to <code>false</code>, this tax rate cannot be applied to objects in the API, but will still be applied to subscriptions and invoices that already have it set.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|null $description An arbitrary string attached to the tax rate for your internal use only. It will not be visible to your customers.
 * @property string $display_name The display name of the tax rates as it will appear to your customer on their receipt email, PDF, and the hosted invoice page.
 * @property bool $inclusive This specifies if the tax rate is inclusive or exclusive.
 * @property string|null $jurisdiction The jurisdiction for the tax rate.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property float $percentage This represents the tax rate percent out of 100.
 *
 * @package Stripe
 */
class TaxRate extends ApiResource
{
    const OBJECT_NAME = 'tax_rate';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
