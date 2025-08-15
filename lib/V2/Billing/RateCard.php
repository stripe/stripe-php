<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A RateCard represents a versioned set of usage-based prices (Rates). Each Rate is associated with one MeteredItem and
 * defines how much to charge for usage of that item. After you've set up a RateCard, you can subscribe customers to it
 * by creating a RateCardSubscription.
 *
 * @property string $id The ID of the RateCard.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $active Whether this RateCard is active. Inactive RateCards cannot be used in new activations or have new rates added.
 * @property int $created Timestamp of when the object was created.
 * @property string $currency The currency of this RateCard.
 * @property string $display_name A customer-facing name for the RateCard. This name is used in Stripe-hosted products like the Customer Portal and Checkout. It does not show up on Invoices. Maximum length of 250 characters.
 * @property string $latest_version The ID of this RateCard's most recently created version.
 * @property string $live_version The ID of the version that will be used by all Subscriptions when no specific version is specified.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $service_interval The interval for assessing service. For example, a monthly RateCard with a rate of $1 for the first 10 &quot;workloads&quot; and $2 thereafter means &quot;$1 per workload up to 10 workloads during a month of service.&quot; This is similar to but distinct from billing interval; the service interval deals with the rate at which the customer accumulates fees, while the billing interval in Cadence deals with the rate the customer is billed.
 * @property int $service_interval_count The length of the interval for assessing service. For example, set this to 3 and <code>service_interval</code> to <code>&quot;month&quot;</code> in order to specify quarterly service.
 * @property string $tax_behavior The Stripe Tax tax behavior - whether the rates are inclusive or exclusive of tax.
 */
class RateCard extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.rate_card';

    const SERVICE_INTERVAL_DAY = 'day';
    const SERVICE_INTERVAL_MONTH = 'month';
    const SERVICE_INTERVAL_WEEK = 'week';
    const SERVICE_INTERVAL_YEAR = 'year';

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';
}
