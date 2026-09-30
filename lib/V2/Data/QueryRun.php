<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data;

/**
 * The <code>QueryRun</code> resource represents an execution of ad-hoc SQL against a dataset. Once
 * created, Stripe processes the query. When the query has finished running, the object
 * provides a reference to the results.
 *
 * @property string $id The unique identifier of the <code>QueryRun</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Time at which the <code>QueryRun</code> was created.
 * @property string $dataset The dataset that was queried.
 * @property string $format The file format of the result. Only applicable when the result is a file.
 * @property bool $livemode Whether the <code>QueryRun</code> was executed in live mode.
 * @property (object{sql?: string}&\Stripe\StripeObject) $query The query that was submitted for execution.
 * @property null|string $refreshed_at Time at which the data used by this query was last refreshed.
 * @property null|(object{col_count?: int, file?: (object{columns: (object{name: string, type: string}&\Stripe\StripeObject)[], content_type: string, download_url: (object{expires_at?: string, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), inline?: (object{columns: (object{name: string, type: string}&\Stripe\StripeObject)[], next_page_url?: string, previous_page_url?: string, rows: (object{data: \Stripe\StripeObject}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), row_count?: int}&\Stripe\StripeObject) $result The result of the <code>QueryRun</code>, populated when it has completed.
 * @property null|(object{compress_file?: bool}&\Stripe\StripeObject) $result_options Settings applied to the generated result file.
 * @property string $status The current status of the <code>QueryRun</code>.
 * @property null|(object{canceled_at?: string, code?: string, message?: string}&\Stripe\StripeObject) $status_details Additional details about the current state of the <code>QueryRun</code>.
 */
class QueryRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.query_run';

    public static function fieldEncodings()
    {
        return [
            'result' => [
                'kind' => 'object',
                'fields' => [
                    'col_count' => ['kind' => 'int64_string'],
                    'file' => [
                        'kind' => 'object',
                        'fields' => ['size' => ['kind' => 'int64_string']],
                    ],
                    'row_count' => ['kind' => 'int64_string'],
                ],
            ],
        ];
    }

    const DATASET_ANALYTICAL = 'analytical';

    const FORMAT_CSV = 'csv';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_RUNNING = 'running';
    const STATUS_SUCCEEDED = 'succeeded';
}
