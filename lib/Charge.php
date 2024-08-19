<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The <code>Charge</code> object represents a single attempt to move money into your Stripe account.
 * PaymentIntent confirmation is the most common way to create Charges, but transferring
 * money to a different Stripe account through Connect also creates Charges.
 * Some legacy payment flows create Charges directly, which is not recommended for new integrations.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount intended to be collected by this payment. A positive integer representing how much to charge in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a> (e.g., 100 cents to charge $1.00 or 100 to charge ¥100, a zero-decimal currency). The minimum amount is $0.50 US or <a href="https://stripe.com/docs/currencies#minimum-and-maximum-charge-amounts">equivalent in charge currency</a>. The amount value supports up to eight digits (e.g., a value of 99999999 for a USD charge of $999,999.99).
 * @property int $amount_captured Amount in cents (or local equivalent) captured (can be less than the amount attribute on the charge if a partial capture was made).
 * @property int $amount_refunded Amount in cents (or local equivalent) refunded (can be less than the amount attribute on the charge if a partial refund was issued).
 * @property null|string|\Stripe\Application $application ID of the Connect application that created the charge.
 * @property null|string|\Stripe\ApplicationFee $application_fee The application fee (if any) for the charge. <a href="https://stripe.com/docs/connect/direct-charges#collect-fees">See the Connect documentation</a> for details.
 * @property null|int $application_fee_amount The amount of the application fee (if any) requested for the charge. <a href="https://stripe.com/docs/connect/direct-charges#collect-fees">See the Connect documentation</a> for details.
 * @property null|string $authorization_code Authorization code on the charge.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the balance transaction that describes the impact of this charge on your account balance (not including refunds or disputes).
 * @property \Stripe\StripeObject $billing_details
 * @property null|string $calculated_statement_descriptor The full statement descriptor that is passed to card networks, and that is displayed on your customers' credit card and bank statements. Allows you to see what the statement descriptor looks like after the static and dynamic portions are combined. This value only exists for card payments.
 * @property bool $captured If the charge was created without capturing, this Boolean represents whether it is still uncaptured or has since been captured.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string|\Stripe\Customer $customer ID of the customer this charge is for if one exists.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $disputed Whether the charge has been disputed.
 * @property null|string|\Stripe\BalanceTransaction $failure_balance_transaction ID of the balance transaction that describes the reversal of the balance on your account due to payment failure.
 * @property null|string $failure_code Error code explaining reason for charge failure if available (see <a href="https://stripe.com/docs/error-codes">the errors section</a> for a list of codes).
 * @property null|string $failure_message Message to user further explaining reason for charge failure if available.
 * @property null|\Stripe\StripeObject $fraud_details Information on fraud assessments for the charge.
 * @property null|string|\Stripe\Invoice $invoice ID of the invoice this charge is for if one exists.
 * @property null|\Stripe\StripeObject $level3
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string|\Stripe\Account $on_behalf_of The account (if any) the charge was made on behalf of without triggering an automatic transfer. See the <a href="https://stripe.com/docs/connect/separate-charges-and-transfers">Connect documentation</a> for details.
 * @property null|\Stripe\StripeObject $outcome Details about whether the payment was accepted, and why. See <a href="https://stripe.com/docs/declines">understanding declines</a> for details.
 * @property bool $paid <code>true</code> if the charge succeeded, or was successfully authorized for later capture.
 * @property null|string|\Stripe\PaymentIntent $payment_intent ID of the PaymentIntent associated with this charge, if one exists.
 * @property null|string $payment_method ID of the payment method used in this charge.
 * @property null|\Stripe\StripeObject $payment_method_details Details about the payment method at the time of the transaction.
 * @property null|\Stripe\StripeObject $radar_options Options to configure Radar. See <a href="https://stripe.com/docs/radar/radar-session">Radar Session</a> for more information.
 * @property null|string $receipt_email This is the email address that the receipt for this charge was sent to.
 * @property null|string $receipt_number This is the transaction number that appears on email receipts sent for this charge. This attribute will be <code>null</code> until a receipt has been sent.
 * @property null|string $receipt_url This is the URL to view the receipt for this charge. The receipt is kept up-to-date to the latest state of the charge, including any refunds. If the charge is for an Invoice, the receipt will be stylized as an Invoice receipt.
 * @property bool $refunded Whether the charge has been fully refunded. If the charge is only partially refunded, this attribute will still be false.
 * @property null|\Stripe\Collection<\Stripe\Refund> $refunds A list of refunds that have been applied to the charge.
 * @property null|string|\Stripe\Review $review ID of the review associated with this charge if one exists.
 * @property null|\Stripe\StripeObject $shipping Shipping information for the charge.
 * @property null|\Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source $source This is a legacy field that will be removed in the future. It contains the Source, Card, or BankAccount object used for the charge. For details about the payment method used for this charge, refer to <code>payment_method</code> or <code>payment_method_details</code> instead.
 * @property null|string|\Stripe\Transfer $source_transfer The transfer ID which created this charge. Only present if the charge came from another Stripe account. <a href="https://docs.stripe.com/connect/destination-charges">See the Connect documentation</a> for details.
 * @property null|string $statement_descriptor <p>For a non-card charge, text that appears on the customer's statement as the statement descriptor. This value overrides the account's default statement descriptor. For information about requirements, including the 22-character limit, see <a href="https://docs.stripe.com/get-started/account/statement-descriptors">the Statement Descriptor docs</a>.</p><p>For a card charge, this value is ignored unless you don't specify a <code>statement_descriptor_suffix</code>, in which case this value is used as the suffix.</p>
 * @property null|string $statement_descriptor_suffix Provides information about a card charge. Concatenated to the account's <a href="https://docs.stripe.com/get-started/account/statement-descriptors#static">statement descriptor prefix</a> to form the complete statement descriptor that appears on the customer's statement. If the account has no prefix value, the suffix is concatenated to the account's statement descriptor.
 * @property string $status The status of the payment is either <code>succeeded</code>, <code>pending</code>, or <code>failed</code>.
 * @property null|string|\Stripe\Transfer $transfer ID of the transfer to the <code>destination</code> account (only applicable if the charge was created using the <code>destination</code> parameter).
 * @property null|\Stripe\StripeObject $transfer_data An optional dictionary including the account to automatically transfer to as part of a destination charge. <a href="https://stripe.com/docs/connect/destination-charges">See the Connect documentation</a> for details.
 * @property null|string $transfer_group A string that identifies this transaction as part of a group. See the <a href="https://stripe.com/docs/connect/separate-charges-and-transfers#transfer-options">Connect documentation</a> for details.
 */
