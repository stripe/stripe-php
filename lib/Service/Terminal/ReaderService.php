<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Terminal;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReaderService extends \Stripe\Service\AbstractService
{
    /**
     * Initiates a gift card activation flow on a Reader and optionally sets its
     * balance.
     *
     * @param string $id
     * @param null|array{balance?: array{amount: int, currency: string}, brand: string, expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activateGiftCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/activate_gift_card', $id), $params, $opts);
    }

    /**
     * Returns a list of <code>Reader</code> objects.
     *
     * @param null|array{device_type?: string, ending_before?: string, expand?: string[], limit?: int, location?: string, serial_number?: string, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Terminal\Reader>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/terminal/readers', $params, $opts);
    }

    /**
     * Cancels the current reader action. See <a
     * href="/docs/terminal/payments/collect-card-payment?terminal-sdk-platform=server-driven#programmatic-cancellation">Programmatic
     * Cancellation</a> for more details.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancelAction($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/cancel_action', $id), $params, $opts);
    }

    /**
     * Initiates a gift card cashout flow on a Reader. A cashout sets the gift card
     * balance to 0.
     *
     * @param string $id
     * @param null|array{brand: string, expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cashoutGiftCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/cashout_gift_card', $id), $params, $opts);
    }

    /**
     * Initiates a gift card balance check flow on a Reader.
     *
     * @param string $id
     * @param null|array{brand: string, expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function checkGiftCardBalance($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/check_gift_card_balance', $id), $params, $opts);
    }

    /**
     * Initiates an <a href="/docs/terminal/features/collect-inputs">input collection
     * flow</a> on a Reader to display input forms and collect information from your
     * customers.
     *
     * @param string $id
     * @param null|array{expand?: string[], inputs: array{custom_text: array{description?: string, skip_button?: string, submit_button?: string, title: string}, required?: bool, selection?: array{choices: array{id: string, style?: string, text: string}[]}, toggles?: array{default_value?: string, description?: string, title?: string}[], type: string}[], metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function collectInputs($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/collect_inputs', $id), $params, $opts);
    }

    /**
     * Initiates a payment flow on a Reader and updates the PaymentIntent with card
     * details before manual confirmation. See <a
     * href="/docs/terminal/payments/collect-card-payment?terminal-sdk-platform=server-driven&process=inspect#collect-a-paymentmethod">Collecting
     * a Payment method</a> for more details.
     *
     * @param string $id
     * @param null|array{collect_config?: array{allow_redisplay?: string, enable_customer_cancellation?: bool, gift_card_brand?: string, skip_tipping?: bool, tipping?: array{amount_eligible?: int}}, expand?: string[], payment_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function collectPaymentMethod($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/collect_payment_method', $id), $params, $opts);
    }

    /**
     * Finalizes a payment on a Reader. See <a
     * href="/docs/terminal/payments/collect-card-payment?terminal-sdk-platform=server-driven&process=inspect#confirm-the-paymentintent">Confirming
     * a Payment</a> for more details.
     *
     * @param string $id
     * @param null|array{confirm_config?: array{return_url?: string}, expand?: string[], payment_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function confirmPaymentIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/confirm_payment_intent', $id), $params, $opts);
    }

    /**
     * Creates a new <code>Reader</code> object.
     *
     * @param null|array{expand?: string[], label?: string, location?: string, metadata?: null|array<string, string>, registration_code: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }

    /**
     * Initiates a payment flow on a Reader. See <a
     * href="/docs/terminal/payments/collect-card-payment?terminal-sdk-platform=server-driven&process=immediately#process-payment">process
     * the payment</a> for more details.
     *
     * @param string $id
     * @param null|array{expand?: string[], payment_intent: string, process_config?: array{allow_redisplay?: string, enable_customer_cancellation?: bool, gift_card_brand?: string, return_url?: string, skip_tipping?: bool, tipping?: array{amount_eligible?: int}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function processPaymentIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/process_payment_intent', $id), $params, $opts);
    }

    /**
     * Initiates a SetupIntent flow on a Reader. See <a
     * href="/docs/terminal/features/saving-payment-details/save-directly">Save
     * directly without charging</a> for more details.
     *
     * @param string $id
     * @param null|array{allow_redisplay: string, expand?: string[], process_config?: array{enable_customer_cancellation?: bool}, setup_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function processSetupIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/process_setup_intent', $id), $params, $opts);
    }

    /**
     * Initiates an in-person refund on a Reader. See <a
     * href="/docs/terminal/payments/regional?integration-country=CA#refund-an-interac-payment">Refund
     * an Interac Payment</a> for more details.
     *
     * @param string $id
     * @param null|array{amount?: int, charge?: string, expand?: string[], metadata?: array<string, string>, payment_intent?: string, refund_application_fee?: bool, refund_payment_config?: array{enable_customer_cancellation?: bool}, reverse_transfer?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function refundPayment($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/refund_payment', $id), $params, $opts);
    }

    /**
     * Initiates a gift card reload flow on a Reader by adding the specified amount to
     * its balance.
     *
     * @param string $id
     * @param null|array{amount: int, brand: string, currency: string, expand?: string[], on_behalf_of?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reloadGiftCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s/reload_gift_card', $id), $params, $opts);
    }

    /**
     * Retrieves a <code>Reader</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }

    /**
     * Sets the reader display to show <a href="/docs/terminal/features/display">cart
     * details</a>.
     *
     * @param string $id
     * @param null|array{cart?: array{currency: string, line_items: array{amount: int, description: string, quantity: int}[], tax?: int, total: int}, expand?: string[], type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{expand?: string[], label?: null|string, metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Terminal\Reader
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }
}
