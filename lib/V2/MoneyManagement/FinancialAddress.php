<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FinancialAddress contains information needed to transfer money to a Financial Account. A Financial Account can have more than one Financial Address.
 *
 * @property string $id The ID of a FinancialAddress.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The creation timestamp of the FinancialAddress.
 * @property null|(object{type: string, gb_bank_account: null|(object{account_holder_name: string, account_number: null|string, last4: string, sort_code: string}&\Stripe\StripeObject), us_bank_account: null|(object{account_number: null|string, bank_name: null|string, last4: string, routing_number: string, swift_code: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $credentials Object indicates the type of credentials that have been allocated and attached to the FinancialAddress. It contains all necessary banking details with which to perform money movements with the FinancialAddress. This field is only available for FinancialAddresses with an active status.
 * @property string $currency Open Enum. The currency the FinancialAddress supports.
 * @property string $financial_account A ID of the FinancialAccount this FinancialAddress corresponds to.
 * @property string $status Closed Enum. An enum representing the status of the FinancialAddress. This indicates whether or not the FinancialAddress can be used for any money movement flows.
 */
class FinancialAddress extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_address';

    const CURRENCY_AED = 'aed';
    const CURRENCY_AFN = 'afn';
    const CURRENCY_ALL = 'all';
    const CURRENCY_AMD = 'amd';
    const CURRENCY_ANG = 'ang';
    const CURRENCY_AOA = 'aoa';
    const CURRENCY_ARS = 'ars';
    const CURRENCY_AUD = 'aud';
    const CURRENCY_AWG = 'awg';
    const CURRENCY_AZN = 'azn';
    const CURRENCY_BAM = 'bam';
    const CURRENCY_BBD = 'bbd';
    const CURRENCY_BDT = 'bdt';
    const CURRENCY_BGN = 'bgn';
    const CURRENCY_BHD = 'bhd';
    const CURRENCY_BIF = 'bif';
    const CURRENCY_BMD = 'bmd';
    const CURRENCY_BND = 'bnd';
    const CURRENCY_BOB = 'bob';
    const CURRENCY_BOV = 'bov';
    const CURRENCY_BRL = 'brl';
    const CURRENCY_BSD = 'bsd';
    const CURRENCY_BTN = 'btn';
    const CURRENCY_BWP = 'bwp';
    const CURRENCY_BYN = 'byn';
    const CURRENCY_BYR = 'byr';
    const CURRENCY_BZD = 'bzd';
    const CURRENCY_CAD = 'cad';
    const CURRENCY_CDF = 'cdf';
    const CURRENCY_CHE = 'che';
    const CURRENCY_CHF = 'chf';
    const CURRENCY_CHW = 'chw';
    const CURRENCY_CLF = 'clf';
    const CURRENCY_CLP = 'clp';
    const CURRENCY_CNY = 'cny';
    const CURRENCY_COP = 'cop';
    const CURRENCY_COU = 'cou';
    const CURRENCY_CRC = 'crc';
    const CURRENCY_CUC = 'cuc';
    const CURRENCY_CUP = 'cup';
    const CURRENCY_CVE = 'cve';
    const CURRENCY_CZK = 'czk';
    const CURRENCY_DJF = 'djf';
    const CURRENCY_DKK = 'dkk';
    const CURRENCY_DOP = 'dop';
    const CURRENCY_DZD = 'dzd';
    const CURRENCY_EEK = 'eek';
    const CURRENCY_EGP = 'egp';
    const CURRENCY_ERN = 'ern';
    const CURRENCY_ETB = 'etb';
    const CURRENCY_EUR = 'eur';
    const CURRENCY_FJD = 'fjd';
    const CURRENCY_FKP = 'fkp';
    const CURRENCY_GBP = 'gbp';
    const CURRENCY_GEL = 'gel';
    const CURRENCY_GHC = 'ghc';
    const CURRENCY_GHS = 'ghs';
    const CURRENCY_GIP = 'gip';
    const CURRENCY_GMD = 'gmd';
    const CURRENCY_GNF = 'gnf';
    const CURRENCY_GTQ = 'gtq';
    const CURRENCY_GYD = 'gyd';
    const CURRENCY_HKD = 'hkd';
    const CURRENCY_HNL = 'hnl';
    const CURRENCY_HRK = 'hrk';
    const CURRENCY_HTG = 'htg';
    const CURRENCY_HUF = 'huf';
    const CURRENCY_IDR = 'idr';
    const CURRENCY_ILS = 'ils';
    const CURRENCY_INR = 'inr';
    const CURRENCY_IQD = 'iqd';
    const CURRENCY_IRR = 'irr';
    const CURRENCY_ISK = 'isk';
    const CURRENCY_JMD = 'jmd';
    const CURRENCY_JOD = 'jod';
    const CURRENCY_JPY = 'jpy';
    const CURRENCY_KES = 'kes';
    const CURRENCY_KGS = 'kgs';
    const CURRENCY_KHR = 'khr';
    const CURRENCY_KMF = 'kmf';
    const CURRENCY_KPW = 'kpw';
    const CURRENCY_KRW = 'krw';
    const CURRENCY_KWD = 'kwd';
    const CURRENCY_KYD = 'kyd';
    const CURRENCY_KZT = 'kzt';
    const CURRENCY_LAK = 'lak';
    const CURRENCY_LBP = 'lbp';
    const CURRENCY_LKR = 'lkr';
    const CURRENCY_LRD = 'lrd';
    const CURRENCY_LSL = 'lsl';
    const CURRENCY_LTL = 'ltl';
    const CURRENCY_LVL = 'lvl';
    const CURRENCY_LYD = 'lyd';
    const CURRENCY_MAD = 'mad';
    const CURRENCY_MDL = 'mdl';
    const CURRENCY_MGA = 'mga';
    const CURRENCY_MKD = 'mkd';
    const CURRENCY_MMK = 'mmk';
    const CURRENCY_MNT = 'mnt';
    const CURRENCY_MOP = 'mop';
    const CURRENCY_MRO = 'mro';
    const CURRENCY_MRU = 'mru';
    const CURRENCY_MUR = 'mur';
    const CURRENCY_MVR = 'mvr';
    const CURRENCY_MWK = 'mwk';
    const CURRENCY_MXN = 'mxn';
    const CURRENCY_MXV = 'mxv';
    const CURRENCY_MYR = 'myr';
    const CURRENCY_MZN = 'mzn';
    const CURRENCY_NAD = 'nad';
    const CURRENCY_NGN = 'ngn';
    const CURRENCY_NIO = 'nio';
    const CURRENCY_NOK = 'nok';
    const CURRENCY_NPR = 'npr';
    const CURRENCY_NZD = 'nzd';
    const CURRENCY_OMR = 'omr';
    const CURRENCY_PAB = 'pab';
    const CURRENCY_PEN = 'pen';
    const CURRENCY_PGK = 'pgk';
    const CURRENCY_PHP = 'php';
    const CURRENCY_PKR = 'pkr';
    const CURRENCY_PLN = 'pln';
    const CURRENCY_PYG = 'pyg';
    const CURRENCY_QAR = 'qar';
    const CURRENCY_RON = 'ron';
    const CURRENCY_RSD = 'rsd';
    const CURRENCY_RUB = 'rub';
    const CURRENCY_RWF = 'rwf';
    const CURRENCY_SAR = 'sar';
    const CURRENCY_SBD = 'sbd';
    const CURRENCY_SCR = 'scr';
    const CURRENCY_SDG = 'sdg';
    const CURRENCY_SEK = 'sek';
    const CURRENCY_SGD = 'sgd';
    const CURRENCY_SHP = 'shp';
    const CURRENCY_SLE = 'sle';
    const CURRENCY_SLL = 'sll';
    const CURRENCY_SOS = 'sos';
    const CURRENCY_SRD = 'srd';
    const CURRENCY_SSP = 'ssp';
    const CURRENCY_STD = 'std';
    const CURRENCY_STN = 'stn';
    const CURRENCY_SVC = 'svc';
    const CURRENCY_SYP = 'syp';
    const CURRENCY_SZL = 'szl';
    const CURRENCY_THB = 'thb';
    const CURRENCY_TJS = 'tjs';
    const CURRENCY_TMT = 'tmt';
    const CURRENCY_TND = 'tnd';
    const CURRENCY_TOP = 'top';
    const CURRENCY_TRY = 'try';
    const CURRENCY_TTD = 'ttd';
    const CURRENCY_TWD = 'twd';
    const CURRENCY_TZS = 'tzs';
    const CURRENCY_UAH = 'uah';
    const CURRENCY_UGX = 'ugx';
    const CURRENCY_USD = 'usd';
    const CURRENCY_USDC = 'usdc';
    const CURRENCY_USN = 'usn';
    const CURRENCY_UYI = 'uyi';
    const CURRENCY_UYU = 'uyu';
    const CURRENCY_UZS = 'uzs';
    const CURRENCY_VEF = 'vef';
    const CURRENCY_VES = 'ves';
    const CURRENCY_VND = 'vnd';
    const CURRENCY_VUV = 'vuv';
    const CURRENCY_WST = 'wst';
    const CURRENCY_XAF = 'xaf';
    const CURRENCY_XCD = 'xcd';
    const CURRENCY_XCG = 'xcg';
    const CURRENCY_XOF = 'xof';
    const CURRENCY_XPF = 'xpf';
    const CURRENCY_YER = 'yer';
    const CURRENCY_ZAR = 'zar';
    const CURRENCY_ZMK = 'zmk';
    const CURRENCY_ZMW = 'zmw';
    const CURRENCY_ZWD = 'zwd';
    const CURRENCY_ZWG = 'zwg';
    const CURRENCY_ZWL = 'zwl';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
}
