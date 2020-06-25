<?php

namespace Stripe;

/**
 * This is an object representing a person associated with a Stripe account.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/connect/identity-verification-api#person-information">Handling
 * Identity Verification with the API</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The account the person is associated with.
 * @property \Stripe\StripeObject $address
 * @property null|\Stripe\StripeObject $address_kana The Kana variation of the person's address (Japan only).
 * @property null|\Stripe\StripeObject $address_kanji The Kanji variation of the person's address (Japan only).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject $dob
 * @property null|string $email The person's email address.
 * @property null|string $first_name The person's first name.
 * @property null|string $first_name_kana The Kana variation of the person's first name (Japan only).
 * @property null|string $first_name_kanji The Kanji variation of the person's first name (Japan only).
 * @property null|string $gender The person's gender (International regulations require either &quot;male&quot; or &quot;female&quot;).
 * @property bool $id_number_provided Whether the person's <code>id_number</code> was provided.
 * @property null|string $last_name The person's last name.
 * @property null|string $last_name_kana The Kana variation of the person's last name (Japan only).
 * @property null|string $last_name_kanji The Kanji variation of the person's last name (Japan only).
 * @property null|string $maiden_name The person's maiden name.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $phone The person's phone number.
 * @property \Stripe\StripeObject $relationship
 * @property null|\Stripe\StripeObject $requirements Information about the requirements for this person, including what information needs to be collected, and by when.
 * @property bool $ssn_last_4_provided Whether the last four digits of the person's Social Security number have been provided (U.S. only).
 * @property \Stripe\StripeObject $verification
 */
class Person extends ApiResource
{
    const OBJECT_NAME = 'person';

    use ApiOperations\Delete;
    use ApiOperations\Update;

    const CODE_INVALID_ADDRESS_CITY_STATE_POSTAL_CODE = 'invalid_address_city_state_postal_code';
    const CODE_INVALID_STREET_ADDRESS = 'invalid_street_address';
    const CODE_INVALID_VALUE_OTHER = 'invalid_value_other';
    const CODE_VERIFICATION_DOCUMENT_ADDRESS_MISMATCH = 'verification_document_address_mismatch';
    const CODE_VERIFICATION_DOCUMENT_ADDRESS_MISSING = 'verification_document_address_missing';
    const CODE_VERIFICATION_DOCUMENT_CORRUPT = 'verification_document_corrupt';
    const CODE_VERIFICATION_DOCUMENT_COUNTRY_NOT_SUPPORTED = 'verification_document_country_not_supported';
    const CODE_VERIFICATION_DOCUMENT_DOB_MISMATCH = 'verification_document_dob_mismatch';
    const CODE_VERIFICATION_DOCUMENT_DUPLICATE_TYPE = 'verification_document_duplicate_type';
    const CODE_VERIFICATION_DOCUMENT_EXPIRED = 'verification_document_expired';
    const CODE_VERIFICATION_DOCUMENT_FAILED_COPY = 'verification_document_failed_copy';
    const CODE_VERIFICATION_DOCUMENT_FAILED_GREYSCALE = 'verification_document_failed_greyscale';
    const CODE_VERIFICATION_DOCUMENT_FAILED_OTHER = 'verification_document_failed_other';
    const CODE_VERIFICATION_DOCUMENT_FAILED_TEST_MODE = 'verification_document_failed_test_mode';
    const CODE_VERIFICATION_DOCUMENT_FRAUDULENT = 'verification_document_fraudulent';
    const CODE_VERIFICATION_DOCUMENT_ID_NUMBER_MISMATCH = 'verification_document_id_number_mismatch';
    const CODE_VERIFICATION_DOCUMENT_ID_NUMBER_MISSING = 'verification_document_id_number_missing';
    const CODE_VERIFICATION_DOCUMENT_INCOMPLETE = 'verification_document_incomplete';
    const CODE_VERIFICATION_DOCUMENT_INVALID = 'verification_document_invalid';
    const CODE_VERIFICATION_DOCUMENT_MANIPULATED = 'verification_document_manipulated';
    const CODE_VERIFICATION_DOCUMENT_MISSING_BACK = 'verification_document_missing_back';
    const CODE_VERIFICATION_DOCUMENT_MISSING_FRONT = 'verification_document_missing_front';
    const CODE_VERIFICATION_DOCUMENT_NAME_MISMATCH = 'verification_document_name_mismatch';
    const CODE_VERIFICATION_DOCUMENT_NAME_MISSING = 'verification_document_name_missing';
    const CODE_VERIFICATION_DOCUMENT_NATIONALITY_MISMATCH = 'verification_document_nationality_mismatch';
    const CODE_VERIFICATION_DOCUMENT_NOT_READABLE = 'verification_document_not_readable';
    const CODE_VERIFICATION_DOCUMENT_NOT_UPLOADED = 'verification_document_not_uploaded';
    const CODE_VERIFICATION_DOCUMENT_PHOTO_MISMATCH = 'verification_document_photo_mismatch';
    const CODE_VERIFICATION_DOCUMENT_TOO_LARGE = 'verification_document_too_large';
    const CODE_VERIFICATION_DOCUMENT_TYPE_NOT_SUPPORTED = 'verification_document_type_not_supported';
    const CODE_VERIFICATION_FAILED_ADDRESS_MATCH = 'verification_failed_address_match';
    const CODE_VERIFICATION_FAILED_BUSINESS_IEC_NUMBER = 'verification_failed_business_iec_number';
    const CODE_VERIFICATION_FAILED_DOCUMENT_MATCH = 'verification_failed_document_match';
    const CODE_VERIFICATION_FAILED_ID_NUMBER_MATCH = 'verification_failed_id_number_match';
    const CODE_VERIFICATION_FAILED_KEYED_IDENTITY = 'verification_failed_keyed_identity';
    const CODE_VERIFICATION_FAILED_KEYED_MATCH = 'verification_failed_keyed_match';
    const CODE_VERIFICATION_FAILED_NAME_MATCH = 'verification_failed_name_match';
    const CODE_VERIFICATION_FAILED_OTHER = 'verification_failed_other';

    /**
     * @return string the API URL for this Stripe account reversal
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $account = $this['account'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                'Could not determine which URL to request: ' .
                "class instance has invalid ID: {$id}",
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
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = 'Persons cannot be retrieved without an account ID. Retrieve ' .
               "a person using `Account::retrievePerson('account_id', " .
               "'person_id')`.";

        throw new Exception\BadMethodCallException($msg);
    }

    /**
     * @param string $_id
     * @param null|array $_params
     * @param null|array|string $_options
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function update($_id, $_params = null, $_options = null)
    {
        $msg = 'Persons cannot be updated without an account ID. Update ' .
               "a person using `Account::updatePerson('account_id', " .
               "'person_id', \$updateParams)`.";

        throw new Exception\BadMethodCallException($msg);
    }
}
