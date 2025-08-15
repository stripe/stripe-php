<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Accounts. Note that the `include` parameter cannot be passed
     * in on list requests.
     *
     * @param null|array{applied_configurations?: string[], limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Account>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/accounts', $params, $opts);
    }

    /**
     * Closes and removes access to the Account and its associated resources.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/accounts/%s/close', $id), $params, $opts);
    }

    /**
     * Creates an Account. You can optionally provide information about the associated
     * Legal Entity, such as name and business type. The Account can also be configured
     * as a recipient of OutboundPayments by requesting Features on the recipient
     * configuration.
     *
     * @param null|array{configuration?: array{recipient_data?: array{features: array{bank_accounts?: array{local?: array{requested: bool}, wire?: array{requested: bool}}, cards?: array{requested: bool}}}}, email?: string, include?: string[], legal_entity_data?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, business_type?: string, country: string, name?: string, representative?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: array{day: int, month: int, year: int}, given_name?: string, surname?: string}}, metadata?: array<string, string>, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/accounts', $params, $opts);
    }

    /**
     * Retrieves the details of an Account.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates the details of an Account. You can also optionally provide or update the
     * details of the associated Legal Entity and recipient configuration.
     *
     * @param string $id
     * @param null|array{configuration?: array{recipient_data?: array{default_outbound_destination?: null|string, features?: array{bank_accounts?: array{local?: array{requested?: bool}, wire?: array{requested?: bool}}, cards?: array{requested?: bool}}}}, email?: string, include?: string[], legal_entity_data?: array{address?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, business_type?: null|string, country?: null|string, name?: null|string, representative?: null|array{address?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, dob?: null|array{day: int, month: int, year: int}, given_name?: null|string, surname?: null|string}}, metadata?: array<string, null|string>, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/accounts/%s', $id), $params, $opts);
    }
}
