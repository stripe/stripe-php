<?php

namespace Stripe;

class BaseStripeClient implements StripeClientInterface
{
    /** @var string default base URL for Stripe's API */
    const DEFAULT_API_BASE = 'https://api.stripe.com';

    /** @var string default base URL for Stripe's OAuth API */
    const DEFAULT_CONNECT_BASE = 'https://connect.stripe.com';

    /** @var string default base URL for Stripe's Files API */
    const DEFAULT_FILES_BASE = 'https://files.stripe.com';

    /** @var null|string */
    private $apiKey;

    /** @var null|string */
    private $clientId;

    /** @var string */
    private $apiBase;

    /** @var string */
    private $connectBase;

    /** @var string */
    private $filesBase;

    /**
     * Initializes a new instance of the {@link StripeClient} class.
     *
     * @param null|string $apiKey the API key used by the client to make requests
     * @param null|string $clientId the client ID used by the client in OAuth requests
     * @param null|string $apiBase The base URL for Stripe's API. Defaults to {@link DEFAULT_API_BASE}.
     * @param null|string $connectBase The base URL for Stripe's OAuth API. Defaults to {@link DEFAULT_CONNECT_BASE}.
     * @param null|string $filesBase The base URL for Stripe's Files API. Defaults to {@link DEFAULT_FILES_BASE}.
     */
    public function __construct(
        $apiKey,
        $clientId = null,
        $apiBase = null,
        $connectBase = null,
        $filesBase = null
    ) {
        if (null !== $apiKey && ('' === $apiKey)) {
            $msg = 'API key cannot be the empty string.';

            throw new \Stripe\Exception\InvalidArgumentException($msg);
        }

        if (null !== $apiKey && (\preg_match('/\s/', $apiKey))) {
            $msg = 'API key cannot contain whitespace.';

            throw new \Stripe\Exception\InvalidArgumentException($msg);
        }

        $this->apiKey = $apiKey;
        $this->clientId = $clientId;

        $this->apiBase = $apiBase ?: self::DEFAULT_API_BASE;
        $this->connectBase = $connectBase ?: self::DEFAULT_CONNECT_BASE;
        $this->filesBase = $filesBase ?: self::DEFAULT_FILES_BASE;
    }

    /**
     * Gets the API key used by the client to send requests.
     *
     * @return null|string the API key used by the client to send requests
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Gets the client ID used by the client in OAuth requests.
     *
     * @return null|string the client ID used by the client in OAuth requests
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Gets the base URL for Stripe's API.
     *
     * @return string the base URL for Stripe's API
     */
    public function getApiBase()
    {
        return $this->apiBase;
    }

    /**
     * Gets the base URL for Stripe's OAuth API.
     *
     * @return string the base URL for Stripe's OAuth API
     */
    public function getConnectBase()
    {
        return $this->connectBase;
    }

    /**
     * Gets the base URL for Stripe's Files API.
     *
     * @return string the base URL for Stripe's Files API
     */
    public function getFilesBase()
    {
        return $this->filesBase;
    }

    /**
     * Sends a request to Stripe's API.
     *
     * @param string $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return \Stripe\StripeObject the object returned by Stripe's API
     */
    public function request($method, $path, $params, $opts)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $baseUrl = $opts->apiBase ?: $this->getApiBase();
        $requestor = new \Stripe\ApiRequestor($this->apiKeyForRequest($opts), $baseUrl);
        list($response, $opts->apiKey) = $requestor->request($method, $path, $params, $opts->headers);
        $opts->discardNonPersistentHeaders();
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param \Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\AuthenticationException
     *
     * @return string
     */
    private function apiKeyForRequest($opts)
    {
        $apiKey = $opts->apiKey ?: $this->getApiKey();

        if (null === $apiKey) {
            $msg = 'No API key provided. Set your API key when constructing the '
                . 'StripeClient instance, or provide it on a per-request basis '
                . 'using the `api_key` key in the $opts argument.';

            throw new Exception\AuthenticationException($msg);
        }

        return $apiKey;
    }
}
