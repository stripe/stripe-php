<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A commercial term. Display order is independent of billing evaluation order.
 *
 * @property string $id The stable ID of the term.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{bill_schedule: (object{custom: (object{amount: \Stripe\StripeObject, bill_at: (object{timestamp: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[], type: string}&\Stripe\StripeObject), product: string, service_period?: (object{ends_at: (object{timestamp: string}&\Stripe\StripeObject), starts_at: (object{timestamp: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $ad_hoc_product Present when type is ad_hoc_product.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key The lookup key, unique across all term types on this contract.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs attached to the term.
 * @property null|(object{criteria: (object{terms?: string[], type: string}&\Stripe\StripeObject)[], ends_at?: (object{timestamp: string}&\Stripe\StripeObject), multiply?: (object{factor: string}&\Stripe\StripeObject), overwrite?: (object{unit_amount_decimal?: string}&\Stripe\StripeObject), priority: int, starts_at: (object{timestamp: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $pricing_override Present when type is pricing_override.
 * @property null|(object{ends_at?: (object{timestamp: string}&\Stripe\StripeObject), price: string, quantity?: string, starts_at: (object{timestamp: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $recurring_price Present when type is recurring_price.
 * @property string $type The type of this term.
 */
class ContractTerm extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.contract_term';

    public static function fieldEncodings()
    {
        return [
            'pricing_override' => [
                'kind' => 'object',
                'fields' => [
                    'multiply' => [
                        'kind' => 'object',
                        'fields' => ['factor' => ['kind' => 'decimal_string']],
                    ],
                    'overwrite' => [
                        'kind' => 'object',
                        'fields' => [
                            'unit_amount_decimal' => [
                                'kind' => 'decimal_string',
                            ],
                        ],
                    ],
                ],
            ],
            'recurring_price' => [
                'kind' => 'object',
                'fields' => ['quantity' => ['kind' => 'decimal_string']],
            ],
        ];
    }

    const TYPE_AD_HOC_PRODUCT = 'ad_hoc_product';
    const TYPE_PRICING_OVERRIDE = 'pricing_override';
    const TYPE_RECURRING_PRICE = 'recurring_price';
}
