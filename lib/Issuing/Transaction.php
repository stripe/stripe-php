<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * Any use of an <a href="https://docs.stripe.com/issuing">issued card</a> that results in funds entering or leaving
 * your Stripe account, such as a completed purchase or refund, is represented by an Issuing
 * <code>Transaction</code> object.
 *
 * Related guide: <a href="https://docs.stripe.com/issuing/purchases/transactions">Issued card transactions</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The transaction amount, which will be reflected in your balance. This amount is in your currency and in the <a href="https://docs.stripe.com/currencies#zero-decimal">smallest currency unit</a>.
 * @property null|(object{atm_fee: null|int, cashback_amount: null|int}&\Stripe\StripeObject) $amount_details Detailed breakdown of amount components. These amounts are denominated in <code>currency</code> and in the <a href="https://docs.stripe.com/currencies#zero-decimal">smallest currency unit</a>.
 * @property null|Authorization|string $authorization The <code>Authorization</code> object that led to this transaction.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the <a href="https://docs.stripe.com/api/balance_transactions">balance transaction</a> associated with this transaction.
 * @property Card|string $card The card used to make this transaction.
 * @property null|Cardholder|string $cardholder The cardholder to whom this transaction belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|Dispute|string $dispute If you've disputed the transaction, the ID of the dispute.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $merchant_amount The amount that the merchant will receive, denominated in <code>merchant_currency</code> and in the <a href="https://docs.stripe.com/currencies#zero-decimal">smallest currency unit</a>. It will be different from <code>amount</code> if the merchant is taking payment in a different currency.
 * @property string $merchant_currency The currency with which the merchant is taking payment.
 * @property (object{category: string, category_code: string, city: null|string, country: null|string, name: null|string, network_id: string, postal_code: null|string, state: null|string, tax_id: null|string, terminal_id: null|string, url: null|string}&\Stripe\StripeObject) $merchant_data
 * @property \Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{authorization_code: null|string, processing_date: null|string, transaction_id: null|string}&\Stripe\StripeObject) $network_data Details about the transaction, such as processing dates, set by the card network.
 * @property null|(object{fleet: null|(object{cardholder_prompt_data: null|(object{driver_id: null|string, odometer: null|int, unspecified_id: null|string, user_id: null|string, vehicle_number: null|string}&\Stripe\StripeObject), purchase_type: null|string, reported_breakdown: null|(object{fuel: null|(object{gross_amount_decimal: null|string}&\Stripe\StripeObject), non_fuel: null|(object{gross_amount_decimal: null|string}&\Stripe\StripeObject), tax: null|(object{local_amount_decimal: null|string, national_amount_decimal: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject), service_type: null|string}&\Stripe\StripeObject), flight: null|(object{departure_at: null|int, passenger_name: null|string, refundable: null|bool, segments: null|((object{arrival_airport_code: null|string, carrier: null|string, departure_airport_code: null|string, flight_number: null|string, service_class: null|string, stopover_allowed: null|bool}&\Stripe\StripeObject))[], travel_agency: null|string}&\Stripe\StripeObject), fuel: null|(object{industry_product_code: null|string, quantity_decimal: null|string, type: string, unit: string, unit_cost_decimal: string}&\Stripe\StripeObject), lodging: null|(object{check_in_at: null|int, nights: null|int}&\Stripe\StripeObject), receipt: null|((object{description: null|string, quantity: null|float, total: null|int, unit_cost: null|int}&\Stripe\StripeObject))[], reference: null|string}&\Stripe\StripeObject) $purchase_details Additional purchase information that is optionally provided by the merchant.
 * @property null|string|Token $token <a href="https://docs.stripe.com/api/issuing/tokens/object">Token</a> object used for this transaction. If a network token was not used for this transaction, this field will be null.
 * @property null|(object{received_credit: null|string, received_debit: null|string}&\Stripe\StripeObject) $treasury <a href="https://docs.stripe.com/api/treasury">Treasury</a> details related to this transaction if it was created on a [FinancialAccount](/docs/api/treasury/financial_accounts
 * @property string $type The nature of the transaction.
 * @property null|string $wallet The digital wallet used for this transaction. One of <code>apple_pay</code>, <code>google_pay</code>, or <code>samsung_pay</code>.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.transaction';

    use \Stripe\ApiOperations\Update;

    const TYPE_CAPTURE = 'capture';
    const TYPE_REFUND = 'refund';

    const WALLET_APPLE_PAY = 'apple_pay';
    const WALLET_GOOGLE_PAY = 'google_pay';
    const WALLET_SAMSUNG_PAY = 'samsung_pay';

    /**
     * Returns a list of Issuing <code>Transaction</code> objects. The objects are
     * sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array{card?: string, cardholder?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Transaction> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Transaction</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Transaction
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
     * Updates the specified Issuing <code>Transaction</code> object by setting the
     * values of the parameters passed. Any parameters not provided will be left
     * unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|array|string $opts
     *
     * @return Transaction the updated resource
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
}
