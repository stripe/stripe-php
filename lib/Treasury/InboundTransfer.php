<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Use <a href="https://docs.stripe.com/docs/treasury/moving-money/financial-accounts/into/inbound-transfers">InboundTransfers</a> to add funds to your <a href="https://api.stripe.com#financial_accounts">FinancialAccount</a> via a PaymentMethod that is owned by you. The funds will be transferred via an ACH debit.
 *
 * Related guide: <a href="https://docs.stripe.com/docs/treasury/moving-money/financial-accounts/into/inbound-transfers">Moving money with Treasury using InboundTransfer objects</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property bool $cancelable Returns <code>true</code> if the InboundTransfer is able to be canceled.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|(object{code: string}&\Stripe\StripeObject) $failure_details Details about this InboundTransfer's failure. Only set when status is <code>failed</code>.
 * @property string $financial_account The FinancialAccount that received the funds.
 * @property null|string $hosted_regulatory_receipt_url A <a href="https://docs.stripe.com/treasury/moving-money/regulatory-receipts">hosted transaction receipt</a> URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property (object{received_debit: null|string}&\Stripe\StripeObject) $linked_flows
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $origin_payment_method The origin payment method to be debited for an InboundTransfer.
 * @property null|(object{billing_details: (object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string}&\Stripe\StripeObject), type: string, us_bank_account?: (object{account_holder_type: null|string, account_type: null|string, bank_name: null|string, fingerprint: null|string, last4: null|string, mandate?: string|\Stripe\Mandate, network: string, routing_number: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $origin_payment_method_details Details about the PaymentMethod for an InboundTransfer.
 * @property null|bool $returned Returns <code>true</code> if the funds for an InboundTransfer were returned after the InboundTransfer went to the <code>succeeded</code> state.
 * @property string $statement_descriptor Statement descriptor shown when funds are debited from the source. Not all payment networks support <code>statement_descriptor</code>.
 * @property string $status Status of the InboundTransfer: <code>processing</code>, <code>succeeded</code>, <code>failed</code>, and <code>canceled</code>. An InboundTransfer is <code>processing</code> if it is created and pending. The status changes to <code>succeeded</code> once the funds have been &quot;confirmed&quot; and a <code>transaction</code> is created and posted. The status changes to <code>failed</code> if the transfer fails.
 * @property (object{canceled_at?: null|int, failed_at: null|int, succeeded_at: null|int}&\Stripe\StripeObject) $status_transitions
 * @property null|string|Transaction $transaction The Transaction associated with this object.
 */
class InboundTransfer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.inbound_transfer';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * Creates an InboundTransfer.
     *
     * @param null|array{amount: int, currency: string, description?: string, expand?: string[], financial_account: string, metadata?: array<string, string>, origin_payment_method: string, statement_descriptor?: string} $params
     * @param null|array|string $options
     *
     * @return InboundTransfer the created resource
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
     * Returns a list of InboundTransfers sent from the specified FinancialAccount.
     *
     * @param null|array{ending_before?: string, expand?: string[], financial_account: string, limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<InboundTransfer> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing InboundTransfer.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return InboundTransfer
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
     * @return InboundTransfer the canceled inbound transfer
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
