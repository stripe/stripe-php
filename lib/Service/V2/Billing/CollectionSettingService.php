<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property CollectionSettings\VersionService $versions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CollectionSettingService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'versions' => CollectionSettings\VersionService::class,
    ];

    /**
     * List all CollectionSetting objects.
     *
     * @param null|array{limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\CollectionSetting>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/collection_settings', $params, $opts);
    }

    /**
     * Create a CollectionSetting object.
     *
     * @param null|array{collection_method?: string, display_name?: string, email_delivery?: array{payment_due?: array{enabled: bool, include_payment_link: bool}}, lookup_key?: string, payment_method_configuration?: string, payment_method_options?: array{acss_debit?: array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: array{preferred_language?: string}, card?: array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: array, sepa_debit?: array, us_bank_account?: array{financial_connections: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CollectionSetting
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/collection_settings', $params, $opts);
    }

    /**
     * Retrieve a CollectionSetting by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CollectionSetting
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/collection_settings/%s', $id), $params, $opts);
    }

    /**
     * Update fields on an existing CollectionSetting.
     *
     * @param string $id
     * @param null|array{collection_method?: string, display_name?: string, email_delivery?: array{payment_due?: array{enabled: bool, include_payment_link: bool}}, live_version?: string, lookup_key?: string, payment_method_configuration?: string, payment_method_options?: array{acss_debit?: array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: array{preferred_language?: string}, card?: array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: array, sepa_debit?: array, us_bank_account?: array{financial_connections: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CollectionSetting
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/collection_settings/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
