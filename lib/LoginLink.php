<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Login Links are single-use URLs for a connected account to access the Express Dashboard. The connected account's <a href="/api/accounts/object#account_object-controller-stripe_dashboard-type">account.controller.stripe_dashboard.type</a> must be <code>express</code> to have access to the Express Dashboard.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $url The URL for the login link.
 */
class LoginLink extends ApiResource
{
    const OBJECT_NAME = 'login_link';
}
