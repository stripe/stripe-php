<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * An approval request represents a pending action that requires review before execution.
 *
 * @property string $id The unique identifier for this ApprovalRequest.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $action The action that was requested.
 * @property int $created Time this ApprovalRequest was created.
 * @property null|string $dashboard_url The URL to the dashboard for this ApprovalRequest.
 * @property null|string $description A description of the approval request.
 * @property int $expires_at The timestamp at which this ApprovalRequest will expire.
 * @property bool $livemode Whether this ApprovalRequest is livemode.
 * @property (object{id: string, name?: string}&\Stripe\StripeObject) $requested_by The requester of this ApprovalRequest.
 * @property null|(object{reason?: string, result: string, reviewed_at: int, reviewed_by: (object{id: string, name: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $review The review of this ApprovalRequest if it has been reviewed.
 * @property null|(object{name: string}&\Stripe\StripeObject) $rule The rule associated with this ApprovalRequest.
 * @property string $status The status of this ApprovalRequest.
 * @property null|(object{approved?: (object{reason?: string}&\Stripe\StripeObject), canceled?: (object{}&\Stripe\StripeObject), execution_failed?: (object{code: string, message: string, type: string}&\Stripe\StripeObject), execution_started?: (object{}&\Stripe\StripeObject), execution_succeeded?: (object{result: (object{id: string, object: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), expired?: (object{}&\Stripe\StripeObject), failed?: (object{error_code: string, error_message: string, error_type: string}&\Stripe\StripeObject), pending?: (object{}&\Stripe\StripeObject), rejected?: (object{reason?: string}&\Stripe\StripeObject), succeeded?: (object{result: (object{id: string, object: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details The details of the status of this ApprovalRequest.
 * @property null|(object{canceled_at?: int, expired_at?: int, failed_at?: int, rejected_at?: int, requires_execution_at?: int, succeeded_at?: int}&\Stripe\StripeObject) $status_transitions The transitions of the status of this ApprovalRequest.
 */
class ApprovalRequest extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.approval_request';

    const ACTION_CHARGE_CREATE = 'charge.create';
    const ACTION_DISPUTE_CLOSE = 'dispute.close';
    const ACTION_INBOUND_TRANSFERS_MONEY_MANAGEMENT_CREATE = 'inbound_transfers.money_management.create';
    const ACTION_INVOICE_CREATE = 'invoice.create';
    const ACTION_OUTBOUND_PAYMENTS_MONEY_MANAGEMENT_CREATE = 'outbound_payments.money_management.create';
    const ACTION_OUTBOUND_TRANSFERS_MONEY_MANAGEMENT_CREATE = 'outbound_transfers.money_management.create';
    const ACTION_PAYMENT_INTENT_CREATE = 'payment_intent.create';
    const ACTION_PAYMENT_INTENT_UPDATE = 'payment_intent.update';
    const ACTION_PAYOUT_CREATE = 'payout.create';
    const ACTION_PRICE_UPDATE = 'price.update';
    const ACTION_REFUND_CREATE = 'refund.create';
    const ACTION_SETUP_INTENT_CREATE = 'setup_intent.create';
    const ACTION_SUBSCRIPTION_CREATE = 'subscription.create';
    const ACTION_SUBSCRIPTION_UPDATE = 'subscription.update';
    const ACTION_TOPUP_CREATE = 'topup.create';
    const ACTION_TRANSFER_CREATE = 'transfer.create';

    const STATUS_APPROVED = 'approved';
    const STATUS_CANCELED = 'canceled';
    const STATUS_EXECUTION_FAILED = 'execution_failed';
    const STATUS_EXECUTION_STARTED = 'execution_started';
    const STATUS_EXECUTION_SUCCEEDED = 'execution_succeeded';
    const STATUS_EXPIRED = 'expired';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_REJECTED = 'rejected';
    const STATUS_REQUIRES_EXECUTION = 'requires_execution';
    const STATUS_REQUIRES_REVIEW = 'requires_review';
    const STATUS_SUCCEEDED = 'succeeded';
}
