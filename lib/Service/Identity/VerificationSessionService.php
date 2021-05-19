<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Identity;

class VerificationSessionService extends \Stripe\Service\AbstractService
{
    /**
     * List all verification sessions. Can optionally provide a status to return only
     * VerificationSessions with that status. Can optionally specify a query filter on
     * created timestamp.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/identity/verification_sessions', $params, $opts);
    }

    /**
     * Mark a VerificationSession as canceled.
     *
     * If the VerificationSession is in the <code>processing</code> state, you must
     * wait until it finishes before cancelling it.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Identity\VerificationSession
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/identity/verification_sessions/%s/cancel', $id), $params, $opts);
    }

    /**
     * Create a new VerificationSession to begin the verification process.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Identity\VerificationSession
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/identity/verification_sessions', $params, $opts);
    }

    /**
     * Redact a VerificationSession to delete all collected information from Stripe.
     * This will redact the VerificationSession and all objects related to it,
     * including VerificationReports, Events, Files, request logs, etc. This redaction
     * process may take up to four days. When the redaction process is in progress, the
     * VerificationSession’s <code>redaction.status</code> field will be set to
     * <code>processing</code>; when the process is finished, it will change to
     * <code>redacted</code>.
     *
     * Redaction is irreversible. Redacted objects are still accessible in the Stripe
     * API, but all the fields that contain personal data will be replaced by the
     * string <code>[redacted]</code> or a similar placeholder. The
     * <code>metadata</code> field will also be erased. Redacted objects cannot be
     * updated or used for any purpose.
     *
     * If the VerificationSession is in the <code>processing</code> state, you must
     * wait until it finishes before redacting it. Redacting a VerificationSession in
     * <code>requires_action</code> state will automatically <a
     * href="/docs/api/verification_sessions/cancel">cancel</a> it.
     *
     * An <a
     * href="/docs/api/events/types#event_types-identity.verification_session.redacted"><code>identity.verification_session.redacted</code></a>
     * webhook will be sent when a VerificationSession is redacted.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Identity\VerificationSession
     */
    public function redact($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/identity/verification_sessions/%s/redact', $id), $params, $opts);
    }

    /**
     * Retrieves an existing VerificationSession. When the session <code>status</code>
     * is <code>requires_input</code>, this method guarantees that the redirect
     * <code>url</code> is fresh: if your user has previously visited this session, a
     * new <code>url</code> will be returned. Before redirecting your user to Stripe,
     * ensure that you have just Created or Retrieved the VerificationSession; never
     * cache or store the <code>url</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Identity\VerificationSession
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/identity/verification_sessions/%s', $id), $params, $opts);
    }

    /**
     * Update properties on a VerificationSession.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Identity\VerificationSession
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/identity/verification_sessions/%s', $id), $params, $opts);
    }
}
