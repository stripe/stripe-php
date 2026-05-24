<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SettingsService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves Tax <code>Settings</code> for a merchant.
     *
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Settings
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/tax/settings', $params, $opts);
    }

    /**
     * Updates Tax <code>Settings</code> parameters used in tax calculations. All
     * parameters are editable but none can be removed once set.
     *
     * @param null|array{defaults?: array{tax_behavior?: string, tax_code?: string}, expand?: string[], head_office?: array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Settings
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/settings', $params, $opts);
    }

    /**
     * Serializes a Settings update request into a batch job JSONL line.
     *
     * @param null|array{defaults?: array{tax_behavior?: string, tax_code?: string}, expand?: string[], head_office?: array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeBatchUpdate($params = null, $opts = null)
    {
        $itemId = (new \Stripe\Util\RandomGenerator())->uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = isset($opts->headers['Stripe-Version']) ? $opts->headers['Stripe-Version'] : \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        $stripeContext = isset($opts->headers['Stripe-Context']) ? $opts->headers['Stripe-Context'] : null;
        if (null !== $stripeContext) {
            $item['context'] = $stripeContext;
        }

        return \json_encode($item);
    }
}
