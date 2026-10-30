<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Risk;

/**
 * A risk Form represents a request from Stripe for information about a connected account.
 *
 * @property string $id Unique identifier for the Form.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{explanation: string}&\Stripe\StripeObject) $appeal Data for appeal inquiries. Only present when type is appeal.
 * @property null|(object{files: string[]}&\Stripe\StripeObject) $authorization_documents Data for authorization_documents inquiries. Only present when type is authorization_documents.
 * @property string $closed_at Time at which the Form was closed.
 * @property string $created Time at which the Form was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $opened_at Time at which the Form was opened.
 * @property null|(object{items_removed_at: string}&\Stripe\StripeObject) $product_removal Data for product_removal inquiries. Only present when type is product_removal.
 * @property null|(object{source_of_wealth?: (object{description: string, files: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject) $self_funding_context Data for self_funding_context inquiries. Only present when type is self_funding_context.
 * @property string $status The current status of the Form.
 * @property null|(object{transaction?: string, transactions?: string[]}&\Stripe\StripeObject) $subject What this Form was raised about, as a typed object. Only present when the Form is scoped to a specific object. Absent when the Form covers the account as a whole.
 * @property null|(object{purpose: string, sender_relationship?: string, source_of_funds?: (object{description: string, files: string[]}&\Stripe\StripeObject), use_of_funds: string}&\Stripe\StripeObject) $transaction_context Data for transaction_context inquiries. Only present when type is transaction_context.
 * @property string $type The type of Form.
 */
class Form extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.risk.form';

    const STATUS_CLOSED = 'closed';
    const STATUS_OPEN = 'open';

    const TYPE_APPEAL = 'appeal';
    const TYPE_AUTHORIZATION_DOCUMENTS = 'authorization_documents';
    const TYPE_PRODUCT_REMOVAL = 'product_removal';
    const TYPE_SELF_FUNDING_CONTEXT = 'self_funding_context';
    const TYPE_TRANSACTION_CONTEXT = 'transaction_context';
}
