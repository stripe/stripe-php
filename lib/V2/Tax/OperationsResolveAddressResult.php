<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Tax;

/**
 * The result of resolving an address to its tax precision level.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{city?: string, country?: string, line1?: string, postal_code?: string, state?: string}&\Stripe\StripeObject) $address The normalized form of the input address.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $precision The precision level of the resolved address.
 * @property (object{issues: (object{code: string, field: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $precision_details Details about the precision, including any issues.
 */
class OperationsResolveAddressResult extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.tax.operations_resolve_address_result';

    const PRECISION_ADDRESS = 'address';
    const PRECISION_CITY = 'city';
    const PRECISION_COUNTRY = 'country';
    const PRECISION_NONE = 'none';
    const PRECISION_POSTAL_CODE = 'postal_code';
    const PRECISION_STATE = 'state';
    const PRECISION_STREET = 'street';
}
