<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * A Configurations object represents how features should be configured for terminal readers.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $bbpos_wisepos_e
 * @property null|bool $is_account_default Whether this Configuration is the default for your account
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $name String indicating the name of the Configuration object, set by the user
 * @property null|\Stripe\StripeObject $offline
 * @property null|\Stripe\StripeObject $stripe_s700
 * @property null|\Stripe\StripeObject $tipping
 * @property null|\Stripe\StripeObject $verifone_p400
 */
class Configuration extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.configuration';

    use \Stripe\ApiOperations\Update;

    /**
     * Creates a new <code>Configuration</code> object.
     *
     * @param null|mixed $params
     * @param null|mixed $options
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
     * @param null|mixed $params
     * @param null|mixed $opts
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
     * @param null|mixed $params
     * @param null|mixed $opts
     */
    public static function all($params = null, $opts = null)
    {
        return static::_requestPage('/v1/terminal/configurations', \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>Configuration</code> object.
     *
     * @param mixed $id
     * @param null|mixed $opts
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
     * @param mixed $id
     * @param null|mixed $params
     * @param null|mixed $opts
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
