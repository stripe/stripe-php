<?php

namespace Stripe;

/**
 * Class Refund
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string|\Stripe\BalanceTransaction|null $balance_transaction
 * @property string|\Stripe\Charge|null $charge
 * @property int $created
 * @property string $currency
 * @property string $description
 * @property string|\Stripe\BalanceTransaction $failure_balance_transaction
 * @property string $failure_reason
 * @property \Stripe\StripeObject $metadata
 * @property string|\Stripe\PaymentIntent|null $payment_intent
 * @property string|null $reason
 * @property string|null $receipt_number
 * @property string|\Stripe\TransferReversal|null $source_transfer_reversal
 * @property string|null $status
 * @property string|\Stripe\TransferReversal|null $transfer_reversal
 *
 * @package Stripe
 */
class Refund extends ApiResource
{
    const OBJECT_NAME = 'refund';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * Possible string representations of the failure reason.
     * @link https://stripe.com/docs/api/refunds/object#refund_object-failure_reason
     */
    const FAILURE_REASON                     = 'expired_or_canceled_card';
    const FAILURE_REASON_LOST_OR_STOLEN_CARD = 'lost_or_stolen_card';
    const FAILURE_REASON_UNKNOWN             = 'unknown';

    /**
     * Possible string representations of the refund reason.
     * @link https://stripe.com/docs/api/refunds/object#refund_object-reason
     */
    const REASON_DUPLICATE             = 'duplicate';
    const REASON_FRAUDULENT            = 'fraudulent';
    const REASON_REQUESTED_BY_CUSTOMER = 'requested_by_customer';

    /**
     * Possible string representations of the refund status.
     * @link https://stripe.com/docs/api/refunds/object#refund_object-status
     */
    const STATUS_CANCELED  = 'canceled';
    const STATUS_FAILED    = 'failed';
    const STATUS_PENDING   = 'pending';
    const STATUS_SUCCEEDED = 'succeeded';
}
