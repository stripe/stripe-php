<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Use <a href="https://docs.stripe.com/docs/treasury/moving-money/financial-accounts/out-of/outbound-transfers">OutboundTransfers</a> to transfer funds from a <a href="https://stripe.com/docs/api#financial_accounts">FinancialAccount</a> to a PaymentMethod belonging to the same entity. To send funds to a different party, use <a href="https://stripe.com/docs/api#outbound_payments">OutboundPayments</a> instead. You can send funds over ACH rails or through a domestic wire transfer to a user's own external bank account.
 *
 * Simulate OutboundTransfer state changes with the <code>/v1/test_helpers/treasury/outbound_transfers</code> endpoints. These methods can only be called on test mode objects.
 *
 * Related guide: <a href="https://docs.stripe.com/docs/treasury/moving-money/financial-accounts/out-of/outbound-transfers">Moving money with Treasury using OutboundTransfer objects</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property bool $cancelable Returns <code>true</code> if the object can be canceled, and <code>false</code> otherwise.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string $destination_payment_method The PaymentMethod used as the payment instrument for an OutboundTransfer.
 * @property (object{billing_details: (object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string}&\Stripe\StripeObject), financial_account?: (object{id: string, network: string}&\Stripe\StripeObject), type: string, us_bank_account?: (object{account_holder_type: null|string, account_type: null|string, bank_name: null|string, fingerprint: null|string, last4: null|string, mandate?: string|\Stripe\Mandate, network: string, routing_number: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $destination_payment_method_details
 * @property int $expected_arrival_date The date when funds are expected to arrive in the destination account.
 * @property string $financial_account The FinancialAccount that funds were pulled from.
 * @property null|string $hosted_regulatory_receipt_url A <a href="https://stripe.com/docs/treasury/moving-money/regulatory-receipts">hosted transaction receipt</a> URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{code: string, transaction: string|Transaction}&\Stripe\StripeObject) $returned_details Details about a returned OutboundTransfer. Only set when the status is <code>returned</code>.
 * @property string $statement_descriptor Information about the OutboundTransfer to be sent to the recipient account.
 * @property string $status Current status of the OutboundTransfer: <code>processing</code>, <code>failed</code>, <code>canceled</code>, <code>posted</code>, <code>returned</code>. An OutboundTransfer is <code>processing</code> if it has been created and is pending. The status changes to <code>posted</code> once the OutboundTransfer has been &quot;confirmed&quot; and funds have left the account, or to <code>failed</code> or <code>canceled</code>. If an OutboundTransfer fails to arrive at its destination, its status will change to <code>returned</code>.
 * @property (object{canceled_at: null|int, failed_at: null|int, posted_at: null|int, returned_at: null|int}&\Stripe\StripeObject) $status_transitions
 * @property null|(object{ach?: (object{trace_id: string}&\Stripe\StripeObject), type: string, us_domestic_wire?: (object{chips: null|string, imad: null|string, omad: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $tracking_details Details about network-specific tracking information if available.
 * @property string|Transaction $transaction The Transaction associated with this object.
 */
class OutboundTransfer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.outbound_transfer';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RETURNED = 'returned';

    /**
     * Creates an OutboundTransfer.
     *
     * @param null|array{amount: int, currency: string, description?: string, destination_payment_method?: string, destination_payment_method_data?: array{financial_account?: string, type: string}, destination_payment_method_options?: array{us_bank_account?: null|array{network?: string}}, expand?: string[], financial_account: string, metadata?: array<string, string>, statement_descriptor?: string} $params
     * @param null|array|string $options
     *
     * @return OutboundTransfer the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of OutboundTransfers sent from the specified FinancialAccount.
     *
     * @param null|array{ending_before?: string, expand?: string[], financial_account: string, limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<OutboundTransfer> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing OutboundTransfer by passing the unique
     * OutboundTransfer ID from either the OutboundTransfer creation request or
     * OutboundTransfer list.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return OutboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return OutboundTransfer the canceled outbound transfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
