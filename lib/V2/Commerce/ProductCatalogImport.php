<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Commerce;

/**
 * The ProductCatalogImport object tracks the long-running background process that handles uploading, processing and validation.
 *
 * @property string $id The unique identifier for this ProductCatalogImport.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The time this ProductCatalogImport was created.
 * @property string $feed_type The type of feed data being imported into the product catalog.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Additional information about the object in a structured format.
 * @property string $status The current status of this ProductCatalogImport.
 * @property null|(object{awaiting_upload?: (object{upload_url: (object{expires_at: int, url: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), failed?: (object{code: string, failure_message: string, type: string}&\Stripe\StripeObject), processing?: (object{error_count: int, success_count: int}&\Stripe\StripeObject), succeeded?: (object{success_count: int}&\Stripe\StripeObject), succeeded_with_errors?: (object{error_count: int, error_file: (object{content_type: string, download_url: (object{expires_at: int, url: string}&\Stripe\StripeObject), size: int}&\Stripe\StripeObject), samples: (object{error_message: string, field: string, id: string, row: int}&\Stripe\StripeObject)[], success_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Details about the current import status.
 */
class ProductCatalogImport extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.commerce.product_catalog_import';

    public static function fieldEncodings()
    {
        return [
            'status_details' => [
                'kind' => 'object',
                'fields' => [
                    'processing' => [
                        'kind' => 'object',
                        'fields' => [
                            'error_count' => ['kind' => 'int64_string'],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'succeeded' => [
                        'kind' => 'object',
                        'fields' => [
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'succeeded_with_errors' => [
                        'kind' => 'object',
                        'fields' => [
                            'error_count' => ['kind' => 'int64_string'],
                            'error_file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'samples' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'row' => ['kind' => 'int64_string'],
                                    ],
                                ],
                            ],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
    }

    const FEED_TYPE_INVENTORY = 'inventory';
    const FEED_TYPE_PRICING = 'pricing';
    const FEED_TYPE_PRODUCT = 'product';

    const STATUS_AWAITING_UPLOAD = 'awaiting_upload';
    const STATUS_FAILED = 'failed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SUCCEEDED = 'succeeded';
    const STATUS_SUCCEEDED_WITH_ERRORS = 'succeeded_with_errors';
}
