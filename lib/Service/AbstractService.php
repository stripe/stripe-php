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
     * Initializes a new instance of the {@link AbstractService} class.
     *
     * @param \Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
        $this->client = $client;
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

    private static function formatParams($params)
    {
      $formatted = [];
      foreach ($params as $k => $v) {
        if (null === $v) {
          $formatted[$k] = "";
        } else {
          $formatted[$k] = $v;
        }
      }
      return $formatted;
    }

    protected function request($method, $path, $params, $opts)
    {
        return $this->getClient()->request($method, $path, static::formatParams($params), $opts);
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
