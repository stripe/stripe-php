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
     * List redaction jobs method...
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
     * List validation errors method.
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
     * Cancel redaction job method.
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
     * Create redaction job method.
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
     * Retrieve redaction job method.
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
     * Run redaction job method.
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
     * Update redaction job method.
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
     * Validate redaction job method.
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
