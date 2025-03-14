<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Allows the user to capture an arbitrary amount, also known as a forced capture.
     *
     * @param null|array{amount: int, card: string, currency?: string, expand?: string[], merchant_data?: array{category?: string, city?: string, country?: string, name?: string, network_id?: string, postal_code?: string, state?: string, terminal_id?: string, url?: string}, purchase_details?: array{fleet?: array{cardholder_prompt_data?: array{driver_id?: string, odometer?: int, unspecified_id?: string, user_id?: string, vehicle_number?: string}, purchase_type?: string, reported_breakdown?: array{fuel?: array{gross_amount_decimal?: string}, non_fuel?: array{gross_amount_decimal?: string}, tax?: array{local_amount_decimal?: string, national_amount_decimal?: string}}, service_type?: string}, flight?: array{departure_at?: int, passenger_name?: string, refundable?: bool, segments?: array{arrival_airport_code?: string, carrier?: string, departure_airport_code?: string, flight_number?: string, service_class?: string, stopover_allowed?: bool}[], travel_agency?: string}, fuel?: array{industry_product_code?: string, quantity_decimal?: string, type?: string, unit?: string, unit_cost_decimal?: string}, lodging?: array{check_in_at?: int, nights?: int}, receipt?: array{description?: string, quantity?: string, total?: int, unit_cost?: int}[], reference?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Transaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createForceCapture($params = null, $opts = null)
    {
        return $this->request('post', '/v1/test_helpers/issuing/transactions/create_force_capture', $params, $opts);
    }

    /**
     * Allows the user to refund an arbitrary amount, also known as a unlinked refund.
     *
     * @param null|array{amount: int, card: string, currency?: string, expand?: string[], merchant_data?: array{category?: string, city?: string, country?: string, name?: string, network_id?: string, postal_code?: string, state?: string, terminal_id?: string, url?: string}, purchase_details?: array{fleet?: array{cardholder_prompt_data?: array{driver_id?: string, odometer?: int, unspecified_id?: string, user_id?: string, vehicle_number?: string}, purchase_type?: string, reported_breakdown?: array{fuel?: array{gross_amount_decimal?: string}, non_fuel?: array{gross_amount_decimal?: string}, tax?: array{local_amount_decimal?: string, national_amount_decimal?: string}}, service_type?: string}, flight?: array{departure_at?: int, passenger_name?: string, refundable?: bool, segments?: array{arrival_airport_code?: string, carrier?: string, departure_airport_code?: string, flight_number?: string, service_class?: string, stopover_allowed?: bool}[], travel_agency?: string}, fuel?: array{industry_product_code?: string, quantity_decimal?: string, type?: string, unit?: string, unit_cost_decimal?: string}, lodging?: array{check_in_at?: int, nights?: int}, receipt?: array{description?: string, quantity?: string, total?: int, unit_cost?: int}[], reference?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Transaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createUnlinkedRefund($params = null, $opts = null)
    {
        return $this->request('post', '/v1/test_helpers/issuing/transactions/create_unlinked_refund', $params, $opts);
    }

    /**
     * Refund a test-mode Transaction.
     *
     * @param string $id
     * @param null|array{expand?: string[], refund_amount?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Transaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function refund($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/transactions/%s/refund', $id), $params, $opts);
    }
}
