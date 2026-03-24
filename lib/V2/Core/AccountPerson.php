<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A Person represents an individual associated with an Account's identity (for example, an owner, director, executive, or representative). Use Persons to provide and update identity information for verification and compliance.
 *
 * @property string $id Unique identifier for the Person.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The account ID which the individual belongs to.
 * @property null|(object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}&\Stripe\StripeObject)[] $additional_addresses Additional addresses associated with the person.
 * @property null|(object{full_name?: string, given_name?: string, purpose: string, surname?: string}&\Stripe\StripeObject)[] $additional_names Additional names (e.g. aliases) associated with the person.
 * @property null|(object{account?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $additional_terms_of_service Attestations of accepted terms of service agreements.
 * @property null|(object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject) $address The person's residential address.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|(object{day: int, month: int, year: int}&\Stripe\StripeObject) $date_of_birth The person's date of birth.
 * @property null|(object{company_authorization?: (object{files: string[], type: string}&\Stripe\StripeObject), passport?: (object{files: string[], type: string}&\Stripe\StripeObject), primary_verification?: (object{front_back: (object{back?: string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), secondary_verification?: (object{front_back: (object{back?: string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), visa?: (object{files: string[], type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $documents Documents that may be submitted to satisfy various informational requests.
 * @property null|string $email The person's email address.
 * @property null|string $given_name The person's first name.
 * @property null|(object{type: string}&\Stripe\StripeObject)[] $id_numbers The identification numbers (e.g., SSN) associated with the person.
 * @property null|string $legal_gender The person's gender (International regulations require either &quot;male&quot; or &quot;female&quot;).
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string[] $nationalities The countries where the person is a national. Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property null|string $phone The person's phone number.
 * @property null|string $political_exposure The person's political exposure.
 * @property null|(object{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, percent_ownership?: string, representative?: bool, title?: string}&\Stripe\StripeObject) $relationship The relationship that this person has with the Account's business or legal entity.
 * @property null|(object{kana?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject), kanji?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $script_addresses The script addresses (e.g., non-Latin characters) associated with the person.
 * @property null|(object{kana?: (object{given_name?: string, surname?: string}&\Stripe\StripeObject), kanji?: (object{given_name?: string, surname?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $script_names The script names (e.g. non-Latin characters) associated with the person.
 * @property null|string $surname The person's last name.
 * @property int $updated Time at which the object was last updated. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 */
class AccountPerson extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_person';

    const LEGAL_GENDER_FEMALE = 'female';
    const LEGAL_GENDER_MALE = 'male';

    const POLITICAL_EXPOSURE_EXISTING = 'existing';
    const POLITICAL_EXPOSURE_NONE = 'none';
}
