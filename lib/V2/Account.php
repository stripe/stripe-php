<?php

// File generated from our OpenAPI spec

namespace Stripe\V2;

/**
 * A V2 Account is a representation of a company or individual that a Stripe user does business with. Accounts contain the contact details, Legal Entity information, and configuration required to enable the Account for use across Stripe products.
 *
 * @property string $id Unique identifier for the Account.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string[] $applied_configurations Closed Enum. A list of the configurations which have been applied to the Account to allow Accounts to be filtered by the products they have been configured for. Currently can only contain <code>recipient</code>, which will be present if a recipient configuration is set.
 * @property null|(object{recipient_data: null|(object{default_outbound_destination: null|(object{id: string, type: string}&\Stripe\StripeObject), features: (object{bank_accounts: (object{local: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), wire: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), cards: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), supportable_features: null|(object{recipient_data: null|string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject) $configuration Configuration to enable this Account to be used as a recipient of an OutboundPayment via the OutboundPayments API, or via the dashboard.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $email The default contact email address for the Account. This field is optional, but must be supplied before the recipient configuration can be populated.
 * @property null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\Stripe\StripeObject), business_type: null|string, country: string, name: null|string, representative: null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\Stripe\StripeObject), dob: null|(object{day: int, month: int, year: int}&\Stripe\StripeObject), given_name: null|string, surname: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $legal_entity_data The default set of verification information for the Account. Currently, this only includes a single Legal Entity which must be set as the default.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $name A descriptive name for the Account. This name will be surfaced in the Account directory in the dashboard.
 * @property null|((object{awaiting_action_from: string, deadline: (object{due_at: null|int, status: string}&\Stripe\StripeObject), description: string, errors: (object{code: string, message: string}&\Stripe\StripeObject)[], impact: (object{required_for_features: string[]}&\Stripe\StripeObject), requested_reasons: string[]}&\Stripe\StripeObject))[] $requirements A list of outstanding tasks users must complete before Stripe allows the Account’s Features to be activated.
 */
class Account extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'account';
}