class Charge extends ApiResource
{
    const OBJECT_NAME = 'charge';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * This method is no longer recommended—use the <a
     * href="/docs/api/payment_intents">Payment Intents API</a> to initiate a new
     * payment instead. Confirmation of the PaymentIntent creates the
     * <code>Charge</code> object used to request payment.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Charge the created resource
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
     * Returns a list of charges you’ve previously created. The charges are returned in
     * sorted order, with the most recent charges appearing first.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Charge> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a charge that has previously been created. Supply the
     * unique charge ID that was returned from your previous request, and Stripe will
     * return the corresponding charge information. The same information is returned
     * when creating or refunding the charge.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Charge
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specified charge by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Charge the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Possible string representations of decline codes.
     * These strings are applicable to the decline_code property of the \Stripe\Exception\CardException exception.
     *
     * @see https://stripe.com/docs/declines/codes
     */
    const DECLINED_AUTHENTICATION_REQUIRED = 'authentication_required';
    const DECLINED_APPROVE_WITH_ID = 'approve_with_id';
    const DECLINED_CALL_ISSUER = 'call_issuer';
    const DECLINED_CARD_NOT_SUPPORTED = 'card_not_supported';
    const DECLINED_CARD_VELOCITY_EXCEEDED = 'card_velocity_exceeded';
    const DECLINED_CURRENCY_NOT_SUPPORTED = 'currency_not_supported';
    const DECLINED_DO_NOT_HONOR = 'do_not_honor';
    const DECLINED_DO_NOT_TRY_AGAIN = 'do_not_try_again';
    const DECLINED_DUPLICATED_TRANSACTION = 'duplicate_transaction';
    const DECLINED_EXPIRED_CARD = 'expired_card';
    const DECLINED_FRAUDULENT = 'fraudulent';
    const DECLINED_GENERIC_DECLINE = 'generic_decline';
    const DECLINED_INCORRECT_NUMBER = 'incorrect_number';
    const DECLINED_INCORRECT_CVC = 'incorrect_cvc';
    const DECLINED_INCORRECT_PIN = 'incorrect_pin';
    const DECLINED_INCORRECT_ZIP = 'incorrect_zip';
    const DECLINED_INSUFFICIENT_FUNDS = 'insufficient_funds';
    const DECLINED_INVALID_ACCOUNT = 'invalid_account';
    const DECLINED_INVALID_AMOUNT = 'invalid_amount';
    const DECLINED_INVALID_CVC = 'invalid_cvc';
    const DECLINED_INVALID_EXPIRY_YEAR = 'invalid_expiry_year';
    const DECLINED_INVALID_NUMBER = 'invalid_number';
    const DECLINED_INVALID_PIN = 'invalid_pin';
    const DECLINED_ISSUER_NOT_AVAILABLE = 'issuer_not_available';
    const DECLINED_LOST_CARD = 'lost_card';
    const DECLINED_MERCHANT_BLACKLIST = 'merchant_blacklist';
    const DECLINED_NEW_ACCOUNT_INFORMATION_AVAILABLE = 'new_account_information_available';
    const DECLINED_NO_ACTION_TAKEN = 'no_action_taken';
    const DECLINED_NOT_PERMITTED = 'not_permitted';
    const DECLINED_OFFLINE_PIN_REQUIRED = 'offline_pin_required';
    const DECLINED_ONLINE_OR_OFFLINE_PIN_REQUIRED = 'online_or_offline_pin_required';
    const DECLINED_PICKUP_CARD = 'pickup_card';
    const DECLINED_PIN_TRY_EXCEEDED = 'pin_try_exceeded';
    const DECLINED_PROCESSING_ERROR = 'processing_error';
    const DECLINED_REENTER_TRANSACTION = 'reenter_transaction';
    const DECLINED_RESTRICTED_CARD = 'restricted_card';
    const DECLINED_REVOCATION_OF_ALL_AUTHORIZATIONS = 'revocation_of_all_authorizations';
    const DECLINED_REVOCATION_OF_AUTHORIZATION = 'revocation_of_authorization';
    const DECLINED_SECURITY_VIOLATION = 'security_violation';
    const DECLINED_SERVICE_NOT_ALLOWED = 'service_not_allowed';
    const DECLINED_STOLEN_CARD = 'stolen_card';
    const DECLINED_STOP_PAYMENT_ORDER = 'stop_payment_order';
    const DECLINED_TESTMODE_DECLINE = 'testmode_decline';
    const DECLINED_TRANSACTION_NOT_ALLOWED = 'transaction_not_allowed';
    const DECLINED_TRY_AGAIN_LATER = 'try_again_later';
    const DECLINED_WITHDRAWAL_COUNT_LIMIT_EXCEEDED = 'withdrawal_count_limit_exceeded';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Charge the captured charge
     */
    public function capture($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/capture';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<\Stripe\Charge> the charge search results
     */
    public static function search($params = null, $opts = null)
    {
        $url = '/v1/charges/search';

        return static::_requestPage($url, \Stripe\SearchResult::class, $params, $opts);
    }

    const PATH_REFUNDS = '/refunds';

    /**
     * @param string $id the ID of the charge on which to retrieve the refunds
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Refund> the list of refunds
     */
    public static function allRefunds($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_REFUNDS, $params, $opts);
    }

    /**
     * @param string $id the ID of the charge to which the refund belongs
     * @param string $refundId the ID of the refund to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Refund
     */
    public static function retrieveRefund($id, $refundId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_REFUNDS, $refundId, $params, $opts);
    }
}
