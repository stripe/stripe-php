<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Use <a href="https://docs.stripe.com/docs/treasury/moving-money/financial-accounts/out-of/outbound-payments">OutboundPayments</a> to send funds to another party's external bank account or <a href="https://api.stripe.com#financial_accounts">FinancialAccount</a>. To send money to an account belonging to the same user, use an <a href="https://api.stripe.com#outbound_transfers">OutboundTransfer</a>.
 *
 * Simulate OutboundPayment state changes with the <code>/v1/test_helpers/treasury/outbound_payments</code> endpoints. These methods can only be called on test mode objects.
 *
 * Related guide: <a href="https://docs.stripe.com/docs/treasury/moving-money/financial-accounts/out-of/outbound-payments">Moving money with Treasury using OutboundPayment objects</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property bool $cancelable Returns <code>true</code> if the object can be canceled, and <code>false</code> otherwise.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $customer ID of the <a href="https://docs.stripe.com/api/customers">customer</a> to whom an OutboundPayment is sent.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string $destination_payment_method The PaymentMethod via which an OutboundPayment is sent. This field can be empty if the OutboundPayment was created using <code>destination_payment_method_data</code>.
 * @property null|(object{billing_details: (object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string}&\Stripe\StripeObject), financial_account?: (object{id: string, network: string}&\Stripe\StripeObject), type: string, us_bank_account?: (object{account_holder_type: null|string, account_type: null|string, bank_name: null|string, fingerprint: null|string, last4: null|string, mandate?: string|\Stripe\Mandate, network: string, routing_number: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $destination_payment_method_details Details about the PaymentMethod for an OutboundPayment.
 * @property null|(object{ip_address: null|string, present: bool}&\Stripe\StripeObject) $end_user_details Details about the end user.
 * @property int $expected_arrival_date The date when funds are expected to arrive in the destination account.
 * @property string $financial_account The FinancialAccount that funds were pulled from.
 * @property null|string $hosted_regulatory_receipt_url A <a href="https://docs.stripe.com/treasury/moving-money/regulatory-receipts">hosted transaction receipt</a> URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{code: string, transaction: string|Transaction}&\Stripe\StripeObject) $returned_details Details about a returned OutboundPayment. Only set when the status is <code>returned</code>.
 * @property string $statement_descriptor The description that appears on the receiving end for an OutboundPayment (for example, bank statement for external bank transfer).
 * @property string $status Current status of the OutboundPayment: <code>processing</code>, <code>failed</code>, <code>posted</code>, <code>returned</code>, <code>canceled</code>. An OutboundPayment is <code>processing</code> if it has been created and is pending. The status changes to <code>posted</code> once the OutboundPayment has been &quot;confirmed&quot; and funds have left the account, or to <code>failed</code> or <code>canceled</code>. If an OutboundPayment fails to arrive at its destination, its status will change to <code>returned</code>.
 * @property (object{canceled_at: null|int, failed_at: null|int, posted_at: null|int, returned_at: null|int}&\Stripe\StripeObject) $status_transitions
 * @property null|(object{ach?: (object{trace_id: string}&\Stripe\StripeObject), type: string, us_domestic_wire?: (object{chips: null|string, imad: null|string, omad: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $tracking_details Details about network-specific tracking information if available.
 * @property string|Transaction $transaction The Transaction associated with this object.
 */
class OutboundPayment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.outbound_payment';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RETURNED = 'returned';

    /**
     * Creates an OutboundPayment.
     *
     * @param null|array{amount: int, currency: string, customer?: string, description?: string, destination_payment_method?: string, destination_payment_method_data?: array{billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, financial_account?: string, metadata?: array<string, string>, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}}, destination_payment_method_options?: array{us_bank_account?: null|array{network?: string}}, end_user_details?: array{ip_address?: string, present: bool}, expand?: string[], financial_account: string, metadata?: array<string, string>, statement_descriptor?: string} $params
     * @param null|array|string $options
     *
     * @return OutboundPayment the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of OutboundPayments sent from the specified FinancialAccount.
     *
     * @param null|array{created?: array|int, customer?: string, ending_before?: string, expand?: string[], financial_account: string, limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<OutboundPayment> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing OutboundPayment by passing the unique
     * OutboundPayment ID from either the OutboundPayment creation request or
     * OutboundPayment list.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return OutboundPayment
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
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return OutboundPayment the canceled outbound payment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
