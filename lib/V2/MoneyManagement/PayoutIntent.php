<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * PayoutIntent represents an intent to send funds from a Financial Account to a payout method.
 *
 * @property string $id Unique identifier for the PayoutIntent.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The monetary amount to be sent.
 * @property string $confirmation_method Controls whether the intent requires explicit confirmation before transitioning to pending.
 * @property string $created Time at which the PayoutIntent was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $description An arbitrary string attached to the PayoutIntent. Often useful for displaying to users.
 * @property null|(object{amount: \Stripe\StripeObject, tax_amount?: (object{currency: string, value_decimal: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[] $estimated_fees Estimated fees and taxes.
 * @property (object{currency: string, debited?: \Stripe\StripeObject, financial_account: string}&\Stripe\StripeObject) $from The FinancialAccount that funds are pulled from.
 * @property null|(object{lock_duration: string, lock_expires_at?: string, lock_status: string, rates: \Stripe\StripeObject, to_currency: string}&\Stripe\StripeObject) $fx_quote FX rate information for fee transparency.
 * @property (object{outbound_payment?: string, outbound_transfer?: string, type: string}&\Stripe\StripeObject) $latest_payout Details about the latest payout associated with this PayoutIntent.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{confirm?: (object{reason: string}&\Stripe\StripeObject), handle_failure?: (object{failure_reason: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $next_action Next action required for a PayoutIntent in the requires_action state. Populated when status is requires_action.
 * @property null|(object{setting: string}&\Stripe\StripeObject) $recipient_notification Details about the OutboundPayment notification settings for recipient. Only applicable to OutboundPayment.
 * @property null|(object{execute_on?: string}&\Stripe\StripeObject) $schedule_options Scheduling options for the payout. If this is nil, we assume immediate execution.
 * @property null|string $statement_descriptor The description that appears on the receiving end for the payout (for example, on a bank statement).
 * @property string $status Open Enum. Current status of the PayoutIntent: <code>pending</code>, <code>processing</code>, <code>posted</code>, <code>canceled</code>, <code>requires_action</code>.
 * @property null|(object{canceled_at?: string, posted_at?: string, processing_at?: string, requires_action_at?: string}&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when transitioned to a particular status.
 * @property (object{credited?: \Stripe\StripeObject, currency?: string, payout_method?: string, payout_method_options?: (object{bank_account?: (object{preferred_network_options?: (object{ach?: (object{submission?: string, transaction_purpose?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), preferred_networks: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), recipient?: string}&\Stripe\StripeObject) $to To which payout method the payout is sent.
 */
class PayoutIntent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.payout_intent';

    const CONFIRMATION_METHOD_AUTOMATIC = 'automatic';
    const CONFIRMATION_METHOD_MANUAL = 'manual';

    const STATUS_CANCELED = 'canceled';
    const STATUS_PENDING = 'pending';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_ACTION = 'requires_action';
}
