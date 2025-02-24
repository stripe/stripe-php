<?php

namespace Stripe;

/**
 * Class ApiRequestor.
 */
class ApiRequestor
{
    /**
     * @var null|string
     */
    private $_apiKey;

    /**
     * @var string
     */
    private $_apiBase;

    /**
     * @var null|array
     */
    private $_appInfo;

    /**
     * @var HttpClient\ClientInterface
     */
    private static $_httpClient;
    /**
     * @var HttpClient\StreamingClientInterface
     */
    private static $_streamingHttpClient;

    /**
     * @var RequestTelemetry
     */
    private static $requestTelemetry;

    private static $OPTIONS_KEYS = ['api_key', 'idempotency_key', 'stripe_account', 'stripe_context', 'stripe_version', 'api_base'];

    /**
     * ApiRequestor constructor.
     *
     * @param null|string $apiKey
     * @param null|string $apiBase
     * @param null|array $appInfo
     */
    public function __construct($apiKey = null, $apiBase = null, $appInfo = null)
    {
        $this->_apiKey = $apiKey;
        if (!$apiBase) {
            $apiBase = Stripe::$apiBase;
        }
        $this->_apiBase = $apiBase;
        $this->_appInfo = $appInfo;
    }

    /**
     * Creates a telemetry json blob for use in 'X-Stripe-Client-Telemetry' headers.
     *
     * @static
     *
     * @param RequestTelemetry $requestTelemetry
     *
     * @return string
     */
    private static function _telemetryJson($requestTelemetry)
    {
        $payload = [
            'last_request_metrics' => [
                'request_id' => $requestTelemetry->requestId,
                'request_duration_ms' => $requestTelemetry->requestDuration,
            ],
        ];
        if (\count($requestTelemetry->usage) > 0) {
            $payload['last_request_metrics']['usage'] = $requestTelemetry->usage;
        }

        $result = \json_encode($payload);
        if (false !== $result) {
            return $result;
        }
        Stripe::getLogger()->error('Serializing telemetry payload failed!');

        return '{}';
    }

    /**
     * @static
     *
     * @param ApiResource|array|bool|mixed $d
     *
     * @return ApiResource|array|mixed|string
     */
    private static function _encodeObjects($d)
    {
        if ($d instanceof ApiResource) {
            return Util\Util::utf8($d->id);
        }
        if (true === $d) {
            return 'true';
        }
        if (false === $d) {
            return 'false';
        }
        if (\is_array($d)) {
            $res = [];
            foreach ($d as $k => $v) {
                $res[$k] = self::_encodeObjects($v);
            }

            return $res;
        }

        return Util\Util::utf8($d);
    }

    /**
     * @param 'delete'|'get'|'post'     $method
     * @param string     $url
     * @param null|array $params
     * @param null|array $headers
     * @param 'v1'|'v2' $apiMode
     * @param string[] $usage
     *
     * @throws Exception\ApiErrorException
     *
     * @return array tuple containing (ApiReponse, API key)
     */
    public function request($method, $url, $params = null, $headers = null, $apiMode = 'v1', $usage = [])
    {
        $params = $params ?: [];
        $headers = $headers ?: [];
        list($rbody, $rcode, $rheaders, $myApiKey) =
            $this->_requestRaw($method, $url, $params, $headers, $apiMode, $usage);
        $json = $this->_interpretResponse($rbody, $rcode, $rheaders, $apiMode);
        $resp = new ApiResponse($rbody, $rcode, $rheaders, $json);

        return [$resp, $myApiKey];
    }

    /**
     * @param 'delete'|'get'|'post' $method
     * @param string     $url
     * @param callable $readBodyChunkCallable
     * @param null|array $params
     * @param null|array $headers
     * @param 'v1'|'v2' $apiMode
     * @param string[] $usage
     *
     * @throws Exception\ApiErrorException
     */
    public function requestStream($method, $url, $readBodyChunkCallable, $params = null, $headers = null, $apiMode = 'v1', $usage = [])
    {
        $params = $params ?: [];
        $headers = $headers ?: [];
        list($rbody, $rcode, $rheaders, $myApiKey) =
            $this->_requestRawStreaming($method, $url, $params, $headers, $apiMode, $usage, $readBodyChunkCallable);
        if ($rcode >= 300) {
            $this->_interpretResponse($rbody, $rcode, $rheaders, $apiMode);
        }
    }

