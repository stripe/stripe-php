<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CreditUnderwritingRecordService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of <code>CreditUnderwritingRecord</code> objects. The objects
     * are sorted in descending order by creation date, with the most-recently-created
     * object appearing first.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\CreditUnderwritingRecord>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/credit_underwriting_records', $params, $opts);
    }

    /**
     * Update a <code>CreditUnderwritingRecord</code> object to correct mistakes.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord
     */
    public function correct($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/credit_underwriting_records/%s/correct', $id), $params, $opts);
    }

    /**
     * Creates a <code>CreditUnderwritingRecord</code> object with information about a
     * credit application submission.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord
     */
    public function createFromApplication($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/credit_underwriting_records/create_from_application', $params, $opts);
    }

    /**
     * Creates a <code>CreditUnderwritingRecord</code> object from an underwriting
     * decision coming from a proactive review of an existing accountholder.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord
     */
    public function createFromProactiveReview($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/credit_underwriting_records/create_from_proactive_review', $params, $opts);
    }

    /**
     * Update a <code>CreditUnderwritingRecord</code> object from a decision made on a
     * credit application.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord
     */
    public function reportDecision($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/credit_underwriting_records/%s/report_decision', $id), $params, $opts);
    }

    /**
     * Retrieves a <code>CreditUnderwritingRecord</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/credit_underwriting_records/%s', $id), $params, $opts);
    }
}
