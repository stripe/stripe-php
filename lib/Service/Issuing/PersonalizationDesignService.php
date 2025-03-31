<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PersonalizationDesignService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of personalization design objects. The objects are sorted in
     * descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, lookup_keys?: string[], preferences?: array{is_default?: bool, is_platform_default?: bool}, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Issuing\PersonalizationDesign>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/personalization_designs', $params, $opts);
    }

    /**
     * Creates a personalization design object.
     *
     * @param null|array{card_logo?: string, carrier_text?: array{footer_body?: null|string, footer_title?: null|string, header_body?: null|string, header_title?: null|string}, expand?: string[], lookup_key?: string, metadata?: \Stripe\StripeObject, name?: string, physical_bundle: string, preferences?: array{is_default: bool}, transfer_lookup_key?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\PersonalizationDesign
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/personalization_designs', $params, $opts);
    }

    /**
     * Retrieves a personalization design object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\PersonalizationDesign
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/personalization_designs/%s', $id), $params, $opts);
    }

    /**
     * Updates a card personalization object.
     *
     * @param string $id
     * @param null|array{card_logo?: null|string, carrier_text?: null|array{footer_body?: null|string, footer_title?: null|string, header_body?: null|string, header_title?: null|string}, expand?: string[], lookup_key?: null|string, metadata?: \Stripe\StripeObject, name?: null|string, physical_bundle?: string, preferences?: array{is_default: bool}, transfer_lookup_key?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\PersonalizationDesign
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/personalization_designs/%s', $id), $params, $opts);
    }
}
