<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Tax rates can be applied to <a href="/invoicing/taxes/tax-rates">invoices</a>, <a href="/billing/taxes/tax-rates">subscriptions</a> and <a href="/payments/checkout/use-manual-tax-rates">Checkout Sessions</a> to collect tax.
 *
 * Related guide: <a href="/billing/taxes/tax-rates">Tax rates</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Defaults to <code>true</code>. When set to <code>false</code>, this tax rate cannot be used with new applications or Checkout Sessions, but will still work for subscriptions and invoices that already have it set.
 * @property null|string $country Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $description An arbitrary string attached to the tax rate for your internal use only. It will not be visible to your customers.
 * @property string $display_name The display name of the tax rates as it will appear to your customer on their receipt email, PDF, and the hosted invoice page.
 * @property null|float $effective_percentage Actual/effective tax rate percentage out of 100. For tax calculations with automatic_tax[enabled]=true, this percentage reflects the rate actually used to calculate tax based on the product's taxability and whether the user is registered to collect taxes in the corresponding jurisdiction.
 * @property null|(object{amount: int, currency: string}&StripeObject) $flat_amount The amount of the tax rate when the <code>rate_type</code> is <code>flat_amount</code>. Tax rates with <code>rate_type</code> <code>percentage</code> can vary based on the transaction, resulting in this field being <code>null</code>. This field exposes the amount and currency of the flat tax rate.
 * @property bool $inclusive This specifies if the tax rate is inclusive or exclusive.
 * @property null|string $jurisdiction The jurisdiction for the tax rate. You can use this label field for tax reporting purposes. It also appears on your customer’s invoice.
 * @property null|string $jurisdiction_level The level of the jurisdiction that imposes this tax rate. Will be <code>null</code> for manually defined tax rates.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property float $percentage Tax rate percentage out of 100. For tax calculations with automatic_tax[enabled]=true, this percentage includes the statutory tax rate of non-taxable jurisdictions.
 * @property null|string $rate_type Indicates the type of tax rate applied to the taxable amount. This value can be <code>null</code> when no tax applies to the location. This field is only present for TaxRates created by Stripe Tax.
 * @property null|string $state <a href="https://en.wikipedia.org/wiki/ISO_3166-2">ISO 3166-2 subdivision code</a>, without country prefix. For example, &quot;NY&quot; for New York, United States.
 * @property null|string $tax_type The high-level tax type, such as <code>vat</code> or <code>sales_tax</code>.
 */
class TaxRate extends ApiResource
{
    const OBJECT_NAME = 'tax_rate';

    use ApiOperations\Update;

    const JURISDICTION_LEVEL_CITY = 'city';
    const JURISDICTION_LEVEL_COUNTRY = 'country';
    const JURISDICTION_LEVEL_COUNTY = 'county';
    const JURISDICTION_LEVEL_DISTRICT = 'district';
    const JURISDICTION_LEVEL_MULTIPLE = 'multiple';
    const JURISDICTION_LEVEL_STATE = 'state';

    const RATE_TYPE_FLAT_AMOUNT = 'flat_amount';
    const RATE_TYPE_PERCENTAGE = 'percentage';

    const TAX_TYPE_AMUSEMENT_TAX = 'amusement_tax';
    const TAX_TYPE_COMMUNICATIONS_TAX = 'communications_tax';
    const TAX_TYPE_GST = 'gst';
    const TAX_TYPE_HST = 'hst';
    const TAX_TYPE_IGST = 'igst';
    const TAX_TYPE_JCT = 'jct';
    const TAX_TYPE_LEASE_TAX = 'lease_tax';
    const TAX_TYPE_PST = 'pst';
    const TAX_TYPE_QST = 'qst';
    const TAX_TYPE_RETAIL_DELIVERY_FEE = 'retail_delivery_fee';
    const TAX_TYPE_RST = 'rst';
    const TAX_TYPE_SALES_TAX = 'sales_tax';
    const TAX_TYPE_SERVICE_TAX = 'service_tax';
    const TAX_TYPE_VAT = 'vat';

    /**
     * Creates a new tax rate.
     *
     * @param null|array{active?: bool, country?: string, description?: string, display_name: string, expand?: string[], inclusive: bool, jurisdiction?: string, metadata?: array<string, string>, percentage: float, state?: string, tax_type?: string} $params
     * @param null|array|string $options
     *
     * @return TaxRate the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of your tax rates. Tax rates are returned sorted by creation
     * date, with the most recently created tax rates appearing first.
     *
     * @param null|array{active?: bool, created?: array|int, ending_before?: string, expand?: string[], inclusive?: bool, limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<TaxRate> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a tax rate with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return TaxRate
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates an existing tax rate.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, country?: string, description?: string, display_name?: string, expand?: string[], jurisdiction?: string, metadata?: null|array<string, string>, state?: string, tax_type?: string} $params
     * @param null|array|string $opts
     *
     * @return TaxRate the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
