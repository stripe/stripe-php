<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InboundTransferMandateService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve a list of InboundTransferMandates for the authenticated compartment.
     *
     * @param null|array{credential?: string, limit?: int, status?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\InboundTransferMandate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/inbound_transfer_mandates', $params, $opts);
    }

    /**
     * Cancel a pending or active InboundTransferMandate.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\InboundTransferMandate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/inbound_transfer_mandates/%s/cancel', $id), $params, $opts);
    }

    /**
     * Create an InboundTransferMandate for a v2 credential. If a pending or active
     * mandate already exists for the same user and credential, return that mandate
     * instead of creating another one. The existing mandate's reference and acceptance
     * evidence are preserved. Retry with the same idempotency key to replay a
     * successful creation. In a Sandbox or test mode, use bacs.reference_prefix to
     * simulate Bacs mandate outcomes. See the parameter description for supported
     * values.
     *
     * @param null|array{au_becs?: array{lodgement_reference_prefix?: string}, bacs?: array{reference_prefix?: string}, credential: string, type: string, user_accepted_details?: array{accepted_at?: string, online?: array{ip_address?: string, user_agent?: string}, type?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\InboundTransferMandate
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     * @throws \Stripe\Exception\ServiceUnavailableException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/inbound_transfer_mandates', $params, $opts);
    }

    /**
     * Retrieve an InboundTransferMandate by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\InboundTransferMandate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/inbound_transfer_mandates/%s', $id), $params, $opts);
    }
}
