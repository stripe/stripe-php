<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @property RewardPrograms\RuleService $rules
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RewardProgramService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'rules' => RewardPrograms\RuleService::class,
    ];

    /**
     * Activates a RewardProgram, making it eligible for reward evaluation. Idempotent:
     * calling this on a RewardProgram that is already active returns 200 with the
     * current object unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgram
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s/activate', $id), $params, $opts);
    }

    /**
     * Returns a list of RewardPrograms.
     *
     * @param null|array{limit?: int, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\RewardProgram>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/reward_programs', $params, $opts);
    }

    /**
     * Creates a new RewardProgram. RewardPrograms are inactive by default on creation;
     * use ActivateRewardProgram to make them eligible for reward evaluation.
     *
     * @param null|array{fulfilled_by: string, name: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgram
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/reward_programs', $params, $opts);
    }

    /**
     * Deactivates a RewardProgram. Idempotent: calling this on a RewardProgram that is
     * already inactive returns 200 with the current object unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgram
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s/deactivate', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an existing RewardProgram.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgram
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/reward_programs/%s', $id), $params, $opts);
    }

    /**
     * Updates the mutable fields of an existing RewardProgram. Use
     * ActivateRewardProgram / DeactivateRewardProgram to change the RewardProgram's
     * status.
     *
     * @param string $id
     * @param null|array{name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgram
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
