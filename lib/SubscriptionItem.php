<?php

namespace Stripe;

/**
 * Class SubscriptionItem
 *
 * @property string $id
 * @property string $object
 * @property mixed $billing_thresholds
 * @property int $created
 * @property \Stripe\StripeObject $metadata
 * @property mixed $plan
 * @property int $quantity
 * @property string $subscription
 * @property mixed $tax_rates
 *
 * @package Stripe
 */
class SubscriptionItem extends ApiResource
{
    const OBJECT_NAME = 'subscription_item';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    use ApiOperations\NestedResource;

    const PATH_USAGE_RECORDS = '/usage_records';

    /**
     * @param string|null $id The ID of the subscription item on which to create the usage record.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return ApiResource
     */
    public static function createUsageRecord($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_USAGE_RECORDS, $params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return SubscriptionItem The list of subscription item.
     */
    public function usageRecordSummaries($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/usage_record_summaries';
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }
}
