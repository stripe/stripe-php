<?php

namespace Stripe\Reporting;

/**
 * Class ReportRun
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string|null $error
 * @property bool $livemode
 * @property \Stripe\StripeObject $parameters
 * @property string $report_type
 * @property \Stripe\File|null $result
 * @property string $status
 * @property int|null $succeeded_at
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
