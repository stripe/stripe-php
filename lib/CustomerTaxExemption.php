<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Location specific customer tax exemptions.
 *
 * @property string $id
 * @property string $object
 * @property null|(object{state: null|string, tax_type: string}&StripeObject) $ca
 * @property string $country
 * @property int $created
 * @property string $customer
 * @property null|bool $deleted Present and true when the exemption has been deleted.
 * @property string $effective_date ISO 8601 date (YYYY-MM-DD) when the exemption becomes effective.
 * @property null|string $expiration_date ISO 8601 date (YYYY-MM-DD) when the exemption expires.
 * @property bool $livemode
 * @property null|(object{state: string}&StripeObject) $us
 */
class CustomerTaxExemption extends ApiResource
{
    const OBJECT_NAME = 'customer_tax_exemption';
}
