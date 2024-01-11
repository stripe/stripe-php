<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A customer session allows you to grant client access to Stripe's frontend SDKs (like StripeJs)
 * control over a customer.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $client_secret <p>The client secret of this customer session. Used on the client to set up secure access to the given <code>customer</code>.</p><p>The client secret can be used to provide access to <code>customer</code> from your frontend. It should not be stored, logged, or exposed to anyone other than the relevant customer. Make sure that you have TLS enabled on any page that includes the client secret.</p>
 * @property null|\Stripe\StripeObject $components Configuration for the components supported by this customer session.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|\Stripe\Customer $customer The customer the customer session was created for.
 * @property int $expires_at The timestamp at which this customer session will expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class CustomerSession extends ApiResource
{
    const OBJECT_NAME = 'customer_session';

    use ApiOperations\Create;
}
