<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * A Configurations object represents how features should be configured for terminal readers.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{splashscreen?: string|\Stripe\File}&\Stripe\StripeObject&\stdClass) $bbpos_wisepos_e
 * @property null|bool $is_account_default Whether this Configuration is the default for your account
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $name String indicating the name of the Configuration object, set by the user
 * @property (object{enabled: null|bool}&\Stripe\StripeObject&\stdClass) $offline
 * @property null|(object{end_hour: int, start_hour: int}&\Stripe\StripeObject&\stdClass) $reboot_window
 * @property null|(object{splashscreen?: string|\Stripe\File}&\Stripe\StripeObject&\stdClass) $stripe_s700
 * @property (object{aud?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), cad?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), chf?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), czk?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), dkk?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), eur?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), gbp?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), hkd?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), myr?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), nok?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), nzd?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), pln?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), sek?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), sgd?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass), usd?: (object{fixed_amounts?: null|int[], percentages?: null|int[], smart_tip_threshold?: int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $tipping
 * @property null|(object{splashscreen?: string|\Stripe\File}&\Stripe\StripeObject&\stdClass) $verifone_p400
 */
class Configuration extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.configuration';

    use \Stripe\ApiOperations\Update;

    /**
     * Creates a new <code>Configuration</code> object.
     *
     * @param null|array{bbpos_wisepos_e?: array{splashscreen?: null|string}, expand?: string[], name?: string, offline?: null|array{enabled: bool}, reboot_window?: array{end_hour: int, start_hour: int}, stripe_s700?: array{splashscreen?: null|string}, tipping?: null|array{aud?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, cad?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, chf?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, czk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, dkk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, eur?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, gbp?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, hkd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, myr?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nok?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nzd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, pln?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sek?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sgd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, usd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}}, verifone_p400?: array{splashscreen?: null|string}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Configuration the created resource
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
     * Deletes a <code>Configuration</code> object.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Configuration the deleted resource
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of <code>Configuration</code> objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], is_account_default?: bool, limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Terminal\Configuration> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>Configuration</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Configuration
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a new <code>Configuration</code> object.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{bbpos_wisepos_e?: null|array{splashscreen?: null|string}, expand?: string[], name?: string, offline?: null|array{enabled: bool}, reboot_window?: null|array{end_hour: int, start_hour: int}, stripe_s700?: null|array{splashscreen?: null|string}, tipping?: null|array{aud?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, cad?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, chf?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, czk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, dkk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, eur?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, gbp?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, hkd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, myr?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nok?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nzd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, pln?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sek?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sgd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, usd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}}, verifone_p400?: null|array{splashscreen?: null|string}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Configuration the updated resource
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
}
