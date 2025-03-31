<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Refund objects allow you to refund a previously created charge that isn't
 * refunded yet. Funds are refunded to the credit or debit card that's
 * initially charged.
 *
 * Related guide: <a href="https://stripe.com/docs/refunds">Refunds</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount, in cents (or local equivalent).
 * @property null|BalanceTransaction|string $balance_transaction Balance transaction that describes the impact on your account balance.
 * @property null|Charge|string $charge ID of the charge that's refunded.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. You can use this for displaying to users (available on non-card refunds only).
 * @property (object{affirm?: (object{}&\stdClass&StripeObject), afterpay_clearpay?: (object{}&\stdClass&StripeObject), alipay?: (object{}&\stdClass&StripeObject), alma?: (object{}&\stdClass&StripeObject), amazon_pay?: (object{}&\stdClass&StripeObject), au_bank_transfer?: (object{}&\stdClass&StripeObject), blik?: (object{network_decline_code: null|string, reference: null|string, reference_status: null|string}&\stdClass&StripeObject), br_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), card?: (object{reference?: string, reference_status?: string, reference_type?: string, type: string}&\stdClass&StripeObject), cashapp?: (object{}&\stdClass&StripeObject), customer_cash_balance?: (object{}&\stdClass&StripeObject), eps?: (object{}&\stdClass&StripeObject), eu_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), gb_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), giropay?: (object{}&\stdClass&StripeObject), grabpay?: (object{}&\stdClass&StripeObject), jp_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), klarna?: (object{}&\stdClass&StripeObject), multibanco?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), mx_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), nz_bank_transfer?: (object{}&\stdClass&StripeObject), p24?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), paynow?: (object{}&\stdClass&StripeObject), paypal?: (object{}&\stdClass&StripeObject), pix?: (object{}&\stdClass&StripeObject), revolut?: (object{}&\stdClass&StripeObject), sofort?: (object{}&\stdClass&StripeObject), swish?: (object{network_decline_code: null|string, reference: null|string, reference_status: null|string}&\stdClass&StripeObject), th_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), type: string, us_bank_transfer?: (object{reference: null|string, reference_status: null|string}&\stdClass&StripeObject), wechat_pay?: (object{}&\stdClass&StripeObject), zip?: (object{}&\stdClass&StripeObject)}&\stdClass&StripeObject) $destination_details
 * @property null|BalanceTransaction|string $failure_balance_transaction After the refund fails, this balance transaction describes the adjustment made on your account balance that reverses the initial balance transaction.
 * @property null|string $failure_reason Provides the reason for the refund failure. Possible values are: <code>lost_or_stolen_card</code>, <code>expired_or_canceled_card</code>, <code>charge_for_pending_refund_disputed</code>, <code>insufficient_funds</code>, <code>declined</code>, <code>merchant_request</code>, or <code>unknown</code>.
 * @property null|string $instructions_email For payment methods without native refund support (for example, Konbini, PromptPay), provide an email address for the customer to receive refund instructions.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{display_details?: (object{email_sent: (object{email_sent_at: int, email_sent_to: string}&\stdClass&StripeObject), expires_at: int}&\stdClass&StripeObject), type: string}&\stdClass&StripeObject) $next_action
 * @property null|PaymentIntent|string $payment_intent ID of the PaymentIntent that's refunded.
 * @property null|(object{presentment_amount: int, presentment_currency: string}&\stdClass&StripeObject) $presentment_details
 * @property null|string $reason Reason for the refund, which is either user-provided (<code>duplicate</code>, <code>fraudulent</code>, or <code>requested_by_customer</code>) or generated by Stripe internally (<code>expired_uncaptured_charge</code>).
 * @property null|string $receipt_number This is the transaction number that appears on email receipts sent for this refund.
 * @property null|string|TransferReversal $source_transfer_reversal The transfer reversal that's associated with the refund. Only present if the charge came from another Stripe account.
 * @property null|string $status Status of the refund. This can be <code>pending</code>, <code>requires_action</code>, <code>succeeded</code>, <code>failed</code>, or <code>canceled</code>. Learn more about <a href="https://stripe.com/docs/refunds#failed-refunds">failed refunds</a>.
 * @property null|string|TransferReversal $transfer_reversal This refers to the transfer reversal object if the accompanying transfer reverses. This is only applicable if the charge was created using the destination parameter.
 */
class Refund extends ApiResource
{
    const OBJECT_NAME = 'refund';

    use ApiOperations\Update;

    const FAILURE_REASON_EXPIRED_OR_CANCELED_CARD = 'expired_or_canceled_card';
    const FAILURE_REASON_LOST_OR_STOLEN_CARD = 'lost_or_stolen_card';
    const FAILURE_REASON_UNKNOWN = 'unknown';

    const REASON_DUPLICATE = 'duplicate';
    const REASON_EXPIRED_UNCAPTURED_CHARGE = 'expired_uncaptured_charge';
    const REASON_FRAUDULENT = 'fraudulent';
    const REASON_REQUESTED_BY_CUSTOMER = 'requested_by_customer';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_REQUIRES_ACTION = 'requires_action';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * When you create a new refund, you must specify a Charge or a PaymentIntent
     * object on which to create it.
     *
     * Creating a new refund will refund a charge that has previously been created but
     * not yet refunded. Funds will be refunded to the credit or debit card that was
     * originally charged.
     *
     * You can optionally refund only part of a charge. You can do so multiple times,
     * until the entire charge has been refunded.
     *
     * Once entirely refunded, a charge can’t be refunded again. This method will raise
     * an error when called on an already-refunded charge, or when trying to refund
     * more money than is left on a charge.
     *
     * @param null|array{amount?: int, charge?: string, currency?: string, customer?: string, expand?: string[], instructions_email?: string, metadata?: null|StripeObject, origin?: string, payment_intent?: string, reason?: string, refund_application_fee?: bool, reverse_transfer?: bool} $params
     * @param null|array|string $options
     *
     * @return Refund the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of all refunds you created. We return the refunds in sorted
     * order, with the most recent refunds appearing first. The 10 most recent refunds
     * are always available by default on the Charge object.
     *
     * @param null|array{charge?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, payment_intent?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Refund> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing refund.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Refund
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

    /**
     * Updates the refund that you specify by setting the values of the passed
     * parameters. Any parameters that you don’t provide remain unchanged.
     *
     * This request only accepts <code>metadata</code> as an argument.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], metadata?: null|StripeObject} $params
     * @param null|array|string $opts
     *
     * @return Refund the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Refund the canceled refund
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
