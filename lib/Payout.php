<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A <code>Payout</code> object is created when you receive funds from Stripe, or when you
 * initiate a payout to either a bank account or debit card of a <a href="/docs/connect/bank-debit-card-payouts">connected
 * Stripe account</a>. You can retrieve individual payouts,
 * and list all payouts. Payouts are made on <a href="/docs/connect/manage-payout-schedule">varying
 * schedules</a>, depending on your country and
 * industry.
 *
 * Related guide: <a href="https://stripe.com/docs/payouts">Receiving payouts</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The amount (in cents (or local equivalent)) that transfers to your bank account or debit card.
 * @property int $arrival_date Date that you can expect the payout to arrive in the bank. This factors in delays to account for weekends or bank holidays.
 * @property bool $automatic Returns <code>true</code> if the payout is created by an <a href="https://stripe.com/docs/payouts#payout-schedule">automated payout schedule</a> and <code>false</code> if it's <a href="https://stripe.com/docs/payouts#manual-payouts">requested manually</a>.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the balance transaction that describes the impact of this payout on your account balance.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string|\Stripe\BankAccount|\Stripe\Card $destination ID of the bank account or card the payout is sent to.
 * @property null|string|\Stripe\BalanceTransaction $failure_balance_transaction If the payout fails or cancels, this is the ID of the balance transaction that reverses the initial balance transaction and returns the funds from the failed payout back in your balance.
 * @property null|string $failure_code Error code that provides a reason for a payout failure, if available. View our <a href="https://stripe.com/docs/api#payout_failures">list of failure codes</a>.
 * @property null|string $failure_message Message that provides the reason for a payout failure, if available.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $method The method used to send this payout, which can be <code>standard</code> or <code>instant</code>. <code>instant</code> is supported for payouts to debit cards and bank accounts in certain countries. Learn more about <a href="https://stripe.com/docs/payouts/instant-payouts-banks">bank support for Instant Payouts</a>.
 * @property null|string|\Stripe\Payout $original_payout If the payout reverses another, this is the ID of the original payout.
 * @property string $reconciliation_status If <code>completed</code>, you can use the <a href="https://stripe.com/docs/api/balance_transactions/list#balance_transaction_list-payout">Balance Transactions API</a> to list all balance transactions that are paid out in this payout.
 * @property null|string|\Stripe\Payout $reversed_by If the payout reverses, this is the ID of the payout that reverses this payout.
 * @property string $source_type The source balance this payout came from, which can be one of the following: <code>card</code>, <code>fpx</code>, or <code>bank_account</code>.
 * @property null|string $statement_descriptor Extra information about a payout that displays on the user's bank statement.
 * @property string $status Current status of the payout: <code>paid</code>, <code>pending</code>, <code>in_transit</code>, <code>canceled</code> or <code>failed</code>. A payout is <code>pending</code> until it's submitted to the bank, when it becomes <code>in_transit</code>. The status changes to <code>paid</code> if the transaction succeeds, or to <code>failed</code> or <code>canceled</code> (within 5 business days). Some payouts that fail might initially show as <code>paid</code>, then change to <code>failed</code>.
 * @property string $type Can be <code>bank_account</code> or <code>card</code>.
 */
class Payout extends ApiResource
{
    const OBJECT_NAME = 'payout';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const METHOD_INSTANT = 'instant';
    const METHOD_STANDARD = 'standard';

    const RECONCILIATION_STATUS_COMPLETED = 'completed';
    const RECONCILIATION_STATUS_IN_PROGRESS = 'in_progress';
    const RECONCILIATION_STATUS_NOT_APPLICABLE = 'not_applicable';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_IN_TRANSIT = 'in_transit';
    const STATUS_PAID = 'paid';
    const STATUS_PENDING = 'pending';

    const TYPE_BANK_ACCOUNT = 'bank_account';
    const TYPE_CARD = 'card';

    const FAILURE_ACCOUNT_CLOSED = 'account_closed';
    const FAILURE_ACCOUNT_FROZEN = 'account_frozen';
    const FAILURE_BANK_ACCOUNT_RESTRICTED = 'bank_account_restricted';
    const FAILURE_BANK_OWNERSHIP_CHANGED = 'bank_ownership_changed';
    const FAILURE_COULD_NOT_PROCESS = 'could_not_process';
    const FAILURE_DEBIT_NOT_AUTHORIZED = 'debit_not_authorized';
    const FAILURE_DECLINED = 'declined';
    const FAILURE_INCORRECT_ACCOUNT_HOLDER_ADDRESS = 'incorrect_account_holder_address';
    const FAILURE_INCORRECT_ACCOUNT_HOLDER_NAME = 'incorrect_account_holder_name';
    const FAILURE_INCORRECT_ACCOUNT_HOLDER_TAX_ID = 'incorrect_account_holder_tax_id';
    const FAILURE_INSUFFICIENT_FUNDS = 'insufficient_funds';
    const FAILURE_INVALID_ACCOUNT_NUMBER = 'invalid_account_number';
    const FAILURE_INVALID_CURRENCY = 'invalid_currency';
    const FAILURE_NO_ACCOUNT = 'no_account';
    const FAILURE_UNSUPPORTED_CARD = 'unsupported_card';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Payout the canceled payout
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Payout the reversed payout
     */
    public function reverse($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reverse';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
