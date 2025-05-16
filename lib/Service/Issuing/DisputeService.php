<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DisputeService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>Dispute</code> objects. The objects are sorted
     * in descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string, transaction?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Dispute>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/disputes', $params, $opts);
    }

    /**
     * Creates an Issuing <code>Dispute</code> object. Individual pieces of evidence
     * within the <code>evidence</code> object are optional at this point. Stripe only
     * validates that required evidence is present during submission. Refer to <a
     * href="/docs/issuing/purchases/disputes#dispute-reasons-and-evidence">Dispute
     * reasons and evidence</a> for more details about evidence requirements.
     *
     * @param null|array{amount?: int, evidence?: array{canceled?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_policy_provided?: null|bool, cancellation_reason?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string, return_status?: null|string, returned_at?: null|int}, duplicate?: null|array{additional_documentation?: null|string, card_statement?: null|string, cash_receipt?: null|string, check_image?: null|string, explanation?: null|string, original_transaction?: string}, fraudulent?: null|array{additional_documentation?: null|string, explanation?: null|string}, merchandise_not_as_described?: null|array{additional_documentation?: null|string, explanation?: null|string, received_at?: null|int, return_description?: null|string, return_status?: null|string, returned_at?: null|int}, no_valid_authorization?: null|array{additional_documentation?: null|string, explanation?: null|string}, not_received?: null|array{additional_documentation?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string}, other?: null|array{additional_documentation?: null|string, explanation?: null|string, product_description?: null|string, product_type?: null|string}, reason?: string, service_not_as_described?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_reason?: null|string, explanation?: null|string, received_at?: null|int}}, expand?: string[], metadata?: array<string, string>, transaction?: string, treasury?: array{received_debit: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/disputes', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Dispute</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/disputes/%s', $id), $params, $opts);
    }

    /**
     * Submits an Issuing <code>Dispute</code> to the card network. Stripe validates
     * that all evidence fields required for the dispute’s reason are present. For more
     * details, see <a
     * href="/docs/issuing/purchases/disputes#dispute-reasons-and-evidence">Dispute
     * reasons and evidence</a>.
     *
     * @param string $id
     * @param null|array{expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/disputes/%s/submit', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing <code>Dispute</code> object by setting the values
     * of the parameters passed. Any parameters not provided will be left unchanged.
     * Properties on the <code>evidence</code> object can be unset by passing in an
     * empty string.
     *
     * @param string $id
     * @param null|array{amount?: int, evidence?: array{canceled?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_policy_provided?: null|bool, cancellation_reason?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string, return_status?: null|string, returned_at?: null|int}, duplicate?: null|array{additional_documentation?: null|string, card_statement?: null|string, cash_receipt?: null|string, check_image?: null|string, explanation?: null|string, original_transaction?: string}, fraudulent?: null|array{additional_documentation?: null|string, explanation?: null|string}, merchandise_not_as_described?: null|array{additional_documentation?: null|string, explanation?: null|string, received_at?: null|int, return_description?: null|string, return_status?: null|string, returned_at?: null|int}, no_valid_authorization?: null|array{additional_documentation?: null|string, explanation?: null|string}, not_received?: null|array{additional_documentation?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string}, other?: null|array{additional_documentation?: null|string, explanation?: null|string, product_description?: null|string, product_type?: null|string}, reason?: string, service_not_as_described?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_reason?: null|string, explanation?: null|string, received_at?: null|int}}, expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/disputes/%s', $id), $params, $opts);
    }
}
