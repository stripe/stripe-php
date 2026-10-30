<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RewardProgramEnrollmentService extends \Stripe\Service\AbstractService
{
    /**
     * Activates a RewardProgramEnrollment. At most one RewardProgramEnrollment may be
     * active per Issuer Program globally, across all RewardPrograms. Idempotent:
     * calling this on a RewardProgramEnrollment that is already active returns 200
     * with the current object unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramEnrollment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_program_enrollments/%s/activate', $id), $params, $opts);
    }

    /**
     * Returns a list of RewardProgramEnrollments. Omitting `reward_program` returns
     * platform-wide enrollments across all RewardPrograms.
     *
     * @param null|array{limit?: int, reward_program?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\RewardProgramEnrollment>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/reward_program_enrollments', $params, $opts);
    }

    /**
     * Creates a new RewardProgramEnrollment, binding a connected account / Issuer
     * Program to a RewardProgram. RewardProgramEnrollments are active by default on
     * creation.
     *
     * @param null|array{account: string, card_spend: array{issuer_program: string}, reward_program: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramEnrollment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/reward_program_enrollments', $params, $opts);
    }

    /**
     * Deactivates a RewardProgramEnrollment. Idempotent: calling this on a
     * RewardProgramEnrollment that is already inactive returns 200 with the current
     * object unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramEnrollment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_program_enrollments/%s/deactivate', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an existing RewardProgramEnrollment.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramEnrollment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/reward_program_enrollments/%s', $id), $params, $opts);
    }
}
