<?php

namespace Stripe;

/**
 * Class Invoice
 *
 * @property string     $id
 * @property string     $object
 * @property int        $amount_due
 * @property int        $application_fee
 * @property int        $attempt_count
 * @property bool       $attempted
 * @property string     $billing
 * @property string     $charge
 * @property bool       $closed
 * @property string     $currency
 * @property string     $customer
 * @property int        $date
 * @property string     $description
 * @property mixed      $discount
 * @property int        $due_date
 * @property int        $ending_balance
 * @property bool       $forgiven
 * @property Collection $lines
 * @property bool       $livemode
 * @property AttachedObject      $metadata
 * @property int        $next_payment_attempt
 * @property string     $number
 * @property bool       $paid
 * @property int        $period_end
 * @property int        $period_start
 * @property string     $receipt_number
 * @property int        $starting_balance
 * @property string     $statement_descriptor
 * @property string     $subscription
 * @property int        $subscription_proration_date
 * @property int        $subtotal
 * @property int        $tax
 * @property float      $tax_percent
 * @property int        $total
 * @property int $webhooks_delivered_at
 *
 * @package Stripe
 */
class Invoice extends ApiResource
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Invoice The created invoice.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param array|string $id The ID of the invoice to retrieve, or an options
     *     array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Invoice
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Invoices
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param string $id The ID of the invoice to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Invoice The updated invoice.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
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
     * @param array|string|null $opts
     *
     * @return Invoice The saved invoice.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @return Invoice The paid invoice.
     */
    public function pay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/pay';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
