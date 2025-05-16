<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CardholderService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>Cardholder</code> objects. The objects are
     * sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array{created?: array|int, email?: string, ending_before?: string, expand?: string[], limit?: int, phone_number?: string, starting_after?: string, status?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Cardholder>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/cardholders', $params, $opts);
    }

    /**
     * Creates a new Issuing <code>Cardholder</code> object that can be issued cards.
     *
     * @param null|array{billing: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}}, company?: array{tax_id?: string}, email?: string, expand?: string[], individual?: array{card_issuing?: array{user_terms_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, dob?: array{day: int, month: int, year: int}, first_name?: string, last_name?: string, verification?: array{document?: array{back?: string, front?: string}}}, metadata?: array<string, string>, name: string, phone_number?: string, preferred_locales?: string[], spending_controls?: array{allowed_categories?: string[], allowed_merchant_countries?: string[], blocked_categories?: string[], blocked_merchant_countries?: string[], spending_limits?: array{amount: int, categories?: string[], interval: string}[], spending_limits_currency?: string}, status?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Cardholder
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/cardholders', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Cardholder</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Cardholder
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/cardholders/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing <code>Cardholder</code> object by setting the
     * values of the parameters passed. Any parameters not provided will be left
     * unchanged.
     *
     * @param string $id
     * @param null|array{billing?: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}}, company?: array{tax_id?: string}, email?: string, expand?: string[], individual?: array{card_issuing?: array{user_terms_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, dob?: array{day: int, month: int, year: int}, first_name?: string, last_name?: string, verification?: array{document?: array{back?: string, front?: string}}}, metadata?: array<string, string>, phone_number?: string, preferred_locales?: string[], spending_controls?: array{allowed_categories?: string[], allowed_merchant_countries?: string[], blocked_categories?: string[], blocked_merchant_countries?: string[], spending_limits?: array{amount: int, categories?: string[], interval: string}[], spending_limits_currency?: string}, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Cardholder
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/cardholders/%s', $id), $params, $opts);
    }
}