    /**
     * @param string $rbody a JSON string
     * @param int $rcode
     * @param array $rheaders
     * @param array $resp
     * @param 'v1'|'v2' $apiMode
     *
     * @throws Exception\UnexpectedValueException
     * @throws Exception\ApiErrorException
     */
    public function handleErrorResponse($rbody, $rcode, $rheaders, $resp, $apiMode)
    {
        if (!\is_array($resp) || !isset($resp['error'])) {
            $msg = "Invalid response object from API: {$rbody} "
                . "(HTTP response code was {$rcode})";

            throw new Exception\UnexpectedValueException($msg);
        }

        $errorData = $resp['error'];

        $error = null;

        if (\is_string($errorData)) {
            $error = self::_specificOAuthError($rbody, $rcode, $rheaders, $resp, $errorData);
        }
        if (!$error) {
            $error = 'v1' === $apiMode ? self::_specificV1APIError($rbody, $rcode, $rheaders, $resp, $errorData) : self::_specificV2APIError($rbody, $rcode, $rheaders, $resp, $errorData);
        }

        throw $error;
    }

    /**
     * @static
     *
     * @param string $rbody
     * @param int    $rcode
     * @param array  $rheaders
     * @param array  $resp
     * @param array  $errorData
     *
     * @return Exception\ApiErrorException
     */
    private static function _specificV1APIError($rbody, $rcode, $rheaders, $resp, $errorData)
    {
        $msg = isset($errorData['message']) ? $errorData['message'] : null;
        $param = isset($errorData['param']) ? $errorData['param'] : null;
        $code = isset($errorData['code']) ? $errorData['code'] : null;
        $type = isset($errorData['type']) ? $errorData['type'] : null;
        $declineCode = isset($errorData['decline_code']) ? $errorData['decline_code'] : null;

        switch ($rcode) {
            case 400:
                // 'rate_limit' code is deprecated, but left here for backwards compatibility
                // for API versions earlier than 2015-09-08
                if ('rate_limit' === $code) {
                    return Exception\RateLimitException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code, $param);
                }
                if ('idempotency_error' === $type) {
                    return Exception\IdempotencyException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code);
                }

