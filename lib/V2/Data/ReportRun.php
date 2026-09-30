<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data;

/**
 * The <code>ReportRun</code> resource represents an instance of a <code>Report</code> generated with specific
 * parameter values. Once the object is created, Stripe begins processing the report. When
 * the report has finished running, it provides a reference to the results.
 *
 * @property string $id The unique identifier of the <code>ReportRun</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Time at which the <code>ReportRun</code> was created.
 * @property bool $livemode Whether the <code>ReportRun</code> was executed in live mode.
 * @property string $name The human-readable name of the <code>Report</code> which was run.
 * @property \Stripe\StripeObject $parameters The parameters used to customize the generation of the report.
 * @property null|string $refreshed_at Time at which the data used by this report was last refreshed.
 * @property string $report The unique identifier of the <code>Report</code> which was run.
 * @property null|(object{col_count?: int, file?: (object{columns: (object{name: string, type: string}&\Stripe\StripeObject)[], content_type: string, download_url: (object{expires_at?: string, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), inline?: (object{columns: (object{name: string, type: string}&\Stripe\StripeObject)[], next_page_url?: string, previous_page_url?: string, rows: (object{data: \Stripe\StripeObject}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), row_count?: int}&\Stripe\StripeObject) $result The result of the <code>ReportRun</code>, populated when it has completed.
 * @property null|(object{compress_file?: bool}&\Stripe\StripeObject) $result_options Settings applied to the generated result file.
 * @property null|string $sql The fully-resolved SQL that was executed. Only present when requested via <code>include[0]=sql</code>.
 * @property string $status The current status of the <code>ReportRun</code>.
 * @property null|(object{canceled_at?: string, code?: string, message?: string}&\Stripe\StripeObject) $status_details Additional details about the current state of the <code>ReportRun</code>.
 */
class ReportRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.report_run';

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

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_RUNNING = 'running';
    const STATUS_SUCCEEDED = 'succeeded';
}
