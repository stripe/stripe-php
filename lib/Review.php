<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Reviews can be used to supplement automated fraud detection with human
 * expertise.
 *
 * Learn more about [Radar](/radar) and reviewing payments [here](https://stripe.com/docs/radar/reviews).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $billing_zip The ZIP or postal code of the card used, if applicable.
 * @property null|string|\Stripe\Charge $charge The charge associated with this review.
 * @property null|string $closed_reason The reason the review was closed, or null if it has not yet been closed. One of `approved`, `refunded`, `refunded_as_fraud`, `disputed`, or `redacted`.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $ip_address The IP address where the payment originated.
 * @property null|\Stripe\StripeObject $ip_address_location Information related to the location of the payment. Note that this information is an approximation and attempts to locate the nearest population center - it should not be used to determine a specific address.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property bool $open If `true`, the review needs action.
 * @property string $opened_reason The reason the review was opened. One of `rule` or `manual`.
 * @property null|string|\Stripe\PaymentIntent $payment_intent The PaymentIntent ID associated with this review, if one exists.
 * @property string $reason The reason the review is currently open or closed. One of `rule`, `manual`, `approved`, `refunded`, `refunded_as_fraud`, `disputed`, or `redacted`.
 * @property null|\Stripe\StripeObject $session Information related to the browsing session of the user who initiated the payment.
 */
class Review extends ApiResource
{
    const OBJECT_NAME = 'review';

    use ApiOperations\All;
    use ApiOperations\Retrieve;

    /**
     * Possible string representations of the current, the opening or the closure reason of the review.
     * Not all of these enumeration apply to all of the ´reason´ fields. Please consult the Review object to
     * determine where these are apply.
     *
     * @see https://stripe.com/docs/api/radar/reviews/object
     */
    const REASON_APPROVED = 'approved';
    const REASON_DISPUTED = 'disputed';
    const REASON_MANUAL = 'manual';
    const REASON_REFUNDED = 'refunded';
    const REASON_REFUNDED_AS_FRAUD = 'refunded_as_fraud';
    const REASON_RULE = 'rule';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Review the approved review
     */
    public function approve($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/approve';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
