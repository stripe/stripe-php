<?php

namespace Stripe;

use Stripe\Util\Util;

class BaseStripeClient implements StripeClientInterface, StripeStreamingClientInterface
{
    /** @var string default base URL for Stripe's API */
    const DEFAULT_API_BASE = 'https://api.stripe.com';

    /** @var string default base URL for Stripe's OAuth API */
    const DEFAULT_CONNECT_BASE = 'https://connect.stripe.com';

    /** @var string default base URL for Stripe's Files API */
    const DEFAULT_FILES_BASE = 'https://files.stripe.com';

    /** @var string default base URL for Stripe's Meter Events API */
    const DEFAULT_METER_EVENTS_BASE = 'https://meter-events.stripe.com';

    /** @var array<string, null|int|string> */
    const DEFAULT_CONFIG = [
        'api_key' => null,
        'app_info' => null,
        'client_id' => null,
        'stripe_account' => null,
        'stripe_context' => null,
        'stripe_version' => \Stripe\Util\ApiVersion::CURRENT,
        'api_base' => self::DEFAULT_API_BASE,
        'connect_base' => self::DEFAULT_CONNECT_BASE,
        'files_base' => self::DEFAULT_FILES_BASE,
        'meter_events_base' => self::DEFAULT_METER_EVENTS_BASE,
        // inherit from global
        'max_network_retries' => null,
    ];

    /** @var array<string, mixed> */
    private $config;

    /** @var \Stripe\Util\RequestOptions */
    private $defaultOpts;

    /**
     * Initializes a new instance of the {@link BaseStripeClient} class.
     *
     * The constructor takes a single argument. The argument can be a string, in which case it
     * should be the API key. It can also be an array with various configuration settings.
     *
     * Configuration settings include the following options:
     *
     * - api_key (null|string): the Stripe API key, to be used in regular API requests.
     * - app_info (null|array): information to identify a plugin that integrates Stripe using this library.
     *                          Expects: array{name: string, version?: string, url?: string, partner_id?: string}
     * - client_id (null|string): the Stripe client ID, to be used in OAuth requests.
     * - stripe_account (null|string): a Stripe account ID. If set, all requests sent by the client
     *   will automatically use the {@code Stripe-Account} header with that account ID.
     * - stripe_context (null|string): a Stripe account or compartment ID. If set, all requests sent by the client
     *   will automatically use the {@code Stripe-Context} header with that ID.
     * - stripe_version (null|string): a Stripe API version. If set, all requests sent by the client
     *   will include the {@code Stripe-Version} header with that API version.
     * - max_network_retries (null|int): the number of times this client should retry API failures; defaults to 0.
     *
     * The following configuration settings are also available, though setting these should rarely be necessary
     * (only useful if you want to send requests to a mock server like stripe-mock):
     *
     * - api_base (string): the base URL for regular API requests. Defaults to
     *   {@link DEFAULT_API_BASE}.
     * - connect_base (string): the base URL for OAuth requests. Defaults to
     *   {@link DEFAULT_CONNECT_BASE}.
     * - files_base (string): the base URL for file creation requests. Defaults to
     *   {@link DEFAULT_FILES_BASE}.
     * - meter_events_base (string): the base URL for high throughput requests. Defaults to
     *   {@link DEFAULT_METER_EVENTS_BASE}.
     *
     * @param array<string, mixed>|string $config the API key as a string, or an array containing
     *   the client configuration settings
     */
    public function __construct($config = [])
    {
        if (\is_string($config)) {
            $config = ['api_key' => $config];
        } elseif (!\is_array($config)) {
            throw new Exception\InvalidArgumentException('$config must be a string or an array');
        }

        if (!\array_key_exists('max_network_retries', $config)) {
            // if no value is passed, inherit the global value at the time of client creation
            $config['max_network_retries'] = Stripe::getMaxNetworkRetries();
        }

        $config = \array_merge(self::DEFAULT_CONFIG, $config);
        $this->validateConfig($config);

        $this->config = $config;

        $this->defaultOpts = \Stripe\Util\RequestOptions::parse([
            'stripe_account' => $config['stripe_account'],
            'stripe_context' => $config['stripe_context'],
            'stripe_version' => $config['stripe_version'],
            'max_network_retries' => $config['max_network_retries'],
        ]);
    }

