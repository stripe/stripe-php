<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Radar;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Request a Radar API fraud risk score from Stripe for a payment before sending it
     * for external processor authorization.
     *
     * @param null|array{client_device_metadata_details?: array{radar_session: string}, customer_details: array{customer?: string, customer_account?: string, email?: string, name?: string, phone?: string}, expand?: string[], metadata?: array<string, string>, payment_details: array{amount: int, currency: string, description?: string, money_movement_details?: array{card?: array{customer_presence?: string, payment_type?: string}, money_movement_type: string}, payment_method_details: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, payment_method: string}, shipping_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, statement_descriptor?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\PaymentEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/radar/payment_evaluations', $params, $opts);
    }
}
