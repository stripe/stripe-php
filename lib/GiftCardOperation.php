<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A GiftCardOperation represents an operation performed on a third-party gift card,
 * such as activation, reload, cashout, balance check, or void.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{balance: (object{amount: int, currency: string}&StripeObject)}&StripeObject) $activation Details about a gift card activation operation.
 * @property null|(object{voided_operation: string}&StripeObject) $activation_void Details about a gift card activation void operation.
 * @property null|(object{balance: (object{amount: int, currency: string}&StripeObject)}&StripeObject) $balance_check Details about a gift card balance check operation.
 * @property null|(object{balance: (object{amount: int, currency: string}&StripeObject), previous_balance: null|(object{amount: int, currency: string}&StripeObject)}&StripeObject) $cashout Details about a gift card cashout operation.
 * @property null|(object{balance: (object{amount: int, currency: string}&StripeObject), voided_operation: string}&StripeObject) $cashout_void Details about a gift card cashout void operation.
 * @property int $completed_at The timestamp of when this operation was completed.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $failure_code The failure code of the operation. Only present if the status is failed.
 * @property GiftCard|string $gift_card The gift card this operation was performed on.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $location ID of the location that this transaction's reader is assigned to.
 * @property null|string $on_behalf_of The connected account whose credentials were used to perform this operation.
 * @property null|string $reader ID of the reader this transaction was made on.
 * @property null|(object{balance: (object{amount: int, currency: string}&StripeObject), previous_balance: null|(object{amount: int, currency: string}&StripeObject)}&StripeObject) $reload Details about a gift card reload operation.
 * @property null|(object{balance: (object{amount: int, currency: string}&StripeObject), voided_operation: string}&StripeObject) $reload_void Details about a gift card reload void operation.
 * @property string $status The status of the operation.
 * @property string $type The type of operation performed.
 */
class GiftCardOperation extends ApiResource
{
    const OBJECT_NAME = 'gift_card_operation';

    const FAILURE_CODE_ACTION_NOT_SUPPORTED = 'action_not_supported';
    const FAILURE_CODE_CARD_ALREADY_ACTIVATED = 'card_already_activated';
    const FAILURE_CODE_CARD_EXPIRED = 'card_expired';
    const FAILURE_CODE_CARD_NOT_ACTIVATED = 'card_not_activated';
    const FAILURE_CODE_DO_NOT_HONOR = 'do_not_honor';
    const FAILURE_CODE_GENERIC_FAILURE = 'generic_failure';
    const FAILURE_CODE_INSUFFICIENT_BALANCE = 'insufficient_balance';
    const FAILURE_CODE_INVALID_AMOUNT = 'invalid_amount';
    const FAILURE_CODE_INVALID_CURRENCY = 'invalid_currency';
    const FAILURE_CODE_INVALID_NUMBER = 'invalid_number';
    const FAILURE_CODE_INVALID_PIN = 'invalid_pin';
    const FAILURE_CODE_INVALID_TRACK_DATA = 'invalid_track_data';
    const FAILURE_CODE_LOST_CARD = 'lost_card';
    const FAILURE_CODE_LOST_OR_STOLEN_CARD = 'lost_or_stolen_card';
    const FAILURE_CODE_PIN_REQUIRED = 'pin_required';
    const FAILURE_CODE_PIN_TRIES_EXCEEDED = 'pin_tries_exceeded';
    const FAILURE_CODE_PROCESSING_ERROR = 'processing_error';
    const FAILURE_CODE_PROVIDER_UNAVAILABLE = 'provider_unavailable';
    const FAILURE_CODE_STOLEN_CARD = 'stolen_card';
    const FAILURE_CODE_SUSPECTED_FRAUD = 'suspected_fraud';
    const FAILURE_CODE_TIMEOUT = 'timeout';

    const STATUS_FAILED = 'failed';
    const STATUS_SUCCEEDED = 'succeeded';

    const TYPE_ACTIVATION = 'activation';
    const TYPE_ACTIVATION_VOID = 'activation_void';
    const TYPE_BALANCE_CHECK = 'balance_check';
    const TYPE_CASHOUT = 'cashout';
    const TYPE_CASHOUT_VOID = 'cashout_void';
    const TYPE_RELOAD = 'reload';
    const TYPE_RELOAD_VOID = 'reload_void';

    /**
     * Retrieves a third-party gift card operation object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return GiftCardOperation
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
