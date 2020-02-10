<?php

namespace Stripe;

/**
 * Class CreditNote
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The integer amount in <strong>%s</strong> representing the total amount of the credit note, including tax.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|\Stripe\Customer $customer ID of the customer.
 * @property string|\Stripe\CustomerBalanceTransaction|null $customer_balance_transaction Customer balance transaction related to this credit note.
 * @property int $discount_amount The integer amount in <strong>%s</strong> representing the amount of the discount that was credited.
 * @property string|\Stripe\Invoice $invoice ID of the invoice.
 * @property \Stripe\Collection $lines Line items that make up the credit note
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string|null $memo Customer-facing text that appears on the credit note PDF.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $number A unique number that identifies this particular credit note and appears on the PDF of the credit note and its associated invoice.
 * @property int|null $out_of_band_amount Amount that was credited outside of Stripe.
 * @property string $pdf The link to download the PDF of the credit note.
 * @property string|null $reason Reason for issuing this credit note, one of <code>duplicate</code>, <code>fraudulent</code>, <code>order_change</code>, or <code>product_unsatisfactory</code>
 * @property string|\Stripe\Refund|null $refund Refund related to this credit note.
 * @property string $status Status of this credit note, one of <code>issued</code> or <code>void</code>. Learn more about <a href="https://stripe.com/docs/billing/invoices/credit-notes#voiding">voiding credit notes</a>.
 * @property int $subtotal The integer amount in <strong>%s</strong> representing the amount of the credit note, excluding tax and discount.
 * @property \Stripe\StripeObject[] $tax_amounts The aggregate amounts calculated per tax rate for all line items.
 * @property int $total The integer amount in <strong>%s</strong> representing the total amount of the credit note, including tax and discount.
 * @property string $type Type of this credit note, one of <code>pre_payment</code> or <code>post_payment</code>. A <code>pre_payment</code> credit note means it was issued when the invoice was open. A <code>post_payment</code> credit note means it was issued when the invoice was paid.
 * @property int|null $voided_at The time that the credit note was voided.
 *
 * @package Stripe
 */
class CreditNote extends ApiResource
{
    const OBJECT_NAME = 'credit_note';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * Possible string representations of the credit note reason.
     *
     * @see https://stripe.com/docs/api/credit_notes/object#credit_note_object-reason
     */
    const REASON_DUPLICATE              = 'duplicate';
    const REASON_FRAUDULENT             = 'fraudulent';
    const REASON_ORDER_CHANGE           = 'order_change';
    const REASON_PRODUCT_UNSATISFACTORY = 'product_unsatisfactory';

    /**
     * Possible string representations of the credit note status.
     *
     * @see https://stripe.com/docs/api/credit_notes/object#credit_note_object-status
     */
    const STATUS_ISSUED = 'issued';
    const STATUS_VOID   = 'void';

    /**
     * Possible string representations of the credit note type.
     *
     * @see https://stripe.com/docs/api/credit_notes/object#credit_note_object-status
     */
    const TYPE_POST_PAYMENT = 'post_payment';
    const TYPE_PRE_PAYMENT  = 'pre_payment';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CreditNote The previewed credit note.
     */
    public static function preview($params = null, $opts = null)
    {
        $url = static::classUrl() . '/preview';
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
     * @return CreditNote The voided credit note.
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
     * @param string $id The ID of the credit note on which to retrieve the credit note line items.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection The list of credit note line items.
     */
    public static function allLines($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_LINES, $params, $opts);
    }
}
