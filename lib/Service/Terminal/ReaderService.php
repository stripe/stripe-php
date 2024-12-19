<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Terminal;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReaderService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of <code>Reader</code> objects.
     *
     * @param null|array{device_type?: string, ending_before?: string, expand?: string[], limit?: int, location?: string, serial_number?: string, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Terminal\Reader>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/terminal/readers', $params, $opts);
    }

    /**
     * Cancels the current reader action.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function cancelAction($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/cancel_action', $id), $params, $opts);
    }

    /**
     * Initiates an input collection flow on a Reader.
     *
     * @param string $id
     * @param null|array{expand?: string[], inputs: array{custom_text: array{description?: string, skip_button?: string, submit_button?: string, title: string}, required?: bool, selection?: array{choices: array{style?: string, value: string}[]}, toggles?: array{default_value?: string, description?: string, title?: string}[], type: string}[], metadata?: \Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function collectInputs($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/collect_inputs', $id), $params, $opts);
    }

    /**
     * Initiates a payment flow on a Reader and updates the PaymentIntent with card
     * details before manual confirmation.
     *
     * @param string $id
     * @param null|array{collect_config?: array{allow_redisplay?: string, enable_customer_cancellation?: bool, skip_tipping?: bool, tipping?: array{amount_eligible?: int}}, expand?: string[], payment_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function collectPaymentMethod($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/collect_payment_method', $id), $params, $opts);
    }

    /**
     * Finalizes a payment on a Reader.
     *
     * @param string $id
     * @param null|array{expand?: string[], payment_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function confirmPaymentIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/confirm_payment_intent', $id), $params, $opts);
    }

    /**
     * Creates a new <code>Reader</code> object.
     *
     * @param null|array{expand?: string[], label?: string, location?: string, metadata?: null|\Stripe\StripeObject, registration_code: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/terminal/readers', $params, $opts);
    }

    /**
     * Deletes a <code>Reader</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }

    /**
     * Initiates a payment flow on a Reader.
     *
     * @param string $id
     * @param null|array{expand?: string[], payment_intent: string, process_config?: array{allow_redisplay?: string, enable_customer_cancellation?: bool, skip_tipping?: bool, tipping?: array{amount_eligible?: int}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function processPaymentIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/process_payment_intent', $id), $params, $opts);
    }

    /**
     * Initiates a setup intent flow on a Reader.
     *
     * @param string $id
     * @param null|array{allow_redisplay: string, expand?: string[], process_config?: array{enable_customer_cancellation?: bool}, setup_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function processSetupIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/process_setup_intent', $id), $params, $opts);
    }

    /**
     * Initiates a refund on a Reader.
     *
     * @param string $id
     * @param null|array{amount?: int, charge?: string, expand?: string[], metadata?: \Stripe\StripeObject, payment_intent?: string, refund_application_fee?: bool, refund_payment_config?: array{enable_customer_cancellation?: bool}, reverse_transfer?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function refundPayment($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/refund_payment', $id), $params, $opts);
    }

    /**
     * Retrieves a <code>Reader</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }

    /**
     * Sets reader display to show cart details.
     *
     * @param string $id
     * @param null|array{cart?: array{currency: string, line_items: array{amount: int, description: string, quantity: int}[], tax?: int, total: int}, expand?: string[], type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function setReaderDisplay($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/set_reader_display', $id), $params, $opts);
    }

    /**
     * Updates a <code>Reader</code> object by setting the values of the parameters
     * passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array{expand?: string[], label?: null|string, metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }
}
