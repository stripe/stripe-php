<?php

namespace Stripe\Issuing;

/**
 * When an <a href="https://stripe.com/docs/issuing">issued card</a> is used to
 * make a purchase, an Issuing <code>Authorization</code> object is created. <a
 * href="https://stripe.com/docs/issuing/purchases/authorizations">Authorizations</a>
 * must be approved for the purchase to be completed successfully.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/issuing/purchases/authorizations">Issued Card
 * Authorizations</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The total amount that was authorized or rejected. This amount is in the card's currency and in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>.
 * @property bool $approved Whether the authorization has been approved.
 * @property string $authorization_method How the card details were provided.
 * @property \Stripe\BalanceTransaction[] $balance_transactions List of balance transactions associated with this authorization.
 * @property \Stripe\Issuing\Card $card You can <a href="https://stripe.com/docs/issuing/cards">create physical or virtual cards</a> that are issued to cardholders.
 * @property null|string|\Stripe\Issuing\Cardholder $cardholder The cardholder to whom this authorization belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $merchant_amount The total amount that was authorized or rejected. This amount is in the <code>merchant_currency</code> and in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>.
 * @property string $merchant_currency The currency that was presented to the cardholder for the authorization. Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property \Stripe\StripeObject $merchant_data
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $pending_request The pending authorization request. This field will only be non-null during an <code>issuing_authorization.request</code> webhook.
 * @property \Stripe\StripeObject[] $request_history History of every time the authorization was approved/denied (whether approved/denied by you directly or by Stripe based on your <code>spending_controls</code>). If the merchant changes the authorization by performing an <a href="https://stripe.com/docs/issuing/purchases/authorizations">incremental authorization or partial capture</a>, you can look at this field to see the previous states of the authorization.
 * @property string $status The current status of the authorization in its lifecycle.
 * @property \Stripe\Issuing\Transaction[] $transactions List of <a href="https://stripe.com/docs/api/issuing/transactions">transactions</a> associated with this authorization.
 * @property \Stripe\StripeObject $verification_data
 * @property null|string $wallet What, if any, digital wallet was used for this authorization. One of <code>apple_pay</code>, <code>google_pay</code>, or <code>samsung_pay</code>.
 */
class Authorization extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.authorization';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    const ADDRESS_LINE1_CHECK_MATCH = 'match';
    const ADDRESS_LINE1_CHECK_MISMATCH = 'mismatch';
    const ADDRESS_LINE1_CHECK_NOT_PROVIDED = 'not_provided';

    const ADDRESS_POSTAL_CODE_CHECK_MATCH = 'match';
    const ADDRESS_POSTAL_CODE_CHECK_MISMATCH = 'mismatch';
    const ADDRESS_POSTAL_CODE_CHECK_NOT_PROVIDED = 'not_provided';

    const AUTHORIZATION_METHOD_CHIP = 'chip';
    const AUTHORIZATION_METHOD_CONTACTLESS = 'contactless';
    const AUTHORIZATION_METHOD_KEYED_IN = 'keyed_in';
    const AUTHORIZATION_METHOD_ONLINE = 'online';
    const AUTHORIZATION_METHOD_SWIPE = 'swipe';

    const CVC_CHECK_MATCH = 'match';
    const CVC_CHECK_MISMATCH = 'mismatch';
    const CVC_CHECK_NOT_PROVIDED = 'not_provided';

    const EXPIRY_CHECK_MATCH = 'match';
    const EXPIRY_CHECK_MISMATCH = 'mismatch';
    const EXPIRY_CHECK_NOT_PROVIDED = 'not_provided';

    const REASON_ACCOUNT_DISABLED = 'account_disabled';
    const REASON_CARD_ACTIVE = 'card_active';
    const REASON_CARD_INACTIVE = 'card_inactive';
    const REASON_CARDHOLDER_INACTIVE = 'cardholder_inactive';
    const REASON_CARDHOLDER_VERIFICATION_REQUIRED = 'cardholder_verification_required';
    const REASON_INSUFFICIENT_FUNDS = 'insufficient_funds';
    const REASON_NOT_ALLOWED = 'not_allowed';
    const REASON_SPENDING_CONTROLS = 'spending_controls';
    const REASON_SUSPECTED_FRAUD = 'suspected_fraud';
    const REASON_VERIFICATION_FAILED = 'verification_failed';
    const REASON_WEBHOOK_APPROVED = 'webhook_approved';
    const REASON_WEBHOOK_DECLINED = 'webhook_declined';
    const REASON_WEBHOOK_TIMEOUT = 'webhook_timeout';

    const STATUS_CLOSED = 'closed';
    const STATUS_PENDING = 'pending';
    const STATUS_REVERSED = 'reversed';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Authorization the approved authorization
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
     * @return Authorization the declined authorization
     */
    public function decline($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/decline';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
