<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Some payment methods have no required amount that a customer must send.
 * Customers can be instructed to send any amount, and it can be made up of
 * multiple transactions. As such, sources can have multiple associated
 * transactions.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $ach_credit_transfer
 * @property int $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the amount your customer has pushed to the receiver.
 * @property null|\Stripe\StripeObject $chf_credit_transfer
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|\Stripe\StripeObject $gbp_credit_transfer
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $paper_check
 * @property null|\Stripe\StripeObject $sepa_credit_transfer
 * @property string $source The ID of the source this transaction is attached to.
 * @property string $status The status of the transaction, one of <code>succeeded</code>, <code>pending</code>, or <code>failed</code>.
 * @property string $type The type of source this transaction is attached to.
 */
class SourceTransaction extends ApiResource
{
    const OBJECT_NAME = 'source_transaction';

    const TYPE_ACH_CREDIT_TRANSFER = 'ach_credit_transfer';
    const TYPE_ACH_DEBIT = 'ach_debit';
    const TYPE_ALIPAY = 'alipay';
    const TYPE_BANCONTACT = 'bancontact';
    const TYPE_CARD = 'card';
    const TYPE_CARD_PRESENT = 'card_present';
    const TYPE_EPS = 'eps';
    const TYPE_GIROPAY = 'giropay';
    const TYPE_IDEAL = 'ideal';
    const TYPE_KLARNA = 'klarna';
    const TYPE_MULTIBANCO = 'multibanco';
    const TYPE_P24 = 'p24';
    const TYPE_SEPA_DEBIT = 'sepa_debit';
    const TYPE_SOFORT = 'sofort';
    const TYPE_THREE_D_SECURE = 'three_d_secure';
    const TYPE_WECHAT = 'wechat';
}
