<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This is an object representing a capability for a Stripe account.
 *
 * Related guide: <a href="https://stripe.com/docs/connect/account-capabilities">Account capabilities</a>
 *
 * @property string $id The identifier for the capability.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property Account|string $account The account for which the capability enables functionality.
 * @property null|(object{alternatives: null|(object{alternative_fields_due: string[], original_fields_due: string[]}&StripeObject)[], current_deadline: null|int, currently_due: string[], disabled_reason: null|string, errors: (object{code: string, reason: string, requirement: string}&StripeObject)[], eventually_due: string[], past_due: string[], pending_verification: string[]}&StripeObject) $future_requirements
 * @property bool $requested Whether the capability has been requested.
 * @property null|int $requested_at Time at which the capability was requested. Measured in seconds since the Unix epoch.
 * @property null|(object{alternatives: null|(object{alternative_fields_due: string[], original_fields_due: string[]}&StripeObject)[], current_deadline: null|int, currently_due: string[], disabled_reason: null|string, errors: (object{code: string, reason: string, requirement: string}&StripeObject)[], eventually_due: string[], past_due: string[], pending_verification: string[]}&StripeObject) $requirements
 * @property string $status The status of the capability.
 */
class Capability extends ApiResource
{
    const OBJECT_NAME = 'capability';

    const STATUS_ACTIVE = 'active';
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

        return "{$base}/{$accountExtn}/capabilities/{$extn}";
    }

    /**
     * @param array|string $_id
     * @param null|array|string $_opts
     *
     * @throws Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = 'Capabilities cannot be retrieved without an account ID. '
               . 'Retrieve a capability using `Account::retrieveCapability('
               . "'account_id', 'capability_id')`.";

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
        $msg = 'Capabilities cannot be updated without an account ID. '
               . 'Update a capability using `Account::updateCapability('
               . "'account_id', 'capability_id', \$updateParams)`.";

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
