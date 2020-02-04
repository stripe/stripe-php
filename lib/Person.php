<?php

namespace Stripe;

/**
 * Class Person
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property string $account
 * @property \Stripe\StripeObject $address
 * @property \Stripe\StripeObject|null $address_kana
 * @property \Stripe\StripeObject|null $address_kanji
 * @property int $created
 * @property bool $deleted
 * @property \Stripe\StripeObject $dob
 * @property string|null $email
 * @property string|null $first_name
 * @property string|null $first_name_kana
 * @property string|null $first_name_kanji
 * @property string|null $gender
 * @property bool $id_number_provided
 * @property string|null $last_name
 * @property string|null $last_name_kana
 * @property string|null $last_name_kanji
 * @property string|null $maiden_name
 * @property \Stripe\StripeObject $metadata
 * @property string|null $phone
 * @property \Stripe\StripeObject $relationship
 * @property \Stripe\StripeObject|null $requirements
 * @property bool $ssn_last_4_provided
 * @property \Stripe\StripeObject $verification
 */
class Person extends ApiResource
{
    const OBJECT_NAME = 'person';

    use ApiOperations\Delete;
    use ApiOperations\Update;

    /**
     * Possible string representations of a person's gender.
     * @link https://stripe.com/docs/api/persons/object#person_object-gender
     */
    const GENDER_MALE   = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * Possible string representations of a person's verification status.
     * @link https://stripe.com/docs/api/persons/object#person_object-verification-status
     */
    const VERIFICATION_STATUS_PENDING    = 'pending';
    const VERIFICATION_STATUS_UNVERIFIED = 'unverified';
    const VERIFICATION_STATUS_VERIFIED   = 'verified';

    /**
     * @return string The API URL for this Stripe account reversal.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $account = $this['account'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                "Could not determine which URL to request: " .
                "class instance has invalid ID: $id",
                null
            );
        }
        $id = Util\Util::utf8($id);
        $account = Util\Util::utf8($account);

        $base = Account::classUrl();
        $accountExtn = \urlencode($account);
        $extn = \urlencode($id);
        return "$base/$accountExtn/persons/$extn";
    }

    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = "Persons cannot be retrieved without an account ID. Retrieve " .
               "a person using `Account::retrievePerson('account_id', " .
               "'person_id')`.";
        throw new Exception\BadMethodCallException($msg, null);
    }

    /**
     * @param string $_id
     * @param array|null $_params
     * @param array|string|null $_options
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function update($_id, $_params = null, $_options = null)
    {
        $msg = "Persons cannot be updated without an account ID. Update " .
               "a person using `Account::updatePerson('account_id', " .
               "'person_id', \$updateParams)`.";
        throw new Exception\BadMethodCallException($msg, null);
    }
}
