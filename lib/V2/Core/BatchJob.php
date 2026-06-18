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
    const ENDPOINT_PATH_V1_ACCOUNT_CREATE = '/v1/accounts';
    const ENDPOINT_PATH_V1_ACCOUNT_DELETE = '/v1/accounts/:account';
    const ENDPOINT_PATH_V1_COUPON_CREATE = '/v1/coupons';
    const ENDPOINT_PATH_V1_COUPON_UPDATE = '/v1/coupons/:coupon';
    const ENDPOINT_PATH_V1_COUPON_DELETE = '/v1/coupons/:coupon';
    const ENDPOINT_PATH_V1_CREDIT_NOTE_CREATE = '/v1/credit_notes';
    const ENDPOINT_PATH_V1_CUSTOMER_UPDATE = '/v1/customers/:customer';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE = '/v1/customers/:customer';
    const ENDPOINT_PATH_V1_CUSTOMER_CREATE = '/v1/customers';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE_DISCOUNT = '/v1/customers/:customer/discount';
    const ENDPOINT_PATH_V1_CUSTOMER_CREATE_FUNDING_INSTRUCTIONS = '/v1/customers/:customer/funding_instructions';
    const ENDPOINT_PATH_V1_CUSTOMER_CREATE_SUBSCRIPTION = '/v1/customers/:customer/subscriptions';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE_SUBSCRIPTION = '/v1/customers/:customer/subscriptions';
    const ENDPOINT_PATH_V1_CUSTOMER_UPDATE_SUBSCRIPTION = '/v1/customers/:customer/subscriptions/:subscription_exposed_id';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE_SUBSCRIPTION_DISCOUNT = '/v1/customers/:customer/subscriptions/:subscription_exposed_id/discount';
    const ENDPOINT_PATH_V1_CUSTOMER_CREATE_BANK_ACCOUNT = '/v1/customers/:customer/bank_accounts';
    const ENDPOINT_PATH_V1_CUSTOMER_UPDATE_BANK_ACCOUNT = '/v1/customers/:customer/bank_accounts/:id';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE_BANK_ACCOUNT = '/v1/customers/:customer/bank_accounts/:id';
    const ENDPOINT_PATH_V1_CUSTOMER_VERIFY_BANK_ACCOUNT = '/v1/customers/:customer/bank_accounts/:id/verify';
    const ENDPOINT_PATH_V1_CUSTOMER_CREATE_CARD = '/v1/customers/:customer/cards';
    const ENDPOINT_PATH_V1_CUSTOMER_UPDATE_CARD = '/v1/customers/:customer/cards/:id';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE_CARD = '/v1/customers/:customer/cards/:id';
    const ENDPOINT_PATH_V1_CUSTOMER_DELETE_TAX_IDS = '/v1/customers/:customer/tax_ids';
    const ENDPOINT_PATH_V1_PAYMENT_SOURCE_CREATE = '/v1/customers/:customer/sources';
    const ENDPOINT_PATH_V1_BANK_ACCOUNT_UPDATE = '/v1/customers/:customer/sources/:id';
    const ENDPOINT_PATH_V1_BANK_ACCOUNT_DELETE = '/v1/customers/:customer/sources/:id';
    const ENDPOINT_PATH_V1_BANK_ACCOUNT_VERIFY = '/v1/customers/:customer/sources/:id/verify';
    const ENDPOINT_PATH_V1_CUSTOMER_BALANCE_TRANSACTION_CREATE = '/v1/customers/:customer/balance_transactions';
    const ENDPOINT_PATH_V1_CUSTOMER_BALANCE_TRANSACTION_UPDATE = '/v1/customers/:customer/balance_transactions/:transaction';
    const ENDPOINT_PATH_V1_CASH_BALANCE_UPDATE = '/v1/customers/:customer/cash_balance';
    const ENDPOINT_PATH_V1_CUSTOMER_SESSION_CREATE = '/v1/customer_sessions';
    const ENDPOINT_PATH_V1_DISPUTE_CLOSE = '/v1/disputes/:dispute/close';
    const ENDPOINT_PATH_V1_INVOICE_CREATE = '/v1/invoices';
    const ENDPOINT_PATH_V1_INVOICE_UPDATE = '/v1/invoices/:invoice';
    const ENDPOINT_PATH_V1_INVOICE_DELETE = '/v1/invoices/:invoice';
    const ENDPOINT_PATH_V1_INVOICE_PAY = '/v1/invoices/:invoice/pay';
    const ENDPOINT_PATH_V1_INVOICE_SEND_INVOICE = '/v1/invoices/:invoice/send';
    const ENDPOINT_PATH_V1_INVOICE_VOID_INVOICE = '/v1/invoices/:invoice/void';
    const ENDPOINT_PATH_V1_INVOICE_FINALIZE_INVOICE = '/v1/invoices/:invoice/finalize';
    const ENDPOINT_PATH_V1_INVOICE_MARK_UNCOLLECTIBLE = '/v1/invoices/:invoice/mark_uncollectible';
    const ENDPOINT_PATH_V1_INVOICE_UPDATE_LINES = '/v1/invoices/:invoice/update_lines';
    const ENDPOINT_PATH_V1_INVOICE_ADD_LINES = '/v1/invoices/:invoice/add_lines';
    const ENDPOINT_PATH_V1_INVOICE_REMOVE_LINES = '/v1/invoices/:invoice/remove_lines';
    const ENDPOINT_PATH_V1_INVOICE_CREATE_PREVIEW = '/v1/invoices/create_preview';
    const ENDPOINT_PATH_V1_LINE_ITEM_UPDATE = '/v1/invoices/:invoice/lines/:line_item_id';
    const ENDPOINT_PATH_V1_INVOICEITEM_CREATE = '/v1/invoiceitems';
    const ENDPOINT_PATH_V1_INVOICEITEM_UPDATE = '/v1/invoiceitems/:invoiceitem';
    const ENDPOINT_PATH_V1_INVOICEITEM_DELETE = '/v1/invoiceitems/:invoiceitem';
    const ENDPOINT_PATH_V1_INVOICE_RENDERING_TEMPLATE_ARCHIVE = '/v1/invoice_rendering_templates/:template/archive';
    const ENDPOINT_PATH_V1_INVOICE_RENDERING_TEMPLATE_UNARCHIVE = '/v1/invoice_rendering_templates/:template/unarchive';
    const ENDPOINT_PATH_V1_PAYMENT_METHOD_ATTACH = '/v1/payment_methods/:payment_method/attach';
    const ENDPOINT_PATH_V1_PRICE_CREATE = '/v1/prices';
    const ENDPOINT_PATH_V1_PRICE_UPDATE = '/v1/prices/:price';
    const ENDPOINT_PATH_V1_PRODUCT_CREATE = '/v1/products';
    const ENDPOINT_PATH_V1_PRODUCT_UPDATE = '/v1/products/:id';
    const ENDPOINT_PATH_V1_PRODUCT_DELETE = '/v1/products/:id';
    const ENDPOINT_PATH_V1_PRODUCT_FEATURE_CREATE = '/v1/products/:product/features';
    const ENDPOINT_PATH_V1_PRODUCT_FEATURE_DELETE = '/v1/products/:product/features/:id';
    const ENDPOINT_PATH_V1_PROMOTION_CODE_CREATE = '/v1/promotion_codes';
    const ENDPOINT_PATH_V1_PROMOTION_CODE_UPDATE = '/v1/promotion_codes/:promotion_code';
    const ENDPOINT_PATH_V1_RADAR_VALUE_LIST_ITEM_CREATE = '/v1/radar/value_list_items';
    const ENDPOINT_PATH_V1_REFUND_CREATE = '/v1/refunds';
    const ENDPOINT_PATH_V1_REFUND_CANCEL = '/v1/refunds/:refund/cancel';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_UPDATE = '/v1/subscriptions/:subscription_exposed_id';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_CANCEL = '/v1/subscriptions/:subscription_exposed_id';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_MIGRATE = '/v1/subscriptions/:subscription/migrate';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_CREATE = '/v1/subscriptions';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_RESUME = '/v1/subscriptions/:subscription/resume';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_PAUSE = '/v1/subscriptions/:subscription/pause';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_ITEM_CREATE = '/v1/subscription_items';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_ITEM_UPDATE = '/v1/subscription_items/:item';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_ITEM_DELETE = '/v1/subscription_items/:item';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_SCHEDULE_CREATE = '/v1/subscription_schedules';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_SCHEDULE_UPDATE = '/v1/subscription_schedules/:schedule';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_SCHEDULE_CANCEL = '/v1/subscription_schedules/:schedule/cancel';
    const ENDPOINT_PATH_V1_SUBSCRIPTION_SCHEDULE_RELEASE = '/v1/subscription_schedules/:schedule/release';
    const ENDPOINT_PATH_V1_TAX_REGISTRATION_CREATE = '/v1/tax/registrations';
    const ENDPOINT_PATH_V1_TAX_REGISTRATION_UPDATE = '/v1/tax/registrations/:id';
    const ENDPOINT_PATH_V1_TAX_SETTINGS_UPDATE = '/v1/tax/settings';
    const ENDPOINT_PATH_V1_TAX_TRANSACTION_CREATE_REVERSAL = '/v1/tax/transactions/create_reversal';
    const ENDPOINT_PATH_V1_TAX_ID_CREATE = '/v1/tax_ids';
    const ENDPOINT_PATH_V1_TAX_ID_UPDATE = '/v1/tax_ids/:id';
    const ENDPOINT_PATH_V1_TAX_ID_CREATE_FOR_CUSTOMER = '/v1/customers/:customer/tax_ids';
    const ENDPOINT_PATH_V1_TAX_ID_DELETE = '/v1/customers/:customer/tax_ids/:id';
    const ENDPOINT_PATH_V1_TAX_RATE_CREATE = '/v1/tax_rates';
    const ENDPOINT_PATH_V1_TAX_RATE_UPDATE = '/v1/tax_rates/:tax_rate';
}
