<?php

namespace Stripe;

/**
 * This is an object representing a Stripe account. You can retrieve it to see
 * properties on the account like its current e-mail address or if the account is
 * enabled yet to make live charges.
 *
 * Some properties, marked below, are available only to platforms that want to <a
 * href="https://stripe.com/docs/connect/accounts">create and manage Express or
 * Custom accounts</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $business_profile Business information about the account.
 * @property null|string $business_type The business type.
 * @property \Stripe\StripeObject $capabilities
 * @property bool $charges_enabled Whether the account can create live charges.
 * @property \Stripe\StripeObject $company
 * @property string $country The account's country.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $default_currency Three-letter ISO currency code representing the default currency for the account. This must be a currency that <a href="https://stripe.com/docs/payouts">Stripe supports in the account's country</a>.
 * @property bool $details_submitted Whether account details have been submitted. Standard accounts cannot receive payouts before this is true.
 * @property null|string $email The primary user's email address.
 * @property \Stripe\Collection $external_accounts External accounts (bank accounts and debit cards) currently attached to this account
 * @property \Stripe\Person $individual <p>This is an object representing a person associated with a Stripe account.</p><p>Related guide: <a href="https://stripe.com/docs/connect/identity-verification-api#person-information">Handling Identity Verification with the API</a>.</p>
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property bool $payouts_enabled Whether Stripe can send payouts to this account.
 * @property \Stripe\StripeObject $requirements
 * @property null|\Stripe\StripeObject $settings Options for customizing how the account functions within Stripe.
 * @property \Stripe\StripeObject $tos_acceptance
 * @property string $type The Stripe account type. Can be <code>standard</code>, <code>express</code>, or <code>custom</code>.
 */
class Account extends ApiResource
{
    const OBJECT_NAME = 'account';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const AU_BECS_DEBIT_PAYMENTS_ACTIVE = 'active';
    const AU_BECS_DEBIT_PAYMENTS_INACTIVE = 'inactive';
    const AU_BECS_DEBIT_PAYMENTS_PENDING = 'pending';

    const BACS_DEBIT_PAYMENTS_ACTIVE = 'active';
    const BACS_DEBIT_PAYMENTS_INACTIVE = 'inactive';
    const BACS_DEBIT_PAYMENTS_PENDING = 'pending';

    const BUSINESS_TYPE_COMPANY = 'company';
    const BUSINESS_TYPE_GOVERNMENT_ENTITY = 'government_entity';
    const BUSINESS_TYPE_INDIVIDUAL = 'individual';
    const BUSINESS_TYPE_NON_PROFIT = 'non_profit';

    const CARD_ISSUING_ACTIVE = 'active';
    const CARD_ISSUING_INACTIVE = 'inactive';
    const CARD_ISSUING_PENDING = 'pending';

    const CARD_PAYMENTS_ACTIVE = 'active';
    const CARD_PAYMENTS_INACTIVE = 'inactive';
    const CARD_PAYMENTS_PENDING = 'pending';

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

    const INTERVAL_DAILY = 'daily';
    const INTERVAL_MANUAL = 'manual';
    const INTERVAL_MONTHLY = 'monthly';
    const INTERVAL_WEEKLY = 'weekly';

    const JCB_PAYMENTS_ACTIVE = 'active';
    const JCB_PAYMENTS_INACTIVE = 'inactive';
    const JCB_PAYMENTS_PENDING = 'pending';

    const LEGACY_PAYMENTS_ACTIVE = 'active';
    const LEGACY_PAYMENTS_INACTIVE = 'inactive';
    const LEGACY_PAYMENTS_PENDING = 'pending';

    const STRUCTURE_GOVERNMENT_INSTRUMENTALITY = 'government_instrumentality';
    const STRUCTURE_GOVERNMENTAL_UNIT = 'governmental_unit';
    const STRUCTURE_INCORPORATED_NON_PROFIT = 'incorporated_non_profit';
    const STRUCTURE_LIMITED_LIABILITY_PARTNERSHIP = 'limited_liability_partnership';
    const STRUCTURE_MULTI_MEMBER_LLC = 'multi_member_llc';
    const STRUCTURE_PRIVATE_COMPANY = 'private_company';
    const STRUCTURE_PRIVATE_CORPORATION = 'private_corporation';
    const STRUCTURE_PRIVATE_PARTNERSHIP = 'private_partnership';
    const STRUCTURE_PUBLIC_COMPANY = 'public_company';
    const STRUCTURE_PUBLIC_CORPORATION = 'public_corporation';
    const STRUCTURE_PUBLIC_PARTNERSHIP = 'public_partnership';
    const STRUCTURE_SOLE_PROPRIETORSHIP = 'sole_proprietorship';
    const STRUCTURE_TAX_EXEMPT_GOVERNMENT_INSTRUMENTALITY = 'tax_exempt_government_instrumentality';
    const STRUCTURE_UNINCORPORATED_ASSOCIATION = 'unincorporated_association';
    const STRUCTURE_UNINCORPORATED_NON_PROFIT = 'unincorporated_non_profit';

    const TAX_REPORTING_US_1099_K_ACTIVE = 'active';
    const TAX_REPORTING_US_1099_K_INACTIVE = 'inactive';
    const TAX_REPORTING_US_1099_K_PENDING = 'pending';

    const TAX_REPORTING_US_1099_MISC_ACTIVE = 'active';
    const TAX_REPORTING_US_1099_MISC_INACTIVE = 'inactive';
    const TAX_REPORTING_US_1099_MISC_PENDING = 'pending';

