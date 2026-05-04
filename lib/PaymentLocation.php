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
}
