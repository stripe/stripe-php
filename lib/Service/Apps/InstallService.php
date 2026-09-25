<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Apps;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InstallService extends \Stripe\Service\AbstractService
{
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
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Apps\Install>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/apps/installs', $params, $opts);
    }

    /**
     * Creates an app install. An account installs its own private app with its own
     * key; public and testing installs are made from the Dashboard. An app developer
     * or embedding platform acting on a connected account through
     * <code>Stripe-Account</code> installs or reinstalls its app there. Creating an
     * install for a private app that is already installed at the channel’s current
     * version with nothing pending returns the existing install.
     *
     * @param null|array{app: string, channel?: string, code_challenge?: string, code_challenge_method?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Install
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/apps/installs', $params, $opts);
    }

    /**
     * Retrieves an app install. The installing account, the app’s developer (with the
     * keys of the account that owns the app or of the app’s managed sandbox), and the
     * embedding platform that created the install can retrieve it.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Install
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/apps/installs/%s', $id), $params, $opts);
    }

    /**
     * Uninstalls an app from the account that installed it.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Install
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function uninstall($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/apps/installs/%s/uninstall', $id), $params, $opts);
    }

    /**
     * Reauthorizes an app install. The installer grants the permissions, content
     * security policy entries, and endpoints that the latest published version of the
     * app requests. An account reauthorizes its own installs on any channel with its
     * own key; app developers and embedding platforms reauthorize installs on
     * connected accounts through <code>Stripe-Account</code>. For private apps,
     * install a new version from the Dashboard to grant its permissions.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Install
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/apps/installs/%s', $id), $params, $opts);
    }
}
