<?php

namespace Stripe;

/**
 * Class Review
 *
 * @property string $id
 * @property string $object
 * @property string|null $billing_zip
 * @property string|null $charge
 * @property string|null $closed_reason
 * @property int $created
 * @property string|null $ip_address
 * @property mixed|null $ip_address_location
 * @property bool $livemode
 * @property bool $open
 * @property string $opened_reason
 * @property string $payment_intent
 * @property string $reason
 * @property mixed|null $session
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
     * @link https://stripe.com/docs/api/radar/reviews/object
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
