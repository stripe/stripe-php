<?php

// File generated from our OpenAPI spec

namespace Stripe\Forwarding;

/**
 * Instructs Stripe to make a request on your behalf using the destination URL. The destination URL
 * is activated by Stripe at the time of onboarding. Stripe verifies requests with your credentials
 * provided during onboarding, and injects card details from the payment_method into the request.
 *
 * Stripe redacts all sensitive fields and headers, including authentication credentials and card numbers,
 * before storing the request and response data in the forwarding Request object, which are subject to a
 * 30-day retention period.
 *
 * You can provide a Stripe idempotency key to make sure that requests with the same key result in only one
 * outbound request. The Stripe idempotency key provided should be unique and different from any idempotency
 * keys provided on the underlying third-party request.
 *
 * Forwarding Requests are synchronous requests that return a response or time out according to
 * Stripe’s limits.
 *
 * Related guide: <a href="https://docs.stripe.com/payments/forwarding">Forward card details to third-party API endpoints</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $payment_method The PaymentMethod to insert into the forwarded request. Forwarding previously consumed PaymentMethods is allowed.
 * @property string[] $replacements The field kinds to be replaced in the forwarded request.
 * @property null|\Stripe\StripeObject $request_context Context about the request from Stripe's servers to the destination endpoint.
 * @property null|\Stripe\StripeObject $request_details The request that was sent to the destination endpoint. We redact any sensitive fields.
 * @property null|\Stripe\StripeObject $response_details The response that the destination endpoint returned to us. We redact any sensitive fields.
 * @property null|string $url The destination URL for the forwarded request. Must be supported by the config.
 */
class Request extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'forwarding.request';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
}
