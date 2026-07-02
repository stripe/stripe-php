<?php

// File generated from our OpenAPI spec

namespace Stripe\Crypto;

/**
 * A read-only representation of a user's PaymentMethod for use in Crypto On Ramp transactions.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{brand: null|string, exp_month: null|int, exp_year: null|int, funding: string, last4: null|string, wallet: null|(object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $card A <code>card</code> PaymentToken, this hash contains details of the card PaymentToken.
 * @property string $type Type of the Payment Token.
 * @property null|(object{account_type: null|string, bank_name: null|string, last4: null|string}&\Stripe\StripeObject) $us_bank_account A <code>us_bank_account</code> PaymentToken, this hash contains details of the US bank account PaymentToken.
 */
class CustomerPaymentToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'crypto.payment_token';

    const TYPE_CARD = 'card';
    const TYPE_US_BANK_ACCOUNT = 'us_bank_account';
}
