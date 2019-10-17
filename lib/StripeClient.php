<?php

namespace Stripe;

class StripeClient implements StripeClientInterface
{
    const DEFAULT_API_BASE = 'https://api.stripe.com';
    const DEFAULT_CONNECT_BASE = 'https://connect.stripe.com';
    const DEFAULT_FILES_BASE = 'https://files.stripe.com';

    private $apiKey;
    private $clientId;

    private $apiBase;
    private $connectBase;
    private $filesBase;

    private $coreServices;

    public function __construct(
        $apiKey,
        $clientId = null,
        $apiBase = null,
        $connectBase = null,
        $filesBase = null
    ) {
        $this->apiKey = $apiKey;
        $this->clientId = $clientId;

        $this->apiBase = $apiBase ?: self::DEFAULT_API_BASE;
        $this->connectBase = $connectBase ?: self::DEFAULT_CONNECT_BASE;
        $this->filesBase = $filesBase ?: self::DEFAULT_FILES_BASE;

        $this->coreServices = new \Stripe\Services\CoreServices($this);
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getApiBase()
    {
        return $this->apiBase;
    }

    public function getConnectBase()
    {
        return $this->connectBase;
    }

    public function getFilesBase()
    {
        return $this->filesBase;
    }

    public function request($method, $path, $params, $opts)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $baseUrl = isset($opts->apiBase) ? $opts->apiBase : $this->getApiBase();
        $requestor = new \Stripe\ApiRequestor($opts->apiKey ?: $this->getApiKey(), $baseUrl);
        list($response, $opts->apiKey) = $requestor->request($method, $path, $params, $opts->headers);
        $opts->discardNonPersistentHeaders();
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    public function __get($name)
    {
        return $this->coreServices->__get($name);
    }
}
