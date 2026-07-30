<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Signals;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountActivityService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new account activity to report account registration, login, or
     * evaluation follow-up activity.
     *
     * @param null|array{account_details?: array{account?: string, customer?: string, data?: array{defaults?: array{profile: array{business_url: string, doing_business_as?: string, product_description?: string}}, identity?: array{business_details: array{registered_name?: string}}}}, account_evaluation?: string, login_attempt?: array{client_details: array{data?: array{ip: string, referrer?: string, user_agent?: string}, radar_session?: string}}, login_decision?: array{status: string}, occurred_at?: string, registration_attempt?: array{client_details: array{data?: array{ip: string, referrer?: string, user_agent?: string}, radar_session?: string}}, registration_decision?: array{status: string}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\AccountActivity
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/signals/account_activity', $params, $opts);
    }

    /**
     * Deletes an AccountActivity by its ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\DeletedObject
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v2/signals/account_activity/%s', $id), $params, $opts);
    }

    /**
     * Retrieves an AccountActivity by its ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\AccountActivity
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/signals/account_activity/%s', $id), $params, $opts);
    }
}
