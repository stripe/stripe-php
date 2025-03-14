<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TransferService extends AbstractService
{
    /**
     * Returns a list of existing transfers sent to connected accounts. The transfers
     * are returned in sorted order, with the most recently created transfers appearing
     * first.
     *
     * @param null|array{created?: array|int, destination?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Transfer>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/transfers', $params, $opts);
    }

    /**
     * You can see a list of the reversals belonging to a specific transfer. Note that
     * the 10 most recent reversals are always available by default on the transfer
     * object. If you need more than those 10, you can use this API method and the
     * <code>limit</code> and <code>starting_after</code> parameters to page through
     * additional reversals.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\TransferReversal>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allReversals($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/transfers/%s/reversals', $parentId), $params, $opts);
    }

    /**
     * To send funds from your Stripe account to a connected account, you create a new
     * transfer object. Your <a href="#balance">Stripe balance</a> must be able to
     * cover the transfer amount, or you’ll receive an “Insufficient Funds” error.
     *
     * @param null|array{amount?: int, currency: string, description?: string, destination: string, expand?: string[], metadata?: \Stripe\StripeObject, source_transaction?: string, source_type?: string, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Transfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/transfers', $params, $opts);
    }

    /**
     * When you create a new reversal, you must specify a transfer to create it on.
     *
     * When reversing transfers, you can optionally reverse part of the transfer. You
     * can do so as many times as you wish until the entire transfer has been reversed.
     *
     * Once entirely reversed, a transfer can’t be reversed again. This method will
     * return an error when called on an already-reversed transfer, or when trying to
     * reverse more money than is left on a transfer.
     *
     * @param string $parentId
     * @param null|array{amount?: int, description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, refund_application_fee?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TransferReversal
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createReversal($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/transfers/%s/reversals', $parentId), $params, $opts);
    }

    /**
     * Retrieves the details of an existing transfer. Supply the unique transfer ID
     * from either a transfer creation request or the transfer list, and Stripe will
     * return the corresponding transfer information.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Transfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/transfers/%s', $id), $params, $opts);
    }

    /**
     * By default, you can see the 10 most recent reversals stored directly on the
     * transfer object, but you can also retrieve details about a specific reversal
     * stored on the transfer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TransferReversal
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveReversal($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/transfers/%s/reversals/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates the specified transfer by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged.
     *
     * This request accepts only metadata as an argument.
     *
     * @param string $id
     * @param null|array{description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Transfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/transfers/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified reversal by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged.
     *
     * This request only accepts metadata and description as arguments.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TransferReversal
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateReversal($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/transfers/%s/reversals/%s', $parentId, $id), $params, $opts);
    }
}
