<?php

namespace Stripe;

class Preview
{
    /**
     * @var \Stripe\BaseStripeClient
     */
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    private function getDefaultOpts($opts)
    {
        return \array_merge(['api_mode' => 'preview'], $opts);
    }

    public function get($path, $opts = [])
    {
        return $this->client->rawRequest('get', $path, null, $this->getDefaultOpts($opts));
    }

    public function post($path, $params, $opts = [])
    {
        return $this->client->rawRequest('post', $path, $params, $this->getDefaultOpts($opts));
    }

    public function delete($path, $opts = [])
    {
        return $this->client->rawRequest('delete', $path, null, $this->getDefaultOpts($opts));
    }
}
