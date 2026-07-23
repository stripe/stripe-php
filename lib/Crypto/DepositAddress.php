<?php

// File generated from our OpenAPI spec

namespace Stripe\Crypto;

/**
 * A crypto deposit address is a blockchain address that can be used by a merchant for deposit mode crypto payments.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $address
 * @property int $created
 * @property null|string $customer
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $network
 * @property (object{token_contract_address: string, token_currency: string}&\Stripe\StripeObject)[] $supported_tokens
 */
class DepositAddress extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'crypto.deposit_address';

    const NETWORK_BASE = 'base';
    const NETWORK_SOLANA = 'solana';
    const NETWORK_TEMPO = 'tempo';

    /**
     * Creates a new crypto deposit address for the authenticated merchant on the
     * specified network. The returned address can be used across multiple
     * PaymentIntents.
     *
     * @param null|array{customer?: string, expand?: string[], metadata?: array<string, string>, network: string} $params
     * @param null|array|string $options
     *
     * @return DepositAddress the created resource
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
     * Lists crypto deposit addresses for the authenticated merchant. Supports
     * cursor-based pagination and optional filtering by customer, network, or on-chain
     * address.
     *
     * @param null|array{address?: string, customer?: string, customer_account?: string, ending_before?: string, expand?: string[], limit?: int, network?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<DepositAddress> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing crypto deposit address by ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return DepositAddress
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
}
