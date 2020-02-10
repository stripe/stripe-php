<?php

namespace Stripe;

/**
 * Class Charge
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount intended to be collected by this PaymentIntent. A positive integer representing how much to charge in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a> (e.g., 100 cents to charge $1.00 or 100 to charge ¥100, a zero-decimal currency). The minimum amount is $0.50 US or <a href="https://stripe.com/docs/currencies#minimum-and-maximum-charge-amounts">equivalent in charge currency</a>. The amount value supports up to eight digits (e.g., a value of 99999999 for a USD charge of $999,999.99).
 * @property int $amount_refunded Amount in %s refunded (can be less than the amount attribute on the charge if a partial refund was issued).
 * @property string|\Stripe\StripeObject|null $application ID of the Connect application that created the charge.
 * @property string|\Stripe\ApplicationFee|null $application_fee The application fee (if any) for the charge. <a href="https://stripe.com/docs/connect/direct-charges#collecting-fees">See the Connect documentation</a> for details.
 * @property int|null $application_fee_amount The amount of the application fee (if any) for the charge. <a href="https://stripe.com/docs/connect/direct-charges#collecting-fees">See the Connect documentation</a> for details.
 * @property string|\Stripe\BalanceTransaction|null $balance_transaction ID of the balance transaction that describes the impact of this charge on your account balance (not including refunds or disputes).
 * @property \Stripe\StripeObject $billing_details
 * @property bool $captured If the charge was created without capturing, this Boolean represents whether it is still uncaptured or has since been captured.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|\Stripe\Customer|null $customer ID of the customer this charge is for if one exists.
 * @property string|null $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property string|\Stripe\Account|null $destination ID of an existing, connected Stripe account to transfer funds to if <code>transfer_data</code> was specified in the charge request.
 * @property string|\Stripe\Dispute|null $dispute Details about the dispute if the charge has been disputed.
 * @property bool $disputed Whether the charge has been disputed.
 * @property string|null $failure_code Error code explaining reason for charge failure if available (see <a href="https://stripe.com/docs/api#errors">the errors section</a> for a list of codes).
 * @property string|null $failure_message Message to user further explaining reason for charge failure if available.
 * @property \Stripe\StripeObject|null $fraud_details Information on fraud assessments for the charge.
 * @property string|\Stripe\Invoice|null $invoice ID of the invoice this charge is for if one exists.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|\Stripe\Account|null $on_behalf_of The account (if any) the charge was made on behalf of without triggering an automatic transfer. See the <a href="https://stripe.com/docs/connect/charges-transfers">Connect documentation</a> for details.
 * @property string|\Stripe\Order|null $order ID of the order this charge is for if one exists.
 * @property \Stripe\StripeObject|null $outcome Details about whether the payment was accepted, and why. See <a href="https://stripe.com/docs/declines">understanding declines</a> for details.
 * @property bool $paid <code>true</code> if the charge succeeded, or was successfully authorized for later capture.
 * @property string|null $payment_intent ID of the PaymentIntent associated with this charge, if one exists.
 * @property string|null $payment_method ID of the payment method used in this charge.
 * @property \Stripe\StripeObject|null $payment_method_details Details about the payment method at the time of the transaction.
 * @property string|null $receipt_email This is the email address that the receipt for this charge was sent to.
 * @property string|null $receipt_number This is the transaction number that appears on email receipts sent for this charge. This attribute will be <code>null</code> until a receipt has been sent.
 * @property string $receipt_url This is the URL to view the receipt for this charge. The receipt is kept up-to-date to the latest state of the charge, including any refunds. If the charge is for an Invoice, the receipt will be stylized as an Invoice receipt.
 * @property bool $refunded Whether the charge has been fully refunded. If the charge is only partially refunded, this attribute will still be false.
 * @property \Stripe\Collection $refunds A list of refunds that have been applied to the charge.
 * @property string|\Stripe\Review|null $review ID of the review associated with this charge if one exists.
 * @property \Stripe\StripeObject|null $shipping Shipping information for the charge.
 * @property \Stripe\StripeObject|null $source This is a legacy field that will be removed in the future. It contains the Source, Card, or BankAccount object used for the charge. For details about the payment method used for this charge, refer to <code>payment_method</code> or <code>payment_method_details</code> instead.
 * @property string|\Stripe\Transfer|null $source_transfer The transfer ID which created this charge. Only present if the charge came from another Stripe account. <a href="https://stripe.com/docs/connect/destination-charges">See the Connect documentation</a> for details.
 * @property string|null $statement_descriptor For card charges, use <code>statement_descriptor_suffix</code> instead. Otherwise, you can use this value as the complete description of a charge on your customers’ statements. Must contain at least one letter, maximum 22 characters.
 * @property string|null $statement_descriptor_suffix Provides information about the charge that customers see on their statements. Concatenated with the prefix (shortened descriptor) or statement descriptor that’s set on the account to form the complete statement descriptor. Maximum 22 characters for the concatenated descriptor.
 * @property string $status The status of the payment is either <code>succeeded</code>, <code>pending</code>, or <code>failed</code>.
 * @property string|\Stripe\Transfer $transfer ID of the transfer to the <code>destination</code> account (only applicable if the charge was created using the <code>destination</code> parameter).
 * @property \Stripe\StripeObject|null $transfer_data An optional dictionary including the account to automatically transfer to as part of a destination charge. <a href="https://stripe.com/docs/connect/destination-charges">See the Connect documentation</a> for details.
 * @property string|null $transfer_group A string that identifies this transaction as part of a group. See the <a href="https://stripe.com/docs/connect/charges-transfers#grouping-transactions">Connect documentation</a> for details.
 *
 * @package Stripe
 */
