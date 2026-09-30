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
     * Returns a list of app installs. An app developer filtering by its own app with
     * its own key sees that app’s installs across the accounts that installed it. An
     * app developer acting on a connected account through <code>Stripe-Account</code>
     * and filtering by its app sees that account’s installs of the app, and an
     * embedding platform acting on a connected account sees only the installs it
     * created there. Other callers see the installs on their own account. A live key
     * lists live installs and a test key lists test installs; the key of an app’s
     * managed sandbox filtering by <code>app</code> lists that app’s installs across
     * every sandbox.
     *
     * @param null|array{account?: string, app?: string, approval_required?: bool, channel?: string, created?: array{gt?: int, gte?: int, lt?: int, lte?: int}|int, created_by?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
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
     * acting on a connected account through <code>Stripe-Account</code> installs or
     * reinstalls its app there, and an embedding platform can do the same once the
     * app’s developer approves its request to embed the app. For a private app,
     * creating an install installs the newest completed upload; when that version is
     * already installed with nothing pending, the existing install is returned.
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
     * security policy entries, and endpoints that the version being installed
     * requests. An account reauthorizes its own installs on any channel with its own
     * key, which grants all of that access, so only give
     * <code>app_install_write</code> to keys that may approve an app’s access. App
     * developers and embedding platforms reauthorize installs on connected accounts
     * through <code>Stripe-Account</code>. An app developer can’t grant new access. An
     * embedding platform can grant new access only once the app’s developer approves
     * its request to embed the app. For private apps, the version being installed is
     * the newest completed upload.
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
