<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Iam;

/**
 * An API key.
 *
 * @property string $id Unique identifier of the API key.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp when the API key was created.
 * @property null|int $expires_at Timestamp when the API key expires.
 * @property string[] $ip_allowlist List of IP addresses allowed to use this API key. Addresses use IPv4 protocol, and may be a CIDR range (e.g., [100.10.38.255, 100.10.38.0/24]).
 * @property null|int $last_used Timestamp when the API key was last used.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{type: string, application?: (object{id: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $managed_by Account that manages this API key (for keys managed by platforms).
 * @property null|string $name Name of the API key.
 * @property null|string $note Note or description for the API key.
 * @property null|(object{token: string}&\Stripe\StripeObject) $publishable_key Token set for a publishable key.
 * @property null|(object{encrypted_secret?: (object{ciphertext: string, format: string, recipient_key_id?: string}&\Stripe\StripeObject), secret_token_redacted?: string, token?: string}&\Stripe\StripeObject) $secret_key Token set for a secret key.
 * @property string $status Current status of the API key (e.g., active, expired).
 * @property string $type Type of the API key.
 */
class ApiKey extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.iam.api_key';

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';

    const TYPE_PUBLISHABLE_KEY = 'publishable_key';
    const TYPE_SECRET_KEY = 'secret_key';
}
