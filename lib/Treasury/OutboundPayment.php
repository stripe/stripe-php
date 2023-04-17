<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Use OutboundPayments to send funds to another party's external bank account or
 * [FinancialAccount](https://stripe.com/docs/api#financial_accounts).
 * To send money to an account belonging to the same user, use an <a
 * href="https://stripe.com/docs/api#outbound_transfers">OutboundTransfer</a>.
 *
 * Simulate OutboundPayment state changes with the
 * `/v1/test_helpers/treasury/outbound_payments` endpoints. These
 * methods can only be called on test mode objects.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property bool $cancelable Returns `true` if the object can be canceled, and `false` otherwise.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property null|string $customer ID of the [customer](https://stripe.com/docs/api/customers) to whom an OutboundPayment is sent.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string $destination_payment_method The PaymentMethod via which an OutboundPayment is sent. This field can be empty if the OutboundPayment was created using `destination_payment_method_data`.
 * @property null|\Stripe\StripeObject $destination_payment_method_details Details about the PaymentMethod for an OutboundPayment.
 * @property null|\Stripe\StripeObject $end_user_details Details about the end user.
 * @property int $expected_arrival_date The date when funds are expected to arrive in the destination account.
 * @property string $financial_account The FinancialAccount that funds were pulled from.
 * @property null|string $hosted_regulatory_receipt_url A [hosted transaction receipt](https://stripe.com/docs/treasury/moving-money/regulatory-receipts) URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $returned_details Details about a returned OutboundPayment. Only set when the status is `returned`.
 * @property string $statement_descriptor The description that appears on the receiving end for an OutboundPayment (for example, bank statement for external bank transfer).
 * @property string $status Current status of the OutboundPayment: `processing`, `failed`, `posted`, `returned`, `canceled`. An OutboundPayment is `processing` if it has been created and is pending. The status changes to `posted` once the OutboundPayment has been &quot;confirmed&quot; and funds have left the account, or to `failed` or `canceled`. If an OutboundPayment fails to arrive at its destination, its status will change to `returned`.
 * @property \Stripe\StripeObject $status_transitions
 * @property string|\Stripe\Treasury\Transaction $transaction The Transaction associated with this object.
 */
class OutboundPayment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.outbound_payment';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RETURNED = 'returned';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundPayment the canceled outbound payment
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
