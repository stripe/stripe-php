<?php

namespace Stripe\HttpClient;

interface ClientInterface
{
    /**
     * @param string $method  The HTTP method being used
     * @param string $absUrl  The URL being requested, including domain and protocol
     * @param array  $headers Headers to be used in the request (full strings, not KV pairs)
     * @param array  $params  KV pairs for parameters. Can be nested for arrays and hashes
     * @param bool   $hasFile Whether or not $params references a file (via an @ prefix or
     *                        CurlFile)
     *
     * @return array($rawBody, $httpStatusCode, $httpHeader)
     *
     * @throws \Stripe\Error\Api & Error\ApiConnection
     */
    public function request($method, $absUrl, $headers, $params, $hasFile);
}
