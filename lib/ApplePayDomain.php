<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $domain_name
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class ApplePayDomain extends ApiResource
{
    const OBJECT_NAME = 'apple_pay_domain';

    /**
     * Create an apple pay domain.
     *
     * @param null|array{domain_name: string, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return ApplePayDomain the created resource
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
     * Delete an apple pay domain.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return ApplePayDomain the deleted resource
     *
     * @throws Exception\ApiErrorException if the request fails
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
     * List apple pay domains.
     *
     * @param null|array{domain_name?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<ApplePayDomain> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieve an apple pay domain.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return ApplePayDomain
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
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
        return '/v1/apple_pay/domains';
    }
}
