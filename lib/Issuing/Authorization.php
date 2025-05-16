<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * When an <a href="https://stripe.com/docs/issuing">issued card</a> is used to make a purchase, an Issuing <code>Authorization</code>
 * object is created. <a href="https://stripe.com/docs/issuing/purchases/authorizations">Authorizations</a> must be approved for the
 * purchase to be completed successfully.
 *
 * Related guide: <a href="https://stripe.com/docs/issuing/purchases/authorizations">Issued card authorizations</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The total amount that was authorized or rejected. This amount is in <code>currency</code> and in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>. <code>amount</code> should be the same as <code>merchant_amount</code>, unless <code>currency</code> and <code>merchant_currency</code> are different.
 * @property null|(object{atm_fee: null|int, cashback_amount: null|int}&\Stripe\StripeObject) $amount_details Detailed breakdown of amount components. These amounts are denominated in <code>currency</code> and in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>.
 * @property bool $approved Whether the authorization has been approved.
 * @property string $authorization_method How the card details were provided.
 * @property \Stripe\BalanceTransaction[] $balance_transactions List of balance transactions associated with this authorization.
 * @property Card $card You can <a href="https://stripe.com/docs/issuing">create physical or virtual cards</a> that are issued to cardholders.
 * @property null|Cardholder|string $cardholder The cardholder to whom this authorization belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency The currency of the cardholder. This currency can be different from the currency presented at authorization and the <code>merchant_currency</code> field on this authorization. Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|(object{cardholder_prompt_data: null|(object{alphanumeric_id: null|string, driver_id: null|string, odometer: null|int, unspecified_id: null|string, user_id: null|string, vehicle_number: null|string}&\Stripe\StripeObject), purchase_type: null|string, reported_breakdown: null|(object{fuel: null|(object{gross_amount_decimal: null|string}&\Stripe\StripeObject), non_fuel: null|(object{gross_amount_decimal: null|string}&\Stripe\StripeObject), tax: null|(object{local_amount_decimal: null|string, national_amount_decimal: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject), service_type: null|string}&\Stripe\StripeObject) $fleet Fleet-specific information for authorizations using Fleet cards.
 * @property null|((object{channel: string, status: string, undeliverable_reason: null|string}&\Stripe\StripeObject))[] $fraud_challenges Fraud challenges sent to the cardholder, if this authorization was declined for fraud risk reasons.
 * @property null|(object{industry_product_code: null|string, quantity_decimal: null|string, type: null|string, unit: null|string, unit_cost_decimal: null|string}&\Stripe\StripeObject) $fuel Information about fuel that was purchased with this transaction. Typically this information is received from the merchant after the authorization has been approved and the fuel dispensed.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $merchant_amount The total amount that was authorized or rejected. This amount is in the <code>merchant_currency</code> and in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>. <code>merchant_amount</code> should be the same as <code>amount</code>, unless <code>merchant_currency</code> and <code>currency</code> are different.
 * @property string $merchant_currency The local currency that was presented to the cardholder for the authorization. This currency can be different from the cardholder currency and the <code>currency</code> field on this authorization. Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property (object{category: string, category_code: string, city: null|string, country: null|string, name: null|string, network_id: string, postal_code: null|string, state: null|string, tax_id: null|string, terminal_id: null|string, url: null|string}&\Stripe\StripeObject) $merchant_data
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{acquiring_institution_id: null|string, system_trace_audit_number: null|string, transaction_id: null|string}&\Stripe\StripeObject) $network_data Details about the authorization, such as identifiers, set by the card network.
 * @property null|(object{amount: int, amount_details: null|(object{atm_fee: null|int, cashback_amount: null|int}&\Stripe\StripeObject), currency: string, is_amount_controllable: bool, merchant_amount: int, merchant_currency: string, network_risk_score: null|int}&\Stripe\StripeObject) $pending_request The pending authorization request. This field will only be non-null during an <code>issuing_authorization.request</code> webhook.
 * @property ((object{amount: int, amount_details: null|(object{atm_fee: null|int, cashback_amount: null|int}&\Stripe\StripeObject), approved: bool, authorization_code: null|string, created: int, currency: string, merchant_amount: int, merchant_currency: string, network_risk_score: null|int, reason: string, reason_message: null|string, requested_at: null|int}&\Stripe\StripeObject))[] $request_history History of every time a <code>pending_request</code> authorization was approved/declined, either by you directly or by Stripe (e.g. based on your spending_controls). If the merchant changes the authorization by performing an incremental authorization, you can look at this field to see the previous requests for the authorization. This field can be helpful in determining why a given authorization was approved/declined.
 * @property string $status The current status of the authorization in its lifecycle.
 * @property null|string|Token $token <a href="https://stripe.com/docs/api/issuing/tokens/object">Token</a> object used for this authorization. If a network token was not used for this authorization, this field will be null.
 * @property Transaction[] $transactions List of <a href="https://stripe.com/docs/api/issuing/transactions">transactions</a> associated with this authorization.
 * @property null|(object{received_credits: string[], received_debits: string[], transaction: null|string}&\Stripe\StripeObject) $treasury <a href="https://stripe.com/docs/api/treasury">Treasury</a> details related to this authorization if it was created on a <a href="https://stripe.com/docs/api/treasury/financial_accounts">FinancialAccount</a>.
 * @property (object{address_line1_check: string, address_postal_code_check: string, authentication_exemption: null|(object{claimed_by: string, type: string}&\Stripe\StripeObject), cvc_check: string, expiry_check: string, postal_code: null|string, three_d_secure: null|(object{result: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $verification_data
 * @property null|bool $verified_by_fraud_challenge Whether the authorization bypassed fraud risk checks because the cardholder has previously completed a fraud challenge on a similar high-risk authorization from the same merchant.
 * @property null|string $wallet The digital wallet used for this transaction. One of <code>apple_pay</code>, <code>google_pay</code>, or <code>samsung_pay</code>. Will populate as <code>null</code> when no digital wallet was utilized.
 */
class Authorization extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.authorization';

    use \Stripe\ApiOperations\Update;

    const AUTHORIZATION_METHOD_CHIP = 'chip';
    const AUTHORIZATION_METHOD_CONTACTLESS = 'contactless';
    const AUTHORIZATION_METHOD_KEYED_IN = 'keyed_in';
    const AUTHORIZATION_METHOD_ONLINE = 'online';
    const AUTHORIZATION_METHOD_SWIPE = 'swipe';

    const STATUS_CLOSED = 'closed';
    const STATUS_EXPIRED = 'expired';
    const STATUS_PENDING = 'pending';
    const STATUS_REVERSED = 'reversed';

    /**
     * Returns a list of Issuing <code>Authorization</code> objects. The objects are
     * sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array{card?: string, cardholder?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Authorization> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Authorization</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specified Issuing <code>Authorization</code> object by setting the
     * values of the parameters passed. Any parameters not provided will be left
     * unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|array|string $opts
     *
     * @return Authorization the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Authorization the approved authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function approve($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/approve';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Authorization the declined authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function decline($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/decline';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
