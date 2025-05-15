<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentLinkService extends AbstractService
{
    /**
     * Returns a list of your payment links.
     *
     * @param null|array{active?: bool, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PaymentLink>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_links', $params, $opts);
    }

    /**
     * When retrieving a payment link, there is an includable
     * <strong>line_items</strong> property containing the first handful of those
     * items. There is also a URL where you can retrieve the full (paginated) list of
     * line items.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allLineItems($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/payment_links/%s/line_items', $id), $params, $opts);
    }

    /**
     * Creates a payment link.
     *
     * @param null|array{after_completion?: array{hosted_confirmation?: array{custom_message?: string}, redirect?: array{url: string}, type: string}, allow_promotion_codes?: bool, application_fee_amount?: int, application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, consent_collection?: array{payment_method_reuse_agreement?: array{position: string}, promotions?: string, terms_of_service?: string}, currency?: string, custom_fields?: array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer_creation?: string, expand?: string[], inactive_message?: string, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: null|array<string, string>, rendering_options?: null|array{amount_tax_display?: null|string}}}, line_items: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], metadata?: array<string, string>, on_behalf_of?: string, optional_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], payment_intent_data?: array{capture_method?: string, description?: string, metadata?: array<string, string>, setup_future_usage?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_group?: string}, payment_method_collection?: string, payment_method_types?: string[], phone_number_collection?: array{enabled: bool}, restrictions?: array{completed_sessions: array{limit: int}}, shipping_address_collection?: array{allowed_countries: string[]}, shipping_options?: array{shipping_rate?: string}[], submit_type?: string, subscription_data?: array{description?: string, invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: array<string, string>, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}}, tax_id_collection?: array{enabled: bool, required?: string}, transfer_data?: array{amount?: int, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentLink
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_links', $params, $opts);
    }

    /**
     * Retrieve a payment link.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentLink
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_links/%s', $id), $params, $opts);
    }

    /**
     * Updates a payment link.
     *
     * @param string $id
     * @param null|array{active?: bool, after_completion?: array{hosted_confirmation?: array{custom_message?: string}, redirect?: array{url: string}, type: string}, allow_promotion_codes?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, custom_fields?: null|array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer_creation?: string, expand?: string[], inactive_message?: null|string, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: null|array<string, string>, rendering_options?: null|array{amount_tax_display?: null|string}}}, line_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, id: string, quantity?: int}[], metadata?: array<string, string>, payment_intent_data?: array{description?: null|string, metadata?: null|array<string, string>, statement_descriptor?: null|string, statement_descriptor_suffix?: null|string, transfer_group?: null|string}, payment_method_collection?: string, payment_method_types?: null|string[], phone_number_collection?: array{enabled: bool}, restrictions?: null|array{completed_sessions: array{limit: int}}, shipping_address_collection?: null|array{allowed_countries: string[]}, submit_type?: string, subscription_data?: array{invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: null|array<string, string>, trial_period_days?: null|int, trial_settings?: null|array{end_behavior: array{missing_payment_method: string}}}, tax_id_collection?: array{enabled: bool, required?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentLink
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_links/%s', $id), $params, $opts);
    }
}
