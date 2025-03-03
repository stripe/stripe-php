<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * You can use Tax <code>Settings</code> to manage configurations used by Stripe Tax calculations.
 *
 * Related guide: <a href="https://stripe.com/docs/tax/settings-api">Using the Settings API</a>
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $defaults
 * @property null|\Stripe\StripeObject $head_office The place where your business is located.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the Tax <code>Settings</code>.
 * @property \Stripe\StripeObject $status_details
 */
class Settings extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'tax.settings';

    const STATUS_ACTIVE = 'active';
    const STATUS_PENDING = 'pending';

    /**
     * Retrieves Tax <code>Settings</code> for a merchant.
     *
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Tax\Settings
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return static the updated resource
     */
    public static function update($params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = '/v1/tax/settings';

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return static the saved resource
     *
     * @deprecated The `save` method is deprecated and will be removed in a
     *     future major version of the library. Use the static method `update`
     *     on the resource instead.
     */
    public function save($opts = null)
    {
        $params = $this->serializeParameters();
        if (\count($params) > 0) {
            $url = $this->instanceUrl();
            list($response, $opts) = $this->_request('post', $url, $params, $opts, ['save']);
            $this->refreshFrom($response, $opts);
        }

        return $this;
    }
}
