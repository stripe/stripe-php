<?php

namespace Stripe\V2;

/**
 * Ref represents a typed reference to a v2 Stripe object.
 *
 * The wire shape is `{type: string, id: string, url: string}`. Call
 * `fetch()` to retrieve the full object from the API.
 *
 * @template T of \Stripe\StripeObject
 *
 * @property string $type The object type identifier (e.g. "v2.core.account").
 * @property string $id   Unique identifier for the referenced object.
 * @property string $url  Relative URL used to retrieve the full object.
 */
class Ref
{
    public $type;
    public $id;
    public $url;

    /** @var null|\Stripe\BaseStripeClient */
    protected $client;

    /**
     * @param array                          $json   the raw JSON payload for the ref field
     * @param null|\Stripe\BaseStripeClient  $client a StripeClient instance used to fetch the object
     */
    public function __construct($json, $client = null)
    {
        $this->client = $client;
        $this->type = $json['type'];
        $this->id = $json['id'];
        $this->url = $json['url'];
    }

    /**
     * Sets the client used to make requests from this Ref.
     *
     * @param \Stripe\BaseStripeClient $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve the full object this reference points to.
     *
     * @return T
     *
     * @throws \Stripe\Exception\UnexpectedValueException if no client has been set
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetch()
    {
        if (null === $this->client) {
            throw new \Stripe\Exception\UnexpectedValueException(
                'Ref has no client. Was it deserialized from a StripeClient response?'
            );
        }

        $response = $this->client->rawRequest(
            'get',
            $this->url,
            null,
            [],
            null,
            ['ref_fetch']
        );

        return $this->client->deserialize($response->body, \Stripe\Util\Util::getApiMode($this->url));
    }
}
