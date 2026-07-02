<?php

// File generated from our OpenAPI spec

namespace Stripe\Crypto;

/**
 * A Crypto Onramp Session represents your customer's session as they purchase cryptocurrency through Stripe. Once payment is successful, Stripe will fulfill the delivery of cryptocurrency to your user's wallet and contain a reference to the crypto transaction ID.
 *
 * You can create an onramp session on your server and embed the widget on your frontend. Alternatively, you can redirect your users to the standalone hosted onramp.
 *
 * Related guide: <a href="https://docs.stripe.com/crypto/integrate-the-onramp">Integrate the onramp</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $client_secret <p>A client secret that can be used to drive a single session using our embedded widget.</p><p>Related guide: <a href="https://docs.stripe.com/crypto/integrate-the-onramp">Set up an onramp integration</a></p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $kyc_details_provided Has the value <code>true</code> if any user kyc details were provided during the creation of the onramp session. Otherwise, has the value <code>false</code>.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $redirect_url <p>Redirect your users to the URL for a prebuilt frontend integration of the crypto onramp on the standalone hosted onramp.</p><p>Related guide: <a href="https://docs.stripe.com/crypto/standalone-hosted-onramp#mint-a-session-with-a-redirect-url">Mint a session with a redirect url</a></p>
 * @property string $status The status of the Onramp Session. One of = <code>{initialized, rejected, requires_payment, fulfillment_processing, fulfillment_complete}</code>
 * @property (object{destination_amount: null|string, destination_currencies: null|string[], destination_currency: null|string, destination_network: null|string, destination_networks: null|string[], fees: null|(object{network_fee_amount: null|string, transaction_fee_amount: null|string}&\Stripe\StripeObject), lock_wallet_address: null|bool, settlement_speed: null|string, source_amount: null|string, source_currency: null|string, transaction_id: null|string, wallet_address: null|string, wallet_addresses: null|(object{avalanche: null|string, base_network: null|string, bitcoin: null|string, destination_tags: null|(object{stellar: null|string}&\Stripe\StripeObject), ethereum: null|string, optimism: null|string, polygon: null|string, solana: null|string, stellar: null|string, worldchain: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $transaction_details
 */
class OnrampSession extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'crypto.onramp_session';

    /**
     * Creates a CryptoOnrampSession object.
     *
     * After the CryptoOnrampSession is created, display the onramp session modal using
     * the <code>client_secret</code>.
     *
     * Related guide: <a href="/docs/crypto/integrate-the-onramp">Set up an onramp
     * integration</a>
     *
     * @param null|array{customer_ip_address?: string, destination_amount?: string, destination_currencies?: string[], destination_currency?: string, destination_network?: string, destination_networks?: string[], expand?: string[], kyc_details?: array{}, lock_wallet_address?: bool, metadata?: array<string, string>, settlement_speed?: string, source_amount?: string, source_currency?: string, wallet_addresses?: array{destination_tags?: array{stellar?: string}}} $params
     * @param null|array|string $options
     *
     * @return OnrampSession the created resource
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
     * Returns a list of onramp sessions that match the filter criteria. The onramp
     * sessions are returned in sorted order, with the most recent onramp sessions
     * appearing first.
     *
     * @param null|array{created?: array|int, destination_currency?: string, destination_network?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<OnrampSession> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a CryptoOnrampSession that was previously created.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return OnrampSession
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

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return OnrampSession the checkouted onramp session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function checkout($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/checkout';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return OnrampSession the quoted onramp session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function quote($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/quote';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
