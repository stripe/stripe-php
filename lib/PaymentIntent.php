<?php

namespace Stripe;

/**
 * Class PaymentIntent
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount intended to be collected by this PaymentIntent. A positive integer representing how much to charge in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a> (e.g., 100 cents to charge $1.00 or 100 to charge ¥100, a zero-decimal currency). The minimum amount is $0.50 US or <a href="https://stripe.com/docs/currencies#minimum-and-maximum-charge-amounts">equivalent in charge currency</a>. The amount value supports up to eight digits (e.g., a value of 99999999 for a USD charge of $999,999.99).
 * @property int $amount_capturable Amount that can be captured from this PaymentIntent.
 * @property int $amount_received Amount that was collected by this PaymentIntent.
 * @property null|string|\Stripe\StripeObject $application ID of the Connect application that created the PaymentIntent.
 * @property null|int $application_fee_amount The amount of the application fee (if any) for the resulting payment. See the PaymentIntents <a href="https://stripe.com/docs/payments/connected-accounts">use case for connected accounts</a> for details.
 * @property null|int $canceled_at Populated when <code>status</code> is <code>canceled</code>, this is the time at which the PaymentIntent was canceled. Measured in seconds since the Unix epoch.
 * @property null|string $cancellation_reason Reason for cancellation of this PaymentIntent, either user-provided (<code>duplicate</code>, <code>fraudulent</code>, <code>requested_by_customer</code>, or <code>abandoned</code>) or generated by Stripe internally (<code>failed_invoice</code>, <code>void_invoice</code>, or <code>automatic</code>).
 * @property string $capture_method Controls when the funds will be captured from the customer's account.
 * @property \Stripe\Collection $charges Charges that were created by this PaymentIntent, if any.
 * @property null|string $client_secret <p>The client secret of this PaymentIntent. Used for client-side retrieval using a publishable key.</p><p>The client secret can be used to complete a payment from your frontend. It should not be stored, logged, embedded in URLs, or exposed to anyone other than the customer. Make sure that you have TLS enabled on any page that includes the client secret.</p><p>Refer to our docs to <a href="https://stripe.com/docs/payments/accept-a-payment">accept a payment</a> and learn about how <code>client_secret</code> should be handled.</p>
 * @property string $confirmation_method
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string|\Stripe\Customer $customer <p>ID of the Customer this PaymentIntent belongs to, if one exists.</p><p>If present, payment methods used with this PaymentIntent can only be attached to this Customer, and payment methods attached to other Customers cannot be used with this PaymentIntent.</p>
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string|\Stripe\Invoice $invoice ID of the invoice that created this PaymentIntent, if it exists.
 * @property null|\Stripe\ErrorObject $last_payment_error The payment error encountered in the previous PaymentIntent confirmation. It will be cleared if the PaymentIntent is later updated for any reason.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format. For more information, see the <a href="https://stripe.com/docs/payments/payment-intents/creating-payment-intents#storing-information-in-metadata">documentation</a>.
 * @property null|\Stripe\StripeObject $next_action If present, this property tells you what actions you need to take in order for your customer to fulfill a payment using the provided source.
 * @property null|string|\Stripe\Account $on_behalf_of The account (if any) for which the funds of the PaymentIntent are intended. See the PaymentIntents <a href="https://stripe.com/docs/payments/connected-accounts">use case for connected accounts</a> for details.
 * @property null|string|\Stripe\PaymentMethod $payment_method ID of the payment method used in this PaymentIntent.
 * @property null|\Stripe\StripeObject $payment_method_options Payment-method-specific configuration for this PaymentIntent.
 * @property string[] $payment_method_types The list of payment method types (e.g. card) that this PaymentIntent is allowed to use.
 * @property null|string $receipt_email Email address that the receipt for the resulting payment will be sent to.
 * @property null|string|\Stripe\Review $review ID of the review associated with this PaymentIntent, if any.
 * @property null|string $setup_future_usage <p>Indicates that you intend to make future payments with this PaymentIntent's payment method.</p><p>If present, the payment method used with this PaymentIntent can be <a href="https://stripe.com/docs/api/payment_methods/attach">attached</a> to a Customer, even after the transaction completes.</p><p>For more, learn to <a href="https://stripe.com/docs/payments/save-after-payment">save card details after a payment</a>.</p><p>Stripe uses <code>setup_future_usage</code> to dynamically optimize your payment flow and comply with regional legislation and network rules. For example, if your customer is impacted by <a href="https://stripe.com/docs/strong-customer-authentication">SCA</a>, using <code>off_session</code> will ensure that they are authenticated while processing this PaymentIntent. You will then be able to collect <a href="https://stripe.com/docs/payments/cards/charging-saved-cards#off-session-payments-with-saved-cards">off-session payments</a> for this customer.</p>
 * @property null|\Stripe\StripeObject $shipping Shipping information for this PaymentIntent.
 * @property null|string|\Stripe\StripeObject $source This is a legacy field that will be removed in the future. It is the ID of the Source object that is associated with this PaymentIntent, if one was supplied.
 * @property null|string $statement_descriptor For non-card charges, you can use this value as the complete description that appears on your customers’ statements. Must contain at least one letter, maximum 22 characters.
 * @property null|string $statement_descriptor_suffix Provides information about a card payment that customers see on their statements. Concatenated with the prefix (shortened descriptor) or statement descriptor that’s set on the account to form the complete statement descriptor. Maximum 22 characters for the concatenated descriptor.
 * @property string $status Status of this PaymentIntent, one of <code>requires_payment_method</code>, <code>requires_confirmation</code>, <code>requires_action</code>, <code>processing</code>, <code>requires_capture</code>, <code>canceled</code>, or <code>succeeded</code>. Read more about each PaymentIntent <a href="https://stripe.com/docs/payments/intents#intent-statuses">status</a>.
 * @property null|\Stripe\StripeObject $transfer_data The data with which to automatically create a Transfer when the payment is finalized. See the PaymentIntents <a href="https://stripe.com/docs/payments/connected-accounts">use case for connected accounts</a> for details.
 * @property null|string $transfer_group A string that identifies the resulting payment as part of a group. See the PaymentIntents <a href="https://stripe.com/docs/payments/connected-accounts">use case for connected accounts</a> for details.
 */
class PaymentIntent extends ApiResource
{
    const OBJECT_NAME = 'payment_intent';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * These constants are possible representations of the status field.
     *
     * @see https://stripe.com/docs/api/payment_intents/object#payment_intent_object-status
     */
    const STATUS_CANCELED = 'canceled';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_ACTION = 'requires_action';
    const STATUS_REQUIRES_CAPTURE = 'requires_capture';
    const STATUS_REQUIRES_CONFIRMATION = 'requires_confirmation';
    const STATUS_REQUIRES_PAYMENT_METHOD = 'requires_payment_method';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return PaymentIntent The canceled payment intent.
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
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
     * @return PaymentIntent The captured payment intent.
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
     * @return PaymentIntent The confirmed payment intent.
     */
    public function confirm($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/confirm';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
