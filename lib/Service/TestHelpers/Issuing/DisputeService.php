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
     * Test helper: closes a test-mode Issuing dispute as won or lost.
     *
     * @param string $id
     * @param null|array{expand?: string[], status: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/disputes/%s/close', $id), $params, $opts);
    }

    /**
     * Test helper: overrides the <code>grant_deadline</code> and
     * <code>revocable_after</code> timestamps on a test-mode Issuing dispute’s
     * provisional credit, allowing tests to simulate timer-driven status transitions
     * without waiting for real regulatory deadlines to pass.
     *
     * @param string $id
     * @param null|array{expand?: string[], grant_deadline?: int, revocable_after?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function provisionalCredit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/disputes/%s/provisional_credit', $id), $params, $opts);
    }

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
