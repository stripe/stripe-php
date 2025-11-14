<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ChargeService extends AbstractService
{
    /**
     * Returns a list of charges you’ve previously created. The charges are returned in
     * sorted order, with the most recent charges appearing first.
     *
     * @param null|array{created?: array|int, customer?: string, ending_before?: string, expand?: string[], limit?: int, payment_intent?: string, starting_after?: string, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Charge>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/charges', $params, $opts);
    }

    /**
     * Capture the payment of an existing, uncaptured charge that was created with the
     * <code>capture</code> option set to false.
     *
     * Uncaptured payments expire a set number of days after they are created (<a
     * href="/docs/charges/placing-a-hold">7 by default</a>), after which they are
     * marked as refunded and capture attempts will fail.
     *
     * Don’t use this method to capture a PaymentIntent-initiated charge. Use <a
     * href="/docs/api/payment_intents/capture">Capture a PaymentIntent</a>.
     *
     * @param string $id
     * @param null|array{amount?: int, application_fee?: int, application_fee_amount?: int, expand?: string[], payment_details?: array{car_rental?: array{affiliate?: array{name: string}, booking_number: string, car_class_code?: string, car_make?: string, car_model?: string, company?: string, customer_service_phone_number?: string, days_rented: int, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, distance?: array{amount?: int, unit?: string}, drivers?: array{driver_identification_number?: string, driver_tax_number?: string, name: string}[], extra_charges?: string[], no_show?: bool, pickup_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, pickup_at: int, pickup_location_name?: string, rate_amount?: int, rate_interval?: string, renter_name?: string, return_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, return_at: int, return_location_name?: string, tax_exempt?: bool, vehicle_identification_number?: string}, car_rental_data?: null|array{affiliate?: array{code?: string, name?: string}, booking_number?: string, carrier_name?: string, customer_service_phone_number?: string, days_rented?: int, distance?: array{amount: int, unit: string}, drivers?: array{date_of_birth?: array{day: int, month: int, year: int}, driver_identification_number?: string, driver_tax_number?: string, name: string}[], drop_off: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, location_name?: string, time: int}, insurances?: array{amount: int, currency?: string, insurance_company_name?: string, insurance_type: string}[], no_show_indicator?: bool, pickup: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, location_name?: string, time: int}, renter_name?: string, total: array{amount: int, currency?: string, discounts?: array{corporate_client_code?: string, coupon?: string, maximum_free_miles_or_kilometers?: int}, extra_charges?: array{amount: int, type: string}[], rate_per_unit?: int, rate_unit?: string, tax?: array{tax_exempt_indicator?: bool, taxes?: array{amount?: int, rate?: int, type?: string}[]}}, vehicle?: array{make?: string, model?: string, odometer?: int, type?: string, vehicle_class?: string, vehicle_identification_number?: string}}[], customer_reference?: null|string, event_details?: array{access_controlled_venue?: bool, address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, affiliate?: array{name: string}, company?: string, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, ends_at?: int, genre?: string, name: string, starts_at?: int}, flight?: array{affiliate?: array{name: string}, agency_number?: string, carrier?: string, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, passenger_name?: string, passengers?: array{name: string}[], segments: array{amount?: int, arrival_airport?: string, arrives_at?: int, carrier?: string, departs_at: int, departure_airport?: string, flight_number?: string, service_class?: string}[], ticket_number?: string}, flight_data?: null|array{affiliate?: array{code?: string, name?: string, travel_authorization_code?: string}, booking_number?: string, computerized_reservation_system?: string, endorsements_and_restrictions?: string, insurances?: array{amount: int, currency?: string, insurance_company_name?: string, insurance_type: string}[], passengers?: array{name: string}[], segments: array{amount?: int, arrival: array{airport: string, arrives_at?: int, city?: string, country?: string}, carrier_code: string, carrier_name?: string, currency?: string, departure: array{airport: string, city?: string, country?: string, departs_at: int}, exchange_ticket_number?: string, fare_basis_code?: string, fees?: int, flight_number?: string, is_stop_over_indicator?: bool, refundable?: bool, service_class: string, tax_amount?: int, ticket_number?: string}[], ticket_electronically_issued_indicator?: bool, total: array{amount: int, credit_reason?: string, currency?: string, discounts?: array{corporate_client_code?: string}, extra_charges?: array{amount?: int, type?: string}[], tax?: array{taxes?: array{amount?: int, rate?: int, type?: string}[]}}, transaction_type?: string}[], lodging?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, adults?: int, affiliate?: array{name: string}, booking_number?: string, category?: string, checkin_at: int, checkout_at: int, customer_service_phone_number?: string, daily_room_rate_amount?: int, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, extra_charges?: string[], fire_safety_act_compliance?: bool, name?: string, no_show?: bool, number_of_rooms?: int, passengers?: array{name: string}[], property_phone_number?: string, room_class?: string, room_nights?: int, total_room_tax_amount?: int, total_tax_amount?: int}, lodging_data?: null|array{accommodation?: array{accommodation_type?: string, bed_type?: string, daily_rate_amount?: int, nights?: int, number_of_rooms?: int, rate_type?: string, smoking_indicator?: bool}, affiliate?: array{code?: string, name?: string}, booking_number?: string, checkin_at: int, checkout_at: int, customer_service_phone_number?: string, fire_safety_act_compliance_indicator?: bool, guests?: array{name: string}[], host?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, country_of_domicile?: string, host_reference?: string, host_type?: string, name?: string, number_of_reservations?: int, property_phone_number?: string, registered_at?: int}, insurances?: array{amount: int, currency?: string, insurance_company_name?: string, insurance_type: string}[], no_show_indicator?: bool, renter_id_number?: string, renter_name?: string, total: array{amount: int, cash_advances?: int, currency?: string, discounts?: array{corporate_client_code?: string, coupon?: string}, extra_charges?: array{amount?: int, type?: string}[], prepaid_amount?: int, tax?: array{tax_exempt_indicator?: bool, taxes?: array{amount?: int, rate?: int, type?: string}[]}}}[], order_reference?: null|string, subscription?: array{affiliate?: array{name: string}, auto_renewal?: bool, billing_interval?: array{count: int, interval: string}, ends_at?: int, name: string, starts_at?: int}}, receipt_email?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int}, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Charge
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function capture($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/charges/%s/capture', $id), $params, $opts);
    }

    /**
     * This method is no longer recommended—use the <a
     * href="/docs/api/payment_intents">Payment Intents API</a> to initiate a new
     * payment instead. Confirmation of the PaymentIntent creates the
     * <code>Charge</code> object used to request payment.
     *
     * @param null|array{amount?: int, application_fee?: int, application_fee_amount?: int, capture?: bool, currency?: string, customer?: string, description?: string, destination?: array{account: string, amount?: int}, expand?: string[], metadata?: null|array<string, string>, on_behalf_of?: string, radar_options?: array{session?: string}, receipt_email?: string, shipping?: array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, source?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Charge
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/charges', $params, $opts);
    }

    /**
     * Retrieves the details of a charge that has previously been created. Supply the
     * unique charge ID that was returned from your previous request, and Stripe will
     * return the corresponding charge information. The same information is returned
     * when creating or refunding the charge.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Charge
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/charges/%s', $id), $params, $opts);
    }

    /**
     * Search for charges you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SearchResult<\Stripe\Charge>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/charges/search', $params, $opts);
    }

    /**
     * Updates the specified charge by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array{customer?: string, description?: string, expand?: string[], fraud_details?: array{user_report: null|string}, metadata?: null|array<string, string>, payment_details?: array{car_rental?: array{affiliate?: array{name: string}, booking_number: string, car_class_code?: string, car_make?: string, car_model?: string, company?: string, customer_service_phone_number?: string, days_rented: int, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, distance?: array{amount?: int, unit?: string}, drivers?: array{driver_identification_number?: string, driver_tax_number?: string, name: string}[], extra_charges?: string[], no_show?: bool, pickup_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, pickup_at: int, pickup_location_name?: string, rate_amount?: int, rate_interval?: string, renter_name?: string, return_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, return_at: int, return_location_name?: string, tax_exempt?: bool, vehicle_identification_number?: string}, car_rental_data?: null|array{affiliate?: array{code?: string, name?: string}, booking_number?: string, carrier_name?: string, customer_service_phone_number?: string, days_rented?: int, distance?: array{amount: int, unit: string}, drivers?: array{date_of_birth?: array{day: int, month: int, year: int}, driver_identification_number?: string, driver_tax_number?: string, name: string}[], drop_off: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, location_name?: string, time: int}, insurances?: array{amount: int, currency?: string, insurance_company_name?: string, insurance_type: string}[], no_show_indicator?: bool, pickup: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, location_name?: string, time: int}, renter_name?: string, total: array{amount: int, currency?: string, discounts?: array{corporate_client_code?: string, coupon?: string, maximum_free_miles_or_kilometers?: int}, extra_charges?: array{amount: int, type: string}[], rate_per_unit?: int, rate_unit?: string, tax?: array{tax_exempt_indicator?: bool, taxes?: array{amount?: int, rate?: int, type?: string}[]}}, vehicle?: array{make?: string, model?: string, odometer?: int, type?: string, vehicle_class?: string, vehicle_identification_number?: string}}[], customer_reference?: null|string, event_details?: array{access_controlled_venue?: bool, address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, affiliate?: array{name: string}, company?: string, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, ends_at?: int, genre?: string, name: string, starts_at?: int}, flight?: array{affiliate?: array{name: string}, agency_number?: string, carrier?: string, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, passenger_name?: string, passengers?: array{name: string}[], segments: array{amount?: int, arrival_airport?: string, arrives_at?: int, carrier?: string, departs_at: int, departure_airport?: string, flight_number?: string, service_class?: string}[], ticket_number?: string}, flight_data?: null|array{affiliate?: array{code?: string, name?: string, travel_authorization_code?: string}, booking_number?: string, computerized_reservation_system?: string, endorsements_and_restrictions?: string, insurances?: array{amount: int, currency?: string, insurance_company_name?: string, insurance_type: string}[], passengers?: array{name: string}[], segments: array{amount?: int, arrival: array{airport: string, arrives_at?: int, city?: string, country?: string}, carrier_code: string, carrier_name?: string, currency?: string, departure: array{airport: string, city?: string, country?: string, departs_at: int}, exchange_ticket_number?: string, fare_basis_code?: string, fees?: int, flight_number?: string, is_stop_over_indicator?: bool, refundable?: bool, service_class: string, tax_amount?: int, ticket_number?: string}[], ticket_electronically_issued_indicator?: bool, total: array{amount: int, credit_reason?: string, currency?: string, discounts?: array{corporate_client_code?: string}, extra_charges?: array{amount?: int, type?: string}[], tax?: array{taxes?: array{amount?: int, rate?: int, type?: string}[]}}, transaction_type?: string}[], lodging?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, adults?: int, affiliate?: array{name: string}, booking_number?: string, category?: string, checkin_at: int, checkout_at: int, customer_service_phone_number?: string, daily_room_rate_amount?: int, delivery?: array{mode?: string, recipient?: array{email?: string, name?: string, phone?: string}}, extra_charges?: string[], fire_safety_act_compliance?: bool, name?: string, no_show?: bool, number_of_rooms?: int, passengers?: array{name: string}[], property_phone_number?: string, room_class?: string, room_nights?: int, total_room_tax_amount?: int, total_tax_amount?: int}, lodging_data?: null|array{accommodation?: array{accommodation_type?: string, bed_type?: string, daily_rate_amount?: int, nights?: int, number_of_rooms?: int, rate_type?: string, smoking_indicator?: bool}, affiliate?: array{code?: string, name?: string}, booking_number?: string, checkin_at: int, checkout_at: int, customer_service_phone_number?: string, fire_safety_act_compliance_indicator?: bool, guests?: array{name: string}[], host?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}, country_of_domicile?: string, host_reference?: string, host_type?: string, name?: string, number_of_reservations?: int, property_phone_number?: string, registered_at?: int}, insurances?: array{amount: int, currency?: string, insurance_company_name?: string, insurance_type: string}[], no_show_indicator?: bool, renter_id_number?: string, renter_name?: string, total: array{amount: int, cash_advances?: int, currency?: string, discounts?: array{corporate_client_code?: string, coupon?: string}, extra_charges?: array{amount?: int, type?: string}[], prepaid_amount?: int, tax?: array{tax_exempt_indicator?: bool, taxes?: array{amount?: int, rate?: int, type?: string}[]}}}[], order_reference?: null|string, subscription?: array{affiliate?: array{name: string}, auto_renewal?: bool, billing_interval?: array{count: int, interval: string}, ends_at?: int, name: string, starts_at?: int}}, receipt_email?: string, shipping?: array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Charge
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/charges/%s', $id), $params, $opts);
    }
}
