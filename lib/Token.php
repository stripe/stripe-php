<?php

namespace Stripe;

/**
 * Class Token
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\BankAccount $bank_account
 * @property \Stripe\Card $card
 * @property string|null $client_ip IP address of the client that generated the token.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $type Type of the token: <code>account</code>, <code>bank_account</code>, <code>card</code>, or <code>pii</code>.
 * @property bool $used Whether this token has already been used (tokens can be used only once).
 *
 * @package Stripe
 */
class Token extends ApiResource
{
    const OBJECT_NAME = 'token';

    use ApiOperations\Create;
    use ApiOperations\Retrieve;

    /**
     * Possible string representations of the token type.
     *
     * @see https://stripe.com/docs/api/tokens/object#token_object-type
     */
    const TYPE_ACCOUNT      = 'account';
    const TYPE_BANK_ACCOUNT = 'bank_account';
    const TYPE_CARD         = 'card';
    const TYPE_PII          = 'pii';
}
