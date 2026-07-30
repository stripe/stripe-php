<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A ReceivedDebitMandate represents an authorization from a third party to debit a financial account on a recurring basis.
 *
 * @property string $id The unique identifier for the ReceivedDebitMandate.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{account_holder_name?: string, financial_address: string, network: string, reference?: string}&\Stripe\StripeObject) $bank_transfer This object stores details about the originating bank transfer that resulted in the ReceivedDebitMandate. Present if <code>type</code> field value is <code>bank_transfer</code>.
 * @property int $created The time at which the ReceivedDebitMandate was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: <code>2026-06-03T13:22:18.123Z</code>.
 * @property string $currency The currency of the ReceivedDebitMandate in ISO 4217 format. This is the currency that debits will be collected in.
 * @property string $financial_account Financial account ID associated with this mandate.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the ReceivedDebitMandate.
 * @property null|(object{canceled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Detailed information that elaborates on the specific status of the ReceivedDebitMandate.
 * @property null|(object{activated_at?: int, canceled_at?: int, created_at?: int, expired_at?: int, pending_cancellation_at?: int}&\Stripe\StripeObject) $status_transitions Timestamps describing when the mandate changed status.
 * @property string $type The type of the ReceivedDebitMandate.
 */
class ReceivedDebitMandate extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.received_debit_mandate';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_EXPIRED = 'expired';
    const STATUS_PENDING_CANCELLATION = 'pending_cancellation';
}
