<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A SpendingMandate authorizes a counterparty to pull money from a Financial Account.
 *
 * @property string $id The unique identifier for the SpendingMandate.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{account_holder_name?: string, financial_address: string, network: string, reference?: string}&\Stripe\StripeObject) $bank_transfer Bank transfer details. Present if <code>type</code> is <code>bank_transfer</code>.
 * @property string $created The time at which the SpendingMandate was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision.
 * @property string $currency The currency in ISO 4217 format that debits will be collected in.
 * @property string $financial_account Financial account ID associated with this mandate.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the SpendingMandate.
 * @property null|(object{canceled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Detailed information about the status of the SpendingMandate.
 * @property null|(object{activated_at?: string, canceled_at?: string, created_at?: string, expired_at?: string, pending_cancellation_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps describing when the mandate changed status.
 * @property string $type The type of the SpendingMandate.
 */
class SpendingMandate extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.spending_mandate';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_EXPIRED = 'expired';
    const STATUS_PENDING_CANCELLATION = 'pending_cancellation';

    const TYPE_BANK_TRANSFER = 'bank_transfer';
}
