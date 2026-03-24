<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * Person Tokens are single-use tokens which tokenize person information, and are used for creating or updating a Person.
 *
 * @property string $id Unique identifier for the token.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the token was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property int $expires_at Time at which the token will expire.
 * @property bool $livemode Has the value <code>true</code> if the token exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property bool $used Determines if the token has already been used (tokens can only be used once).
 */
class AccountPersonToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_person_token';
}
