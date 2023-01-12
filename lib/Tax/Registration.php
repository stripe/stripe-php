<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * A Tax <code>Registration</code> lets us know that your business is registered to
 * collect tax on payments within a region, enabling you to <a
 * href="https://stripe.com/docs/tax">automatically collect tax</a>.
 *
 * Stripe will not register on your behalf with the relevant authorities when you
 * create a Tax <code>Registration</code> object. For more information on how to
 * register to collect tax, see <a
 * href="https://stripe.com/docs/tax/registering">our guide</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $active_from Time at which the registration becomes active. Measured in seconds since the Unix epoch.
 * @property string $country Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $expires_at If set, the registration stops being active at this time. If not set, the registration will be active indefinitely. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $state State, county, province, or region.
 * @property string $status The status of the registration. This field is present for convenience and can be deduced from <code>active_from</code> and <code>expires_at</code>.
 * @property string $type The type of the registration. See <a href="https://stripe.com/docs/tax/registering">our guide</a> for more information about registration types.
 */
class Registration extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.registration';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Update;

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';
    const STATUS_SCHEDULED = 'scheduled';

    const TYPE_DOMESTIC_SMALL_SELLER = 'domestic_small_seller';
    const TYPE_SIMPLIFIED = 'simplified';
    const TYPE_STANDARD = 'standard';
    const TYPE_VAT_OSS_NON_UNION = 'vat_oss_non_union';
    const TYPE_VAT_OSS_UNION = 'vat_oss_union';
}
