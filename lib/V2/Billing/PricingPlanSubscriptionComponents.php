<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A set of component subscriptions for a Pricing Plan Subscription.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{pricing_plan_component: string, type: string, license_fee_subscription?: string, rate_card_subscription?: string}&\Stripe\StripeObject)[] $components The component subscriptions of the Pricing Plan Subscription.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class PricingPlanSubscriptionComponents extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan_subscription_components';
}
