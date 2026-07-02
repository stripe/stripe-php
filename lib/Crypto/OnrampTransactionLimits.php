<?php

// File generated from our OpenAPI spec

namespace Stripe\Crypto;

/**
 * This object represents the limit for the remaining amount that the crypto customer can onramp.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $crypto_customer_id The ID of the crypto customer.
 * @property \Stripe\StripeObject $limits <p>The remaining onramp limit for the crypto customer, separated by currency, payment method, and settlement speed.</p><p>Limits are shown for currencies that correspond to the regions where the customer previously transacted. If the customer has no prior transactions, we return limits for all supported currencies.</p>
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 */
class OnrampTransactionLimits extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'crypto.onramp_transaction_limits';

    /**
     * Retrieves the remaining onramp limit for a crypto customer.
     *
     * @param null|array|string $opts
     *
     * @return OnrampTransactionLimits
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
