<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AuthorizationService extends \Stripe\Service\AbstractService
{
    /**
     * Capture a test-mode authorization.
     *
     * @param string $id
     * @param null|array{capture_amount?: int, close_authorization?: bool, expand?: string[], purchase_details?: array{fleet?: array{cardholder_prompt_data?: array{driver_id?: string, odometer?: int, unspecified_id?: string, user_id?: string, vehicle_number?: string}, purchase_type?: string, reported_breakdown?: array{fuel?: array{gross_amount_decimal?: string}, non_fuel?: array{gross_amount_decimal?: string}, tax?: array{local_amount_decimal?: string, national_amount_decimal?: string}}, service_type?: string}, flight?: array{departure_at?: int, passenger_name?: string, refundable?: bool, segments?: array{arrival_airport_code?: string, carrier?: string, departure_airport_code?: string, flight_number?: string, service_class?: string, stopover_allowed?: bool}[], travel_agency?: string}, fuel?: array{industry_product_code?: string, quantity_decimal?: string, type?: string, unit?: string, unit_cost_decimal?: string}, lodging?: array{check_in_at?: int, nights?: int}, receipt?: array{description?: string, quantity?: string, total?: int, unit_cost?: int}[], reference?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function capture($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/authorizations/%s/capture', $id), $params, $opts);
    }

    /**
     * Create a test-mode authorization.
     *
     * @param null|array{amount?: int, amount_details?: array{atm_fee?: int, cashback_amount?: int}, authorization_method?: string, card: string, currency?: string, expand?: string[], fleet?: array{cardholder_prompt_data?: array{driver_id?: string, odometer?: int, unspecified_id?: string, user_id?: string, vehicle_number?: string}, purchase_type?: string, reported_breakdown?: array{fuel?: array{gross_amount_decimal?: string}, non_fuel?: array{gross_amount_decimal?: string}, tax?: array{local_amount_decimal?: string, national_amount_decimal?: string}}, service_type?: string}, fraud_disputability_likelihood?: string, fuel?: array{industry_product_code?: string, quantity_decimal?: string, type?: string, unit?: string, unit_cost_decimal?: string}, is_amount_controllable?: bool, merchant_amount?: int, merchant_currency?: string, merchant_data?: array{category?: string, city?: string, country?: string, name?: string, network_id?: string, postal_code?: string, state?: string, terminal_id?: string, url?: string}, network_data?: array{acquiring_institution_id?: string}, risk_assessment?: array{card_testing_risk?: array{invalid_account_number_decline_rate_past_hour?: int, invalid_credentials_decline_rate_past_hour?: int, risk_level: string}, merchant_dispute_risk?: array{dispute_rate?: int, risk_level: string}}, verification_data?: array{address_line1_check?: string, address_postal_code_check?: string, authentication_exemption?: array{claimed_by: string, type: string}, cvc_check?: string, expiry_check?: string, three_d_secure?: array{result: string}}, wallet?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/test_helpers/issuing/authorizations', $params, $opts);
    }

    /**
     * Expire a test-mode Authorization.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function expire($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/authorizations/%s/expire', $id), $params, $opts);
    }

    /**
     * Finalize the amount on an Authorization prior to capture, when the initial
     * authorization was for an estimated amount.
     *
     * @param string $id
     * @param null|array{expand?: string[], final_amount: int, fleet?: array{cardholder_prompt_data?: array{driver_id?: string, odometer?: int, unspecified_id?: string, user_id?: string, vehicle_number?: string}, purchase_type?: string, reported_breakdown?: array{fuel?: array{gross_amount_decimal?: string}, non_fuel?: array{gross_amount_decimal?: string}, tax?: array{local_amount_decimal?: string, national_amount_decimal?: string}}, service_type?: string}, fuel?: array{industry_product_code?: string, quantity_decimal?: string, type?: string, unit?: string, unit_cost_decimal?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function finalizeAmount($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/authorizations/%s/finalize_amount', $id), $params, $opts);
    }

    /**
     * Increment a test-mode Authorization.
     *
     * @param string $id
     * @param null|array{expand?: string[], increment_amount: int, is_amount_controllable?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function increment($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/authorizations/%s/increment', $id), $params, $opts);
    }

    /**
     * Respond to a fraud challenge on a testmode Issuing authorization, simulating
     * either a confirmation of fraud or a correction of legitimacy.
     *
     * @param string $id
     * @param null|array{confirmed: bool, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function respond($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/authorizations/%s/fraud_challenges/respond', $id), $params, $opts);
    }

    /**
     * Reverse a test-mode Authorization.
     *
     * @param string $id
     * @param null|array{expand?: string[], reverse_amount?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reverse($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/authorizations/%s/reverse', $id), $params, $opts);
    }
}
