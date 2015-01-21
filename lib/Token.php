<?php

namespace Stripe;

class Token extends ApiResource
{
    /**
     * @param string $id The ID of the token to retrieve.
     * @param string|null $apiKey
     *
     * @return Token
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Token The created token.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }
}
