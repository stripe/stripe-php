<?php

namespace Stripe\HttpClient;

interface ClientInterface
{
    /**
     * @param 'delete'|'get'|'post' $method The HTTP method being used
     * @param string $absUrl The URL being requested, including domain and protocol
     * @param array $headers Headers to be used in the request (full strings, not KV pairs)
     * @param array $params KV pairs for parameters. Can be nested for arrays and hashes
     * @param bool $hasFile Whether or not $params references a file (via an @ prefix or
     *                         CURLFile)
     * @param 'v1'|'v2' $apiMode Specifies if this is a v1 or v2 request
     * @param null|int $maxNetworkRetries
     *
     * @return array an array whose first element is raw request body, second
     *    element is HTTP status code and third array of HTTP headers
     *
     * @throws \Stripe\Exception\ApiConnectionException
     * @throws \Stripe\Exception\UnexpectedValueException
     */
    public function request($method, $absUrl, $headers, $params, $hasFile, $apiMode = 'v1', $maxNetworkRetries = null);
}
