<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This is an object representing financing that has been accepted by a merchant.
 *
 * @property string $id
 * @property string $object
 * @property int $accepted_advance_amount
 * @property int $accepted_at
 * @property int $accepted_premium_amount
 * @property float $accepted_withhold_rate
 * @property string $currency
 * @property string $financing_type
 * @property bool $is_refill
 * @property string $merchant
 * @property string $state
 */
class AcceptedFinancing extends SingletonApiResource
{
    const OBJECT_NAME = 'accepted_financing';

    use ApiOperations\SingletonRetrieve;

    const FINANCING_TYPE_CASH_ADVANCE = 'cash_advance';
    const FINANCING_TYPE_FLEX_LOAN = 'flex_loan';
}
