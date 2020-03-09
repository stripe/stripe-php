<?php

namespace Stripe;

/**
 * Class Capability.
 *
 * @property string $id
 * @property string $object
 * @property string $account
 * @property bool $requested
 * @property int $requested_at
 * @property \Stripe\StripeObject $requirements
 * @property string $status
 */
class Capability extends ApiResource
{
    const OBJECT_NAME = 'capability';

    use ApiOperations\Update;

    /**
     * Possible string representations of a capability's status.
     *
     * @see https://stripe.com/docs/api/capabilities/object#capability_object-status
     */
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
