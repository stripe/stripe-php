<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Privacy;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RedactionJobService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of redaction jobs.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Privacy\RedactionJob>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/privacy/redaction_jobs', $params, $opts);
    }

    /**
     * Returns a list of validation errors for the specified redaction job.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Privacy\RedactionJobValidationError>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allValidationErrors($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/privacy/redaction_jobs/%s/validation_errors', $parentId), $params, $opts);
    }

    /**
     * You can cancel a redaction job when it’s in one of these statuses:
     * <code>ready</code>, <code>failed</code>.
     *
     * Canceling the redaction job will abandon its attempt to redact the configured
     * objects. A canceled job cannot be used again.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Privacy\RedactionJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/privacy/redaction_jobs/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a redaction job. When a job is created, it will start to validate.
     *
     * @param null|array{expand?: string[], objects: array{charges?: string[], checkout_sessions?: string[], customers?: string[], identity_verification_sessions?: string[], invoices?: string[], issuing_cardholders?: string[], issuing_cards?: string[], payment_intents?: string[], radar_value_list_items?: string[], setup_intents?: string[]}, validation_behavior?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Privacy\RedactionJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/privacy/redaction_jobs', $params, $opts);
    }

    /**
     * Retrieves the details of a previously created redaction job.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Privacy\RedactionJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/privacy/redaction_jobs/%s', $id), $params, $opts);
    }

    /**
     * Run a redaction job in a <code>ready</code> status.
     *
     * When you run a job, the configured objects will be redacted asynchronously. This
     * action is irreversible and cannot be canceled once started.
     *
     * The status of the job will move to <code>redacting</code>. Once all of the
     * objects are redacted, the status will become <code>succeeded</code>. If the
     * job’s <code>validation_behavior</code> is set to <code>fix</code>, the automatic
     * fixes will be applied to objects at this step.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Privacy\RedactionJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function run($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/privacy/redaction_jobs/%s/run', $id), $params, $opts);
    }

    /**
     * Updates the properties of a redaction job without running or canceling the job.
     *
     * If the job to update is in a <code>failed</code> status, it will not
     * automatically start to validate. Once you applied all of the changes, use the
     * validate API to start validation again.
     *
     * @param string $id
     * @param null|array{expand?: string[], validation_behavior?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Privacy\RedactionJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/privacy/redaction_jobs/%s', $id), $params, $opts);
    }

    /**
     * Validate a redaction job when it is in a <code>failed</code> status.
     *
     * When a job is created, it automatically begins to validate on the configured
     * objects’ eligibility for redaction. Use this to validate the job again after its
     * validation errors are resolved or the job’s <code>validation_behavior</code> is
     * changed.
     *
     * The status of the job will move to <code>validating</code>. Once all of the
     * objects are validated, the status of the job will become <code>ready</code>. If
     * there are any validation errors preventing the job from running, the status will
     * become <code>failed</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Privacy\RedactionJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function validate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/privacy/redaction_jobs/%s/validate', $id), $params, $opts);
    }
}
