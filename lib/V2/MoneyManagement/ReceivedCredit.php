<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use ReceivedCredits API to retrieve information on when, where, and how funds are sent into your FinancialAccount.
 *
 * @property string $id Unique identifier for the ReceivedCredit.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount and currency of the ReceivedCredit.
 * @property null|(object{payout_v1: string, type: string}&\stdClass&\Stripe\StripeObject) $balance_transfer This object stores details about the originating Stripe transaction that resulted in the ReceivedCredit. Present if <code>type</code> field value is <code>balance_transfer</code>.
 * @property null|(object{financial_address: string, payment_method_type: string, statement_descriptor: null|string, gb_bank_account: null|(object{account_holder_name: null|string, bank_name: null|string, last4: null|string, network: string, sort_code: null|string}&\stdClass&\Stripe\StripeObject), us_bank_account: null|(object{bank_name: null|string, last4: null|string, network: string, routing_number: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $bank_transfer This object stores details about the originating banking transaction that resulted in the ReceivedCredit. Present if <code>type</code> field value is <code>external_credit</code>.
 * @property null|(object{card_v1_id: string, dispute: null|(object{issuing_dispute_v1: string}&\stdClass&\Stripe\StripeObject), refund: null|(object{issuing_transaction_v1: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $card_spend This object stores details about the originating issuing card spend that resulted in the ReceivedCredit. Present if <code>type</code> field value is <code>card_spend</code>.
 * @property int $created Time at which the ReceivedCredit was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $description Freeform string set by originator of the ReceivedCredit.
 * @property string $financial_account Financial Account ID on which funds for ReceivedCredit were received.
 * @property null|string $receipt_url A hosted transaction receipt URL that is provided when money movement is considered regulated under Stripe’s money transmission licenses.
 * @property string $status Open Enum. The status of the ReceivedCredit.
 * @property null|(object{failed: null|(object{reason: string}&\stdClass&\Stripe\StripeObject), returned: null|(object{reason: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $status_details This hash contains detailed information that elaborates on the specific status of the ReceivedCredit. e.g the reason behind a failure if the status is marked as <code>failed</code>.
 * @property null|(object{failed_at: null|int, returned_at: null|int, succeeded_at: null|int}&\stdClass&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when the object transitioned to a particular status.
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
    const TYPE_CARD_SPEND = 'card_spend';
    const TYPE_EXTERNAL_CREDIT = 'external_credit';
}
