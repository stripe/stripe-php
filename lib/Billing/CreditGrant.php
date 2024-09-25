<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A credit grant is a resource that records a grant of some credit to a customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $amount
 * @property \Stripe\StripeObject $applicability_config
 * @property string $category The category of this credit grant.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|\Stripe\Customer $customer Id of the customer to whom the credit was granted.
 * @property null|int $effective_at The time when the credit becomes effective i.e when it is eligible to be used.
 * @property null|int $expires_at The time when the credit will expire. If not present, the credit will never expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $name A descriptive name shown in dashboard and on invoices.
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this credit grant belongs to.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 * @property null|int $voided_at The time when this credit grant was voided. If not present, the credit grant hasn't been voided.
 */
class CreditGrant extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.credit_grant';

    use \Stripe\ApiOperations\Update;

    const CATEGORY_PAID = 'paid';
    const CATEGORY_PROMOTIONAL = 'promotional';

    /**
     * Creates a credit grant.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant the created resource
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
     * Retrieve a list of credit grants.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Billing\CreditGrant> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a credit grant.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a credit grant.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant the updated resource
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant the expired credit grant
     */
    public function expire($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/expire';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant the voided credit grant
     */
    public function voidGrant($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/void';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
