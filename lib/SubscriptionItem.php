<?php

namespace Stripe;

/**
 * Class SubscriptionItem
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject|null $billing_thresholds
 * @property int $created
 * @property \Stripe\StripeObject $metadata
 * @property \Stripe\Plan $plan
 * @property int $quantity
 * @property string $subscription
 * @property \Stripe\TaxRate[]|null $tax_rates
 *
 * @package Stripe
 */
class SubscriptionItem extends ApiResource
{
    const OBJECT_NAME = 'subscription_item';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const PATH_USAGE_RECORDS = '/usage_records';

    /**
     * @param string|null $id The ID of the subscription item on which to create the usage record.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\UsageRecord
     */
    public static function createUsageRecord($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_USAGE_RECORDS, $params, $opts);
    }

    /**
     * @deprecated usageRecordSummaries is deprecated. Please use SubscriptionItem::allUsageRecordSummaries instead.
     *
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection The list of usage record summaries.
     */
    public function usageRecordSummaries($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/usage_record_summaries';
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    const PATH_USAGE_RECORD_SUMMARIES = '/usage_record_summaries';

    /**
     * @param string $id The ID of the subscription item on which to retrieve the usage record summaries.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection The list of usage record summaries.
     */
    public static function allUsageRecordSummaries($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_USAGE_RECORD_SUMMARIES, $params, $opts);
    }
}
