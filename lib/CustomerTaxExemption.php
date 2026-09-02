<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Location specific customer tax exemptions.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{state: null|string, tax_type: string}&StripeObject) $ca
 * @property string $country Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $customer ID of the customer this tax exemption belongs to.
 * @property null|bool $deleted Present and true when the exemption has been deleted.
 * @property string $effective_date ISO 8601 date (YYYY-MM-DD) when the exemption becomes effective.
 * @property null|string $expiration_date ISO 8601 date (YYYY-MM-DD) when the exemption expires.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|(object{state: string}&StripeObject) $us
 */
class CustomerTaxExemption extends ApiResource
{
    const OBJECT_NAME = 'customer_tax_exemption';
}
