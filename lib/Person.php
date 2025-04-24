<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This is an object representing a person associated with a Stripe account.
 *
 * A platform can only access a subset of data in a person for an account where <a href="/api/accounts/object#account_object-controller-requirement_collection">account.controller.requirement_collection</a> is <code>stripe</code>, which includes Standard and Express accounts, after creating an Account Link or Account Session to start Connect onboarding.
 *
 * See the <a href="/connect/standard-accounts">Standard onboarding</a> or <a href="/connect/express-accounts">Express onboarding</a> documentation for information about prefilling information and account onboarding steps. Learn more about <a href="/connect/handling-api-verification#person-information">handling identity verification with the API</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $account The account the person is associated with.
 * @property null|(object{account: null|(object{date: null|int, ip: null|string, user_agent: null|string}&StripeObject)}&StripeObject) $additional_tos_acceptances
 * @property null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject) $address
 * @property null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&StripeObject) $address_kana The Kana variation of the person's address (Japan only).
 * @property null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&StripeObject) $address_kanji The Kanji variation of the person's address (Japan only).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{day: null|int, month: null|int, year: null|int}&StripeObject) $dob
 * @property null|string $email The person's email address. Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string $first_name The person's first name. Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string $first_name_kana The Kana variation of the person's first name (Japan only). Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string $first_name_kanji The Kanji variation of the person's first name (Japan only). Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string[] $full_name_aliases A list of alternate names or aliases that the person is known by. Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|(object{alternatives: null|(object{alternative_fields_due: string[], original_fields_due: string[]}&StripeObject)[], currently_due: string[], errors: (object{code: string, reason: string, requirement: string}&StripeObject)[], eventually_due: string[], past_due: string[], pending_verification: string[]}&StripeObject) $future_requirements Information about the <a href="https://stripe.com/docs/connect/custom-accounts/future-requirements">upcoming new requirements for this person</a>, including what information needs to be collected, and by when.
 * @property null|string $gender The person's gender.
 * @property null|bool $id_number_provided Whether the person's <code>id_number</code> was provided. True if either the full ID number was provided or if only the required part of the ID number was provided (ex. last four of an individual's SSN for the US indicated by <code>ssn_last_4_provided</code>).
 * @property null|bool $id_number_secondary_provided Whether the person's <code>id_number_secondary</code> was provided.
 * @property null|string $last_name The person's last name. Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string $last_name_kana The Kana variation of the person's last name (Japan only). Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string $last_name_kanji The Kanji variation of the person's last name (Japan only). Also available for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>stripe</code>.
 * @property null|string $maiden_name The person's maiden name.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nationality The country where the person is a national.
 * @property null|string $phone The person's phone number.
 * @property null|string $political_exposure Indicates if the person or any of their representatives, family members, or other closely related persons, declares that they hold or have held an important public job or function, in any jurisdiction.
 * @property null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject) $registered_address
 * @property null|(object{authorizer: null|bool, director: null|bool, executive: null|bool, legal_guardian: null|bool, owner: null|bool, percent_ownership: null|float, representative: null|bool, title: null|string}&StripeObject) $relationship
 * @property null|(object{alternatives: null|(object{alternative_fields_due: string[], original_fields_due: string[]}&StripeObject)[], currently_due: string[], errors: (object{code: string, reason: string, requirement: string}&StripeObject)[], eventually_due: string[], past_due: string[], pending_verification: string[]}&StripeObject) $requirements Information about the requirements for this person, including what information needs to be collected, and by when.
 * @property null|bool $ssn_last_4_provided Whether the last four digits of the person's Social Security number have been provided (U.S. only).
 * @property null|(object{ethnicity_details: null|(object{ethnicity: null|string[], ethnicity_other: null|string}&StripeObject), race_details: null|(object{race: null|string[], race_other: null|string}&StripeObject), self_identified_gender: null|string}&StripeObject) $us_cfpb_data Demographic data related to the person.
 * @property null|(object{additional_document?: null|(object{back: null|File|string, details: null|string, details_code: null|string, front: null|File|string}&StripeObject), details?: null|string, details_code?: null|string, document?: (object{back: null|File|string, details: null|string, details_code: null|string, front: null|File|string}&StripeObject), status: string}&StripeObject) $verification
 */
class Person extends ApiResource
{
    const OBJECT_NAME = 'person';

    const GENDER_FEMALE = 'female';
    const GENDER_MALE = 'male';

    const POLITICAL_EXPOSURE_EXISTING = 'existing';
    const POLITICAL_EXPOSURE_NONE = 'none';

    const VERIFICATION_STATUS_PENDING = 'pending';
    const VERIFICATION_STATUS_UNVERIFIED = 'unverified';
    const VERIFICATION_STATUS_VERIFIED = 'verified';

    use ApiOperations\Delete;

    /**
     * @return string the API URL for this Stripe account reversal
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $account = $this['account'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                'Could not determine which URL to request: '
                . "class instance has invalid ID: {$id}",
                null
            );
        }
        $id = Util\Util::utf8($id);
        $account = Util\Util::utf8($account);

        $base = Account::classUrl();
        $accountExtn = \urlencode($account);
        $extn = \urlencode($id);

        return "{$base}/{$accountExtn}/persons/{$extn}";
    }

    /**
     * @param array|string $_id
     * @param null|array|string $_opts
     *
     * @throws Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = 'Persons cannot be retrieved without an account ID. Retrieve '
               . "a person using `Account::retrievePerson('account_id', "
               . "'person_id')`.";

        throw new Exception\BadMethodCallException($msg);
    }

    /**
     * @param string $_id
     * @param null|array $_params
     * @param null|array|string $_options
     *
     * @throws Exception\BadMethodCallException
     */
    public static function update($_id, $_params = null, $_options = null)
    {
        $msg = 'Persons cannot be updated without an account ID. Update '
                . "a person using `Account::updatePerson('account_id', "
                . "'person_id', \$updateParams)`.";

        throw new Exception\BadMethodCallException($msg);
    }

    /**
     * @param null|array|string $opts
     *
     * @return static the saved resource
     *
     * @throws Exception\ApiErrorException if the request fails
     *
     * @deprecated The `save` method is deprecated and will be removed in a
     *     future major version of the library. Use the static method `update`
     *     on the resource instead.
     */
    public function save($opts = null)
    {
        $params = $this->serializeParameters();
        if (\count($params) > 0) {
            $url = $this->instanceUrl();
            list($response, $opts) = $this->_request('post', $url, $params, $opts, ['save']);
            $this->refreshFrom($response, $opts);
        }

        return $this;
    }
}
