<?php

namespace Stripe;

/**
 * This is an object representing a capability for a Stripe account.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/connect/account-capabilities">Account
 * capabilities</a>.
 *
 * @property string $id The identifier for the capability.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|\Stripe\Account $account The account for which the capability enables functionality.
 * @property bool $requested Whether the capability has been requested.
 * @property null|int $requested_at Time at which the capability was requested. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject $requirements
 * @property string $status The status of the capability. Can be <code>active</code>, <code>inactive</code>, <code>pending</code>, or <code>unrequested</code>.
 */
class Capability extends ApiResource
{
    const OBJECT_NAME = 'capability';

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

    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    const STATUS_UNREQUESTED = 'unrequested';

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

        return "{$base}/{$accountExtn}/capabilities/{$extn}";
    }

    /**
     * @param array|string $_id
     * @param null|array|string $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = 'Capabilities cannot be retrieved without an account ID. ' .
               'Retrieve a capability using `Account::retrieveCapability(' .
               "'account_id', 'capability_id')`.";

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
        $msg = 'Capabilities cannot be updated without an account ID. ' .
               'Update a capability using `Account::updateCapability(' .
               "'account_id', 'capability_id', \$updateParams)`.";

        throw new Exception\BadMethodCallException($msg);
    }
}
