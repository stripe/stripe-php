<?php

// File generated from our OpenAPI spec

namespace Stripe\Identity;

/**
 * A BlocklistEntry represents an entry in our identity verification blocklist.
 * It helps prevent fraudulent users from repeatedly attempting verification with similar information.
 * When you create a BlocklistEntry, we store data from a specified VerificationReport,
 * such as document details or facial biometrics.
 * This allows us to compare future verification attempts against these entries.
 * If a match is found, we categorize the new verification as unverified.
 *
 * To learn more, see <a href="https://docs.stripe.com/identity/review-tools#block-list">Identity Verification Blocklist</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $disabled_at Time at which you disabled the BlocklistEntry. Measured in seconds since the Unix epoch.
 * @property null|int $expires_at Time at which the BlocklistEntry expires. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The current status of the BlocklistEntry.
 * @property string $type The type of BlocklistEntry.
 * @property null|string|VerificationReport $verification_report The verification report the BlocklistEntry was created from.
 * @property null|string|VerificationSession $verification_session The verification session the BlocklistEntry was created from.
 */
class BlocklistEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'identity.blocklist_entry';

    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';
    const STATUS_REDACTED = 'redacted';

    const TYPE_DOCUMENT = 'document';
    const TYPE_SELFIE = 'selfie';

    /**
     * Creates a BlocklistEntry object from a verification report.
     *
     * A blocklist entry prevents future identity verifications that match the same
     * identity information. You can create blocklist entries from verification reports
     * that contain document extracted data or a selfie.
     *
     * Related guide: <a
     * href="/docs/identity/review-tools#add-a-blocklist-entry">Identity Verification
     * Blocklist</a>
     *
     * @param null|array{check_existing_verifications?: bool, entry_type: string, expand?: string[], verification_report: string} $params
     * @param null|array|string $options
     *
     * @return BlocklistEntry the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of BlocklistEntry objects associated with your account.
     *
     * The blocklist entries are returned sorted by creation date, with the most
     * recently created entries appearing first.
     *
     * Related guide: <a href="/docs/identity/review-tools#block-list">Identity
     * Verification Blocklist</a>
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string, type?: string, verification_report?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<BlocklistEntry> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a BlocklistEntry object by its identifier.
     *
     * Related guide: <a href="/docs/identity/review-tools#block-list">Identity
     * Verification Blocklist</a>
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return BlocklistEntry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return BlocklistEntry the disabled blocklist entry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function disable($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/disable';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
