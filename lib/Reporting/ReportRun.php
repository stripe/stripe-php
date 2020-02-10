<?php

namespace Stripe\Reporting;

/**
 * Class ReportRun
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|null $error <p>If something should go wrong during the run, a message about the failure (populated when</p><p><code>status=failed</code>).</p>
 * @property bool $livemode Always <code>true</code>: reports can only be run on live-mode data.
 * @property \Stripe\StripeObject $parameters
 * @property string $report_type The ID of the <a href="https://stripe.com/docs/reporting/statements/api#report-types">report type</a> to run, such as <code>&quot;balance.summary.1&quot;</code>.
 * @property \Stripe\File|null $result <p>The file object representing the result of the report run (populated when</p><p><code>status=succeeded</code>).</p>
 * @property string $status <p>Status of this report run. This will be <code>pending</code> when the run is initially created.</p><p>When the run finishes, this will be set to <code>succeeded</code> and the <code>result</code> field will be populated.</p><p>Rarely, we may encounter an error, at which point this will be set to <code>failed</code> and the <code>error</code> field will be populated.</p>
 * @property int|null $succeeded_at <p>Timestamp at which this run successfully finished (populated when</p><p><code>status=succeeded</code>). Measured in seconds since the Unix epoch.</p>
 *
 * @package Stripe\Reporting
 */
class ReportRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'reporting.report_run';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
}
