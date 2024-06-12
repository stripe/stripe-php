<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The Connected account that incurred this charge.
 * @property string $source_transaction The payment object that caused this tax to be inflicted.
 * @property string $type The type of tax (VAT).
 */
class PlatformTaxFee extends ApiResource
{
    const OBJECT_NAME = 'platform_tax_fee';
}
