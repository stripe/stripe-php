<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * Tax forms are legal documents which are delivered to one or more tax authorities for information reporting purposes.
 *
 * Related guide: <a href="https://stripe.com/docs/connect/tax-reporting">US tax reporting for Connect platforms</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{reporting_period_end_date: string, reporting_period_start_date: string}&\Stripe\StripeObject&\stdClass) $au_serr
 * @property null|(object{reporting_period_end_date: string, reporting_period_start_date: string}&\Stripe\StripeObject&\stdClass) $ca_mrdp
 * @property null|string|\Stripe\Tax\Form $corrected_by The form that corrects this form, if any.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{reporting_period_end_date: string, reporting_period_start_date: string}&\Stripe\StripeObject&\stdClass) $eu_dac7
 * @property ((object{effective_at: int, jurisdiction: (object{country: string, level: string, state: null|string}&\Stripe\StripeObject&\stdClass), value: string}&\Stripe\StripeObject&\stdClass))[] $filing_statuses A list of tax filing statuses. Note that a filing status will only be included if the form has been filed directly with the jurisdiction’s tax authority.
 * @property null|(object{reporting_period_end_date: string, reporting_period_start_date: string}&\Stripe\StripeObject&\stdClass) $gb_mrdp
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{reporting_period_end_date: string, reporting_period_start_date: string}&\Stripe\StripeObject&\stdClass) $nz_mrdp
 * @property (object{account: null|string|\Stripe\Account, external_reference: null|string, type: string}&\Stripe\StripeObject&\stdClass) $payee
 * @property string $type The type of the tax form. An additional hash is included on the tax form with a name matching this value. It contains additional information specific to the tax form type.
 * @property null|(object{reporting_year: int}&\Stripe\StripeObject&\stdClass) $us_1099_k
 * @property null|(object{reporting_year: int}&\Stripe\StripeObject&\stdClass) $us_1099_misc
 * @property null|(object{reporting_year: int}&\Stripe\StripeObject&\stdClass) $us_1099_nec
 */
class Form extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.form';

    const TYPE_AU_SERR = 'au_serr';
    const TYPE_CA_MRDP = 'ca_mrdp';
    const TYPE_EU_DAC7 = 'eu_dac7';
    const TYPE_GB_MRDP = 'gb_mrdp';
    const TYPE_NZ_MRDP = 'nz_mrdp';
    const TYPE_US_1099_K = 'us_1099_k';
    const TYPE_US_1099_MISC = 'us_1099_misc';
    const TYPE_US_1099_NEC = 'us_1099_nec';

    /**
     * Returns a list of tax forms which were previously created. The tax forms are
     * returned in sorted order, with the oldest tax forms appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, payee: array{account?: string, external_reference?: string, type?: string}, starting_after?: string, type?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Tax\Form> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a tax form that has previously been created. Supply the
     * unique tax form ID that was returned from your previous request, and Stripe will
     * return the corresponding tax form information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Tax\Form
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param callable $readBodyChunkCallable
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return void
     */
    public function pdf($readBodyChunkCallable, $params = null, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = \Stripe\Stripe::$apiUploadBase;
        }
        $url = $this->instanceUrl() . '/pdf';
        $this->_requestStream('get', $url, $readBodyChunkCallable, $params, $opts);
    }
}
