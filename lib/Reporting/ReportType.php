<?php

namespace Stripe\Reporting;

/**
 * Class ReportType
 *
 * @property string $id The <a href="https://stripe.com/docs/reporting/statements/api#available-report-types">ID of the Report Type</a>, such as <code>balance.summary.1</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $data_available_end Most recent time for which this Report Type is available. Measured in seconds since the Unix epoch.
 * @property int $data_available_start Earliest time for which this Report Type is available. Measured in seconds since the Unix epoch.
 * @property string[]|null $default_columns List of column names that are included by default when this Report Type gets run. (If the Report Type doesn't support the <code>columns</code> parameter, this will be null.)
 * @property string $name Human-readable name of the Report Type
 * @property int $updated When this Report Type was latest updated. Measured in seconds since the Unix epoch.
 * @property int $version Version of the Report Type. Different versions report with the same ID will have the same purpose, but may take different run parameters or have different result schemas.
 *
 * @package Stripe\Reporting
 */
class ReportType extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'reporting.report_type';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
}
