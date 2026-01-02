<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * Tax locations represent venues for services, tickets, or other product types.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject) $address
 * @property null|string $description A descriptive text providing additional context about the tax location. This can include information about the venue, types of events held, services available, or any relevant details for better identification (e.g., &quot;A spacious auditorium suitable for large concerts and events.&quot;).
 * @property string $type The type of tax location to be defined. Currently the only option is <code>performance</code>.
 */
class Location extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.location';

    /**
     * Create a tax location to use in calculating taxes for a service, ticket, or
     * other type of product. The resulting object contains the id, address, name,
     * description, and current operational status of the tax location.
     *
     * @param null|array{address: array{city?: null|string, country: string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}, description?: string, expand?: string[], type: string} $params
     * @param null|array|string $options
     *
     * @return Location the created resource
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
     * Retrieve a list of all tax locations. Tax locations can represent the venues for
     * services, tickets, or other product types.
     *
     * The response includes detailed information for each tax location, such as its
     * address, name, description, and current operational status.
     *
     * You can paginate through the list by using the <code>limit</code> parameter to
     * control the number of results returned in each request.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Location> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Fetch the details of a specific tax location using its unique identifier. Use a
     * tax location to calculate taxes based on the location of the end product, such
     * as a performance, instead of the customer address. For more details, check the
     * <a
     * href="https://docs.stripe.com/tax/tax-for-tickets/integration-guide">integration
     * guide</a>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Location
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
