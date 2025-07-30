<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Reviews can be used to supplement automated fraud detection with human expertise.
 *
 * Learn more about <a href="/radar">Radar</a> and reviewing payments
 * <a href="https://stripe.com/docs/radar/reviews">here</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $billing_zip The ZIP or postal code of the card used, if applicable.
 * @property null|Charge|string $charge The charge associated with this review.
 * @property null|string $closed_reason The reason the review was closed, or null if it has not yet been closed. One of <code>approved</code>, <code>refunded</code>, <code>refunded_as_fraud</code>, <code>disputed</code>, <code>redacted</code>, <code>canceled</code>, <code>payment_never_settled</code>, or <code>acknowledged</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $ip_address The IP address where the payment originated.
 * @property null|(object{city: null|string, country: null|string, latitude: null|float, longitude: null|float, region: null|string}&StripeObject) $ip_address_location Information related to the location of the payment. Note that this information is an approximation and attempts to locate the nearest population center - it should not be used to determine a specific address.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property bool $open If <code>true</code>, the review needs action.
 * @property string $opened_reason The reason the review was opened. One of <code>rule</code> or <code>manual</code>.
 * @property null|PaymentIntent|string $payment_intent The PaymentIntent ID associated with this review, if one exists.
 * @property string $reason The reason the review is currently open or closed. One of <code>rule</code>, <code>manual</code>, <code>approved</code>, <code>refunded</code>, <code>refunded_as_fraud</code>, <code>disputed</code>, <code>redacted</code>, <code>canceled</code>, <code>payment_never_settled</code>, or <code>acknowledged</code>.
 * @property null|(object{browser: null|string, device: null|string, platform: null|string, version: null|string}&StripeObject) $session Information related to the browsing session of the user who initiated the payment.
 */
class Review extends ApiResource
{
    const OBJECT_NAME = 'review';

    const CLOSED_REASON_APPROVED = 'approved';
    const CLOSED_REASON_CANCELED = 'canceled';
    const CLOSED_REASON_DISPUTED = 'disputed';
    const CLOSED_REASON_REDACTED = 'redacted';
    const CLOSED_REASON_REFUNDED = 'refunded';
    const CLOSED_REASON_REFUNDED_AS_FRAUD = 'refunded_as_fraud';

    const OPENED_REASON_MANUAL = 'manual';
    const OPENED_REASON_RULE = 'rule';

    /**
     * Returns a list of <code>Review</code> objects that have <code>open</code> set to
     * <code>true</code>. The objects are sorted in descending order by creation date,
     * with the most recently created object appearing first.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Review> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>Review</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Review
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

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
     * @return Review the approved review
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function approve($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/approve';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
