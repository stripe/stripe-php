<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use ReceivedCredits API to retrieve information on when, where, and how funds are sent into your FinancialAccount.
 *
 * @property string $id Unique identifier for the ReceivedCredit.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The amount and currency of the ReceivedCredit.
 * @property null|(object{from_account?: string, type: string, outbound_payment?: string, outbound_transfer?: string, payout_v1?: string, transfer?: string}&\Stripe\StripeObject) $balance_transfer This object stores details about the originating Stripe transaction that resulted in the ReceivedCredit. Present if <code>type</code> field value is <code>balance_transfer</code>.
 * @property null|(object{financial_address: string, origin_type: string, statement_descriptor?: string, gb_bank_account?: (object{account_holder_name?: string, bank_name?: string, last4?: string, network: string, sort_code?: string}&\Stripe\StripeObject), sepa_bank_account?: (object{account_holder_name?: string, bank_name?: string, bic?: string, country?: string, iban?: string, network: string}&\Stripe\StripeObject), us_bank_account?: (object{bank_name?: string, last4?: string, network: string, routing_number?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $bank_transfer This object stores details about the originating banking transaction that resulted in the ReceivedCredit. Present if <code>type</code> field value is <code>bank_transfer</code>.
 * @property int $created Time at which the ReceivedCredit was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $description Freeform string set by originator of the ReceivedCredit.
 * @property null|(object{value?: int, currency?: string}&\Stripe\StripeObject) $external_amount The amount and currency of the original/external credit request.
 * @property string $financial_account Financial Account ID on which funds for ReceivedCredit were received.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $receipt_url A hosted transaction receipt URL that is provided when money movement is considered regulated under Stripe’s money transmission licenses.
 * @property string $status Open Enum. The status of the ReceivedCredit.
 * @property null|(object{failed?: (object{reason: string}&\Stripe\StripeObject), returned?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details This hash contains detailed information that elaborates on the specific status of the ReceivedCredit. e.g the reason behind a failure if the status is marked as <code>failed</code>.
 * @property null|(object{failed_at?: int, returned_at?: int, succeeded_at?: int}&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when the object transitioned to a particular status.
 * @property null|(object{statement_descriptor?: string}&\Stripe\StripeObject) $stripe_balance_payment This object stores details about the stripe balance pay refund that resulted in the ReceivedCredit. Present if <code>type</code> field value is <code>stripe_balance_payment</code>.
 * @property string $type Open Enum. The type of flow that caused the ReceivedCredit.
 */
class ReceivedCredit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.received_credit';

    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_RETURNED = 'returned';
    const STATUS_SUCCEEDED = 'succeeded';

    const TYPE_BALANCE_TRANSFER = 'balance_transfer';
    const TYPE_BANK_TRANSFER = 'bank_transfer';
    const TYPE_EXTERNAL_CREDIT = 'external_credit';
    const TYPE_STRIPE_BALANCE_PAYMENT = 'stripe_balance_payment';
}
