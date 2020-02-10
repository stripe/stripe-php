<?php

namespace Stripe;

/**
 * Class SubscriptionSchedule
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int|null $canceled_at Time at which the subscription schedule was canceled. Measured in seconds since the Unix epoch.
 * @property int|null $completed_at Time at which the subscription schedule was completed. Measured in seconds since the Unix epoch.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject|null $current_phase Object representing the start and end dates for the current phase of the subscription schedule, if it is <code>active</code>.
 * @property string|\Stripe\Customer $customer ID of the customer who owns the subscription schedule.
 * @property \Stripe\StripeObject $default_settings
 * @property string $end_behavior Behavior of the subscription schedule and underlying subscription when it ends.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject|null $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject[] $phases Configuration for the subscription schedule's phases.
 * @property int|null $released_at Time at which the subscription schedule was released. Measured in seconds since the Unix epoch.
 * @property string|null $released_subscription ID of the subscription once managed by the subscription schedule (if it is released).
 * @property \Stripe\StripeObject|null $renewal_interval This field has been deprecated. Interval and duration at which the subscription schedule renews for when it ends if <code>renewal_behavior</code> is <code>renew</code>.
 * @property string $status The present status of the subscription schedule. Possible values are <code>not_started</code>, <code>active</code>, <code>completed</code>, <code>released</code>, and <code>canceled</code>. You can read more about the different states in our <a href="https://stripe.com/docs/billing/subscriptions/subscription-schedules">behavior guide</a>.
 * @property string|\Stripe\Subscription|null $subscription ID of the subscription managed by the subscription schedule.
 *
 * @package Stripe
 */
class SubscriptionSchedule extends ApiResource
{
    const OBJECT_NAME = 'subscription_schedule';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return SubscriptionSchedule The canceled subscription schedule.
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return SubscriptionSchedule The released subscription schedule.
     */
    public function release($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/release';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
