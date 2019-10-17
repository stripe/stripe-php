<?php

namespace Stripe;

class StripeClient implements StripeClientInterface
{
    /**
     * @var string Default base URL for Stripe's API.
     */
    const DEFAULT_API_BASE = 'https://api.stripe.com';

    /**
     * @var string Default base URL for Stripe's OAuth API.
     */
    const DEFAULT_CONNECT_BASE = 'https://connect.stripe.com';

    /**
     * @var string Default base URL for Stripe's Files API.
     */
    const DEFAULT_FILES_BASE = 'https://files.stripe.com';

    private $apiKey;
    private $clientId;

    private $apiBase;
    private $connectBase;
    private $filesBase;

    /**
     * Initializes a new instance of the {@link StripeClient} class.
     *
     * @param string|null $apiKey The API key used by the client to make requests.
     * @param string|null $clientId The client ID used by the client in OAuth requests.
     * @param string|null $apiBase The base URL for Stripe's API. Defaults to {@link DEFAULT_API_BASE}.
     * @param string|null $connectBase The base URL for Stripe's OAuth API. Defaults to {@link DEFAULT_CONNECT_BASE}.
     * @param string|null $filesBase The base URL for Stripe's Files API. Defaults to {@link DEFAULT_FILES_BASE}.
     */
    public function __construct(
        $apiKey,
        $clientId = null,
        $apiBase = null,
        $connectBase = null,
        $filesBase = null
    ) {
        if (!is_null($apiKey) && ($apiKey === '')) {
            $msg = "API key cannot be the empty string.";
            throw new \Stripe\Exception\InvalidArgumentException($msg);
        }
        if (!is_null($apiKey) && (preg_match('/\s/', $apiKey))) {
            $msg = "API key cannot contain whitespace.";
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
     * @return string|null The API key used by the client to send requests.
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Gets the client ID used by the client in OAuth requests.
     *
     * @return string|null The client ID used by the client in OAuth requests.
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Gets the base URL for Stripe's API.
     *
     * @return string The base URL for Stripe's API.
     */
    public function getApiBase()
    {
        return $this->apiBase;
    }

    /**
     * Gets the base URL for Stripe's OAuth API.
     *
     * @return string The base URL for Stripe's OAuth API.
     */
    public function getConnectBase()
    {
        return $this->connectBase;
    }

    /**
     * Gets the base URL for Stripe's Files API.
     *
     * @return string The base URL for Stripe's Files API.
     */
    public function getFilesBase()
    {
        return $this->filesBase;
    }

    /**
     * Sends a request to Stripe's API.
     *
     * @param string $method The HTTP method.
     * @param string $path The path of the request.
     * @param array $params The parameters of the request.
     * @param array|\Stripe\RequestOptions $opts The special modifiers of the request.
     * @return \Stripe\StripeObject The object returned by Stripe's API.
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

    private function apiKeyForRequest($opts)
    {
        $apiKey = $opts->apiKey ?: $this->getApiKey();

        if (is_null($apiKey)) {
            $msg = "No API key provided. Set your API key when constructing the "
                . "StripeClient instance, or provide it on a per-request basis "
                . "using the `api_key` key in the \$opts argument.";
            throw new Exception\AuthenticationException($msg);
        }

        return $apiKey;
    }
}
