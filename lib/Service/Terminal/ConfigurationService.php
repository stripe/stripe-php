<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Terminal;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ConfigurationService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of <code>Configuration</code> objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], is_account_default?: bool, limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Terminal\Configuration>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/terminal/configurations', $params, $opts);
    }

    /**
     * Creates a new <code>Configuration</code> object.
     *
     * @param null|array{bbpos_wisepos_e?: array{splashscreen?: null|string}, expand?: string[], name?: string, offline?: null|array{enabled: bool}, reboot_window?: array{end_hour: int, start_hour: int}, stripe_s700?: array{splashscreen?: null|string}, tipping?: null|array{aed?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, aud?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, bgn?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, cad?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, chf?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, czk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, dkk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, eur?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, gbp?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, hkd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, huf?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, jpy?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, mxn?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, myr?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nok?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nzd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, pln?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, ron?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sek?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sgd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, usd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}}, verifone_p400?: array{splashscreen?: null|string}, wifi?: null|array{enterprise_eap_peap?: array{ca_certificate_file?: string, password: string, ssid: string, username: string}, enterprise_eap_tls?: array{ca_certificate_file?: string, client_certificate_file: string, private_key_file: string, private_key_file_password?: string, ssid: string}, personal_psk?: array{password: string, ssid: string}, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/terminal/configurations', $params, $opts);
    }

    /**
     * Deletes a <code>Configuration</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/terminal/configurations/%s', $id), $params, $opts);
    }

    /**
     * Retrieves a <code>Configuration</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/terminal/configurations/%s', $id), $params, $opts);
    }

    /**
     * Updates a new <code>Configuration</code> object.
     *
     * @param string $id
     * @param null|array{bbpos_wisepos_e?: null|array{splashscreen?: null|string}, expand?: string[], name?: string, offline?: null|array{enabled: bool}, reboot_window?: null|array{end_hour: int, start_hour: int}, stripe_s700?: null|array{splashscreen?: null|string}, tipping?: null|array{aed?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, aud?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, bgn?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, cad?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, chf?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, czk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, dkk?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, eur?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, gbp?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, hkd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, huf?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, jpy?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, mxn?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, myr?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nok?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, nzd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, pln?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, ron?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sek?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, sgd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}, usd?: array{fixed_amounts?: int[], percentages?: int[], smart_tip_threshold?: int}}, verifone_p400?: null|array{splashscreen?: null|string}, wifi?: null|array{enterprise_eap_peap?: array{ca_certificate_file?: string, password: string, ssid: string, username: string}, enterprise_eap_tls?: array{ca_certificate_file?: string, client_certificate_file: string, private_key_file: string, private_key_file_password?: string, ssid: string}, personal_psk?: array{password: string, ssid: string}, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/configurations/%s', $id), $params, $opts);
    }
}
