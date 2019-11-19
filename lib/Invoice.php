<?php

namespace Stripe;

/**
 * Class Invoice
 *
 * @property string $id
 * @property string $object
 * @property string|null $account_country
 * @property string|null $account_name
 * @property int $amount_due
 * @property int $amount_paid
 * @property int $amount_remaining
 * @property int|null $application_fee_amount
 * @property int $attempt_count
 * @property bool $attempted
 * @property bool $auto_advance
 * @property string|null $billing_reason
 * @property string|null $charge
 * @property string|null $collection_method
 * @property int $created
 * @property string $currency
 * @property array|null $custom_fields
 * @property string $customer
 * @property mixed|null $customer_address
 * @property string|null $customer_email
 * @property string|null $customer_name
 * @property string|null $customer_phone
 * @property mixed|null $customer_shipping
 * @property string|null $customer_tax_exempt
 * @property array|null $customer_tax_ids
 * @property string|null $default_payment_method
 * @property string|null $default_source
 * @property array|null $default_tax_rates
 * @property string|null $description
 * @property \Stripe\Discount|null $discount
 * @property int|null $due_date
 * @property int|null $ending_balance
 * @property string|null $footer
 * @property string|null $hosted_invoice_url
 * @property string|null $invoice_pdf
 * @property \Stripe\Collection $lines
 * @property bool $livemode
 * @property \Stripe\StripeObject|null $metadata
 * @property int|null $next_payment_attempt
 * @property string|null $number
 * @property bool $paid
 * @property string|null $payment_intent
 * @property int $period_end
 * @property int $period_start
 * @property int $post_payment_credit_notes_amount
 * @property int $pre_payment_credit_notes_amount
 * @property string|null $receipt_number
 * @property int $starting_balance
 * @property string|null $statement_descriptor
 * @property string|null $status
 * @property mixed $status_transitions
 * @property string|null $subscription
 * @property int $subscription_proration_date
 * @property int $subtotal
 * @property int|null $tax
 * @property mixed $threshold_reason
 * @property int $total
 * @property array|null $total_tax_amounts
 * @property int|null $webhooks_delivered_at
 *
 * @package Stripe
 */
class Invoice extends ApiResource
{
    const OBJECT_NAME = 'invoice';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\NestedResource;

    /**
     * Possible string representations of the billing reason.
     * @link https://stripe.com/docs/api/invoices/object#invoice_object-billing_reason
     */
    const BILLING_REASON_MANUAL                 = 'manual';
    const BILLING_REASON_SUBSCRIPTION           = 'subscription';
    const BILLING_REASON_SUBSCRIPTION_CREATE    = 'subscription_create';
    const BILLING_REASON_SUBSCRIPTION_CYCLE     = 'subscription_cycle';
    const BILLING_REASON_SUBSCRIPTION_THRESHOLD = 'subscription_threshold';
    const BILLING_REASON_SUBSCRIPTION_UPDATE    = 'subscription_update';
    const BILLING_REASON_UPCOMING               = 'upcoming';

    /**
     * Possible string representations of the `collection_method` property.
     * @link https://stripe.com/docs/api/invoices/object#invoice_object-collection_method
     */
    const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    const COLLECTION_METHOD_SEND_INVOICE         = 'send_invoice';

    /**
     * Possible string representations of the invoice status.
     * @link https://stripe.com/docs/api/invoices/object#invoice_object-status
     */
    const STATUS_DRAFT         = 'draft';
    const STATUS_OPEN          = 'open';
    const STATUS_PAID          = 'paid';
    const STATUS_UNCOLLECTIBLE = 'uncollectible';
    const STATUS_VOID          = 'void';

    /**
     * Possible string representations of the `billing` property.
     * @deprecated Use `collection_method` instead.
     * @link https://stripe.com/docs/api/invoices/object#invoice_object-billing
     */
    const BILLING_CHARGE_AUTOMATICALLY = 'charge_automatically';
    const BILLING_SEND_INVOICE         = 'send_invoice';

    const PATH_LINES = '/lines';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Invoice The finalized invoice.
     */
    public function finalizeInvoice($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/finalize';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Invoice The uncollectible invoice.
     */
    public function markUncollectible($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/mark_uncollectible';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Invoice The paid invoice.
     */
    public function pay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/pay';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Invoice The sent invoice.
     */
    public function sendInvoice($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/send';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Invoice The upcoming invoice.
     */
    public static function upcoming($params = null, $opts = null)
    {
        $url = static::classUrl() . '/upcoming';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Invoice The voided invoice.
     */
    public function voidInvoice($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/void';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param string $id The ID of the invoice on which to retrieve the lins.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Collection The list of lines (InvoiceLineItem).
     */
    public static function allLines($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_LINES, $params, $opts);
    }
}
