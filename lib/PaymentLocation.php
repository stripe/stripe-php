<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Location represents a physical location where payments take place.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject) $address
 * @property null|(object{siret: null|string}&StripeObject) $business_registration Identification numbers associated with the location.
 * @property null|(object{fr_meal_vouchers_conecs_payments: null|(object{supported_issuers: null|(object{card: null|string[], card_present: null|string[]}&StripeObject)}&StripeObject)}&StripeObject) $capability_settings The capability settings for the location. Only applicable for locations with requested Payment Location Capabilities.
 * @property string $display_name The display name of the location.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 */
class PaymentLocation extends ApiResource
{
    const OBJECT_NAME = 'payment_location';

    use ApiOperations\Update;

    /**
     * Create a Payment Location.
     *
     * @param null|array{address: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string}, business_registration?: array{siret?: string}, display_name: string, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return PaymentLocation the created resource
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
     * Delete a Payment Location.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return PaymentLocation the deleted resource
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
     * Retrieve a Payment Location.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentLocation
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
     * Update a Payment Location.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string}, business_registration?: array{siret?: string}, display_name?: string, expand?: string[]} $params
     * @param null|array|string $opts
     *
     * @return PaymentLocation the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