    const TRANSFERS_ACTIVE = 'active';
    const TRANSFERS_INACTIVE = 'inactive';
    const TRANSFERS_PENDING = 'pending';

    const TYPE_CUSTOM = 'custom';
    const TYPE_EXPRESS = 'express';
    const TYPE_STANDARD = 'standard';

    const WEEKLY_ANCHOR_FRIDAY = 'friday';
    const WEEKLY_ANCHOR_MONDAY = 'monday';
    const WEEKLY_ANCHOR_SATURDAY = 'saturday';
    const WEEKLY_ANCHOR_SUNDAY = 'sunday';
    const WEEKLY_ANCHOR_THURSDAY = 'thursday';
    const WEEKLY_ANCHOR_TUESDAY = 'tuesday';
    const WEEKLY_ANCHOR_WEDNESDAY = 'wednesday';

    use ApiOperations\Retrieve {
        retrieve as protected _retrieve;
    }

    public static function getSavedNestedResources()
    {
        static $savedNestedResources = null;
        if (null === $savedNestedResources) {
            $savedNestedResources = new Util\Set([
                'external_account',
                'bank_account',
            ]);
        }

        return $savedNestedResources;
    }

    public function instanceUrl()
    {
        if (null === $this['id']) {
            return '/v1/account';
        }

        return parent::instanceUrl();
    }

    public function serializeParameters($force = false)
    {
        $update = parent::serializeParameters($force);
        if (isset($this->_values['legal_entity'])) {
            $entity = $this['legal_entity'];
            if (isset($entity->_values['additional_owners'])) {
                $owners = $entity['additional_owners'];
                $entityUpdate = isset($update['legal_entity']) ? $update['legal_entity'] : [];
                $entityUpdate['additional_owners'] = $this->serializeAdditionalOwners($entity, $owners);
                $update['legal_entity'] = $entityUpdate;
            }
        }
        if (isset($this->_values['individual'])) {
            $individual = $this['individual'];
            if (($individual instanceof Person) && !isset($update['individual'])) {
                $update['individual'] = $individual->serializeParameters($force);
            }
        }

        return $update;
    }

    private function serializeAdditionalOwners($legalEntity, $additionalOwners)
    {
        if (isset($legalEntity->_originalValues['additional_owners'])) {
            $originalValue = $legalEntity->_originalValues['additional_owners'];
        } else {
            $originalValue = [];
        }
        if (($originalValue) && (\count($originalValue) > \count($additionalOwners))) {
            throw new Exception\InvalidArgumentException(
                'You cannot delete an item from an array, you must instead set a new array'
            );
        }

        $updateArr = [];
        foreach ($additionalOwners as $i => $v) {
            $update = ($v instanceof StripeObject) ? $v->serializeParameters() : $v;

            if ($update !== []) {
                if (!$originalValue ||
                    !\array_key_exists($i, $originalValue) ||
                    ($update !== $legalEntity->serializeParamsValue($originalValue[$i], null, false, true))) {
                    $updateArr[$i] = $update;
                }
            }
        }

        return $updateArr;
    }

    /**
     * @param null|array|string $id the ID of the account to retrieve, or an
     *     options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public static function retrieve($id = null, $opts = null)
    {
        if (!$opts && \is_string($id) && 'sk_' === \substr($id, 0, 3)) {
            $opts = $id;
            $id = null;
        }

        return self::_retrieve($id, $opts);
    }

    /**
     * @param null|array $clientId
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject object containing the response from the API
     */
    public function deauthorize($clientId = null, $opts = null)
    {
        $params = [
            'client_id' => $clientId,
            'stripe_user_id' => $this->id,
        ];

        return OAuth::deauthorize($params, $opts);
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection the list of persons
     */
    public function persons($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/persons';
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Account the rejected account
     */
    public function reject($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reject';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /*
     * Capabilities methods
     * We can not add the capabilities() method today as the Account object already has a
     * capabilities property which is a hash and not the sub-list of capabilities.
     */

    const PATH_CAPABILITIES = '/capabilities';

    /**
     * @param string $id the ID of the account on which to retrieve the capabilities
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection the list of capabilities
     */
    public static function allCapabilities($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_CAPABILITIES, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the capability belongs
     * @param string $capabilityId the ID of the capability to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public static function retrieveCapability($id, $capabilityId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_CAPABILITIES, $capabilityId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the capability belongs
     * @param string $capabilityId the ID of the capability to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public static function updateCapability($id, $capabilityId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_CAPABILITIES, $capabilityId, $params, $opts);
    }

    const PATH_EXTERNAL_ACCOUNTS = '/external_accounts';

    /**
     * @param string $id the ID of the account on which to retrieve the external accounts
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection the list of external accounts (BankAccount or Card)
     */
    public static function allExternalAccounts($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_EXTERNAL_ACCOUNTS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account on which to create the external account
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function createExternalAccount($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function deleteExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function retrieveExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function updateExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    const PATH_LOGIN_LINKS = '/login_links';

    /**
     * @param string $id the ID of the account on which to create the login link
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\LoginLink
     */
    public static function createLoginLink($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_LOGIN_LINKS, $params, $opts);
    }

    const PATH_PERSONS = '/persons';

    /**
     * @param string $id the ID of the account on which to retrieve the persons
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection the list of persons
     */
    public static function allPersons($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_PERSONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account on which to create the person
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function createPerson($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_PERSONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function deletePerson($id, $personId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_PERSONS, $personId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function retrievePerson($id, $personId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_PERSONS, $personId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function updatePerson($id, $personId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_PERSONS, $personId, $params, $opts);
    }
}
