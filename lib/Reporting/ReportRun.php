<?php

namespace Stripe\Reporting;

/**
 * The Report Run object represents an instance of a report type generated with
 * specific run parameters. Once the object is created, Stripe begins processing
 * the report. When the report has finished running, it will give you a reference
 * to a file where you can retrieve your results. For an overview, see <a
 * href="https://stripe.com/docs/reporting/statements/api">API Access to
 * Reports</a>.
 *
 * Note that reports can only be run based on your live-mode data (not test-mode
 * data), and thus related requests must be made with a <a
 * href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $error If something should go wrong during the run, a message about the failure (populated when <code>status=failed</code>).
 * @property bool $livemode Always <code>true</code>: reports can only be run on live-mode data.
 * @property \Stripe\StripeObject $parameters
 * @property string $report_type The ID of the <a href="https://stripe.com/docs/reporting/statements/api#report-types">report type</a> to run, such as <code>&quot;balance.summary.1&quot;</code>.
 * @property null|\Stripe\File $result The file object representing the result of the report run (populated when <code>status=succeeded</code>).
 * @property string $status Status of this report run. This will be <code>pending</code> when the run is initially created. When the run finishes, this will be set to <code>succeeded</code> and the <code>result</code> field will be populated. Rarely, we may encounter an error, at which point this will be set to <code>failed</code> and the <code>error</code> field will be populated.
 * @property null|int $succeeded_at Timestamp at which this run successfully finished (populated when <code>status=succeeded</code>). Measured in seconds since the Unix epoch.
 */
class ReportRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'reporting.report_run';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;

    const REPORTING_CATEGORY_ADVANCE = 'advance';
    const REPORTING_CATEGORY_ADVANCE_FUNDING = 'advance_funding';
    const REPORTING_CATEGORY_ANTICIPATION_REPAYMENT = 'anticipation_repayment';
    const REPORTING_CATEGORY_CHARGE = 'charge';
    const REPORTING_CATEGORY_CHARGE_FAILURE = 'charge_failure';
    const REPORTING_CATEGORY_CONNECT_COLLECTION_TRANSFER = 'connect_collection_transfer';
    const REPORTING_CATEGORY_CONNECT_RESERVED_FUNDS = 'connect_reserved_funds';
    const REPORTING_CATEGORY_DISPUTE = 'dispute';
    const REPORTING_CATEGORY_DISPUTE_REVERSAL = 'dispute_reversal';
    const REPORTING_CATEGORY_FEE = 'fee';
    const REPORTING_CATEGORY_FINANCING_PAYDOWN = 'financing_paydown';
    const REPORTING_CATEGORY_FINANCING_PAYDOWN_REVERSAL = 'financing_paydown_reversal';
    const REPORTING_CATEGORY_FINANCING_PAYOUT = 'financing_payout';
    const REPORTING_CATEGORY_FINANCING_PAYOUT_REVERSAL = 'financing_payout_reversal';
    const REPORTING_CATEGORY_ISSUING_AUTHORIZATION_HOLD = 'issuing_authorization_hold';
    const REPORTING_CATEGORY_ISSUING_AUTHORIZATION_RELEASE = 'issuing_authorization_release';
    const REPORTING_CATEGORY_ISSUING_DISPUTE = 'issuing_dispute';
    const REPORTING_CATEGORY_ISSUING_TRANSACTION = 'issuing_transaction';
    const REPORTING_CATEGORY_NETWORK_COST = 'network_cost';
    const REPORTING_CATEGORY_OTHER_ADJUSTMENT = 'other_adjustment';
    const REPORTING_CATEGORY_PARTIAL_CAPTURE_REVERSAL = 'partial_capture_reversal';
    const REPORTING_CATEGORY_PAYOUT = 'payout';
    const REPORTING_CATEGORY_PAYOUT_REVERSAL = 'payout_reversal';
    const REPORTING_CATEGORY_PLATFORM_EARNING = 'platform_earning';
    const REPORTING_CATEGORY_PLATFORM_EARNING_REFUND = 'platform_earning_refund';
    const REPORTING_CATEGORY_REFUND = 'refund';
    const REPORTING_CATEGORY_REFUND_FAILURE = 'refund_failure';
    const REPORTING_CATEGORY_RISK_RESERVED_FUNDS = 'risk_reserved_funds';
    const REPORTING_CATEGORY_TAX = 'tax';
    const REPORTING_CATEGORY_TOPUP = 'topup';
    const REPORTING_CATEGORY_TOPUP_REVERSAL = 'topup_reversal';
    const REPORTING_CATEGORY_TRANSFER = 'transfer';
    const REPORTING_CATEGORY_TRANSFER_REVERSAL = 'transfer_reversal';
}
