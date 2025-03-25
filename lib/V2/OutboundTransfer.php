<?php

// File generated from our OpenAPI spec

namespace Stripe\V2;

/**
 * OutboundTransfer represents a single money movement from one FinancialAccount you own to a payout method you also own.
 *
 * @property string $id Unique identifier for the OutboundTransfer.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The &quot;presentment amount&quot; for the OutboundTransfer.
 * @property bool $cancelable Returns true if the OutboundTransfer can be canceled, and false otherwise.
 * @property int $created Time at which the OutboundTransfer was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|(object{bank_account: null|string}&\stdClass&\Stripe\StripeObject) $delivery_options Delivery options to be used to send the OutboundTransfer.
 * @property null|string $description An arbitrary string attached to the OutboundTransfer. Often useful for displaying to users.
 * @property null|int $expected_arrival_date The date when funds are expected to arrive in the payout method. This field is not set if the payout method is in a <code>failed</code>, <code>canceled</code>, or <code>returned</code> state. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property (object{debited: \Stripe\StripeObject, financial_account: string}&\stdClass&\Stripe\StripeObject) $from The FinancialAccount that funds were pulled from.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $receipt_url A hosted transaction receipt URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property string $statement_descriptor The description that appears on the receiving end for an OutboundTransfer (for example, bank statement for external bank transfer).
 * @property string $status Closed Enum. Current status of the OutboundTransfer: <code>processing</code>, <code>failed</code>, <code>posted</code>, <code>returned</code>, <code>canceled</code>. An OutboundTransfer is <code>processing</code> if it has been created and is processing. The status changes to <code>posted</code> once the OutboundTransfer has been &quot;confirmed&quot; and funds have left the account, or to <code>failed</code> or <code>canceled</code>. If an OutboundTransfer fails to arrive at its payout method, its status will change to <code>returned</code>.
 * @property null|(object{failed: null|(object{reason: string}&\stdClass&\Stripe\StripeObject), returned: null|(object{reason: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $status_details Status details for an OutboundTransfer in a <code>failed</code> or <code>returned</code> state.
 * @property null|(object{canceled_at: null|int, failed_at: null|int, posted_at: null|int, returned_at: null|int}&\stdClass&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when the object transitioned to a particular status.
 * @property (object{credited: \Stripe\StripeObject, payout_method: string}&\stdClass&\Stripe\StripeObject) $to To which payout method the OutboundTransfer was sent.
 * @property (object{status: string, value: null|string}&\stdClass&\Stripe\StripeObject) $trace_id A unique identifier that can be used to track this OutboundTransfer with recipient bank. Banks might call this a “reference number” or something similar.
 */
class OutboundTransfer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.outbound_transfer';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RETURNED = 'returned';
}
