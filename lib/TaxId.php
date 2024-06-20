<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * You can add one or multiple tax IDs to a <a href="https://stripe.com/docs/api/customers">customer</a> or account.
 * Customer and account tax IDs get displayed on related invoices and credit notes.
 *
 * Related guides: <a href="https://stripe.com/docs/billing/taxes/tax-ids">Customer tax identification numbers</a>, <a href="https://stripe.com/docs/invoicing/connect#account-tax-ids">Account tax IDs</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $country Two-letter ISO code representing the country of the tax ID.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer ID of the customer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $owner The account or customer the tax ID belongs to.
 * @property string $type Type of the tax ID, one of <code>ad_nrt</code>, <code>ae_trn</code>, <code>ar_cuit</code>, <code>au_abn</code>, <code>au_arn</code>, <code>bg_uic</code>, <code>bh_vat</code>, <code>bo_tin</code>, <code>br_cnpj</code>, <code>br_cpf</code>, <code>ca_bn</code>, <code>ca_gst_hst</code>, <code>ca_pst_bc</code>, <code>ca_pst_mb</code>, <code>ca_pst_sk</code>, <code>ca_qst</code>, <code>ch_vat</code>, <code>cl_tin</code>, <code>cn_tin</code>, <code>co_nit</code>, <code>cr_tin</code>, <code>de_stn</code>, <code>do_rcn</code>, <code>ec_ruc</code>, <code>eg_tin</code>, <code>es_cif</code>, <code>eu_oss_vat</code>, <code>eu_vat</code>, <code>gb_vat</code>, <code>ge_vat</code>, <code>hk_br</code>, <code>hu_tin</code>, <code>id_npwp</code>, <code>il_vat</code>, <code>in_gst</code>, <code>is_vat</code>, <code>jp_cn</code>, <code>jp_rn</code>, <code>jp_trn</code>, <code>ke_pin</code>, <code>kr_brn</code>, <code>kz_bin</code>, <code>li_uid</code>, <code>mx_rfc</code>, <code>my_frp</code>, <code>my_itn</code>, <code>my_sst</code>, <code>ng_tin</code>, <code>no_vat</code>, <code>no_voec</code>, <code>nz_gst</code>, <code>om_vat</code>, <code>pe_ruc</code>, <code>ph_tin</code>, <code>ro_tin</code>, <code>rs_pib</code>, <code>ru_inn</code>, <code>ru_kpp</code>, <code>sa_vat</code>, <code>sg_gst</code>, <code>sg_uen</code>, <code>si_tin</code>, <code>sv_nit</code>, <code>th_vat</code>, <code>tr_tin</code>, <code>tw_vat</code>, <code>ua_vat</code>, <code>us_ein</code>, <code>uy_ruc</code>, <code>ve_rif</code>, <code>vn_tin</code>, or <code>za_vat</code>. Note that some legacy tax IDs have type <code>unknown</code>
 * @property string $value Value of the tax ID.
 * @property null|\Stripe\StripeObject $verification Tax ID verification information.
 */
class TaxId extends ApiResource
{
    const OBJECT_NAME = 'tax_id';

