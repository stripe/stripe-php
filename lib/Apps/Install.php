<?php

// File generated from our OpenAPI spec

namespace Stripe\Apps;

/**
 * An app install represents a Stripe App that is installed on an account. It reports the permissions,
 * content security policy entries, and endpoints that the installing account has authorized, along with any
 * that the app's latest version requests but the account has not authorized yet. Use the Install API to
 * install, reauthorize, and uninstall apps, and to check the state of existing installs.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The ID of the account that the app install belongs to.
 * @property string $app The ID of the app installed.
 * @property bool $approval_required Whether the installer must authorize pending permissions, content security policy entries, or endpoints. For private apps, <code>approval_required</code> stays <code>false</code>. Install a new version from the Dashboard to grant its permissions.
 * @property null|string $auth_code The authorization code for an oauth app install.
 * @property string $channel The distribution channel associated with the app install.
 * @property (object{connect_src: string[], image_src: string[]}&\Stripe\StripeObject) $content_security_policy_granted
 * @property (object{connect_src: string[], image_src: string[]}&\Stripe\StripeObject) $content_security_policy_pending
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $created_by The ID of the embedding platform that created the install, if applicable.
 * @property string[] $endpoints_granted The endpoint URLs authorized by the installer.
 * @property string[] $endpoints_pending The endpoint URLs requested by the latest app version that the installer has not authorized.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string[] $permissions_granted The permissions authorized by the installer.
 * @property string[] $permissions_pending The permissions requested by the latest app version that the installer has not authorized.
 * @property string $status The status of the app install.
 */
class Install extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'apps.install';

    use \Stripe\ApiOperations\Update;

    const CHANNEL_PRIVATE_LIVE = 'private_live';
    const CHANNEL_PRIVATE_TEST = 'private_test';
    const CHANNEL_PUBLIC = 'public';
    const CHANNEL_REVIEW = 'review';
    const CHANNEL_TESTING = 'testing';

    const STATUS_INSTALLED = 'installed';
    const STATUS_INSTALLING = 'installing';
    const STATUS_INSTALL_FAILED = 'install_failed';
    const STATUS_UNINSTALLING = 'uninstalling';
    const STATUS_UNINSTALL_FAILED = 'uninstall_failed';

    /**
     * Creates an app install. An account installs its own private app with its own
     * key; public and testing installs are made from the Dashboard. An app developer
     * or embedding platform acting on a connected account through
     * <code>Stripe-Account</code> installs or reinstalls its app there. Creating an
     * install for a private app that is already installed at the channel’s current
     * version with nothing pending returns the existing install.
     *
     * @param null|array{app: string, channel?: string, code_challenge?: string, code_challenge_method?: string, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return Install the created resource
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
     * Returns a list of app installs. An app developer or embedding platform filtering
     * by its own app sees the installs across the accounts that installed it; other
     * callers see the installs on their own account. The key selects the environment:
     * a live key lists live installs, a sandbox API key lists the installs on that
     * sandbox, and the key of an app’s managed sandbox filtering by <code>app</code>
     * lists that app’s installs across every sandbox. For existing accounts that still
     * use legacy test mode, a test mode key lists legacy test mode installs.
     *
     * @param null|array{account?: string, app?: string, approval_required?: bool, channel?: string, created?: array|int, created_by?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Install> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an app install. The installing account, the app’s developer (with the
     * keys of the account that owns the app or of the app’s managed sandbox), and the
     * embedding platform that created the install can retrieve it.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Install
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
     * Reauthorizes an app install. The installer grants the permissions, content
     * security policy entries, and endpoints that the latest published version of the
     * app requests. An account reauthorizes its own installs on any channel with its
     * own key; app developers and embedding platforms reauthorize installs on
     * connected accounts through <code>Stripe-Account</code>. For private apps,
     * install a new version from the Dashboard to grant its permissions.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[]} $params
     * @param null|array|string $opts
     *
     * @return Install the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Install the uninstalled install
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function uninstall($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/uninstall';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
