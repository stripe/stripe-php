<?php

namespace Stripe;

abstract class ApiResource extends Object
{
    public static function baseUrl()
    {
        return Stripe::$apiBase;
    }

    /**
     * @return ApiResource The refreshed resource.
     */
    public function refresh()
    {
        $requestor = new ApiRequestor($this->_apiKey, self::baseUrl());
        $url = $this->instanceUrl();

        list($response, $apiKey) = $requestor->request(
            'get',
            $url,
            $this->_retrieveOptions
        );
        $this->refreshFrom($response, $apiKey);
        return $this;
    }

    /**
     * @param array options
     *
     * @return RequestOptions with either passed in or saved API key
     */
    public function parseOptions($options)
    {
        $opts = RequestOptions::parse($options);
        $key = ($opts->apiKey ? $opts->apiKey : $this->_apiKey);
        $opts->apiKey = $key;
        return $opts;
    }

    /**
     * @return string The name of the class, with namespacing and underscores
     *    stripped.
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
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        if ($id === null) {
            $class = get_called_class();
            $message = "Could not determine which URL to request: "
               . "$class instance has invalid ID: $id";
            throw new Error\InvalidRequest($message, null);
        }
        $id = ApiRequestor::utf8($id);
        $base = static::classUrl();
        $extn = urlencode($id);
        return "$base/$extn";
    }

    private static function _validateCall($method, $params = null, $options = null)
    {
        if ($params && !is_array($params)) {
            $message = "You must pass an array as the first argument to Stripe API "
               . "method calls.  (HINT: an example call to create a charge "
               . "would be: \"Stripe\\Charge::create(array('amount' => 100, "
               . "'currency' => 'usd', 'card' => array('number' => "
               . "4242424242424242, 'exp_month' => 5, 'exp_year' => 2015)))\")";
            throw new Error\Api($message);
        }

        if ($options && (!is_string($options) && !is_array($options))) {
            $message = 'The second argument to Stripe API method calls is an '
               . 'optional per-request apiKey, which must be a string, or '
               . 'per-request options, which must be an array. '
               . '(HINT: you can set a global apiKey by '
               . '"Stripe::setApiKey(<apiKey>)")';
            throw new Error\Api($message);
        }
    }

    protected static function _retrieve($id, $options = null)
    {
        $opts = RequestOptions::parse($options);
        $instance = new static($id, $opts->apiKey);
        $instance->refresh();
        return $instance;
    }

    protected static function _all($params = null, $options = null)
    {
        self::_validateCall('all', $params, $options);
        $base = static::baseUrl();
        $url = static::classUrl();

        $opts = RequestOptions::parse($options);
        $requestor = new ApiRequestor($opts->apiKey, $base);
        list($response, $apiKey) = $requestor->request('get', $url, $params, $opts->headers);
        return Util::convertToStripeObject($response, $apiKey);
    }

    protected static function _create($params = null, $options = null)
    {
        self::_validateCall('create', $params, $options);
        $base = static::baseUrl();
        $url = static::classUrl();

        $opts = RequestOptions::parse($options);
        $requestor = new ApiRequestor($opts->apiKey, $base);
        list($response, $apiKey) = $requestor->request('post', $url, $params, $opts->headers);
        return Util::convertToStripeObject($response, $apiKey);
    }

    protected function _save($options = null)
    {
        self::_validateCall('save', null, $options);

        $opts = RequestOptions::parse($options);
        $key = ($opts->apiKey ? $opts->apiKey : $this->_apiKey);
        $requestor = new ApiRequestor($key, self::baseUrl());
        $params = $this->serializeParameters();

        if (count($params) > 0) {
            $url = $this->instanceUrl();
            list($response, $apiKey) = $requestor->request('post', $url, $params, $options);
            $this->refreshFrom($response, $apiKey);
        }
        return $this;
    }

    protected function _delete($params = null, $options = null)
    {
        self::_validateCall('delete', $params, $options);
        $opts = RequestOptions::parse($options);
        $key = ($opts->apiKey ? $opts->apiKey : $this->_apiKey);
        $requestor = new ApiRequestor($key, self::baseUrl());
        $url = $this->instanceUrl();
        list($response, $apiKey) = $requestor->request('delete', $url, $params);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }
}
