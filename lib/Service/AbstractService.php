<?php

namespace Stripe\Service;

/**
 * Abstract base class for all services.
 */
abstract class AbstractService
{
    /**
     * @var \Stripe\StripeClientInterface
     */
    protected $client;

    /**
     * @var \Stripe\StripeStreamingClientInterface
     */
    protected $streamingClient;

    /**
     * Initializes a new instance of the {@link AbstractService} class.
     *
     * @param \Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
        $this->client = $client;
        $this->streamingClient = $client;
    }

    /**
     * Gets the client used by this service to send requests.
     *
     * @return \Stripe\StripeClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Gets the client used by this service to send requests.
     *
     * @return \Stripe\StripeStreamingClientInterface
     */
    public function getStreamingClient()
    {
        return $this->streamingClient;
    }

    /**
     * Translate null values to empty strings for v1 API requests.
     * For v1, we interpret null as a request to unset the field,
     * which corresponds to sending an empty string in the
     * form-encoded body.
     *
     * For v2, null values are preserved as-is so they serialize
     * to JSON null, which is the v2 mechanism for clearing fields.
     *
     * @param null|array $params
     * @param 'v1'|'v2' $apiMode
     */
    private static function formatParams($params, $apiMode)
    {
        if (null === $params) {
            return null;
        }
        if ('v2' === $apiMode) {
            return $params;
        }
        \array_walk_recursive($params, static function (&$value, $key) {
            if (null === $value) {
                $value = '';
            }
        });

        return $params;
    }

    protected function request($method, $path, $params, $opts, $schemas = null)
    {
        $apiMode = \Stripe\Util\Util::getApiMode($path);
        $params = self::formatParams($params, $apiMode);
        if (null !== $schemas && isset($schemas['request_schema'])) {
            $params = \Stripe\Util\Int64::coerceRequestParams($params, $schemas['request_schema']);
        }

        return $this->getClient()->request($method, $path, $params, $opts);
    }

    protected function requestStream($method, $path, $readBodyChunkCallable, $params, $opts)
    {
        $apiMode = \Stripe\Util\Util::getApiMode($path);

        return $this->getStreamingClient()->requestStream($method, $path, $readBodyChunkCallable, self::formatParams($params, $apiMode), $opts);
    }

    protected function requestCollection($method, $path, $params, $opts, $schemas = null)
    {
        $apiMode = \Stripe\Util\Util::getApiMode($path);
        $params = self::formatParams($params, $apiMode);
        if (null !== $schemas && isset($schemas['request_schema'])) {
            $params = \Stripe\Util\Int64::coerceRequestParams($params, $schemas['request_schema']);
        }

        return $this->getClient()->requestCollection($method, $path, $params, $opts);
    }

    protected function requestSearchResult($method, $path, $params, $opts, $schemas = null)
    {
        $apiMode = \Stripe\Util\Util::getApiMode($path);
        $params = self::formatParams($params, $apiMode);
        if (null !== $schemas && isset($schemas['request_schema'])) {
            $params = \Stripe\Util\Int64::coerceRequestParams($params, $schemas['request_schema']);
        }

        return $this->getClient()->requestSearchResult($method, $path, $params, $opts);
    }

    protected function buildPath($basePath, ...$ids)
    {
        foreach ($ids as $id) {
            if (null === $id || '' === \trim($id)) {
                $msg = 'The resource ID cannot be null or whitespace.';

                throw new \Stripe\Exception\InvalidArgumentException($msg);
            }
        }

        return \sprintf($basePath, ...\array_map('\urlencode', $ids));
    }
}
