<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * You can add one or multiple tax IDs to a <a
 * href="https://stripe.com/docs/api/customers">customer</a>. A customer's tax IDs
 * are displayed on invoices and credit notes issued for the customer.
 *
 * Related guide: <a href="https://stripe.com/docs/billing/taxes/tax-ids">Customer
 * Tax Identification Numbers</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $country Two-letter ISO code representing the country of the tax ID.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer ID of the customer.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property string $type Type of the tax ID, one of `ae_trn`, `au_abn`, `au_arn`, `bg_uic`, `br_cnpj`, `br_cpf`, `ca_bn`, `ca_gst_hst`, `ca_pst_bc`, `ca_pst_mb`, `ca_pst_sk`, `ca_qst`, `ch_vat`, `cl_tin`, `eg_tin`, `es_cif`, `eu_oss_vat`, `eu_vat`, `gb_vat`, `ge_vat`, `hk_br`, `hu_tin`, `id_npwp`, `il_vat`, `in_gst`, `is_vat`, `jp_cn`, `jp_rn`, `jp_trn`, `ke_pin`, `kr_brn`, `li_uid`, `mx_rfc`, `my_frp`, `my_itn`, `my_sst`, `no_vat`, `nz_gst`, `ph_tin`, `ru_inn`, `ru_kpp`, `sa_vat`, `sg_gst`, `sg_uen`, `si_tin`, `th_vat`, `tr_tin`, `tw_vat`, `ua_vat`, `us_ein`, or `za_vat`. Note that some legacy tax IDs have type `unknown`
 * @property string $value Value of the tax ID.
 * @property null|\Stripe\StripeObject $verification Tax ID verification information.
 */
class TaxId extends ApiResource
{
    const OBJECT_NAME = 'tax_id';

    use ApiOperations\Delete;

    const TYPE_AE_TRN = 'ae_trn';
    const TYPE_AU_ABN = 'au_abn';
    const TYPE_AU_ARN = 'au_arn';
    const TYPE_BG_UIC = 'bg_uic';
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
    const TYPE_LI_UID = 'li_uid';
    const TYPE_MX_RFC = 'mx_rfc';
    const TYPE_MY_FRP = 'my_frp';
    const TYPE_MY_ITN = 'my_itn';
    const TYPE_MY_SST = 'my_sst';
    const TYPE_NO_VAT = 'no_vat';
    const TYPE_NZ_GST = 'nz_gst';
    const TYPE_PH_TIN = 'ph_tin';
    const TYPE_RU_INN = 'ru_inn';
    const TYPE_RU_KPP = 'ru_kpp';
    const TYPE_SA_VAT = 'sa_vat';
    const TYPE_SG_GST = 'sg_gst';
    const TYPE_SG_UEN = 'sg_uen';
    const TYPE_SI_TIN = 'si_tin';
    const TYPE_TH_VAT = 'th_vat';
    const TYPE_TR_TIN = 'tr_tin';
    const TYPE_TW_VAT = 'tw_vat';
    const TYPE_UA_VAT = 'ua_vat';
    const TYPE_UNKNOWN = 'unknown';
    const TYPE_US_EIN = 'us_ein';
    const TYPE_ZA_VAT = 'za_vat';

    const VERIFICATION_STATUS_PENDING = 'pending';
    const VERIFICATION_STATUS_UNAVAILABLE = 'unavailable';
    const VERIFICATION_STATUS_UNVERIFIED = 'unverified';
    const VERIFICATION_STATUS_VERIFIED = 'verified';

    /**
     * @return string the API URL for this tax id
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $customer = $this['customer'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                "Could not determine which URL to request: class instance has invalid ID: {$id}"
            );
        }
        $id = Util\Util::utf8($id);
        $customer = Util\Util::utf8($customer);

        $base = Customer::classUrl();
        $customerExtn = \urlencode($customer);
        $extn = \urlencode($id);

        return "{$base}/{$customerExtn}/tax_ids/{$extn}";
    }

    /**
     * @param array|string $_id
     * @param null|array|string $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = 'Tax IDs cannot be retrieved without a customer ID. Retrieve ' .
            "a tax ID using `Customer::retrieveTaxId('customer_id', " .
            "'tax_id_id')`.";

        throw new Exception\BadMethodCallException($msg);
    }
}
