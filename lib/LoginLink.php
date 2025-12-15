<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Login Links are single-use URLs that takes an Express account to the login page for their Stripe dashboard.
 * A Login Link differs from an <a href="https://docs.stripe.com/api/account_links">Account Link</a> in that it takes the user directly to their <a href="https://docs.stripe.com/connect/integrate-express-dashboard#create-login-link">Express dashboard for the specified account</a>.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $url The URL for the login link.
 */
class LoginLink extends ApiResource
{
    const OBJECT_NAME = 'login_link';
}
