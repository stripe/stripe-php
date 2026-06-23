<?php

namespace Stripe;

/**
 * Information on the API request that instigated the event.
 *
 * @property string $id ID of the API request that caused the event.
 * @property string $idempotency_key The idempotency key transmitted during the request.
 */
class ReasonRequest
{
    public $id;
    public $idempotency_key;

    public function __construct($json)
    {
        $this->id = $json['id'];
        $this->idempotency_key = $json['idempotency_key'];
    }
}

/**
 * @property string $type Event reason type.
 * @property null|ReasonRequest $request Information on the API request that instigated the event.
 */
class Reason
{
    public $type;
    public $request;

    public function __construct($json)
    {
        $this->type = $json['type'];

        if ('request' === $this->type) {
            $this->request = new ReasonRequest($json['request']);
        } else {
            $this->request = null;
        }
    }
}
