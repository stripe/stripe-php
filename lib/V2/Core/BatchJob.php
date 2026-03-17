<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * BatchJob resource.
 *
 * @property string $id Unique identifier for the BatchJob.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp at which BatchJob was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $maximum_rps The maximum rps defined for the <code>BatchJob</code>.
 * @property \Stripe\StripeObject $metadata The metadata of the <code>BatchJob</code> object.
 * @property bool $skip_validation If the validation will be run previous to the execution of the <code>BatchJob</code>.
 * @property string $status The current status of the <code>BatchJob</code>.
 * @property null|(object{batch_failed?: (object{error: string}&\Stripe\StripeObject), canceled?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject), complete?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject), in_progress?: (object{failure_count: int, success_count: int}&\Stripe\StripeObject), ready_for_upload?: (object{upload_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), timeout?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject), validating?: (object{validated_count: int}&\Stripe\StripeObject), validation_failed?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional details about the current state of the <code>BatchJob</code>.
 */
class BatchJob extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.batch_job';

    const STATUS_BATCH_FAILED = 'batch_failed';
    const STATUS_CANCELED = 'canceled';
    const STATUS_CANCELLING = 'cancelling';
    const STATUS_COMPLETE = 'complete';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_READY_FOR_UPLOAD = 'ready_for_upload';
    const STATUS_TIMEOUT = 'timeout';
    const STATUS_UPLOAD_TIMEOUT = 'upload_timeout';
    const STATUS_VALIDATING = 'validating';
    const STATUS_VALIDATION_FAILED = 'validation_failed';
}
