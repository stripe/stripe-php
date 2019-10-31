<?php

namespace Stripe;

/**
 * Class SubscriptionSchedule
 *
 * @property string $id
 * @property string $object
 * @property mixed $billing_thresholds
 * @property int $canceled_at
 * @property string $collection_method
 * @property int $completed_at
 * @property int $created
 * @property mixed $current_phase
 * @property string $customer
 * @property string $default_payment_method
 * @property string $end_behavior
 * @property mixed $invoice_settings
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $phases
 * @property int $released_at
 * @property string $released_subscription
 * @property mixed $renewal_interval
 * @property string $status
 * @property string $subscription
 *
 * @package Stripe
 */
class SubscriptionSchedule extends ApiResource
{
    const OBJECT_NAME = "subscription_schedule";

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
