<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A `Payout` object is created when you receive funds from Stripe, or
 * when you initiate a payout to either a bank account or debit card of a [connected Stripe account](/docs/connect/bank-debit-card-payouts). You
 * can retrieve individual payouts, as well as list all payouts. Payouts are made
 * on [varying schedules](/docs/connect/manage-payout-schedule),
 * depending on your country and industry.
 *
 * Related guide: [Receiving Payouts](https://stripe.com/docs/payouts).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in %s) to be transferred to your bank account or debit card.
 * @property int $arrival_date Date the payout is expected to arrive in the bank. This factors in delays like weekends or bank holidays.
 * @property bool $automatic Returns `true` if the payout was created by an [automated payout schedule](https://stripe.com/docs/payouts#payout-schedule), and `false` if it was [requested manually](https://stripe.com/docs/payouts#manual-payouts).
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the balance transaction that describes the impact of this payout on your account balance.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string|\Stripe\BankAccount|\Stripe\Card $destination ID of the bank account or card the payout was sent to.
 * @property null|string|\Stripe\BalanceTransaction $failure_balance_transaction If the payout failed or was canceled, this will be the ID of the balance transaction that reversed the initial balance transaction, and puts the funds from the failed payout back in your balance.
 * @property null|string $failure_code Error code explaining reason for payout failure if available. See [Types of payout failures](https://stripe.com/docs/api#payout_failures) for a list of failure codes.
 * @property null|string $failure_message Message to user further explaining reason for payout failure if available.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $method The method used to send this payout, which can be `standard` or `instant`. `instant` is only supported for payouts to debit cards. (See [Instant payouts for marketplaces](https://stripe.com/blog/instant-payouts-for-marketplaces) for more information.)
 * @property null|string|\Stripe\Payout $original_payout If the payout reverses another, this is the ID of the original payout.
 * @property string $reconciliation_status If `completed`, the [Balance Transactions API](https://stripe.com/docs/api/balance_transactions/list#balance_transaction_list-payout) may be used to list all Balance Transactions that were paid out in this payout.
 * @property null|string|\Stripe\Payout $reversed_by If the payout was reversed, this is the ID of the payout that reverses this payout.
 * @property string $source_type The source balance this payout came from. One of `card`, `fpx`, or `bank_account`.
 * @property null|string $statement_descriptor Extra information about a payout to be displayed on the user's bank statement.
 * @property string $status Current status of the payout: `paid`, `pending`, `in_transit`, `canceled` or `failed`. A payout is `pending` until it is submitted to the bank, when it becomes `in_transit`. The status then changes to `paid` if the transaction goes through, or to `failed` or `canceled` (within 5 business days). Some failed payouts may initially show as `paid` but then change to `failed`.
 * @property string $type Can be `bank_account` or `card`.
 */
class Payout extends ApiResource
{
    const OBJECT_NAME = 'payout';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

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
