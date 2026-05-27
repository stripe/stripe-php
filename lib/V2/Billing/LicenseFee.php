<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A License Fee represents a versioned recurring charge for a Licensed Item, typically used for seat-based or quantity-based
 * pricing. Each License Fee defines the pricing structure (flat unit amount or tiered pricing) and service interval. After
 * creating a License Fee, you can subscribe customers to it by creating a License Fee Subscription.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $active Whether this License Fee is active. Inactive License Fees cannot be used in new activations or be modified.
 * @property int $created Timestamp of when the object was created.
 * @property string $currency Three-letter ISO currency code, in lowercase. Must be a supported currency.
 * @property string $display_name A customer-facing name for the license fee. This name is used in Stripe-hosted products like the Customer Portal and Checkout. It does not show up on Invoices. Maximum length of 250 characters.
 * @property LicensedItem $licensed_item A Licensed Item represents a billable item whose pricing is based on license fees. You can use license fees to specify the pricing and create subscriptions to these items.
 * @property string $live_version The ID of the License Fee Version used by all subscriptions when no specific version is specified.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular License Fee. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property (object{interval: string, interval_count: int}&\Stripe\StripeObject) $service_cycle The service cycle configuration for this License Fee.
 * @property string $tax_behavior The tax behavior for Stripe Tax — whether the license fee price includes or excludes tax.
 * @property null|string $tiering_mode Defines whether the tiering price is graduated or volume-based. In volume-based tiering, the maximum quantity within a period determines the per-unit price. In graduated tiering, the pricing changes as the quantity grows into new tiers. Can only be set if <code>tiers</code> is set.
 * @property (object{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}&\Stripe\StripeObject)[] $tiers Each element represents a pricing tier. Cannot be set if <code>unit_amount</code> is provided.
 * @property null|(object{divide_by: int, round: string}&\Stripe\StripeObject) $transform_quantity Apply a transformation to the reported usage or set quantity before computing the amount billed.
 * @property null|string $unit_amount The per-unit amount to be charged, represented as a decimal string in minor currency units with at most 12 decimal places. Cannot be set if <code>tiers</code> is provided.
 */
class LicenseFee extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.license_fee';

    public static function fieldEncodings()
    {
        return [
            'tiers' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => [
                        'up_to_decimal' => ['kind' => 'decimal_string'],
                    ],
                ],
            ],
            'transform_quantity' => [
                'kind' => 'object',
                'fields' => ['divide_by' => ['kind' => 'int64_string']],
            ],
        ];
    }

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';

    const TIERING_MODE_GRADUATED = 'graduated';
    const TIERING_MODE_VOLUME = 'volume';
}
