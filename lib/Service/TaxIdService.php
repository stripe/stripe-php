<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TaxIdService extends AbstractService
{
    /**
     * Returns a list of tax IDs.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, owner?: array{account?: string, customer?: string, customer_account?: string, type: string}, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\TaxId>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax_ids', $params, $opts);
    }

    /**
     * Creates a new account or customer <code>tax_id</code> object.
     *
     * @param null|array{expand?: string[], owner?: array{account?: string, customer?: string, customer_account?: string, type: string}, type: string, value: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax_ids', $params, $opts);
    }

    /**
     * Deletes an existing account or customer <code>tax_id</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/tax_ids/%s', $id), $params, $opts);
    }

    /**
     * Retrieves an account or customer <code>tax_id</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax_ids/%s', $id), $params, $opts);
    }

    /**
     * Serializes a TaxId create request into a batch job JSONL line.
     *
     * @param null|array{expand?: string[], owner?: array{account?: string, customer?: string, customer_account?: string, type: string}, type: string, value: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeBatchCreate($params = null, $opts = null)
    {
        $itemId = (new \Stripe\Util\RandomGenerator())->uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = isset($opts->headers['Stripe-Version']) ? $opts->headers['Stripe-Version'] : \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        $stripeContext = isset($opts->headers['Stripe-Context']) ? $opts->headers['Stripe-Context'] : null;
        if (null !== $stripeContext) {
            $item['context'] = $stripeContext;
        }

        return \json_encode($item);
    }

    /**
     * Serializes a TaxId create request into a batch job JSONL line.
     *
     * @param string $customer
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeBatchCreateForCustomer($customer, $params = null, $opts = null)
    {
        $itemId = (new \Stripe\Util\RandomGenerator())->uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = isset($opts->headers['Stripe-Version']) ? $opts->headers['Stripe-Version'] : \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        $item['path_params'] = ['customer' => $customer];
        $stripeContext = isset($opts->headers['Stripe-Context']) ? $opts->headers['Stripe-Context'] : null;
        if (null !== $stripeContext) {
            $item['context'] = $stripeContext;
        }

        return \json_encode($item);
    }

    /**
     * Serializes a TaxId delete request into a batch job JSONL line.
     *
     * @param string $customer
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeBatchDelete($customer, $id, $params = null, $opts = null)
    {
        $itemId = (new \Stripe\Util\RandomGenerator())->uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = isset($opts->headers['Stripe-Version']) ? $opts->headers['Stripe-Version'] : \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        $item['path_params'] = ['customer' => $customer, 'id' => $id];
        $stripeContext = isset($opts->headers['Stripe-Context']) ? $opts->headers['Stripe-Context'] : null;
        if (null !== $stripeContext) {
            $item['context'] = $stripeContext;
        }

        return \json_encode($item);
    }
}
