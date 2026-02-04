<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * The ConnectionSession resource.
 *
 * @property string $id The unique identifier for this ConnectionSession.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The Account this Connection Session was created for.
 * @property null|string[] $allowed_connection_types The Connection types that the Connection Session is allowed to establish.
 * @property string $client_secret The client secret of this Connection Session. Used on the client to set up secure access to the given Account.
 * @property null|(object{granted_access?: string[], type: string}&\Stripe\StripeObject) $connection The Connection created by the ConnectionSession.
 * @property int $created Time at which the ConnectionSession was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string[] $requested_access The access that is collected with the Connection Session.
 */
class ConnectionSession extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.connection_session';
}
