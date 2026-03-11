<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Reporting;

/**
 * The <code>ReportRun</code> object represents an instance of a <code>Report</code> generated with specific
 * run parameters. Once the object is created, Stripe begins processing the report. When
 * the report has finished running, it will give you a reference to the results.
 *
 * @property string $id The unique identifier of the <code>ReportRun</code> object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $report The unique identifier of the <code>Report</code> object which was run.
 * @property string $report_name The human-readable name of the <code>Report</code> which was run.
 * @property \Stripe\StripeObject $report_parameters The parameters used to customize the generation of the report.
 * @property null|(object{file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $result Details how to retrieve the results of a successfully completed <code>ReportRun</code>.
 * @property null|(object{compress_file?: bool}&\Stripe\StripeObject) $result_options The options specified for customizing the output file of the <code>ReportRun</code>.
 * @property string $status The current status of the <code>ReportRun</code>.
 * @property \Stripe\StripeObject $status_details Additional details about the current state of the <code>ReportRun</code>. The field is currently only populated when a <code>ReportRun</code> is in the <code>failed</code> state, providing more information about why the report failed to generate successfully.
 */
class ReportRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.reporting.report_run';

    const STATUS_FAILED = 'failed';
    const STATUS_RUNNING = 'running';
    const STATUS_SUCCEEDED = 'succeeded';
}
