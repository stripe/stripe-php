<?php

namespace Stripe;

/**
 * Class Recipient
 *
 * @package Stripe
 */
class Recipient extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const OBJECT_NAME = "recipient";

    /**
     * @param array|null $params
     *
     * @return Collection of the Recipient's Transfers
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function transfers($params = null)
    {
        $params = $params ?: [];
        $params['recipient'] = $this->id;
        $transfers = Transfer::all($params, $this->_opts);
        return $transfers;
    }
}
