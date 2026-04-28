<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data\Analytics;

/**
 * The result of a metric query.
 *
 * @property string $id The unique identifier of this metric query result.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The timestamp at which this metric query result was created.
 * @property (object{dimensions: \Stripe\StripeObject, id: string, results: (object{currency?: string, metric: string, name: string, value: int}&\Stripe\StripeObject)[], timestamp: int}&\Stripe\StripeObject)[] $data An array of timeseries data rows.
 * @property bool $livemode Whether this query was run in live mode.
 * @property null|string $next_page_url Pagination future-proofing: URL to fetch the next page; always null for now.
 * @property null|string $previous_page_url Pagination future-proofing: URL to fetch the previous page; always null for now.
 * @property int $refreshed_at A timestamp representing the freshness of the data this metric is aggregated from.
 */
class MetricQueryResult extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.analytics.metric_query_result';

    public static function fieldEncodings()
    {
        return [
            'data' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => [
                        'results' => [
                            'kind' => 'array',
                            'element' => [
                                'kind' => 'object',
                                'fields' => [
                                    'value' => ['kind' => 'int64_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
