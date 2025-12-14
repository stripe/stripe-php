<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Balance transfers represent funds moving between balance types on your Stripe account.
 * They currently support moving funds between your Stripe balance and your <a href="https://docs.stripe.com/issuing">Issuing</a> balance and between your <a href="https://docs.stripe.com/connect/funds-segregation">Allocated Funds</a> balance and your Stripe balance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount A positive integer representing how much was transferred in the smallest currency unit.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|(object{issuing?: (object{balance_transaction?: BalanceTransaction|string}&StripeObject), payments?: (object{balance_transaction?: BalanceTransaction|string}&StripeObject), type: string}&StripeObject) $destination_balance The balance that funds were transferred to.
 * @property null|string $hosted_regulatory_receipt_url A <a href="https://docs.stripe.com/treasury/moving-money/regulatory-receipts">hosted transaction receipt</a> URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{issuing?: (object{balance_transaction?: BalanceTransaction|string}&StripeObject), payments?: (object{balance_transaction: BalanceTransaction|string, source_type?: string}&StripeObject), type: string}&StripeObject) $source_balance The balance that funds were transferred from. One of <code>card</code>, <code>fpx</code>, or <code>bank_account</code>.
 */
class BalanceTransfer extends ApiResource
{
    const OBJECT_NAME = 'balance_transfer';

    /**
     * Creates a balance transfer. For Issuing use cases, funds will be debited
     * immediately from the source balance and credited to the destination balance
     * immediately (if your account is based in the US) or next-business-day (if your
     * account is based in the EU). For Segregated Separate Charges and Transfers use
     * cases, funds will be debited immediately from the source balance and credited
     * immediately to the destination balance.
     *
     * @param null|array{amount: int, currency: string, destination_balance: array{type: string}, expand?: string[], metadata?: array<string, string>, source_balance: array{allocated_funds?: array{charge: string, type: string}, type: string}} $params
     * @param null|array|string $options
     *
     * @return BalanceTransfer the created resource
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
}
