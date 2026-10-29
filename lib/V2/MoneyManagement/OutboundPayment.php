<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * OutboundPayment represents a single money movement from one FinancialAccount you own to a payout method someone else owns.
 *
 * @property string $id Unique identifier for the OutboundPayment.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount and currency requested for this OutboundPayment.
 * @property bool $cancelable Returns true if the OutboundPayment can be canceled, and false otherwise.
 * @property string $created Time at which the OutboundPayment was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $description An arbitrary string attached to the OutboundPayment. Often useful for displaying to users.
 * @property null|string $expected_arrival_date The date when funds are expected to arrive in the payout method. This field is not set if the payout method is in a <code>failed</code>, <code>canceled</code>, or <code>returned</code> state. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property (object{debited: \Stripe\StripeObject, financial_account: string}&\Stripe\StripeObject) $from The FinancialAccount that funds were pulled from.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $payout_intent The PayoutIntent ID that triggered this OutboundPayment.
 * @property (object{setting: string}&\Stripe\StripeObject) $recipient_notification Details about the OutboundPayment notification settings for recipient.
 * @property null|string $recipient_verification The ID of the RecipientVerification for this OutboundPayment. Required where recipient-name verification is mandated before creating an OutboundPayment.
 * @property string $statement_descriptor The description that appears on the receiving end of an OutboundPayment (for example, on a bank statement). Defaults to <code>STRIPE</code> if not configured in the account settings.
 * @property string $status Current status of the OutboundPayment. An OutboundPayment is <code>processing</code> after creation. It becomes <code>posted</code> when funds leave the account, <code>failed</code> if it cannot be sent, <code>canceled</code> if canceled before posting, or <code>returned</code> if the funds are returned.
 * @property null|(object{failed?: (object{reason: string}&\Stripe\StripeObject), processing?: (object{reason: string}&\Stripe\StripeObject), returned?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Status details for an OutboundPayment in a <code>processing</code>, <code>failed</code>, or <code>returned</code> state.
 * @property null|(object{canceled_at?: string, failed_at?: string, posted_at?: string, returned_at?: string}&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when the object transitioned to a particular status.
 * @property (object{credited: \Stripe\StripeObject, payout_method?: string, payout_method_options?: (object{bank_account?: (object{preferred_network_options?: (object{ach?: (object{submission?: string, transaction_purpose?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), preferred_networks?: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), recipient: string}&\Stripe\StripeObject) $to To which payout method the OutboundPayment was sent.
 * @property null|(object{bank_account?: (object{trace_id?: string}&\Stripe\StripeObject), card?: (object{retrieval_reference?: string}&\Stripe\StripeObject), status: string, type: string}&\Stripe\StripeObject) $tracking_details Information to track this OutboundPayment with the recipient bank.
 */
class OutboundPayment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.outbound_payment';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RETURNED = 'returned';
}
