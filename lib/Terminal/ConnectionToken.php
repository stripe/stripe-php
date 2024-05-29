<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * A Connection Token is used by the Stripe Terminal SDK to connect to a reader.
 *
 * Related guide: <a href="https://stripe.com/docs/terminal/fleet/locations">Fleet management</a>
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $location The id of the location that this connection token is scoped to. Note that location scoping only applies to internet-connected readers. For more details, see <a href="https://stripe.com/docs/terminal/fleet/locations#connection-tokens">the docs on scoping connection tokens</a>.
 * @property string $secret Your application should pass this token to the Stripe Terminal SDK.
 */
class ConnectionToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.connection_token';

    /**
     * To connect to a reader the Stripe Terminal SDK needs to retrieve a short-lived
     * connection token from Stripe, proxied through your server. On your backend, add
     * an endpoint that creates and returns a connection token.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\ConnectionToken the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
