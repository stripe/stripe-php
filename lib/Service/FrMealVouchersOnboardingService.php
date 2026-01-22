<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FrMealVouchersOnboardingService extends AbstractService
{
    /**
     * Lists French Meal Vouchers Onboarding objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\FrMealVouchersOnboarding>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/fr_meal_vouchers_onboardings', $params, $opts);
    }

    /**
     * Creates a French Meal Vouchers Onboarding object that represents a restaurant’s
     * onboarding status and starts the onboarding process.
     *
     * @param null|array{expand?: string[], metadata?: array<string, string>, name: string, postal_code: string, siret: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FrMealVouchersOnboarding
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/fr_meal_vouchers_onboardings', $params, $opts);
    }

    /**
     * Retrieves the details of a French Meal Vouchers Onboarding object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FrMealVouchersOnboarding
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/fr_meal_vouchers_onboardings/%s', $id), $params, $opts);
    }

    /**
     * Updates the details of a restaurant’s French Meal Vouchers Onboarding object.
     *
     * @param string $id
     * @param null|array{expand?: string[], postal_code: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FrMealVouchersOnboarding
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/fr_meal_vouchers_onboardings/%s', $id), $params, $opts);
    }
}
