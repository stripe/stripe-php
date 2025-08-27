<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Metered Item represents a billable item whose pricing is based on usage, measured by a meter. You can use rate cards
 * to specify the pricing and create subscriptions to these items.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property string $display_name Description that customers will see in the invoice line item. Maximum length of 250 characters.
 * @property string[] $invoice_presentation_dimensions Optional array of Meter dimensions to group event dimension keys for invoice line items.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular billable item. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $meter ID of the Meter that measures usage for this Metered Item.
 * @property (object{dimension: string, value: string}&\Stripe\StripeObject)[] $meter_segment_conditions Optional array of Meter segments to filter event dimension keys for billing.
 * @property null|(object{tax_code: string}&\Stripe\StripeObject) $tax_details Stripe Tax details.
 * @property null|string $unit_label The unit to use when displaying prices for this billable item in places like Checkout. For example, set this field to &quot;CPU-hour&quot; for Checkout to display &quot;(price) per CPU-hour&quot;, or &quot;1 million events&quot; to display &quot;(price) per 1 million events&quot;. Maximum length of 100 characters.
 */
class MeteredItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.metered_item';
}
