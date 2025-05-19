<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Terminal;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReaderService extends \Stripe\Service\AbstractService
{
    /**
     * Presents a payment method on a simulated reader. Can be used to simulate
     * accepting a payment, saving a card or refunding a transaction.
     *
     * @param string $id
     * @param null|array{amount_tip?: int, card_present?: array{number?: string}, expand?: string[], interac_present?: array{number?: string}, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function presentPaymentMethod($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/terminal/readers/%s/present_payment_method', $id), $params, $opts);
    }

    /**
     * Use this endpoint to trigger a successful input collection on a simulated
     * reader.
     *
     * @param string $id
     * @param null|array{expand?: string[], skip_non_required_inputs?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function succeedInputCollection($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/terminal/readers/%s/succeed_input_collection', $id), $params, $opts);
    }

    /**
     * Use this endpoint to complete an input collection with a timeout error on a
     * simulated reader.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function timeoutInputCollection($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/terminal/readers/%s/timeout_input_collection', $id), $params, $opts);
    }
}
