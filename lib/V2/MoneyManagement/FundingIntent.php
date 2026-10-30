<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FundingIntent represents the lifecycle of adding funds to a FinancialAccount.
 *
 * @property string $id Unique identifier for the FundingIntent.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount to add to the destination.
 * @property bool $cancelable Whether you can cancel the FundingIntent.
 * @property null|(object{back_image?: string, front_image?: string}&\Stripe\StripeObject) $check Details for a check FundingIntent.
 * @property string $confirmation_method How the FundingIntent is confirmed after validation.
 * @property string $created Time at which the FundingIntent was created.
 * @property null|string $description An arbitrary string attached to the FundingIntent.
 * @property null|(object{inbound_funding: string, type: string}&\Stripe\StripeObject) $latest_attempt Details about the latest underlying money movement attempt.
 * @property bool $livemode Whether the FundingIntent exists in live mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs attached to the FundingIntent.
 * @property null|(object{handle_failure?: (object{reason: string, retryable: bool}&\Stripe\StripeObject), provide_new_check?: (object{description: string, reason: string}&\Stripe\StripeObject), provide_new_images?: (object{amount_issues: (object{description: string, reason: string}&\Stripe\StripeObject)[], back_image: (object{description: string, reason: string}&\Stripe\StripeObject)[], front_image: (object{description: string, reason: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $next_action The action required to continue processing the FundingIntent.
 * @property null|(object{requires_review?: (object{factors: (object{description: string, reason: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $next_confirmation The information to review before confirming the FundingIntent.
 * @property null|(object{delay_days_override?: int}&\Stripe\StripeObject) $settlement_timing Controls when the funds become available after processing.
 * @property string $status The current status of the FundingIntent.
 * @property null|(object{canceled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional details about the current status.
 * @property (object{canceled_at?: string, processing_at?: string, requires_action_at?: string, requires_confirmation_at?: string, succeeded_at?: string, validating_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps for the FundingIntent's status transitions.
 * @property (object{currency: string, financial_account: string}&\Stripe\StripeObject) $to The destination for the funds.
 * @property string $type The type of FundingIntent.
 */
class FundingIntent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.funding_intent';

    const CONFIRMATION_METHOD_AUTOMATIC = 'automatic';
    const CONFIRMATION_METHOD_MANUAL = 'manual';

    const STATUS_CANCELED = 'canceled';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_ACTION = 'requires_action';
    const STATUS_REQUIRES_CONFIRMATION = 'requires_confirmation';
    const STATUS_SUCCEEDED = 'succeeded';
    const STATUS_VALIDATING = 'validating';

    const TYPE_CHECK = 'check';
}
