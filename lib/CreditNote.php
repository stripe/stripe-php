<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Issue a credit note to adjust an invoice's amount after the invoice is finalized.
 *
 * Related guide: <a href="https://stripe.com/docs/billing/invoices/credit-notes">Credit notes</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The integer amount in cents (or local equivalent) representing the total amount of the credit note, including tax.
 * @property int $amount_shipping This is the sum of all the shipping amounts.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|\Stripe\Customer $customer ID of the customer.
 * @property null|string|\Stripe\CustomerBalanceTransaction $customer_balance_transaction Customer balance transaction related to this credit note.
 * @property int $discount_amount The integer amount in cents (or local equivalent) representing the total amount of discount that was credited.
 * @property \Stripe\StripeObject[] $discount_amounts The aggregate amounts calculated per discount for all line items.
 * @property null|int $effective_at The date when this credit note is in effect. Same as <code>created</code> unless overwritten. When defined, this value replaces the system-generated 'Date of issue' printed on the credit note PDF.
 * @property string|\Stripe\Invoice $invoice ID of the invoice.
 * @property \Stripe\Collection<\Stripe\CreditNoteLineItem> $lines Line items that make up the credit note
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $memo Customer-facing text that appears on the credit note PDF.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $number A unique number that identifies this particular credit note and appears on the PDF of the credit note and its associated invoice.
 * @property null|int $out_of_band_amount Amount that was credited outside of Stripe.
 * @property string $pdf The link to download the PDF of the credit note.
 * @property null|string $reason Reason for issuing this credit note, one of <code>duplicate</code>, <code>fraudulent</code>, <code>order_change</code>, or <code>product_unsatisfactory</code>
 * @property null|string|\Stripe\Refund $refund Refund related to this credit note.
 * @property null|\Stripe\StripeObject $shipping_cost The details of the cost of shipping, including the ShippingRate applied to the invoice.
 * @property string $status Status of this credit note, one of <code>issued</code> or <code>void</code>. Learn more about <a href="https://stripe.com/docs/billing/invoices/credit-notes#voiding">voiding credit notes</a>.
 * @property int $subtotal The integer amount in cents (or local equivalent) representing the amount of the credit note, excluding exclusive tax and invoice level discounts.
 * @property null|int $subtotal_excluding_tax The integer amount in cents (or local equivalent) representing the amount of the credit note, excluding all tax and invoice level discounts.
 * @property \Stripe\StripeObject[] $tax_amounts The aggregate amounts calculated per tax rate for all line items.
 * @property int $total The integer amount in cents (or local equivalent) representing the total amount of the credit note, including tax and all discount.
 * @property null|int $total_excluding_tax The integer amount in cents (or local equivalent) representing the total amount of the credit note, excluding tax, but including discounts.
 * @property string $type Type of this credit note, one of <code>pre_payment</code> or <code>post_payment</code>. A <code>pre_payment</code> credit note means it was issued when the invoice was open. A <code>post_payment</code> credit note means it was issued when the invoice was paid.
 * @property null|int $voided_at The time that the credit note was voided.
 */
class CreditNote extends ApiResource
{
    const OBJECT_NAME = 'credit_note';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const REASON_DUPLICATE = 'duplicate';
    const REASON_FRAUDULENT = 'fraudulent';
    const REASON_ORDER_CHANGE = 'order_change';
    const REASON_PRODUCT_UNSATISFACTORY = 'product_unsatisfactory';

    const STATUS_ISSUED = 'issued';
    const STATUS_VOID = 'void';

    const TYPE_POST_PAYMENT = 'post_payment';
    const TYPE_PRE_PAYMENT = 'pre_payment';

    /**
     * Issue a credit note to adjust the amount of a finalized invoice. For a
     * <code>status=open</code> invoice, a credit note reduces its
     * <code>amount_due</code>. For a <code>status=paid</code> invoice, a credit note
     * does not affect its <code>amount_due</code>. Instead, it can result in any
     * combination of the following:.
     *
     * <ul> <li>Refund: create a new refund (using <code>refund_amount</code>) or link
     * an existing refund (using <code>refund</code>).</li> <li>Customer balance
     * credit: credit the customer’s balance (using <code>credit_amount</code>) which
     * will be automatically applied to their next invoice when it’s finalized.</li>
     * <li>Outside of Stripe credit: record the amount that is or will be credited
     * outside of Stripe (using <code>out_of_band_amount</code>).</li> </ul>
     *
     * For post-payment credit notes the sum of the refund, credit and outside of
     * Stripe amounts must equal the credit note total.
     *
     * You may issue multiple credit notes for an invoice. Each credit note will
     * increment the invoice’s <code>pre_payment_credit_notes_amount</code> or
     * <code>post_payment_credit_notes_amount</code> depending on its
     * <code>status</code> at the time of credit note creation.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote the created resource
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
     * Returns a list of credit notes.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\CreditNote> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the credit note object with the given identifier.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates an existing credit note.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote the previewed credit note
     */
    public static function preview($params = null, $opts = null)
    {
        $url = static::classUrl() . '/preview';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\CreditNoteLineItem> list of credit note line items
     */
    public static function previewLines($params = null, $opts = null)
    {
        $url = static::classUrl() . '/preview/lines';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote the voided credit note
     */
    public function voidCreditNote($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/void';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    const PATH_LINES = '/lines';

    /**
     * @param string $id the ID of the credit note on which to retrieve the credit note line items
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\CreditNoteLineItem> the list of credit note line items
     */
    public static function allLines($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_LINES, $params, $opts);
    }
}
