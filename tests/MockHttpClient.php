<?php

namespace Stripe;

class MockHttpClient implements HttpClient\ClientInterface
{
    public function request($method, $absUrl, $headers, $params, $hasFile)
    {
        // TODO
        $rawBody = '{}';
        $httpStatus = 200;
        return array($rawBody, $httpStatus);
    }
}
