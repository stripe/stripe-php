<?php

namespace Stripe\Sigma;

/**
 * Class ScheduledQueryRun
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property int $data_load_time When the query was run, Sigma contained a snapshot of your Stripe data at this time.
 * @property \Stripe\StripeObject $error
 * @property \Stripe\File|null $file The file object representing the results of the query.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $result_available_until Time at which the result expires and is no longer available for download.
 * @property string $sql SQL for the query.
 * @property string $status The query's execution status, which will be <code>completed</code> for successful runs, and <code>canceled</code>, <code>failed</code>, or <code>timed_out</code> otherwise.
 * @property string $title Title of the query.
 *
 * @package Stripe\Sigma
 */
class ScheduledQueryRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'scheduled_query_run';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    public static function classUrl()
    {
        return "/v1/sigma/scheduled_query_runs";
    }
}