    /**
     * Gets the API key used by the client to send requests.
     *
     * @return null|string the API key used by the client to send requests
     */
    public function getApiKey()
    {
        return $this->config['api_key'];
    }

    /**
     * Gets the client ID used by the client in OAuth requests.
     *
     * @return null|string the client ID used by the client in OAuth requests
     */
    public function getClientId()
    {
        return $this->config['client_id'];
    }

    /**
     * Gets the base URL for Stripe's API.
     *
     * @return string the base URL for Stripe's API
     */
    public function getApiBase()
    {
        return $this->config['api_base'];
    }

    /**
     * Gets the base URL for Stripe's OAuth API.
     *
     * @return string the base URL for Stripe's OAuth API
     */
    public function getConnectBase()
    {
        return $this->config['connect_base'];
    }

    /**
     * Gets the base URL for Stripe's Files API.
     *
     * @return string the base URL for Stripe's Files API
     */
    public function getFilesBase()
    {
        return $this->config['files_base'];
    }

    /**
     * Gets the base URL for Stripe's Meter Events API.
     *
     * @return string the base URL for Stripe's Meter Events API
     */
    public function getMeterEventsBase()
    {
        return $this->config['meter_events_base'];
    }

    /**
     * Gets the configured number of retries.
     *
     * @return int the number of times this client will retry failed requests
     */
    public function getMaxNetworkRetries()
    {
        return $this->config['max_network_retries'];
    }

    /**
     * Gets the app info for this client.
     *
     * @return null|array information to identify a plugin that integrates Stripe using this library
     */
    public function getAppInfo()
    {
        return $this->config['app_info'];
    }

