<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A <code>Transfer</code> object is created when you move funds between Stripe accounts as
 * part of Connect.
 *
 * Before April 6, 2017, transfers also represented movement of funds from a
 * Stripe account to a card or bank account. This behavior has since been split
 * out into a <a href="https://stripe.com/docs/api#payout_object">Payout</a> object, with corresponding payout endpoints. For more
 * information, read about the
 * <a href="https://stripe.com/docs/transfer-payout-split">transfer/payout split</a>.
 *
 * Related guide: <a href="https://stripe.com/docs/connect/separate-charges-and-transfers">Creating separate charges and transfers</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount in cents (or local equivalent) to be transferred.
 * @property int $amount_reversed Amount in cents (or local equivalent) reversed (can be less than the amount attribute on the transfer if a partial reversal was issued).
 * @property null|BalanceTransaction|string $balance_transaction Balance transaction that describes the impact of this transfer on your account balance.
 * @property int $created Time that this record of the transfer was first created.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|Account|string $destination ID of the Stripe account the transfer was sent to.
 * @property null|Charge|string $destination_payment If the destination is a Stripe account, this will be the ID of the payment that the destination account received for the transfer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property Collection<TransferReversal> $reversals A list of reversals that have been applied to the transfer.
 * @property bool $reversed Whether the transfer has been fully reversed. If the transfer is only partially reversed, this attribute will still be false.
 * @property null|Charge|string $source_transaction ID of the charge that was used to fund the transfer. If null, the transfer was funded from the available balance.
 * @property null|string $source_type The source balance this transfer came from. One of <code>card</code>, <code>fpx</code>, or <code>bank_account</code>.
 * @property null|string $transfer_group A string that identifies this transaction as part of a group. See the <a href="https://stripe.com/docs/connect/separate-charges-and-transfers#transfer-options">Connect documentation</a> for details.
 */
class Transfer extends ApiResource
{
    const OBJECT_NAME = 'transfer';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const SOURCE_TYPE_BANK_ACCOUNT = 'bank_account';
    const SOURCE_TYPE_CARD = 'card';
    const SOURCE_TYPE_FPX = 'fpx';

    /**
     * To send funds from your Stripe account to a connected account, you create a new
     * transfer object. Your <a href="#balance">Stripe balance</a> must be able to
     * cover the transfer amount, or you’ll receive an “Insufficient Funds” error.
     *
     * @param null|array{amount?: int, currency: string, description?: string, destination: string, expand?: string[], metadata?: StripeObject, source_transaction?: string, source_type?: string, transfer_group?: string} $params
     * @param null|array|string $options
     *
     * @return Transfer the created resource
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
     * Returns a list of existing transfers sent to connected accounts. The transfers
     * are returned in sorted order, with the most recently created transfers appearing
     * first.
     *
     * @param null|array{created?: array|int, destination?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, transfer_group?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Transfer> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing transfer. Supply the unique transfer ID
     * from either a transfer creation request or the transfer list, and Stripe will
     * return the corresponding transfer information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Transfer
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
     * Updates the specified transfer by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged.
     *
     * This request accepts only metadata as an argument.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{description?: string, expand?: string[], metadata?: null|StripeObject} $params
     * @param null|array|string $opts
     *
     * @return Transfer the updated resource
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

    const PATH_REVERSALS = '/reversals';

    /**
     * @param string $id the ID of the transfer on which to retrieve the transfer reversals
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<TransferReversal> the list of transfer reversals
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allReversals($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_REVERSALS, $params, $opts);
    }

    /**
     * @param string $id the ID of the transfer on which to create the transfer reversal
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return TransferReversal
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function createReversal($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_REVERSALS, $params, $opts);
    }

    /**
     * @param string $id the ID of the transfer to which the transfer reversal belongs
     * @param string $reversalId the ID of the transfer reversal to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return TransferReversal
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveReversal($id, $reversalId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_REVERSALS, $reversalId, $params, $opts);
    }

    /**
     * @param string $id the ID of the transfer to which the transfer reversal belongs
     * @param string $reversalId the ID of the transfer reversal to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return TransferReversal
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function updateReversal($id, $reversalId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_REVERSALS, $reversalId, $params, $opts);
    }
}
