<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * A fraud liability debit occurs when Stripe debits a platform's account for fraud losses on Issuing transactions.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Debited amount. This is equal to the disputed amount and is given in the card’s currency and in the smallest currency unit.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the <a href="https://stripe.com/docs/api/balance_transactions">balance transaction</a> associated with this debit.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency The currency of the debit. Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $dispute The ID of the linked dispute.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class FraudLiabilityDebit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.fraud_liability_debit';

    /**
     * Returns a list of Issuing <code>FraudLiabilityDebit</code> objects. The objects
     * are sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array{created?: int|array, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\FraudLiabilityDebit> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>FraudLiabilityDebit</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\FraudLiabilityDebit
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
