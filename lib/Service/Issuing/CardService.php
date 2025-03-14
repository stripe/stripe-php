<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CardService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>Card</code> objects. The objects are sorted in
     * descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array{cardholder?: string, created?: array|int, ending_before?: string, exp_month?: int, exp_year?: int, expand?: string[], last4?: string, limit?: int, personalization_design?: string, starting_after?: string, status?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Card>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/cards', $params, $opts);
    }

    /**
     * Creates an Issuing <code>Card</code> object.
     *
     * @param null|array{cardholder?: string, currency: string, expand?: string[], financial_account?: string, metadata?: \Stripe\StripeObject, personalization_design?: string, pin?: array{encrypted_number?: string}, replacement_for?: string, replacement_reason?: string, second_line?: null|string, shipping?: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, address_validation?: array{mode: string}, customs?: array{eori_number?: string}, name: string, phone_number?: string, require_signature?: bool, service?: string, type?: string}, spending_controls?: array{allowed_categories?: string[], allowed_merchant_countries?: string[], blocked_categories?: string[], blocked_merchant_countries?: string[], spending_limits?: array{amount: int, categories?: string[], interval: string}[]}, status?: string, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/cards', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Card</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/cards/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing <code>Card</code> object by setting the values of
     * the parameters passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array{cancellation_reason?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, personalization_design?: string, pin?: array{encrypted_number?: string}, shipping?: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, address_validation?: array{mode: string}, customs?: array{eori_number?: string}, name: string, phone_number?: string, require_signature?: bool, service?: string, type?: string}, spending_controls?: array{allowed_categories?: string[], allowed_merchant_countries?: string[], blocked_categories?: string[], blocked_merchant_countries?: string[], spending_limits?: array{amount: int, categories?: string[], interval: string}[]}, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/cards/%s', $id), $params, $opts);
    }
}
