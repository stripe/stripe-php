<?php

namespace Stripe;

/**
 * Account Links are the means by which a Connect platform grants a connected
 * account permission to access Stripe-hosted applications, such as Connect
 * Onboarding.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/connect/connect-onboarding">Connect
 * Onboarding</a>.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property int $expires_at The timestamp at which this account link will expire.
 * @property string $url The URL for the account link.
 */
class AccountLink extends ApiResource
{
    const OBJECT_NAME = 'account_link';

    use ApiOperations\Create;

    const COLLECT_CURRENTLY_DUE = 'currently_due';
    const COLLECT_EVENTUALLY_DUE = 'eventually_due';

    const TYPE_CUSTOM_ACCOUNT_UPDATE = 'custom_account_update';
    const TYPE_CUSTOM_ACCOUNT_VERIFICATION = 'custom_account_verification';
}
