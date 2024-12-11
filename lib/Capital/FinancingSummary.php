<?php

// File generated from our OpenAPI spec

namespace Stripe\Capital;

/**
 * A financing object describes an account's current financing state. Used by Connect
 * platforms to read the state of Capital offered to their connected accounts.
 *
 * @property string $object The object type: financing_summary
 * @property null|(object{advance_amount: int, advance_paid_out_at: null|float, currency: string, current_repayment_interval: null|(object{due_at: float, paid_amount: null|int, remaining_amount: int}&\Stripe\StripeObject&\stdClass), fee_amount: int, paid_amount: int, remaining_amount: int, repayments_begin_at: null|float, withhold_rate: float}&\Stripe\StripeObject&\stdClass) $details Additional information about the financing summary. Describes currency, advance amount, fee amount, withhold rate, remaining amount, paid amount, current repayment interval, repayment start date, and advance payout date.
 * @property null|string $financing_offer The Financing Offer ID this Financing Summary corresponds to
 * @property null|string $status Status of the Connected Account's financing. <a href="https://stripe.com/docs/api/capital/financing_summary">/v1/capital/financing_summary</a> will only return <code>details</code> for <code>paid_out</code> financing.
 */
class FinancingSummary extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'capital.financing_summary';

    const STATUS_ACCEPTED = 'accepted';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_NONE = 'none';

    /**
     * Retrieve the financing state for the account that was authenticated in the
     * request.
     *
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingSummary
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
