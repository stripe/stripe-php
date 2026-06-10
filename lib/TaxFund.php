<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A TaxFund object represents a single tax float sweep event — funds moved between
 * a merchant's payments balance and their tax fund financial account for Stripe Tax obligations.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount swept, in the smallest currency unit. Always positive.
 * @property null|(object{checkout_session?: string, credit_note?: string, invoice?: string, payment_intent?: string, refund?: string, tax_transaction?: string}&StripeObject) $context Associated billing or tax documents for this sweep.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property (object{payments_balance?: (object{balance_transaction: BalanceTransaction|string}&StripeObject), tax_fund_account?: (object{financial_account?: string, transaction?: string}&StripeObject), type: string}&StripeObject) $destination Where funds moved to.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property (object{payments_balance?: (object{balance_transaction: BalanceTransaction|string}&StripeObject), tax_fund_account?: (object{financial_account?: string, transaction?: string}&StripeObject), type: string}&StripeObject) $source Where funds moved from.
 * @property (object{balance_transaction: BalanceTransaction|string, type: string}&StripeObject) $trigger What caused the sweep.
 */
class TaxFund extends ApiResource
{
    const OBJECT_NAME = 'tax_fund';

    /**
     * Returns a list of tax funds in reverse chronological order.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<TaxFund> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a tax fund object by its ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return TaxFund
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
}
