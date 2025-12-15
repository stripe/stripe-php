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
 * Related guide: <a href="https://docs.stripe.com/payouts">Receiving payouts</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The amount (in cents (or local equivalent)) that transfers to your bank account or debit card.
 * @property null|ApplicationFee|string $application_fee The application fee (if any) for the payout. <a href="https://docs.stripe.com/connect/instant-payouts#monetization-and-fees">See the Connect documentation</a> for details.
 * @property null|int $application_fee_amount The amount of the application fee (if any) requested for the payout. <a href="https://docs.stripe.com/connect/instant-payouts#monetization-and-fees">See the Connect documentation</a> for details.
 * @property int $arrival_date Date that you can expect the payout to arrive in the bank. This factors in delays to account for weekends or bank holidays.
 * @property bool $automatic Returns <code>true</code> if the payout is created by an <a href="https://docs.stripe.com/payouts#payout-schedule">automated payout schedule</a> and <code>false</code> if it's <a href="https://stripe.com/docs/payouts#manual-payouts">requested manually</a>.
 * @property null|BalanceTransaction|string $balance_transaction ID of the balance transaction that describes the impact of this payout on your account balance.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|BankAccount|Card|string $destination ID of the bank account or card the payout is sent to.
 * @property null|BalanceTransaction|string $failure_balance_transaction If the payout fails or cancels, this is the ID of the balance transaction that reverses the initial balance transaction and returns the funds from the failed payout back in your balance.
 * @property null|string $failure_code Error code that provides a reason for a payout failure, if available. View our <a href="https://docs.stripe.com/api#payout_failures">list of failure codes</a>.
 * @property null|string $failure_message Message that provides the reason for a payout failure, if available.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $method The method used to send this payout, which can be <code>standard</code> or <code>instant</code>. <code>instant</code> is supported for payouts to debit cards and bank accounts in certain countries. Learn more about <a href="https://stripe.com/docs/payouts/instant-payouts-banks">bank support for Instant Payouts</a>.
 * @property null|Payout|string $original_payout If the payout reverses another, this is the ID of the original payout.
 * @property null|string $payout_method ID of the v2 FinancialAccount the funds are sent to.
 * @property string $reconciliation_status If <code>completed</code>, you can use the <a href="https://docs.stripe.com/api/balance_transactions/list#balance_transaction_list-payout">Balance Transactions API</a> to list all balance transactions that are paid out in this payout.
 * @property null|Payout|string $reversed_by If the payout reverses, this is the ID of the payout that reverses this payout.
 * @property string $source_type The source balance this payout came from, which can be one of the following: <code>card</code>, <code>fpx</code>, or <code>bank_account</code>.
 * @property null|string $statement_descriptor Extra information about a payout that displays on the user's bank statement.
 * @property string $status Current status of the payout: <code>paid</code>, <code>pending</code>, <code>in_transit</code>, <code>canceled</code> or <code>failed</code>. A payout is <code>pending</code> until it's submitted to the bank, when it becomes <code>in_transit</code>. The status changes to <code>paid</code> if the transaction succeeds, or to <code>failed</code> or <code>canceled</code> (within 5 business days). Some payouts that fail might initially show as <code>paid</code>, then change to <code>failed</code>.
 * @property null|(object{status: string, value: null|string}&StripeObject) $trace_id A value that generates from the beneficiary's bank that allows users to track payouts with their bank. Banks might call this a &quot;reference number&quot; or something similar.
 * @property string $type Can be <code>bank_account</code> or <code>card</code>.
 */
class Payout extends ApiResource
{
    const OBJECT_NAME = 'payout';

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

    /**
     * To send funds to your own bank account, create a new payout object. Your <a
     * href="#balance">Stripe balance</a> must cover the payout amount. If it doesn’t,
     * you receive an “Insufficient Funds” error.
     *
     * If your API key is in test mode, money won’t actually be sent, though every
     * other action occurs as if you’re in live mode.
     *
     * If you create a manual payout on a Stripe account that uses multiple payment
     * source types, you need to specify the source type balance that the payout draws
     * from. The <a href="#balance_object">balance object</a> details available and
     * pending amounts by source type.
     *
     * @param null|array{amount: int, currency: string, description?: string, destination?: string, expand?: string[], metadata?: array<string, string>, method?: string, payout_method?: string, source_type?: string, statement_descriptor?: string} $params
     * @param null|array|string $options
     *
     * @return Payout the created resource
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
     * Returns a list of existing payouts sent to third-party bank accounts or payouts
     * that Stripe sent to you. The payouts return in sorted order, with the most
     * recently created payouts appearing first.
     *
     * @param null|array{arrival_date?: array|int, created?: array|int, destination?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Payout> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing payout. Supply the unique payout ID from
     * either a payout creation request or the payout list. Stripe returns the
     * corresponding payout information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Payout
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
     * Updates the specified payout by setting the values of the parameters you pass.
     * We don’t change parameters that you don’t provide. This request only accepts the
     * metadata as arguments.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|array|string $opts
     *
     * @return Payout the updated resource
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
     * @return Payout the canceled payout
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

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Payout the reversed payout
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function reverse($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reverse';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
