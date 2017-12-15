<?php

namespace Stripe;

/**
 * Class Collection
 *
 * @property string $object
 * @property string $url
 * @property bool $has_more
 * @property mixed $data
 *
 * @package Stripe
 */
class Collection extends StripeObject
{
    protected $_requestParams = [];

    /**
     * @param string $method HTTP method ('get', 'post', etc.)
     * @param string $url URL for the request
     * @param array $params list of parameters for the request
     * @param array|string|null $options
     *
     * @return array tuple containing (the JSON response, $options)
     */
    protected function _request($method, $url, $params = [], $options = null)
    {
        $opts = $this->_opts->merge($options);
        list($resp, $options) = static::_staticRequest($method, $url, $params, $opts);
        $this->setLastResponse($resp);
        return [$resp->json, $options];
    }

    /**
     * @param string $method HTTP method ('get', 'post', etc.)
     * @param string $url URL for the request
     * @param array $params list of parameters for the request
     * @param array|string|null $options
     *
     * @return array tuple containing (the JSON response, $options)
     */
    protected static function _staticRequest($method, $url, $params, $options)
    {
        $opts = Util\RequestOptions::parse($options);
        $requestor = new ApiRequestor($opts->apiKey);
        list($response, $opts->apiKey) = $requestor->request($method, $url, $params, $opts->headers);
        foreach ($opts->headers as $k => $v) {
            if (!array_key_exists($k, self::$HEADERS_TO_PERSIST)) {
                unset($opts->headers[$k]);
            }
        }
        return [$response, $opts];
    }

    public function setRequestParams($params)
    {
        $this->_requestParams = $params;
    }

    public function all($params = null, $opts = null)
    {
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $this->_requestParams = $params;
        return Util\Util::convertToStripeObject($response, $opts);
    }

    public function create($params = null, $opts = null)
    {
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->_requestParams = $params;
        return Util\Util::convertToStripeObject($response, $opts);
    }

    public function retrieve($id, $params = null, $opts = null)
    {
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        $id = Util\Util::utf8($id);
        $extn = urlencode($id);
        list($response, $opts) = $this->_request(
            'get',
            "$url/$extn",
            $params,
            $opts
        );
        $this->_requestParams = $params;
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @return Util\AutoPagingIterator An iterator that can be used to iterate
     *    across all objects across all pages. As page boundaries are
     *    encountered, the next page will be fetched automatically for
     *    continued iteration.
     */
    public function autoPagingIterator()
    {
        return new Util\AutoPagingIterator($this, $this->_requestParams);
    }

    private function extractPathAndUpdateParams($params)
    {
        $url = parse_url($this->url);
        if (!isset($url['path'])) {
            throw new Error\Api("Could not parse list url into parts: $url");
        }

        if (isset($url['query'])) {
            // If the URL contains a query param, parse it out into $params so they
            // don't interact weirdly with each other.
            $query = [];
            parse_str($url['query'], $query);
            $params = array_merge($params ?: [], $query);
        }

        return [$url['path'], $params];
    }
}
