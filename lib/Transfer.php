<?php

namespace Stripe;

/**
 * Class Transfer
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount in %s to be transferred.
 * @property int $amount_reversed Amount in %s reversed (can be less than the amount attribute on the transfer if a partial reversal was issued).
 * @property string|\Stripe\BalanceTransaction|null $balance_transaction Balance transaction that describes the impact of this transfer on your account balance.
 * @property int $created Time that this record of the transfer was first created.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|null $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property string|\Stripe\Account|null $destination ID of the Stripe account the transfer was sent to.
 * @property string|\Stripe\Charge $destination_payment If the destination is a Stripe account, this will be the ID of the payment that the destination account received for the transfer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\Collection $reversals A list of reversals that have been applied to the transfer.
 * @property bool $reversed Whether the transfer has been fully reversed. If the transfer is only partially reversed, this attribute will still be false.
 * @property string|\Stripe\Charge|null $source_transaction ID of the charge or payment that was used to fund the transfer. If null, the transfer was funded from the available balance.
 * @property string|null $source_type The source balance this transfer came from. One of <code>card</code> or <code>bank_account</code>.
 * @property string|null $transfer_group A string that identifies this transaction as part of a group. See the <a href="https://stripe.com/docs/connect/charges-transfers#grouping-transactions">Connect documentation</a> for details.
 *
 * @package Stripe
 */
class Transfer extends ApiResource
{
    const OBJECT_NAME = 'transfer';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * Possible string representations of the source type of the transfer.
     *
     * @see https://stripe.com/docs/api/transfers/object#transfer_object-source_type
     */
    const SOURCE_TYPE_ALIPAY_ACCOUNT = 'alipay_account';
    const SOURCE_TYPE_BANK_ACCOUNT   = 'bank_account';
    const SOURCE_TYPE_CARD           = 'card';
    const SOURCE_TYPE_FINANCING      = 'financing';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Transfer The canceled transfer.
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    const PATH_REVERSALS = '/reversals';

    /**
     * @param string $id The ID of the transfer on which to retrieve the transfer reversals.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection The list of transfer reversals.
     */
    public static function allReversals($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_REVERSALS, $params, $opts);
    }

    /**
     * @param string $id The ID of the transfer on which to create the transfer reversal.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TransferReversal
     */
    public static function createReversal($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_REVERSALS, $params, $opts);
    }

    /**
     * @param string $id The ID of the transfer to which the transfer reversal belongs.
     * @param string $reversalId The ID of the transfer reversal to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TransferReversal
     */
    public static function retrieveReversal($id, $reversalId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_REVERSALS, $reversalId, $params, $opts);
    }

    /**
     * @param string $id The ID of the transfer to which the transfer reversal belongs.
     * @param string $reversalId The ID of the transfer reversal to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TransferReversal
     */
    public static function updateReversal($id, $reversalId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_REVERSALS, $reversalId, $params, $opts);
    }
}
