<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DisputeService extends \Stripe\Service\AbstractService
{
    /**
     * Test helper: populates <code>network_lifecycle.dispute_response</code> on a
     * test-mode Visa Issuing Dispute using placeholder file tokens. Only supported for
     * Visa disputes.
     *
     * @param string $id
     * @param null|array{expand?: string[], merchant_evidence_files: array{number_to_generate: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function simulateNetworkLifecycleDisputeResponse($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/disputes/%s/simulate_network_lifecycle_dispute_response', $id), $params, $opts);
    }

    /**
     * Test helper: populates <code>network_lifecycle.pre_arbitration_response</code>
     * on a test-mode Visa Issuing Dispute using placeholder file tokens. Only
     * supported for Visa disputes in the collaboration flow.
     *
     * @param string $id
     * @param null|array{expand?: string[], merchant_evidence_files: array{number_to_generate: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function simulateNetworkLifecyclePreArbitrationResponse($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/disputes/%s/simulate_network_lifecycle_pre_arbitration_response', $id), $params, $opts);
    }

    /**
     * Test helper: populates <code>network_lifecycle.pre_arbitration_submission</code>
     * on a test-mode Visa Issuing Dispute using placeholder file tokens. Only
     * supported for Visa disputes.
     *
     * @param string $id
     * @param null|array{expand?: string[], merchant_evidence_files: array{number_to_generate: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function simulateNetworkLifecyclePreArbitrationSubmission($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/disputes/%s/simulate_network_lifecycle_pre_arbitration_submission', $id), $params, $opts);
    }
}
