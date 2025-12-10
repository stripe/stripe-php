<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{type: string, invoice_discount_rule?: (object{applies_to: string, invoice_discount_rule?: string, type: string, percent_off?: (object{maximum_applications: (object{type: string}&\Stripe\StripeObject), percent_off: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $apply Details for an apply action.
 * @property int $created Time at which the object was created.
 * @property null|(object{collect_at: string, effective_at: (object{timestamp?: int, type: string}&\Stripe\StripeObject), type: string, pricing_plan_subscription_details?: (object{overrides?: (object{partial_period_behaviors: (object{type: string, license_fee?: (object{credit_proration_behavior: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), pricing_plan_subscription: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $deactivate Details for a deactivate action.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{collect_at: string, effective_at: (object{timestamp?: int, type: string}&\Stripe\StripeObject), type: string, pricing_plan_subscription_details?: (object{component_configurations: (object{quantity?: int, lookup_key?: string, pricing_plan_component?: string}&\Stripe\StripeObject)[], new_pricing_plan: string, new_pricing_plan_version: string, overrides?: (object{partial_period_behaviors: (object{type: string, license_fee?: (object{credit_proration_behavior: string, debit_proration_behavior: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), pricing_plan_subscription: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $modify Details for a modify action.
 * @property null|(object{type: string, invoice_discount_rule?: string}&\Stripe\StripeObject) $remove Details for a remove action.
 * @property null|(object{collect_at: string, effective_at: (object{timestamp?: int, type: string}&\Stripe\StripeObject), type: string, pricing_plan_subscription_details?: (object{component_configurations: (object{quantity?: int, lookup_key?: string, pricing_plan_component?: string}&\Stripe\StripeObject)[], metadata?: \Stripe\StripeObject, overrides?: (object{partial_period_behaviors: (object{type: string, license_fee?: (object{debit_proration_behavior: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), pricing_plan: string, pricing_plan_subscription?: string, pricing_plan_version: string}&\Stripe\StripeObject), v1_subscription_details?: (object{description?: string, items: (object{metadata?: \Stripe\StripeObject, price: string, quantity?: int}&\Stripe\StripeObject)[], metadata?: \Stripe\StripeObject}&\Stripe\StripeObject)}&\Stripe\StripeObject) $subscribe Details for a subscribe action.
 * @property string $type Type of the Billing Intent Action.
 */
class IntentAction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.intent_action';

    const TYPE_APPLY = 'apply';
    const TYPE_DEACTIVATE = 'deactivate';
    const TYPE_MODIFY = 'modify';
    const TYPE_REMOVE = 'remove';
    const TYPE_SUBSCRIBE = 'subscribe';
}