            // fall through in generic 400 or 404, returns InvalidRequestException by default
            // no break
            case 404:
                return Exception\InvalidRequestException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code, $param);

            case 401:
                return Exception\AuthenticationException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code);

            case 402:
                return Exception\CardException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code, $declineCode, $param);

            case 403:
                return Exception\PermissionException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code);

            case 429:
                return Exception\RateLimitException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code, $param);

            default:
                return Exception\UnknownApiErrorException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code);
        }
    }

    /**
     * @static
     *
     * @param string $rbody
     * @param int    $rcode
     * @param array  $rheaders
     * @param array  $resp
     * @param array  $errorData
     *
     * @return Exception\ApiErrorException
     */
    private static function _specificV2APIError($rbody, $rcode, $rheaders, $resp, $errorData)
    {
        $msg = isset($errorData['message']) ? $errorData['message'] : null;
        $code = isset($errorData['code']) ? $errorData['code'] : null;
        $type = isset($errorData['type']) ? $errorData['type'] : null;

        switch ($type) {
            case 'idempotency_error':
                return Exception\IdempotencyException::factory($msg, $rcode, $rbody, $resp, $rheaders, $code);
            // The beginning of the section generated from our OpenAPI spec
            case 'temporary_session_expired':
                return Exception\TemporarySessionExpiredException::factory(
                    $msg,
                    $rcode,
                    $rbody,
                    $resp,
                    $rheaders,
                    $code
                );

            // The end of the section generated from our OpenAPI spec
            default:
                return self::_specificV1APIError($rbody, $rcode, $rheaders, $resp, $errorData);
        }
    }

    /**
     * @static
     *
     * @param bool|string $rbody
     * @param int         $rcode
     * @param array       $rheaders
     * @param array       $resp
     * @param string      $errorCode
     *
     * @return Exception\OAuth\OAuthErrorException
     */
    private static function _specificOAuthError($rbody, $rcode, $rheaders, $resp, $errorCode)
    {
        $description = isset($resp['error_description']) ? $resp['error_description'] : $errorCode;

        switch ($errorCode) {
            case 'invalid_client':
                return Exception\OAuth\InvalidClientException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);

            case 'invalid_grant':
                return Exception\OAuth\InvalidGrantException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);

            case 'invalid_request':
                return Exception\OAuth\InvalidRequestException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);

            case 'invalid_scope':
                return Exception\OAuth\InvalidScopeException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);

            case 'unsupported_grant_type':
                return Exception\OAuth\UnsupportedGrantTypeException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);

            case 'unsupported_response_type':
                return Exception\OAuth\UnsupportedResponseTypeException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);

            default:
                return Exception\OAuth\UnknownOAuthErrorException::factory($description, $rcode, $rbody, $resp, $rheaders, $errorCode);
        }
    }

    /**
     * @static
     *
     * @param null|array $appInfo
     *
     * @return null|string
     */
    private static function _formatAppInfo($appInfo)
    {
        if (null !== $appInfo) {
            $string = $appInfo['name'];
            if (\array_key_exists('version', $appInfo) && null !== $appInfo['version']) {
                $string .= '/' . $appInfo['version'];
            }
            if (\array_key_exists('url', $appInfo) && null !== $appInfo['url']) {
                $string .= ' (' . $appInfo['url'] . ')';
            }

            return $string;
        }

        return null;
    }

    /**
     * @static
     *
     * @param string $disableFunctionsOutput - String value of the 'disable_function' setting, as output by \ini_get('disable_functions')
     * @param string $functionName - Name of the function we are interesting in seeing whether or not it is disabled
     *
     * @return bool
     */
    private static function _isDisabled($disableFunctionsOutput, $functionName)
    {
        $disabledFunctions = \explode(',', $disableFunctionsOutput);
        foreach ($disabledFunctions as $disabledFunction) {
            if (\trim($disabledFunction) === $functionName) {
                return true;
            }
        }

        return false;
    }

    /**
     * @static
     *
     * @param string     $apiKey the Stripe API key, to be used in regular API requests
     * @param null       $clientInfo client user agent information
     * @param null       $appInfo information to identify a plugin that integrates Stripe using this library
     * @param 'v1'|'v2' $apiMode
     *
     * @return array
     */
    private static function _defaultHeaders($apiKey, $clientInfo = null, $appInfo = null, $apiMode = 'v1')
    {
        $uaString = "Stripe/{$apiMode} PhpBindings/" . Stripe::VERSION;

        $langVersion = \PHP_VERSION;
        $uname_disabled = self::_isDisabled(\ini_get('disable_functions'), 'php_uname');
        $uname = $uname_disabled ? '(disabled)' : \php_uname();

        // Fallback to global configuration to maintain backwards compatibility.
        $appInfo = $appInfo ?: Stripe::getAppInfo();
        $ua = [
            'bindings_version' => Stripe::VERSION,
            'lang' => 'php',
            'lang_version' => $langVersion,
            'publisher' => 'stripe',
            'uname' => $uname,
        ];
        if ($clientInfo) {
            $ua = \array_merge($clientInfo, $ua);
        }
        if (null !== $appInfo) {
            $uaString .= ' ' . self::_formatAppInfo($appInfo);
            $ua['application'] = $appInfo;
        }

        return [
            'X-Stripe-Client-User-Agent' => \json_encode($ua),
            'User-Agent' => $uaString,
            'Authorization' => 'Bearer ' . $apiKey,
            'Stripe-Version' => Stripe::getApiVersion(),
        ];
    }

    /**
     * @param 'delete'|'get'|'post' $method
     * @param string $url
     * @param array $params
     * @param array $headers
     * @param 'v1'|'v2' $apiMode
     */
    private function _prepareRequest($method, $url, $params, $headers, $apiMode)
    {
        $myApiKey = $this->_apiKey;
        if (!$myApiKey) {
            $myApiKey = Stripe::$apiKey;
        }

        if (!$myApiKey) {
            $msg = 'No API key provided.  (HINT: set your API key using '
                . '"Stripe::setApiKey(<API-KEY>)".  You can generate API keys from '
                . 'the Stripe web interface.  See https://stripe.com/api for '
                . 'details, or email support@stripe.com if you have any questions.';

            throw new Exception\AuthenticationException($msg);
        }

        // Clients can supply arbitrary additional keys to be included in the
        // X-Stripe-Client-User-Agent header via the optional getUserAgentInfo()
        // method
        $clientUAInfo = null;
        if (\method_exists(self::httpClient(), 'getUserAgentInfo')) {
            $clientUAInfo = self::httpClient()->getUserAgentInfo();
        }

        if ($params && \is_array($params)) {
            $optionKeysInParams = \array_filter(
                self::$OPTIONS_KEYS,
                function ($key) use ($params) {
                    return \array_key_exists($key, $params);
                }
            );
            if (\count($optionKeysInParams) > 0) {
                $message = \sprintf('Options found in $params: %s. Options should '
                    . 'be passed in their own array after $params. (HINT: pass an '
                    . 'empty array to $params if you do not have any.)', \implode(', ', $optionKeysInParams));
                \trigger_error($message, \E_USER_WARNING);
            }
        }

        $absUrl = $this->_apiBase . $url;
        if ('v1' === $apiMode) {
            $params = self::_encodeObjects($params);
        }
        $defaultHeaders = $this->_defaultHeaders($myApiKey, $clientUAInfo, $this->_appInfo, $apiMode);

        if (Stripe::$accountId) {
            $defaultHeaders['Stripe-Account'] = Stripe::$accountId;
        }

        if (Stripe::$enableTelemetry && null !== self::$requestTelemetry) {
            $defaultHeaders['X-Stripe-Client-Telemetry'] = self::_telemetryJson(self::$requestTelemetry);
        }

        $hasFile = false;
        foreach ($params as $k => $v) {
            if (\is_resource($v)) {
                $hasFile = true;
                $params[$k] = self::_processResourceParam($v);
            } elseif ($v instanceof \CURLFile) {
                $hasFile = true;
            }
        }

        if ($hasFile) {
            $defaultHeaders['Content-Type'] = 'multipart/form-data';
        } elseif ('v2' === $apiMode) {
            $defaultHeaders['Content-Type'] = 'application/json';
        } elseif ('v1' === $apiMode) {
            $defaultHeaders['Content-Type'] = 'application/x-www-form-urlencoded';
        } else {
            throw new Exception\InvalidArgumentException('Unknown API mode: ' . $apiMode);
        }

        $combinedHeaders = \array_merge($defaultHeaders, $headers);
        $rawHeaders = [];

        foreach ($combinedHeaders as $header => $value) {
            $rawHeaders[] = $header . ': ' . $value;
        }

        return [$absUrl, $rawHeaders, $params, $hasFile, $myApiKey];
    }

    /**
     * @param 'delete'|'get'|'post' $method
     * @param string $url
     * @param array $params
     * @param array $headers
     * @param 'v1'|'v2' $apiMode
     * @param string[] $usage
     *
     * @throws Exception\AuthenticationException
     * @throws Exception\ApiConnectionException
     *
     * @return array
     */
    private function _requestRaw($method, $url, $params, $headers, $apiMode, $usage)
    {
        list($absUrl, $rawHeaders, $params, $hasFile, $myApiKey) = $this->_prepareRequest($method, $url, $params, $headers, $apiMode);

        // for some reason, PHP users will sometimes include null bytes in their paths, which leads to cryptic server 400s.
        // we'll be louder about this to help catch issues earlier.
        if (false !== \strpos($absUrl, "\0") || false !== \strpos($absUrl, '%00')) {
            throw new Exception\InvalidRequestException("URLs may not contain null bytes ('\\0'); double check any IDs you're including with the request.");
        }

        $requestStartMs = Util\Util::currentTimeMillis();

        list($rbody, $rcode, $rheaders) = self::httpClient()->request(
            $method,
            $absUrl,
            $rawHeaders,
            $params,
            $hasFile,
            $apiMode
        );

        if (
            isset($rheaders['request-id'])
            && \is_string($rheaders['request-id'])
            && '' !== $rheaders['request-id']
        ) {
            self::$requestTelemetry = new RequestTelemetry(
                $rheaders['request-id'],
                Util\Util::currentTimeMillis() - $requestStartMs,
                $usage
            );
        }

        return [$rbody, $rcode, $rheaders, $myApiKey];
    }

    /**
     * @param 'delete'|'get'|'post' $method
     * @param string $url
     * @param array $params
     * @param array $headers
     * @param string[] $usage
     * @param callable $readBodyChunkCallable
     * @param 'v1'|'v2' $apiMode
     *
     * @throws Exception\AuthenticationException
     * @throws Exception\ApiConnectionException
     *
     * @return array
     */
    private function _requestRawStreaming($method, $url, $params, $headers, $apiMode, $usage, $readBodyChunkCallable)
    {
        list($absUrl, $rawHeaders, $params, $hasFile, $myApiKey) = $this->_prepareRequest($method, $url, $params, $headers, $apiMode);

        $requestStartMs = Util\Util::currentTimeMillis();

        list($rbody, $rcode, $rheaders) = self::streamingHttpClient()->requestStream(
            $method,
            $absUrl,
            $rawHeaders,
            $params,
            $hasFile,
            $readBodyChunkCallable
        );

        if (
            isset($rheaders['request-id'])
            && \is_string($rheaders['request-id'])
            && '' !== $rheaders['request-id']
        ) {
            self::$requestTelemetry = new RequestTelemetry(
                $rheaders['request-id'],
                Util\Util::currentTimeMillis() - $requestStartMs
            );
        }

        return [$rbody, $rcode, $rheaders, $myApiKey];
    }

    /**
     * @param resource $resource
     *
     * @throws Exception\InvalidArgumentException
     *
     * @return \CURLFile|string
     */
    private function _processResourceParam($resource)
    {
        if ('stream' !== \get_resource_type($resource)) {
            throw new Exception\InvalidArgumentException(
                'Attempted to upload a resource that is not a stream'
            );
        }

        $metaData = \stream_get_meta_data($resource);
        if ('plainfile' !== $metaData['wrapper_type']) {
            throw new Exception\InvalidArgumentException(
                'Only plainfile resource streams are supported'
            );
        }

        // We don't have the filename or mimetype, but the API doesn't care
        return new \CURLFile($metaData['uri']);
    }

    /**
     * @param string $rbody
     * @param int    $rcode
     * @param array  $rheaders
     * @param 'v1'|'v2'  $apiMode
     *
     * @throws Exception\UnexpectedValueException
     * @throws Exception\ApiErrorException
     *
     * @return array
     */
    private function _interpretResponse($rbody, $rcode, $rheaders, $apiMode)
    {
        $resp = \json_decode($rbody, true);
        $jsonError = \json_last_error();
        if (null === $resp && \JSON_ERROR_NONE !== $jsonError) {
            $msg = "Invalid response body from API: {$rbody} "
                . "(HTTP response code was {$rcode}, json_last_error() was {$jsonError})";

            throw new Exception\UnexpectedValueException($msg, $rcode);
        }

        if ($rcode < 200 || $rcode >= 300) {
            $this->handleErrorResponse($rbody, $rcode, $rheaders, $resp, $apiMode);
        }

        return $resp;
    }

    /**
     * @static
     *
     * @param HttpClient\ClientInterface $client
     */
    public static function setHttpClient($client)
    {
        self::$_httpClient = $client;
    }

    /**
     * @static
     *
     * @param HttpClient\StreamingClientInterface $client
     */
    public static function setStreamingHttpClient($client)
    {
        self::$_streamingHttpClient = $client;
    }

    /**
     * @static
     *
     * Resets any stateful telemetry data
     */
    public static function resetTelemetry()
    {
        self::$requestTelemetry = null;
    }

    /**
     * @return HttpClient\ClientInterface
     */
    public static function httpClient()
    {
        if (!self::$_httpClient) {
            self::$_httpClient = HttpClient\CurlClient::instance();
        }

        return self::$_httpClient;
    }

    /**
     * @return HttpClient\StreamingClientInterface
     */
    public static function streamingHttpClient()
    {
        if (!self::$_streamingHttpClient) {
            self::$_streamingHttpClient = HttpClient\CurlClient::instance();
        }

        return self::$_streamingHttpClient;
    }
}
