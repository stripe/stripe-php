<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Tax;

/**
 * Per-account configuration controlling implicit behavior of Stripe Tax
 * across supported integration surfaces.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{automatic_tax_default_value: string}&\Stripe\StripeObject) $checkout_sessions Configuration for Checkout Sessions automatic tax behavior.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class IntegrationConfiguration extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'v2.tax.integration_configuration';
}
