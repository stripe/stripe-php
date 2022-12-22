<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A subscription schedule allows you to create and manage the lifecycle of a
 * subscription by predefining expected changes.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/billing/subscriptions/subscription-schedules">Subscription
 * Schedules</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string|\Stripe\StripeObject $application ID of the Connect Application that created the schedule.
 * @property null|\Stripe\StripeObject $applies_to Details to identify the subscription schedule the quote line applies to.
 * @property string $billing_behavior Configures when the subscription schedule generates prorations for phase transitions. Possible values are <code>prorate_on_next_phase</code> or <code>prorate_up_front</code> with the default being <code>prorate_on_next_phase</code>. <code>prorate_on_next_phase</code> will apply phase changes and generate prorations at transition time.<code>prorate_up_front</code> will bill for all phases within the current billing cycle up front.
 * @property null|int $canceled_at Time at which the subscription schedule was canceled. Measured in seconds since the Unix epoch.
 * @property null|int $completed_at Time at which the subscription schedule was completed. Measured in seconds since the Unix epoch.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $current_phase Object representing the start and end dates for the current phase of the subscription schedule, if it is <code>active</code>.
 * @property string|\Stripe\Customer $customer ID of the customer who owns the subscription schedule.
 * @property \Stripe\StripeObject $default_settings
 * @property string $end_behavior Behavior of the subscription schedule and underlying subscription when it ends. Possible values are <code>release</code> or <code>cancel</code> with the default being <code>release</code>. <code>release</code> will end the subscription schedule and keep the underlying subscription running.<code>cancel</code> will end the subscription schedule and cancel the underlying subscription.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject[] $phases Configuration for the subscription schedule's phases.
 * @property null|\Stripe\StripeObject $prebilling Time period and invoice for a Subscription billed in advance.
 * @property null|int $released_at Time at which the subscription schedule was released. Measured in seconds since the Unix epoch.
 * @property null|string $released_subscription ID of the subscription once managed by the subscription schedule (if it is released).
 * @property string $status The present status of the subscription schedule. Possible values are <code>not_started</code>, <code>active</code>, <code>completed</code>, <code>released</code>, and <code>canceled</code>. You can read more about the different states in our <a href="https://stripe.com/docs/billing/subscriptions/subscription-schedules">behavior guide</a>.
 * @property null|string|\Stripe\Subscription $subscription ID of the subscription managed by the subscription schedule.
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this subscription schedule belongs to.
 */
class SubscriptionSchedule extends ApiResource
{
    const OBJECT_NAME = 'subscription_schedule';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule the amended subscription schedule
     */
    public function amend($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/amend';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule the canceled subscription schedule
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule the released subscription schedule
     */
    public function release($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/release';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
