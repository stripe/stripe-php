<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * When an [issued card](https://stripe.com/docs/issuing) is used to
 * make a purchase, an Issuing `Authorization` object is created. [Authorizations](https://stripe.com/docs/issuing/purchases/authorizations)
 * must be approved for the purchase to be completed successfully.
 *
 * Related guide: [Issued Card Authorizations](https://stripe.com/docs/issuing/purchases/authorizations).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The total amount that was authorized or rejected. This amount is in the card's currency and in the [smallest currency unit](https://stripe.com/docs/currencies#zero-decimal).
 * @property null|\Stripe\StripeObject $amount_details Detailed breakdown of amount components. These amounts are denominated in `currency` and in the [smallest currency unit](https://stripe.com/docs/currencies#zero-decimal).
 * @property bool $approved Whether the authorization has been approved.
 * @property string $authorization_method How the card details were provided.
 * @property \Stripe\BalanceTransaction[] $balance_transactions List of balance transactions associated with this authorization.
 * @property \Stripe\Issuing\Card $card You can [create physical or virtual cards](https://stripe.com/docs/issuing/cards) that are issued to cardholders.
 * @property null|string|\Stripe\Issuing\Cardholder $cardholder The cardholder to whom this authorization belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property int $merchant_amount The total amount that was authorized or rejected. This amount is in the `merchant_currency` and in the [smallest currency unit](https://stripe.com/docs/currencies#zero-decimal).
 * @property string $merchant_currency The currency that was presented to the cardholder for the authorization. Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property \Stripe\StripeObject $merchant_data
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $network_data Details about the authorization, such as identifiers, set by the card network.
 * @property null|\Stripe\StripeObject $pending_request The pending authorization request. This field will only be non-null during an `issuing_authorization.request` webhook.
 * @property \Stripe\StripeObject[] $request_history History of every time a `pending_request` authorization was approved/declined, either by you directly or by Stripe (e.g. based on your spending_controls). If the merchant changes the authorization by performing an incremental authorization, you can look at this field to see the previous requests for the authorization. This field can be helpful in determining why a given authorization was approved/declined.
 * @property string $status The current status of the authorization in its lifecycle.
 * @property \Stripe\Issuing\Transaction[] $transactions List of [transactions](https://stripe.com/docs/api/issuing/transactions) associated with this authorization.
 * @property null|\Stripe\StripeObject $treasury [Treasury](https://stripe.com/docs/api/treasury) details related to this authorization if it was created on a [FinancialAccount](https://stripe.com/docs/api/treasury/financial_accounts).
 * @property \Stripe\StripeObject $verification_data
 * @property null|string $wallet The digital wallet used for this transaction. One of `apple_pay`, `google_pay`, or `samsung_pay`. Will populate as `null` when no digital wallet was utilized.
 */
class Authorization extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.authorization';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Authorization the approved authorization
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Authorization the declined authorization
     */
    public function decline($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/decline';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
