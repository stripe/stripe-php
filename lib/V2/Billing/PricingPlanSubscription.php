<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Pricing Plan Subscription represents a customer's active subscription to a Pricing Plan. It tracks both the servicing
 * status (whether the customer is receiving service) and collection status (whether payments are current). Subscriptions
 * are created through Billing Intents and bill according to the associated Billing Cadence.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $billing_cadence The ID of the Billing Cadence this subscription is billed on.
 * @property null|(object{comment?: string, feedback?: string, reason?: string}&\Stripe\StripeObject) $cancellation_details Details about why the subscription was canceled, if applicable. Includes system-generated reason.
 * @property string $collection_status Current collection status of this subscription.
 * @property (object{awaiting_customer_action_at?: string, current_at?: string, past_due_at?: string, paused_at?: string, unpaid_at?: string}&\Stripe\StripeObject) $collection_status_transitions Timestamps for collection status transitions.
 * @property int $created Time at which the object was created.
 * @property null|(object{discount: string, end?: int, promotion_code?: string, source: (object{coupon?: string, type: string}&\Stripe\StripeObject), start: int}&\Stripe\StripeObject)[] $discount_details Details about Discounts applied to this subscription.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $pricing_plan The ID of the Pricing Plan for this subscription.
 * @property null|(object{license_fee_details?: (object{currency: string, display_name: string, license_fee: string, license_fee_version: string, quantity: int, service_cycle: (object{interval: string, interval_count: int}&\Stripe\StripeObject), tiering_mode?: string, tiers: (object{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}&\Stripe\StripeObject)[], transform_quantity?: (object{divide_by: int, round: string}&\Stripe\StripeObject), unit_amount?: string, unit_label?: string}&\Stripe\StripeObject), pricing_plan_component: string, rate_card_details?: (object{currency: string, display_name: string, rate_card: string, rate_card_version: string, service_cycle: (object{interval: string, interval_count: int}&\Stripe\StripeObject), tax_behavior: string}&\Stripe\StripeObject), recurring_credit_grant_details?: (object{credit_grant_details?: (object{amount: (object{type: string, custom_pricing_unit?: (object{custom_pricing_unit_details?: CustomPricingUnit, id: string, value: string}&\Stripe\StripeObject), monetary?: \Stripe\StripeObject}&\Stripe\StripeObject), applicability_config: (object{scope: (object{billable_items?: string[], price_type?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), expiry_config: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), credit_grant_per_tenant_details?: (object{amount: (object{type: string, custom_pricing_unit?: (object{custom_pricing_unit_details?: CustomPricingUnit, id: string, value: string}&\Stripe\StripeObject), monetary?: \Stripe\StripeObject}&\Stripe\StripeObject), applicability_config: (object{scope: (object{billable_items?: string[], price_type?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), expiry_config: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), recurring_credit_grant: string, service_cycle: (object{interval: string, interval_count: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[] $pricing_plan_component_details Pricing plan component details for the subscription, populated when pricing_plan_component_details is included.
 * @property string $pricing_plan_version The ID of the Pricing Plan Version for this subscription.
 * @property string $servicing_status Current servicing status of this subscription.
 * @property (object{activated_at?: string, canceled_at?: string, paused_at?: string, will_activate_at?: string, will_cancel_at?: string}&\Stripe\StripeObject) $servicing_status_transitions Timestamps for servicing status transitions.
 * @property null|string $test_clock The ID of the Test Clock of the associated Billing Cadence, if any.
 */
class PricingPlanSubscription extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan_subscription';

    public static function fieldEncodings()
    {
        return [
            'pricing_plan_component_details' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => [
                        'license_fee_details' => [
                            'kind' => 'object',
                            'fields' => [
                                'transform_quantity' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'divide_by' => [
                                            'kind' => 'int64_string',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    const COLLECTION_STATUS_AWAITING_CUSTOMER_ACTION = 'awaiting_customer_action';
    const COLLECTION_STATUS_CURRENT = 'current';
    const COLLECTION_STATUS_PAST_DUE = 'past_due';
    const COLLECTION_STATUS_PAUSED = 'paused';
    const COLLECTION_STATUS_UNPAID = 'unpaid';

    const SERVICING_STATUS_ACTIVE = 'active';
    const SERVICING_STATUS_CANCELED = 'canceled';
    const SERVICING_STATUS_PAUSED = 'paused';
    const SERVICING_STATUS_PENDING = 'pending';
}
