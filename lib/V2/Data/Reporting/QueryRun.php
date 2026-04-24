<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data\Reporting;

/**
 * The <code>QueryRun</code> object represents an ad-hoc SQL execution. Once created, Stripe processes the query. When
 * the query has finished running, the object provides a reference to the results.
 *
 * @property string $id The unique identifier of the <code>QueryRun</code> object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{file?: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $result Details how to retrieve the results of a successfully completed <code>QueryRun</code>.
 * @property null|(object{compress_file?: bool}&\Stripe\StripeObject) $result_options The options specified for customizing the output of the <code>QueryRun</code>.
 * @property string $sql The SQL that was executed.
 * @property string $status The current status of the <code>QueryRun</code>.
 * @property \Stripe\StripeObject $status_details Additional details about the current state of the <code>QueryRun</code>. Populated when the <code>QueryRun</code> is in the <code>failed</code> state, providing more information about why the query failed.
 */
class QueryRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.reporting.query_run';

    public static function fieldEncodings()
    {
        return [
            'result' => [
                'kind' => 'object',
                'fields' => [
                    'file' => [
                        'kind' => 'object',
                        'fields' => ['size' => ['kind' => 'int64_string']],
                    ],
                ],
            ],
        ];
    }

    const STATUS_FAILED = 'failed';
    const STATUS_RUNNING = 'running';
    const STATUS_SUCCEEDED = 'succeeded';
}
