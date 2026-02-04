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
     * Lists <code>French Meal Vouchers Onboarding</code> objects. The objects are
     * returned in sorted order, with the most recently created objects appearing
     * first.
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
     * Creates a <code>French Meal Vouchers Onboarding</code> object that represents a
     * restaurant’s onboarding status and starts the onboarding process.
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
     * Retrieves the details of a previously created <code>French Meal Vouchers
     * Onboarding</code> object.
     *
     * Supply the unique <code>French Meal Vouchers Onboarding</code> ID that was
     * returned from your previous request, and Stripe returns the corresponding
     * onboarding information.
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
     * Updates the details of a restaurant’s <code>French Meal Vouchers
     * Onboarding</code> object by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged. After you update the object, the
     * onboarding process automatically restarts.
     *
     * You can only update <code>French Meal Vouchers Onboarding</code> objects with
     * the <code>postal_code</code> field requirement in <code>past_due</code>.
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
