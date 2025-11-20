<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property null|(object{amount: (object{type: string, custom_pricing_unit?: (object{custom_pricing_unit_details?: CustomPricingUnit, id: string, value: string}&\Stripe\StripeObject), monetary?: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), applicability_config: (object{scope: (object{billable_items?: string[], price_type?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), category?: string, expiry_config: (object{type: string}&\Stripe\StripeObject), name: string, priority?: int}&\Stripe\StripeObject) $credit_grant Details for the credit grant. Provided only if <code>type</code> is &quot;credit_grant&quot;.
 * @property null|(object{amount: (object{type: string, custom_pricing_unit?: (object{custom_pricing_unit_details?: CustomPricingUnit, id: string, value: string}&\Stripe\StripeObject), monetary?: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), applicability_config: (object{scope: (object{billable_items?: string[], price_type?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), category?: string, expiry_config: (object{type: string}&\Stripe\StripeObject), name: string, priority?: int}&\Stripe\StripeObject) $credit_grant_per_tenant Details for the credit grant per tenant. Provided only if <code>type</code> is &quot;credit_grant_per_tenant&quot;.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for this service action.
 * @property string $service_interval The interval for assessing service.
 * @property int $service_interval_count The length of the interval for assessing service.
 * @property string $type The type of the service action.
 */
class ServiceAction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.service_action';

    const SERVICE_INTERVAL_DAY = 'day';
    const SERVICE_INTERVAL_MONTH = 'month';
    const SERVICE_INTERVAL_WEEK = 'week';
    const SERVICE_INTERVAL_YEAR = 'year';

    const TYPE_CREDIT_GRANT = 'credit_grant';
    const TYPE_CREDIT_GRANT_PER_TENANT = 'credit_grant_per_tenant';
}
