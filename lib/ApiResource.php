<?php

namespace Stripe;

abstract class ApiResource extends StripeObject
{
    /**
     * @var array
     */
    private static $HEADERS_TO_PERSIST = array('Stripe-Account' => true, 'Stripe-Version' => true);

    /**
     * @return string
     */
    public static function baseUrl()
    {
        return Stripe::$apiBase;
    }

    /**
     * @return ApiResource The refreshed resource.
     */
    public function refresh()
    {
        $requestor = new ApiRequestor($this->_opts->apiKey, static::baseUrl());
        $url = $this->instanceUrl();

        list($response, $this->_opts->apiKey) = $requestor->request(
            'get',
            $url,
            $this->_retrieveOptions,
            $this->_opts->headers
        );
        $this->refreshFrom($response, $this->_opts);

        return $this;
    }

    /**
     * @return string The name of the class, with namespacing and underscores
     *                stripped.
     */
    public static function className()
    {
        $class = get_called_class();
        // Useful for namespaces: Foo\Charge
        if ($postfixNamespaces = strrchr($class, '\\')) {
            $class = substr($postfixNamespaces, 1);
        }
        // Useful for underscored 'namespaces': Foo_Charge
        if ($postfixFakeNamespaces = strrchr($class, '')) {
            $class = $postfixFakeNamespaces;
        }
        if (substr($class, 0, strlen('Stripe')) == 'Stripe') {
            $class = substr($class, strlen('Stripe'));
        }
        $class = str_replace('_', '', $class);
        $name = urlencode($class);
        $name = strtolower($name);

        return $name;
    }

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        $base = static::className();

        return "/v1/${base}s";
    }

    /**
     * @return string The full API URL for this API resource.
     *
     * @throws Error\InvalidRequest
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        if ($id === null) {
            $class = get_called_class();
            $message = 'Could not determine which URL to request: '
               ."$class instance has invalid ID: $id";
            throw new Error\InvalidRequest($message, null);
        }
        $id = Util\Util::utf8($id);
        $base = static::classUrl();
        $extn = urlencode($id);

        return "$base/$extn";
    }

    /**
     * @param null|array $params
     *
     * @throws Error\Api
     */
    private static function _validateParams($params = null)
    {
        if ($params && !is_array($params)) {
            $message = 'You must pass an array as the first argument to Stripe API '
               .'method calls.  (HINT: an example call to create a charge '
               ."would be: \"Stripe\\Charge::create(array('amount' => 100, "
               ."'currency' => 'usd', 'card' => array('number' => "
               ."4242424242424242, 'exp_month' => 5, 'exp_year' => 2015)))\")";
            throw new Error\Api($message);
        }
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $params
     * @param null   $options
     *
     * @return array
     */
    protected function _request($method, $url, $params = array(), $options = null)
    {
        $opts = $this->_opts->merge($options);

        return static::_staticRequest($method, $url, $params, $opts);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $params
     * @param mixed  $options
     *
     * @return array
     *
     * @throws Error\Api
     */
    protected static function _staticRequest($method, $url, $params, $options)
    {
        $opts = Util\RequestOptions::parse($options);
        $requestor = new ApiRequestor($opts->apiKey, static::baseUrl());
        list($response, $opts->apiKey) = $requestor->request($method, $url, $params, $opts->headers);
        foreach ($opts->headers as $k => $v) {
            if (!array_key_exists($k, self::$HEADERS_TO_PERSIST)) {
                unset($opts->headers[$k]);
            }
        }

        return array($response, $opts);
    }

    /**
     * @param string $id
     * @param mixed  $options
     *
     * @return static
     *
     * @throws Error\Api
     */
    protected static function _retrieve($id, $options = null)
    {
        $opts = Util\RequestOptions::parse($options);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param mixed      $options
     *
     * @return array|StripeObject
     *
     * @throws Error\Api
     */
    protected static function _all($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('get', $url, $params, $options);

        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @param null $params
     * @param null $options
     *
     * @return array|StripeObject
     *
     * @throws Error\Api
     */
    protected static function _create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);

        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @param null|array $options
     *
     * @return $this
     *
     * @throws Error\InvalidRequest
     */
    protected function _save($options = null)
    {
        $params = $this->serializeParameters();
        if (count($params) > 0) {
            $url = $this->instanceUrl();
            list($response, $opts) = $this->_request('post', $url, $params, $options);
            $this->refreshFrom($response, $opts);
        }

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array $options
     *
     * @return $this
     *
     * @throws Error\Api
     * @throws Error\InvalidRequest
     */
    protected function _delete($params = null, $options = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $options);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
