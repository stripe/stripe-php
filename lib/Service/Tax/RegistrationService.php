<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RegistrationService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Tax <code>Registration</code> objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Tax\Registration>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax/registrations', $params, $opts);
    }

    /**
     * Creates a new Tax <code>Registration</code> object.
     *
     * @param null|array{active_from: array|int|string, country: string, country_options: array{ae?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, al?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, am?: array{type: string}, ao?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, at?: array{standard?: array{place_of_supply_scheme: string}, type: string}, au?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, aw?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, az?: array{type: string}, ba?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, bb?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, bd?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, be?: array{standard?: array{place_of_supply_scheme: string}, type: string}, bf?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, bg?: array{standard?: array{place_of_supply_scheme: string}, type: string}, bh?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, bj?: array{type: string}, bs?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, by?: array{type: string}, ca?: array{province_standard?: array{province: string}, type: string}, cd?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, ch?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, cl?: array{type: string}, cm?: array{type: string}, co?: array{type: string}, cr?: array{type: string}, cv?: array{type: string}, cy?: array{standard?: array{place_of_supply_scheme: string}, type: string}, cz?: array{standard?: array{place_of_supply_scheme: string}, type: string}, de?: array{standard?: array{place_of_supply_scheme: string}, type: string}, dk?: array{standard?: array{place_of_supply_scheme: string}, type: string}, ec?: array{type: string}, ee?: array{standard?: array{place_of_supply_scheme: string}, type: string}, eg?: array{type: string}, es?: array{standard?: array{place_of_supply_scheme: string}, type: string}, et?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, fi?: array{standard?: array{place_of_supply_scheme: string}, type: string}, fr?: array{standard?: array{place_of_supply_scheme: string}, type: string}, gb?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, ge?: array{type: string}, gn?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, gr?: array{standard?: array{place_of_supply_scheme: string}, type: string}, hr?: array{standard?: array{place_of_supply_scheme: string}, type: string}, hu?: array{standard?: array{place_of_supply_scheme: string}, type: string}, id?: array{type: string}, ie?: array{standard?: array{place_of_supply_scheme: string}, type: string}, in?: array{type: string}, is?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, it?: array{standard?: array{place_of_supply_scheme: string}, type: string}, jp?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, ke?: array{type: string}, kg?: array{type: string}, kh?: array{type: string}, kr?: array{type: string}, kz?: array{type: string}, la?: array{type: string}, lt?: array{standard?: array{place_of_supply_scheme: string}, type: string}, lu?: array{standard?: array{place_of_supply_scheme: string}, type: string}, lv?: array{standard?: array{place_of_supply_scheme: string}, type: string}, ma?: array{type: string}, md?: array{type: string}, me?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, mk?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, mr?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, mt?: array{standard?: array{place_of_supply_scheme: string}, type: string}, mx?: array{type: string}, my?: array{type: string}, ng?: array{type: string}, nl?: array{standard?: array{place_of_supply_scheme: string}, type: string}, no?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, np?: array{type: string}, nz?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, om?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, pe?: array{type: string}, ph?: array{type: string}, pl?: array{standard?: array{place_of_supply_scheme: string}, type: string}, pt?: array{standard?: array{place_of_supply_scheme: string}, type: string}, ro?: array{standard?: array{place_of_supply_scheme: string}, type: string}, rs?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, ru?: array{type: string}, sa?: array{type: string}, se?: array{standard?: array{place_of_supply_scheme: string}, type: string}, sg?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, si?: array{standard?: array{place_of_supply_scheme: string}, type: string}, sk?: array{standard?: array{place_of_supply_scheme: string}, type: string}, sn?: array{type: string}, sr?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, th?: array{type: string}, tj?: array{type: string}, tr?: array{type: string}, tz?: array{type: string}, ua?: array{type: string}, ug?: array{type: string}, us?: array{local_amusement_tax?: array{jurisdiction: string}, local_lease_tax?: array{jurisdiction: string}, state: string, state_sales_tax?: array{elections: array{jurisdiction?: string, type: string}[]}, type: string}, uy?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, uz?: array{type: string}, vn?: array{type: string}, za?: array{standard?: array{place_of_supply_scheme?: string}, type: string}, zm?: array{type: string}, zw?: array{standard?: array{place_of_supply_scheme?: string}, type: string}}, expand?: string[], expires_at?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Registration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/registrations', $params, $opts);
    }

    /**
     * Returns a Tax <code>Registration</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Registration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax/registrations/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing Tax <code>Registration</code> object.
     *
     * A registration cannot be deleted after it has been created. If you wish to end a
     * registration you may do so by setting <code>expires_at</code>.
     *
     * @param string $id
     * @param null|array{active_from?: array|int|string, expand?: string[], expires_at?: null|array|int|string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Registration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/tax/registrations/%s', $id), $params, $opts);
    }
}
