<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Transactions represent changes to a <a href="https://stripe.com/docs/api#financial_accounts">FinancialAccount's</a> balance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property (object{cash: int, inbound_pending: int, outbound_pending: int}&\Stripe\StripeObject&\stdClass) $balance_impact Change to a FinancialAccount's balance
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|\Stripe\Collection<\Stripe\Treasury\TransactionEntry> $entries A list of TransactionEntries that are part of this Transaction. This cannot be expanded in any list endpoints.
 * @property string $financial_account The FinancialAccount associated with this object.
 * @property null|string $flow ID of the flow that created the Transaction.
 * @property null|(object{credit_reversal?: \Stripe\Treasury\CreditReversal, debit_reversal?: \Stripe\Treasury\DebitReversal, inbound_transfer?: \Stripe\Treasury\InboundTransfer, issuing_authorization?: \Stripe\Issuing\Authorization, outbound_payment?: \Stripe\Treasury\OutboundPayment, outbound_transfer?: \Stripe\Treasury\OutboundTransfer, received_credit?: \Stripe\Treasury\ReceivedCredit, received_debit?: \Stripe\Treasury\ReceivedDebit, type: string}&\Stripe\StripeObject&\stdClass) $flow_details Details of the flow that created the Transaction.
 * @property string $flow_type Type of the flow that created the Transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Status of the Transaction.
 * @property (object{posted_at: null|int, void_at: null|int}&\Stripe\StripeObject&\stdClass) $status_transitions
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.transaction';

    const FLOW_TYPE_CREDIT_REVERSAL = 'credit_reversal';
    const FLOW_TYPE_DEBIT_REVERSAL = 'debit_reversal';
    const FLOW_TYPE_INBOUND_TRANSFER = 'inbound_transfer';
    const FLOW_TYPE_ISSUING_AUTHORIZATION = 'issuing_authorization';
    const FLOW_TYPE_OTHER = 'other';
    const FLOW_TYPE_OUTBOUND_PAYMENT = 'outbound_payment';
    const FLOW_TYPE_OUTBOUND_TRANSFER = 'outbound_transfer';
    const FLOW_TYPE_RECEIVED_CREDIT = 'received_credit';
    const FLOW_TYPE_RECEIVED_DEBIT = 'received_debit';

    const STATUS_OPEN = 'open';
    const STATUS_POSTED = 'posted';
    const STATUS_VOID = 'void';

    /**
     * Retrieves a list of Transaction objects.
     *
     * @param null|array{created?: int|array, ending_before?: string, expand?: string[], financial_account: string, limit?: int, order_by?: string, starting_after?: string, status?: string, status_transitions?: array{posted_at?: int|array}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\Transaction> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing Transaction.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\Transaction
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