    const TYPE_AD_NRT = 'ad_nrt';
    const TYPE_AE_TRN = 'ae_trn';
    const TYPE_AR_CUIT = 'ar_cuit';
    const TYPE_AU_ABN = 'au_abn';
    const TYPE_AU_ARN = 'au_arn';
    const TYPE_BG_UIC = 'bg_uic';
    const TYPE_BH_VAT = 'bh_vat';
    const TYPE_BO_TIN = 'bo_tin';
    const TYPE_BR_CNPJ = 'br_cnpj';
    const TYPE_BR_CPF = 'br_cpf';
    const TYPE_CA_BN = 'ca_bn';
    const TYPE_CA_GST_HST = 'ca_gst_hst';
    const TYPE_CA_PST_BC = 'ca_pst_bc';
    const TYPE_CA_PST_MB = 'ca_pst_mb';
    const TYPE_CA_PST_SK = 'ca_pst_sk';
    const TYPE_CA_QST = 'ca_qst';
    const TYPE_CH_VAT = 'ch_vat';
    const TYPE_CL_TIN = 'cl_tin';
    const TYPE_CN_TIN = 'cn_tin';
    const TYPE_CO_NIT = 'co_nit';
    const TYPE_CR_TIN = 'cr_tin';
    const TYPE_DE_STN = 'de_stn';
    const TYPE_DO_RCN = 'do_rcn';
    const TYPE_EC_RUC = 'ec_ruc';
    const TYPE_EG_TIN = 'eg_tin';
    const TYPE_ES_CIF = 'es_cif';
    const TYPE_EU_OSS_VAT = 'eu_oss_vat';
    const TYPE_EU_VAT = 'eu_vat';
    const TYPE_GB_VAT = 'gb_vat';
    const TYPE_GE_VAT = 'ge_vat';
    const TYPE_HK_BR = 'hk_br';
    const TYPE_HU_TIN = 'hu_tin';
    const TYPE_ID_NPWP = 'id_npwp';
    const TYPE_IL_VAT = 'il_vat';
    const TYPE_IN_GST = 'in_gst';
    const TYPE_IS_VAT = 'is_vat';
    const TYPE_JP_CN = 'jp_cn';
    const TYPE_JP_RN = 'jp_rn';
    const TYPE_JP_TRN = 'jp_trn';
    const TYPE_KE_PIN = 'ke_pin';
    const TYPE_KR_BRN = 'kr_brn';
    const TYPE_KZ_BIN = 'kz_bin';
    const TYPE_LI_UID = 'li_uid';
    const TYPE_MX_RFC = 'mx_rfc';
    const TYPE_MY_FRP = 'my_frp';
    const TYPE_MY_ITN = 'my_itn';
    const TYPE_MY_SST = 'my_sst';
    const TYPE_NG_TIN = 'ng_tin';
    const TYPE_NO_VAT = 'no_vat';
    const TYPE_NO_VOEC = 'no_voec';
    const TYPE_NZ_GST = 'nz_gst';
    const TYPE_OM_VAT = 'om_vat';
    const TYPE_PE_RUC = 'pe_ruc';
    const TYPE_PH_TIN = 'ph_tin';
    const TYPE_RO_TIN = 'ro_tin';
    const TYPE_RS_PIB = 'rs_pib';
    const TYPE_RU_INN = 'ru_inn';
    const TYPE_RU_KPP = 'ru_kpp';
    const TYPE_SA_VAT = 'sa_vat';
    const TYPE_SG_GST = 'sg_gst';
    const TYPE_SG_UEN = 'sg_uen';
    const TYPE_SI_TIN = 'si_tin';
    const TYPE_SV_NIT = 'sv_nit';
    const TYPE_TH_VAT = 'th_vat';
    const TYPE_TR_TIN = 'tr_tin';
    const TYPE_TW_VAT = 'tw_vat';
    const TYPE_UA_VAT = 'ua_vat';
    const TYPE_UNKNOWN = 'unknown';
    const TYPE_US_EIN = 'us_ein';
    const TYPE_UY_RUC = 'uy_ruc';
    const TYPE_VE_RIF = 've_rif';
    const TYPE_VN_TIN = 'vn_tin';
    const TYPE_ZA_VAT = 'za_vat';

    /**
     * Creates a new account or customer <code>tax_id</code> object.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxId the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Deletes an existing account or customer <code>tax_id</code> object.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxId the deleted resource
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of tax IDs.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\TaxId> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an account or customer <code>tax_id</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxId
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    const VERIFICATION_STATUS_PENDING = 'pending';
    const VERIFICATION_STATUS_UNAVAILABLE = 'unavailable';
    const VERIFICATION_STATUS_UNVERIFIED = 'unverified';
    const VERIFICATION_STATUS_VERIFIED = 'verified';
}
