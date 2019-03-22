<?php

namespace Stripe\Error;

use Exception;

abstract class Base extends Exception
{

    /**
     * All of the possible Stripe error code constants that may be returned from the getStripeCode() method.
     * @link https://stripe.com/docs/error-codes
     */
    const ERROR_ACCOUNT_ALREADY_EXISTS                     = 'account_already_exists';
    const ERROR_ACCOUNT_COUNTRY_INVALID_ADDRESS            = 'account_country_invalid_address';
    const ERROR_ACCOUNT_INVALID                            = 'account_invalid';
    const ERROR_ACCOUNT_NUMBER_INVALID                     = 'account_number_invalid';
    const ERROR_ALIPAY_UPGRADE_REQUIRED                    = 'alipay_upgrade_required';
    const ERROR_AMOUNT_TOO_LARGE                           = 'amount_too_large';
    const ERROR_AMOUNT_TOO_SMALL                           = 'amount_too_small';
    const ERROR_API_KEY_EXPIRED                            = 'api_key_expired';
    const ERROR_BALANCE_INSUFFICIENT                       = 'balance_insufficient';
    const ERROR_BANK_ACCOUNT_EXISTS                        = 'bank_account_exists';
    const ERROR_BANK_ACCOUNT_UNUSABLE                      = 'bank_account_unusable';
    const ERROR_BANK_ACCOUNT_UNVERIFIED                    = 'bank_account_unverified';
    const ERROR_BITCOIN_UPGRADE_REQUIRED                   = 'bitcoin_upgrade_required';
    const ERROR_CARD_DECLINED                              = 'card_declined';
    const ERROR_CHARGE_ALREADY_CAPTURED                    = 'charge_already_captured';
    const ERROR_CHARGE_ALREADY_REFUNDED                    = 'charge_already_refunded';
    const ERROR_CHARGE_DISPUTED                            = 'charge_disputed';
    const ERROR_CHARGE_EXCEEDS_SOURCE_LIMIT                = 'charge_exceeds_source_limit';
    const ERROR_CHARGE_EXPIRED_FOR_CAPTURE                 = 'charge_expired_for_capture';
    const ERROR_COUNTRY_UNSUPPORTED                        = 'country_unsupported';
    const ERROR_COUPON_EXPIRED                             = 'coupon_expired';
    const ERROR_CUSTOMER_MAX_SUBSCRIPTIONS                 = 'customer_max_subscriptions';
    const ERROR_EMAIL_INVALID                              = 'email_invalid';
    const ERROR_EXPIRED_CARD                               = 'expired_card';
    const ERROR_IDEMPOTENCY_KEY_IN_USE                     = 'idempotency_key_in_use';
    const ERROR_INCORRECT_ADDRESS                          = 'incorrect_address';
    const ERROR_INCORRECT_CVC                              = 'incorrect_cvc';
    const ERROR_INCORRECT_NUMBER                           = 'incorrect_number';
    const ERROR_INCORRECT_ZIP                              = 'incorrect_zip';
    const ERROR_INSTANT_PAYOUTS_UNSUPPORTED                = 'instant_payouts_unsupported';
    const ERROR_INVALID_CARD_TYPE                          = 'invalid_card_type';
    const ERROR_INVALID_CHARGE_AMOUNT                      = 'invalid_charge_amount';
    const ERROR_INVALID_CVC                                = 'invalid_cvc';
    const ERROR_INVALID_EXPIRY_MONTH                       = 'invalid_expiry_month';
    const ERROR_INVALID_EXPIRY_YEAR                        = 'invalid_expiry_year';
    const ERROR_INVALID_NUMBER                             = 'invalid_number';
    const ERROR_INVALID_SOURCE_USAGE                       = 'invalid_source_usage';
    const ERROR_INVOICE_NO_CUSTOMER_LINE_ITEMS             = 'invoice_no_customer_line_items';
    const ERROR_INVOICE_NO_SUBSCRIPTION_LINE_ITEMS         = 'invoice_no_subscription_line_items';
    const ERROR_INVOICE_NOT_EDITABLE                       = 'invoice_not_editable';
    const ERROR_INVOICE_UPCOMING_NONE                      = 'invoice_upcoming_none';
    const ERROR_LIVEMODE_MISMATCH                          = 'livemode_mismatch';
    const ERROR_MISSING                                    = 'missing';
    const ERROR_NOT_ALLOWED_ON_STANDARD_ACCOUNT            = 'not_allowed_on_standard_account';
    const ERROR_ORDER_CREATION_FAILED                      = 'order_creation_failed';
    const ERROR_ORDER_REQUIRED_SETTINGS                    = 'order_required_settings';
    const ERROR_ORDER_STATUS_INVALID                       = 'order_status_invalid';
    const ERROR_ORDER_UPSTREAM_TIMEOUT                     = 'order_upstream_timeout';
    const ERROR_OUT_OF_INVENTORY                           = 'out_of_inventory';
    const ERROR_PARAMETER_INVALID_EMPTY                    = 'parameter_invalid_empty';
    const ERROR_PARAMETER_INVALID_INTEGER                  = 'parameter_invalid_integer';
    const ERROR_PARAMETER_INVALID_STRING_BLANK             = 'parameter_invalid_string_blank';
    const ERROR_PARAMETER_INVALID_STRING_EMPTY             = 'parameter_invalid_string_empty';
    const ERROR_PARAMETER_MISSING                          = 'parameter_missing';
    const ERROR_PARAMETER_UNKNOWN                          = 'parameter_unknown';
    const ERROR_PARAMETERS_EXCLUSIVE                       = 'parameters_exclusive';
    const ERROR_PAYMENT_INTENT_AUTHENTICATION_FAILURE      = 'payment_intent_authentication_failure';
    const ERROR_PAYMENT_INTENT_INCOMPATIBLE_PAYMENT_METHOD = 'payment_intent_incompatible_payment_method';
    const ERROR_PAYMENT_INTENT_INVALID_PARAMETER           = 'payment_intent_invalid_parameter';
    const ERROR_PAYMENT_INTENT_PAYMENT_ATTEMPT_FAILED      = 'payment_intent_payment_attempt_failed';
    const ERROR_PAYMENT_INTENT_UNEXPECTED_STATE            = 'payment_intent_unexpected_state';
    const ERROR_PAYMENT_METHOD_UNACTIVATED                 = 'payment_method_unactivated';
    const ERROR_PAYMENT_METHOD_UNEXPECTED_STATE            = 'payment_method_unexpected_state';
    const ERROR_PAYOUTS_NOT_ALLOWED                        = 'payouts_not_allowed';
    const ERROR_PLATFORM_API_KEY_EXPIRED                   = 'platform_api_key_expired';
    const ERROR_POSTAL_CODE_INVALID                        = 'postal_code_invalid';
    const ERROR_PROCESSING_ERROR                           = 'processing_error';
    const ERROR_PRODUCT_INACTIVE                           = 'product_inactive';
    const ERROR_RATE_LIMIT                                 = 'rate_limit';
    const ERROR_RESOURCE_ALREADY_EXISTS                    = 'resource_already_exists';
    const ERROR_RESOURCE_MISSING                           = 'resource_missing';
    const ERROR_ROUTING_NUMBER_INVALID                     = 'routing_number_invalid';
    const ERROR_SECRET_KEY_REQUIRED                        = 'secret_key_required';
    const ERROR_SEPA_UNSUPPORTED_ACCOUNT                   = 'sepa_unsupported_account';
    const ERROR_SHIPPING_CALCULATION_FAILED                = 'shipping_calculation_failed';
    const ERROR_SKU_INACTIVE                               = 'sku_inactive';
    const ERROR_STATE_UNSUPPORTED                          = 'state_unsupported';
    const ERROR_TAX_ID_INVALID                             = 'tax_id_invalid';
    const ERROR_TAXES_CALCULATION_FAILED                   = 'taxes_calculation_failed';
    const ERROR_TESTMODE_CHARGES_ONLY                      = 'testmode_charges_only';
    const ERROR_TLS_VERSION_UNSUPPORTED                    = 'tls_version_unsupported';
    const ERROR_TOKEN_ALREADY_USED                         = 'token_already_used';
    const ERROR_TOKEN_IN_USE                               = 'token_in_use';
    const ERROR_TRANSFERS_NOT_ALLOWED                      = 'transfers_not_allowed';
    const ERROR_UPSTREAM_ORDER_CREATION_FAILED             = 'upstream_order_creation_failed';
    const ERROR_URL_INVALID                                = 'url_invalid';

    public function __construct(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null
    ) {
        parent::__construct($message);
        $this->httpStatus = $httpStatus;
        $this->httpBody = $httpBody;
        $this->jsonBody = $jsonBody;
        $this->httpHeaders = $httpHeaders;
        $this->requestId = null;

        // TODO: make this a proper constructor argument in the next major
        //       release.
        $this->stripeCode = isset($jsonBody["error"]["code"]) ? $jsonBody["error"]["code"] : null;

        if ($httpHeaders && isset($httpHeaders['Request-Id'])) {
            $this->requestId = $httpHeaders['Request-Id'];
        }
    }

    public function getStripeCode()
    {
        return $this->stripeCode;
    }

    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    public function getHttpBody()
    {
        return $this->httpBody;
    }

    public function getJsonBody()
    {
        return $this->jsonBody;
    }

    public function getHttpHeaders()
    {
        return $this->httpHeaders;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function __toString()
    {
        $id = $this->requestId ? " from API request '{$this->requestId}'": "";
        $message = explode("\n", parent::__toString());
        $message[0] .= $id;
        return implode("\n", $message);
    }
}
