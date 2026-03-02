<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Funds that are in transit and destined for another balance or another connected account.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{available: int, pending: int}&StripeObject) $balance
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 */
class TransitBalance extends ApiResource
{
    const OBJECT_NAME = 'transit_balance';
}
