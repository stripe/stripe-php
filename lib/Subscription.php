<?php

namespace Stripe;

/**
 * Class Subscription
 *
 * @property string $id
 * @property string $object
 * @property float|null $application_fee_percent
 * @property int $billing_cycle_anchor
 * @property \Stripe\StripeObject|null $billing_thresholds
 * @property int|null $cancel_at
 * @property bool $cancel_at_period_end
 * @property int|null $canceled_at
 * @property string|null $collection_method
 * @property int $created
 * @property int $current_period_end
 * @property int $current_period_start
 * @property string|\Stripe\Customer $customer
 * @property int|null $days_until_due
 * @property string|\Stripe\PaymentMethod|null $default_payment_method
 * @property string|\Stripe\StripeObject|null $default_source
 * @property \Stripe\TaxRate[]|null $default_tax_rates
 * @property \Stripe\Discount|null $discount
 * @property int|null $ended_at
 * @property \Stripe\Collection $items
 * @property string|\Stripe\Invoice|null $latest_invoice
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property int|null $next_pending_invoice_item_invoice
 * @property \Stripe\StripeObject|null $pending_invoice_item_interval
 * @property string|\Stripe\SetupIntent|null $pending_setup_intent
 * @property \Stripe\StripeObject|null $pending_update
 * @property \Stripe\Plan|null $plan
 * @property int|null $quantity
 * @property string|\Stripe\SubscriptionSchedule|null $schedule
 * @property int $start_date
 * @property string $status
 * @property float|null $tax_percent
 * @property int|null $trial_end
 * @property int|null $trial_start
 *
 * @package Stripe
 */
class Subscription extends ApiResource
{
    const OBJECT_NAME = 'subscription';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * These constants are possible representations of the status field.
     *
     * @see https://stripe.com/docs/api#subscription_object-status
     */
    const STATUS_ACTIVE             = 'active';
    const STATUS_CANCELED           = 'canceled';
    const STATUS_PAST_DUE           = 'past_due';
    const STATUS_TRIALING           = 'trialing';
    const STATUS_UNPAID             = 'unpaid';
    const STATUS_INCOMPLETE         = 'incomplete';
    const STATUS_INCOMPLETE_EXPIRED = 'incomplete_expired';

    use ApiOperations\Delete {
        delete as protected _delete;
      }

    public static function getSavedNestedResources()
    {
        static $savedNestedResources = null;
        if ($savedNestedResources === null) {
            $savedNestedResources = new Util\Set([
                'source',
            ]);
        }
        return $savedNestedResources;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription The deleted subscription.
     */
    public function cancel($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription The updated subscription.
     */
    public function deleteDiscount($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/discount';
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom(['discount' => null], $opts, true);
    }
}
