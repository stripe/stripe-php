<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * Person retrieval response schema.
 *
 * @property string $id Unique identifier for the Person.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The account ID which the individual belongs to.
 * @property null|((object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, purpose: string, state: null|string, town: null|string}&\Stripe\StripeObject))[] $additional_addresses Additional addresses associated with the person.
 * @property null|((object{full_name: null|string, given_name: null|string, purpose: string, surname: null|string}&\Stripe\StripeObject))[] $additional_names Additional names (e.g. aliases) associated with the person.
 * @property null|(object{account: null|(object{date: null|int, ip: null|string, user_agent: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $additional_terms_of_service Attestations of accepted terms of service agreements.
 * @property null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\Stripe\StripeObject) $address The person's residential address.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|(object{day: int, month: int, year: int}&\Stripe\StripeObject) $date_of_birth The person's date of birth.
 * @property null|(object{company_authorization: null|(object{files: string[], type: string}&\Stripe\StripeObject), passport: null|(object{files: string[], type: string}&\Stripe\StripeObject), primary_verification: null|(object{front_back: (object{back: null|string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), secondary_verification: null|(object{front_back: (object{back: null|string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), visa: null|(object{files: string[], type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $documents Documents that may be submitted to satisfy various informational requests.
 * @property null|string $email The person's email address.
 * @property null|string $given_name The person's first name.
 * @property null|(object{type: string}&\Stripe\StripeObject)[] $id_numbers The identification numbers (e.g., SSN) associated with the person.
 * @property null|string $legal_gender The person's gender (International regulations require either &quot;male&quot; or &quot;female&quot;).
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string[] $nationalities The countries where the person is a national. Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property null|string $phone The person's phone number.
 * @property null|string $political_exposure The person's political exposure.
 * @property null|(object{authorizer: null|bool, director: null|bool, executive: null|bool, legal_guardian: null|bool, owner: null|bool, percent_ownership: null|string, representative: null|bool, title: null|string}&\Stripe\StripeObject) $relationship The relationship that this person has with the Account's business or legal entity.
 * @property null|(object{kana: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\Stripe\StripeObject), kanji: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $script_addresses The script addresses (e.g., non-Latin characters) associated with the person.
 * @property null|(object{kana: null|(object{given_name: null|string, surname: null|string}&\Stripe\StripeObject), kanji: null|(object{given_name: null|string, surname: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $script_names The script names (e.g. non-Latin characters) associated with the person.
 * @property null|string $surname The person's last name.
 * @property int $updated Time at which the object was last updated. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 */
class Person extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_person';

    const LEGAL_GENDER_FEMALE = 'female';
    const LEGAL_GENDER_MALE = 'male';

    const POLITICAL_EXPOSURE_EXISTING = 'existing';
    const POLITICAL_EXPOSURE_NONE = 'none';
}
