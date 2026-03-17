<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentIntentService extends \Stripe\Service\AbstractService
{
    /**
     * Simulate an incoming crypto deposit for a testmode PaymentIntent with
     * <code>payment_method_options[crypto][mode]=deposit</code>. The
     * <code>transaction_hash</code> parameter determines whether the simulated deposit
     * succeeds or fails. Learn more about <a
     * href="/docs/payments/deposit-mode-stablecoin-payments#test-your-integration">testing
     * your integration</a>.
     *
     * @param string $id
     * @param null|array{buyer_wallet: string, expand?: string[], network: string, token_currency: string, transaction_hash: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function simulateCryptoDeposit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/payment_intents/%s/simulate_crypto_deposit', $id), $params, $opts);
    }
}
