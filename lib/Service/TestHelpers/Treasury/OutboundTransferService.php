<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Treasury;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OutboundTransferService extends \Stripe\Service\AbstractService
{
    /**
     * Transitions a test mode created OutboundTransfer to the <code>failed</code>
     * status. The OutboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\OutboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fail($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/outbound_transfers/%s/fail', $id), $params, $opts);
    }

    /**
     * Transitions a test mode created OutboundTransfer to the <code>posted</code>
     * status. The OutboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\OutboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function post($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/outbound_transfers/%s/post', $id), $params, $opts);
    }

    /**
     * Transitions a test mode created OutboundTransfer to the <code>returned</code>
     * status. The OutboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array{expand?: string[], returned_details?: array{code?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\OutboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function returnOutboundTransfer($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/outbound_transfers/%s/return', $id), $params, $opts);
    }

    /**
     * Updates a test mode created OutboundTransfer with tracking details. The
     * OutboundTransfer must not be cancelable, and cannot be in the
     * <code>canceled</code> or <code>failed</code> states.
     *
     * @param string $id
     * @param null|array{expand?: string[], tracking_details: array{ach?: array{trace_id: string}, type: string, us_domestic_wire?: array{chips?: string, imad?: string, omad?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\OutboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/outbound_transfers/%s', $id), $params, $opts);
    }
}
