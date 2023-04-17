<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Use [InboundTransfers](https://stripe.com/docs/treasury/moving-money/financial-accounts/into/inbound-transfers)
 * to add funds to your [FinancialAccount](https://stripe.com/docs/api#financial_accounts) via a
 * PaymentMethod that is owned by you. The funds will be transferred via an ACH
 * debit.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property bool $cancelable Returns `true` if the InboundTransfer is able to be canceled.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|\Stripe\StripeObject $failure_details Details about this InboundTransfer's failure. Only set when status is `failed`.
 * @property string $financial_account The FinancialAccount that received the funds.
 * @property null|string $hosted_regulatory_receipt_url A [hosted transaction receipt](https://stripe.com/docs/treasury/moving-money/regulatory-receipts) URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property \Stripe\StripeObject $linked_flows
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $origin_payment_method The origin payment method to be debited for an InboundTransfer.
 * @property null|\Stripe\StripeObject $origin_payment_method_details Details about the PaymentMethod for an InboundTransfer.
 * @property null|bool $returned Returns `true` if the funds for an InboundTransfer were returned after the InboundTransfer went to the `succeeded` state.
 * @property string $statement_descriptor Statement descriptor shown when funds are debited from the source. Not all payment networks support `statement_descriptor`.
 * @property string $status Status of the InboundTransfer: `processing`, `succeeded`, `failed`, and `canceled`. An InboundTransfer is `processing` if it is created and pending. The status changes to `succeeded` once the funds have been &quot;confirmed&quot; and a `transaction` is created and posted. The status changes to `failed` if the transfer fails.
 * @property \Stripe\StripeObject $status_transitions
 * @property null|string|\Stripe\Treasury\Transaction $transaction The Transaction associated with this object.
 */
class InboundTransfer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.inbound_transfer';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\InboundTransfer the canceled inbound transfer
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