class Charge extends ApiResource
{
    const OBJECT_NAME = 'charge';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * Possible string representations of decline codes.
     * These strings are applicable to the decline_code property of the \Stripe\Exception\CardException exception.
     *
     * @see https://stripe.com/docs/declines/codes
     */
    const DECLINED_AUTHENTICATION_REQUIRED           = 'authentication_required';
    const DECLINED_APPROVE_WITH_ID                   = 'approve_with_id';
    const DECLINED_CALL_ISSUER                       = 'call_issuer';
    const DECLINED_CARD_NOT_SUPPORTED                = 'card_not_supported';
    const DECLINED_CARD_VELOCITY_EXCEEDED            = 'card_velocity_exceeded';
    const DECLINED_CURRENCY_NOT_SUPPORTED            = 'currency_not_supported';
    const DECLINED_DO_NOT_HONOR                      = 'do_not_honor';
    const DECLINED_DO_NOT_TRY_AGAIN                  = 'do_not_try_again';
    const DECLINED_DUPLICATED_TRANSACTION            = 'duplicate_transaction';
    const DECLINED_EXPIRED_CARD                      = 'expired_card';
    const DECLINED_FRAUDULENT                        = 'fraudulent';
    const DECLINED_GENERIC_DECLINE                   = 'generic_decline';
    const DECLINED_INCORRECT_NUMBER                  = 'incorrect_number';
    const DECLINED_INCORRECT_CVC                     = 'incorrect_cvc';
    const DECLINED_INCORRECT_PIN                     = 'incorrect_pin';
    const DECLINED_INCORRECT_ZIP                     = 'incorrect_zip';
    const DECLINED_INSUFFICIENT_FUNDS                = 'insufficient_funds';
    const DECLINED_INVALID_ACCOUNT                   = 'invalid_account';
    const DECLINED_INVALID_AMOUNT                    = 'invalid_amount';
    const DECLINED_INVALID_CVC                       = 'invalid_cvc';
    const DECLINED_INVALID_EXPIRY_YEAR               = 'invalid_expiry_year';
    const DECLINED_INVALID_NUMBER                    = 'invalid_number';
    const DECLINED_INVALID_PIN                       = 'invalid_pin';
    const DECLINED_ISSUER_NOT_AVAILABLE              = 'issuer_not_available';
    const DECLINED_LOST_CARD                         = 'lost_card';
    const DECLINED_MERCHANT_BLACKLIST                = 'merchant_blacklist';
    const DECLINED_NEW_ACCOUNT_INFORMATION_AVAILABLE = 'new_account_information_available';
    const DECLINED_NO_ACTION_TAKEN                   = 'no_action_taken';
    const DECLINED_NOT_PERMITTED                     = 'not_permitted';
    const DECLINED_OFFLINE_PIN_REQUIRED              = 'offline_pin_required';
    const DECLINED_ONLINE_OR_OFFLINE_PIN_REQUIRED    = 'online_or_offline_pin_required';
    const DECLINED_PICKUP_CARD                       = 'pickup_card';
    const DECLINED_PIN_TRY_EXCEEDED                  = 'pin_try_exceeded';
    const DECLINED_PROCESSING_ERROR                  = 'processing_error';
    const DECLINED_REENTER_TRANSACTION               = 'reenter_transaction';
    const DECLINED_RESTRICTED_CARD                   = 'restricted_card';
    const DECLINED_REVOCATION_OF_ALL_AUTHORIZATIONS  = 'revocation_of_all_authorizations';
    const DECLINED_REVOCATION_OF_AUTHORIZATION       = 'revocation_of_authorization';
    const DECLINED_SECURITY_VIOLATION                = 'security_violation';
    const DECLINED_SERVICE_NOT_ALLOWED               = 'service_not_allowed';
    const DECLINED_STOLEN_CARD                       = 'stolen_card';
    const DECLINED_STOP_PAYMENT_ORDER                = 'stop_payment_order';
    const DECLINED_TESTMODE_DECLINE                  = 'testmode_decline';
    const DECLINED_TRANSACTION_NOT_ALLOWED           = 'transaction_not_allowed';
    const DECLINED_TRY_AGAIN_LATER                   = 'try_again_later';
    const DECLINED_WITHDRAWAL_COUNT_LIMIT_EXCEEDED   = 'withdrawal_count_limit_exceeded';

    /**
     * Possible string representations of the status of the charge.
     *
     * @see https://stripe.com/docs/api/charges/object#charge_object-status
     */
    const STATUS_FAILED    = 'failed';
    const STATUS_PENDING   = 'pending';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Charge The captured charge.
     */
    public function capture($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/capture';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
