<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A DebitDispute represents a dispute raised against a received debit.
 *
 * @property string $id The ID of a DebitDispute.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount of the DebitDispute.
 * @property null|(object{network: string, reason?: string, statement_descriptor?: string}&\Stripe\StripeObject) $bank_transfer Details about the bank transfer dispute. Present if <code>type</code> field value is <code>bank_transfer</code>.
 * @property int $created Time at which the DebitDispute was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: <code>2026-03-23T13:22:18.123Z</code>.
 * @property string $financial_account The Financial Account associated with the DebitDispute.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $received_debit The ID of the ReceivedDebit that was disputed.
 * @property string $status The status of the DebitDispute.
 * @property null|(object{failed: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Detailed information about the status of the DebitDispute.
 * @property null|(object{failed_at?: int, succeeded_at?: int}&\Stripe\StripeObject) $status_transitions The time at which the DebitDispute transitioned to a particular status.
 * @property string $type The type of the DebitDispute.
 */
class DebitDispute extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.debit_dispute';

    const STATUS_FAILED = 'failed';
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_SUCCEEDED = 'succeeded';
}