    /**
     * Sends a request to Stripe's API.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return StripeObject the object returned by Stripe's API
     */
    public function request($method, $path, $params, $opts)
    {
        $defaultRequestOpts = $this->defaultOpts;
        $apiMode = Util::getApiMode($path);

        $opts = $defaultRequestOpts->merge($opts, true);

        $baseUrl = $opts->apiBase ?: $this->getApiBase();
        $requestor = new ApiRequestor($this->apiKeyForRequest($opts), $baseUrl, $this->getAppInfo());
        list($response, $opts->apiKey) = $requestor->request($method, $path, $params, $opts->headers, $apiMode, ['stripe_client'], $opts->maxNetworkRetries);
        $opts->discardNonPersistentHeaders();
        $obj = Util::convertToStripeObject($response->json, $opts, $apiMode);
        if (\is_array($obj)) {
            // Edge case for v2 endpoints that return empty/void response
            // Example: client->v2->billing->meterEventStream->create
            $obj = new StripeObject();
        }
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Sends a raw request to Stripe's API. This is the lowest level method for interacting
     * with the Stripe API. This method is useful for interacting with endpoints that are not
     * covered yet in stripe-php.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param null|array $params the parameters of the request
     * @param array $opts the special modifiers of the request
     * @param null|int $maxNetworkRetries
     *
     * @return ApiResponse
     */
    public function rawRequest($method, $path, $params = null, $opts = [], $maxNetworkRetries = null)
    {
        if ('post' !== $method && null !== $params) {
            throw new Exception\InvalidArgumentException('Error: rawRequest only supports $params on post requests. Please pass null and add your parameters to $path');
        }
        $apiMode = Util::getApiMode($path);
        $headers = [];
        if (\is_array($opts) && \array_key_exists('headers', $opts)) {
            $headers = $opts['headers'] ?: [];
            unset($opts['headers']);
        }
        if (\is_array($opts) && \array_key_exists('stripe_context', $opts)) {
            $headers['Stripe-Context'] = $opts['stripe_context'];
            unset($opts['stripe_context']);
        }

        $defaultRawRequestOpts = $this->defaultOpts;

        $opts = $defaultRawRequestOpts->merge($opts, true);

        // Concatenate $headers to $opts->headers, removing duplicates.
        $opts->headers = \array_merge($opts->headers, $headers);
        $baseUrl = $opts->apiBase ?: $this->getApiBase();
        $requestor = new ApiRequestor($this->apiKeyForRequest($opts), $baseUrl);
        list($response) = $requestor->request($method, $path, $params, $opts->headers, $apiMode, ['raw_request'], $maxNetworkRetries);

        return $response;
    }

    /**
     * Sends a request to Stripe's API, passing chunks of the streamed response
     * into a user-provided $readBodyChunkCallable callback.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param callable $readBodyChunkCallable a function that will be called
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * with chunks of bytes from the body if the request is successful
     */
    public function requestStream($method, $path, $readBodyChunkCallable, $params, $opts)
    {
        $opts = $this->defaultOpts->merge($opts, true);
        $baseUrl = $opts->apiBase ?: $this->getApiBase();
        $requestor = new ApiRequestor($this->apiKeyForRequest($opts), $baseUrl, $this->getAppInfo());
        $apiMode = Util::getApiMode($path);
        list($response, $opts->apiKey) = $requestor->requestStream($method, $path, $readBodyChunkCallable, $params, $opts->headers, $apiMode, ['stripe_client']);
    }

    /**
     * Sends a request to Stripe's API.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return Collection|V2\Collection of ApiResources
     */
    public function requestCollection($method, $path, $params, $opts)
    {
        $obj = $this->request($method, $path, $params, $opts);
        $apiMode = Util::getApiMode($path);
        if ('v1' === $apiMode) {
            if (!$obj instanceof Collection) {
                $received_class = \get_class($obj);
                $msg = "Expected to receive `Stripe\\Collection` object from Stripe API. Instead received `{$received_class}`.";

                throw new Exception\UnexpectedValueException($msg);
            }
            $obj->setFilters($params);
        } else {
            if (!$obj instanceof V2\Collection) {
                $received_class = \get_class($obj);
                $msg = "Expected to receive `Stripe\\V2\\Collection` object from Stripe API. Instead received `{$received_class}`.";

                throw new Exception\UnexpectedValueException($msg);
            }
        }

        return $obj;
    }

    /**
     * Sends a request to Stripe's API.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return SearchResult of ApiResources
     */
    public function requestSearchResult($method, $path, $params, $opts)
    {
        $obj = $this->request($method, $path, $params, $opts);
        if (!$obj instanceof SearchResult) {
            $received_class = \get_class($obj);
            $msg = "Expected to receive `Stripe\\SearchResult` object from Stripe API. Instead received `{$received_class}`.";

            throw new Exception\UnexpectedValueException($msg);
        }
        $obj->setFilters($params);

        return $obj;
    }

    /**
     * @param \Stripe\Util\RequestOptions $opts
     *
     * @return string
     *
     * @throws Exception\AuthenticationException
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

    /**
     * @param array<string, mixed> $config
     *
     * @throws Exception\InvalidArgumentException
     */
    private function validateConfig($config)
    {
        // api_key
        if (null !== $config['api_key'] && !\is_string($config['api_key'])) {
            throw new Exception\InvalidArgumentException('api_key must be null or a string');
        }

        if (null !== $config['api_key'] && ('' === $config['api_key'])) {
            $msg = 'api_key cannot be the empty string';

            throw new Exception\InvalidArgumentException($msg);
        }

        if (null !== $config['api_key'] && \preg_match('/\s/', $config['api_key'])) {
            $msg = 'api_key cannot contain whitespace';

            throw new Exception\InvalidArgumentException($msg);
        }

        // client_id
        if (null !== $config['client_id'] && !\is_string($config['client_id'])) {
            throw new Exception\InvalidArgumentException('client_id must be null or a string');
        }

        // stripe_account
        if (null !== $config['stripe_account'] && !\is_string($config['stripe_account'])) {
            throw new Exception\InvalidArgumentException('stripe_account must be null or a string');
        }

        // stripe_context
        if (null !== $config['stripe_context'] && !\is_string($config['stripe_context'])) {
            throw new Exception\InvalidArgumentException('stripe_context must be null or a string');
        }

        // stripe_version
        if (null !== $config['stripe_version'] && !\is_string($config['stripe_version'])) {
            throw new Exception\InvalidArgumentException('stripe_version must be null or a string');
        }

        // api_base
        if (!\is_string($config['api_base'])) {
            throw new Exception\InvalidArgumentException('api_base must be a string');
        }

        // connect_base
        if (!\is_string($config['connect_base'])) {
            throw new Exception\InvalidArgumentException('connect_base must be a string');
        }

        // files_base
        if (!\is_string($config['files_base'])) {
            throw new Exception\InvalidArgumentException('files_base must be a string');
        }

        // app info
        if (null !== $config['app_info'] && !\is_array($config['app_info'])) {
            throw new Exception\InvalidArgumentException('app_info must be an array');
        }

        // max_network_retries
        if (!\is_int($config['max_network_retries'])) {
            throw new Exception\InvalidArgumentException('max_network_retries must an int');
        }

        $appInfoKeys = ['name', 'version', 'url', 'partner_id'];
        if (null !== $config['app_info'] && array_diff_key($config['app_info'], array_flip($appInfoKeys))) {
            $msg = 'app_info must be of type array{name: string, version?: string, url?: string, partner_id?: string}';

            throw new Exception\InvalidArgumentException($msg);
        }

        // check absence of extra keys
        $extraConfigKeys = \array_diff(\array_keys($config), \array_keys(self::DEFAULT_CONFIG));
        if (!empty($extraConfigKeys)) {
            // Wrap in single quote to more easily catch trailing spaces errors
            $invalidKeys = "'" . \implode("', '", $extraConfigKeys) . "'";

            throw new Exception\InvalidArgumentException('Found unknown key(s) in configuration array: ' . $invalidKeys);
        }
    }

    /**
     * Deserializes the raw JSON string returned by rawRequest into a similar class.
     *
     * @param string $json
     * @param 'v1'|'v2' $apiMode
     *
     * @return StripeObject
     * */
    public function deserialize($json, $apiMode = 'v1')
    {
        return Util::convertToStripeObject(\json_decode($json, true), [], $apiMode);
    }

    /**
     * Returns a V2\Events instance using the provided JSON payload. Throws an
     * Exception\UnexpectedValueException if the payload is not valid JSON, and
     * an Exception\SignatureVerificationException if the signature
     * verification fails for any reason.
     *
     * @param string $payload the payload sent by Stripe
     * @param string $sigHeader the contents of the signature header sent by
     *  Stripe
     * @param string $secret secret used to generate the signature
     * @param int $tolerance maximum difference allowed between the header's
     *  timestamp and the current time. Defaults to 300 seconds (5 min)
     *
     * @return ThinEvent
     *
     * @throws Exception\SignatureVerificationException if the verification fails
     * @throws Exception\UnexpectedValueException if the payload is not valid JSON,
     */
    public function parseThinEvent($payload, $sigHeader, $secret, $tolerance = Webhook::DEFAULT_TOLERANCE)
    {
        $eventData = Util::utf8($payload);
        WebhookSignature::verifyHeader($payload, $sigHeader, $secret, $tolerance);

        try {
            return Util::json_decode_thin_event_object(
                $eventData,
                '\Stripe\ThinEvent'
            );
        } catch (\ReflectionException $e) {
            // Fail gracefully
            return new ThinEvent();
        }
    }
}
