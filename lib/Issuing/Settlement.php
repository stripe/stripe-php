<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * When a non-stripe BIN is used, any use of an <a href="https://stripe.com/docs/issuing">issued card</a> must be settled directly with the card network. The net amount owed is represented by an Issuing <code>Settlement</code> object.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $bin The Bank Identification Number reflecting this settlement record.
 * @property int $clearing_date The date that the transactions are cleared and posted to user's accounts.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property int $interchange_fees The total interchange received as reimbursement for the transactions.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property int $net_total The total net amount required to settle with the network.
 * @property string $network The card network for this settlement report. One of [&quot;visa&quot;, &quot;maestro&quot;]
 * @property int $network_fees The total amount of fees owed to the network.
 * @property string $network_settlement_identifier The Settlement Identification Number assigned by the network.
 * @property string $settlement_service One of <code>international</code> or <code>uk_national_net</code>.
 * @property string $status The current processing status of this settlement.
 * @property int $transaction_count The total number of transactions reflected in this settlement.
 * @property int $transaction_volume The total transaction amount reflected in this settlement.
 */
class Settlement extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.settlement';

    const NETWORK_MAESTRO = 'maestro';
    const NETWORK_VISA = 'visa';

    const STATUS_COMPLETE = 'complete';
    const STATUS_PENDING = 'pending';
}
