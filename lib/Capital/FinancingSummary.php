<?php

// File generated from our OpenAPI spec

namespace Stripe\Capital;

/**
 * A financing summary object describes a connected account's financing status in real time.
 * A financing status is either <code>accepted</code>, <code>delivered</code>, or <code>none</code>.
 * You can read the status of your connected accounts.
 *
 * @property string $object The object type: financing_summary
 * @property null|(object{advance_amount: int, advance_paid_out_at: null|float, currency: string, current_repayment_interval: null|(object{due_at: float, paid_amount: null|int, remaining_amount: int}&\Stripe\StripeObject), fee_amount: int, paid_amount: int, remaining_amount: int, repayments_begin_at: null|float, withhold_rate: float}&\Stripe\StripeObject) $details <p>Additional information about the financing summary. Describes currency, advance amount, fee amount, withhold rate, remaining amount, paid amount, current repayment interval, repayment start date, and advance payout date.</p><p>Only present for financing offers with the <code>paid_out</code> status.</p>
 * @property null|string $financing_offer The unique identifier of the Financing Offer object that corresponds to the Financing Summary object.
 * @property null|string $status The financing status of the connected account.
 */
class FinancingSummary extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'capital.financing_summary';

    const STATUS_ACCEPTED = 'accepted';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_NONE = 'none';

    /**
     * Retrieve the financing summary object for the account.
     *
     * @param null|array|string $opts
     *
     * @return FinancingSummary
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
