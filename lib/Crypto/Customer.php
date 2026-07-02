<?php

// File generated from our OpenAPI spec

namespace Stripe\Crypto;

/**
 * This object represents a crypto onramp customer. Use it to get their kyc status and payment methods.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $kyc_region The KYC region determined by the customer's address country.
 * @property (object{tier: string, verification_errors: string[], verification_status: string}&\Stripe\StripeObject)[] $kyc_tiers List of KYC tiers and their verification status.
 * @property string[] $provided_fields The set of KYC Fields provided for this customers.
 * @property (object{errors: string[], name: string, status: string}&\Stripe\StripeObject)[] $verifications List of verifications and their outcome.
 */
class Customer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'crypto.customer';

    use \Stripe\ApiOperations\NestedResource;

    const KYC_REGION_EU = 'eu';
    const KYC_REGION_US = 'us';

    /**
     * Retrieves the details of a Crypto Customer.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Customer
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

    const PATH_CRYPTO_CONSUMER_WALLETS = '/crypto_consumer_wallets';

    /**
     * @param string $id the ID of the customer on which to retrieve the customer consumer wallets
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<CustomerConsumerWallet> the list of customer consumer wallets
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function allCryptoConsumerWallets($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_CRYPTO_CONSUMER_WALLETS, $params, $opts);
    }
    const PATH_PAYMENT_TOKENS = '/payment_tokens';

    /**
     * @param string $id the ID of the customer on which to retrieve the customer payment tokens
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<CustomerPaymentToken> the list of customer payment tokens
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function allPaymentTokens($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_PAYMENT_TOKENS, $params, $opts);
    }
}
