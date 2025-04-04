<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Stripe Treasury provides users with a container for money called a FinancialAccount that is separate from their Payments balance.
 * FinancialAccounts serve as the source and destination of Treasury’s money movement APIs.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string[] $active_features The array of paths to active Features in the Features hash.
 * @property (object{cash: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\Stripe\StripeObject) $balance Balance information for the FinancialAccount
 * @property string $country Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|FinancialAccountFeatures $features Encodes whether a FinancialAccount has access to a particular Feature, with a <code>status</code> enum and associated <code>status_details</code>. Stripe or the platform can control Features via the requested field.
 * @property ((object{aba?: (object{account_holder_name: string, account_number?: null|string, account_number_last4: string, bank_name: string, routing_number: string}&\Stripe\StripeObject), supported_networks?: string[], type: string}&\Stripe\StripeObject))[] $financial_addresses The set of credentials that resolve to a FinancialAccount.
 * @property null|bool $is_default
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nickname The nickname for the FinancialAccount.
 * @property null|string[] $pending_features The array of paths to pending Features in the Features hash.
 * @property null|(object{inbound_flows: null|string, outbound_flows: null|string}&\Stripe\StripeObject) $platform_restrictions The set of functionalities that the platform can restrict on the FinancialAccount.
 * @property null|string[] $restricted_features The array of paths to restricted Features in the Features hash.
 * @property string $status Status of this FinancialAccount.
 * @property (object{closed: null|(object{reasons: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details
 * @property string[] $supported_currencies The currencies the FinancialAccount can hold a balance in. Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase.
 */
class FinancialAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.financial_account';

    use \Stripe\ApiOperations\Update;

    const STATUS_CLOSED = 'closed';
    const STATUS_OPEN = 'open';

    /**
     * Creates a new FinancialAccount. Each connected account can have up to three
     * FinancialAccounts by default.
     *
     * @param null|array{expand?: string[], features?: array{card_issuing?: array{requested: bool}, deposit_insurance?: array{requested: bool}, financial_addresses?: array{aba?: array{requested: bool}}, inbound_transfers?: array{ach?: array{requested: bool}}, intra_stripe_flows?: array{requested: bool}, outbound_payments?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}, outbound_transfers?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}}, metadata?: \Stripe\StripeObject, nickname?: null|string, platform_restrictions?: array{inbound_flows?: string, outbound_flows?: string}, supported_currencies: string[]} $params
     * @param null|array|string $options
     *
     * @return FinancialAccount the created resource
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
     * Returns a list of FinancialAccounts.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<FinancialAccount> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a FinancialAccount.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return FinancialAccount
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
     * Updates the details of a FinancialAccount.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], features?: array{card_issuing?: array{requested: bool}, deposit_insurance?: array{requested: bool}, financial_addresses?: array{aba?: array{requested: bool}}, inbound_transfers?: array{ach?: array{requested: bool}}, intra_stripe_flows?: array{requested: bool}, outbound_payments?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}, outbound_transfers?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}}, forwarding_settings?: array{financial_account?: string, payment_method?: string, type: string}, metadata?: \Stripe\StripeObject, nickname?: null|string, platform_restrictions?: array{inbound_flows?: string, outbound_flows?: string}} $params
     * @param null|array|string $opts
     *
     * @return FinancialAccount the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return FinancialAccount the closed financial account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function close($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/close';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return FinancialAccountFeatures the retrieved financial account features
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveFeatures($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/features';
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return FinancialAccountFeatures the updated financial account features
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateFeatures($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/features';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
