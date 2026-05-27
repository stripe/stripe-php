<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A batch job allows you to perform an API operation on a large set of records asynchronously.
 *
 * @property string $id Unique identifier for the <code>batch_job</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp at which the <code>batch_job</code> was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $maximum_rps The maximum requests per second defined for the <code>batch_job</code>.
 * @property \Stripe\StripeObject $metadata The metadata of the <code>batch_job</code>.
 * @property bool $skip_validation Whether validation runs before executing the <code>batch_job</code>.
 * @property string $status The current status of the <code>batch_job</code>.
 * @property null|(object{batch_failed?: (object{error: string}&\Stripe\StripeObject), canceled?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject), complete?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject), in_progress?: (object{failure_count: int, success_count: int}&\Stripe\StripeObject), ready_for_upload?: (object{upload_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), timeout?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject), validating?: (object{validated_count: int}&\Stripe\StripeObject), validation_failed?: (object{failure_count: int, output_file: (object{content_type: string, download_url: (object{expires_at?: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), success_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional details about the current state of the <code>batch_job</code>.
 */
class BatchJob extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.batch_job';

    public static function fieldEncodings()
    {
        return [
            'status_details' => [
                'kind' => 'object',
                'fields' => [
                    'canceled' => [
                        'kind' => 'object',
                        'fields' => [
                            'failure_count' => ['kind' => 'int64_string'],
                            'output_file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'complete' => [
                        'kind' => 'object',
                        'fields' => [
                            'failure_count' => ['kind' => 'int64_string'],
                            'output_file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'in_progress' => [
                        'kind' => 'object',
                        'fields' => [
                            'failure_count' => ['kind' => 'int64_string'],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'timeout' => [
                        'kind' => 'object',
                        'fields' => [
                            'failure_count' => ['kind' => 'int64_string'],
                            'output_file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'validating' => [
                        'kind' => 'object',
                        'fields' => [
                            'validated_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'validation_failed' => [
                        'kind' => 'object',
                        'fields' => [
                            'failure_count' => ['kind' => 'int64_string'],
                            'output_file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
    }

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

    const ENDPOINT_PATH_V1_ACCOUNT_UPDATE = '/v1/accounts/:account';
    const ENDPOINT_PATH_V1_COUPON_CREATE = '/v1/coupons';
    const ENDPOINT_PATH_V1_CUSTOMER_UPDATE = '/v1/customers/:customer';
    const ENDPOINT_PATH_V1_PROMOTION_CODE_CREATE = '/v1/promotion_codes';
    const ENDPOINT_PATH_V1_PROMOTION_CODE_UPDATE = '/v1/promotion_codes/:promotion_code';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_UPDATE = '/v1/subscriptions/:subscription_exposed_id';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_CANCEL = '/v1/subscriptions/:subscription_exposed_id';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_MIGRATE = '/v1/subscriptions/:subscription/migrate';
}
