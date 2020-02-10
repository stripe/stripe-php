<?php

namespace Stripe;

/**
 * Class Review
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|null $billing_zip The ZIP or postal code of the card used, if applicable.
 * @property string|\Stripe\Charge|null $charge The charge associated with this review.
 * @property string|null $closed_reason The reason the review was closed, or null if it has not yet been closed. One of <code>approved</code>, <code>refunded</code>, <code>refunded_as_fraud</code>, or <code>disputed</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|null $ip_address The IP address where the payment originated.
 * @property \Stripe\StripeObject|null $ip_address_location Information related to the location of the payment. Note that this information is an approximation and attempts to locate the nearest population center - it should not be used to determine a specific address.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property bool $open If <code>true</code>, the review needs action.
 * @property string $opened_reason The reason the review was opened. One of <code>rule</code> or <code>manual</code>.
 * @property string|\Stripe\PaymentIntent $payment_intent The PaymentIntent ID associated with this review, if one exists.
 * @property string $reason The reason the review is currently open or closed. One of <code>rule</code>, <code>manual</code>, <code>approved</code>, <code>refunded</code>, <code>refunded_as_fraud</code>, or <code>disputed</code>.
 * @property \Stripe\StripeObject|null $session Information related to the browsing session of the user who initiated the payment.
 *
 * @package Stripe
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
    const REASON_APPROVED          = 'approved';
    const REASON_DISPUTED          = 'disputed';
    const REASON_MANUAL            = 'manual';
    const REASON_REFUNDED          = 'refunded';
    const REASON_REFUNDED_AS_FRAUD = 'refunded_as_fraud';
    const REASON_RULE              = 'rule';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Review The approved review.
     */
    public function approve($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/approve';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
