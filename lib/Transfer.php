<?php

namespace Stripe;

/**
 * Class Transfer
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $amount_reversed
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $destination
 * @property string $destination_payment
 * @property bool $livemode
 * @property AttachedObject $metadata
 * @property Collection $reversals
 * @property bool $reversed
 * @property string $source_transaction
 * @property string $source_type
 * @property string $transfer_group
 *
 * @package Stripe
 */
class Transfer extends ApiResource
{
    const PATH_REVERSALS = '/reversals';

    /**
     * @param array|string $id The ID of the transfer to retrieve, or an
     *     options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Transfer
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Transfers
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Transfer The created transfer.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the transfer to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Transfer The updated transfer.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @return TransferReversal The created transfer reversal.
     */
    public function reverse($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reversals';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @return Transfer The canceled transfer.
     */
    public function cancel()
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|string|null $opts
     *
     * @return Transfer The saved transfer.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $id The ID of the transfer on which to create the reversal.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function createReversal($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_REVERSALS, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the transfer to which the reversal belongs.
     * @param array|null $reversalId The ID of the reversal to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function retrieveReversal($id, $reversalId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_REVERSALS, $reversalId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the transfer to which the reversal belongs.
     * @param array|null $reversalId The ID of the reversal to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function updateReversal($id, $reversalId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_REVERSALS, $reversalId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the transfer on which to retrieve the reversals.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return TransferReversal
     */
    public static function allReversals($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_REVERSALS, $params, $opts);
    }
}
