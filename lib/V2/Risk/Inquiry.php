<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Risk;

/**
 * A risk inquiry represents a request from Stripe for information about a connected account.
 *
 * @property string $id Unique identifier for the inquiry.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{explanation: string}&\Stripe\StripeObject) $appeal Data for appeal inquiries. Only present when type is appeal.
 * @property null|(object{files: string[]}&\Stripe\StripeObject) $authorization_documents Data for authorization_documents inquiries. Only present when type is authorization_documents.
 * @property int $closed_at Time at which the inquiry was closed.
 * @property int $created Time at which the inquiry was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $opened_at Time at which the inquiry was opened.
 * @property null|(object{items_removed_at: int}&\Stripe\StripeObject) $product_removal Data for product_removal inquiries. Only present when type is product_removal.
 * @property string $status The current status of the inquiry.
 * @property string $type The type of inquiry.
 */
class Inquiry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.risk.inquiry';

    const STATUS_CLOSED = 'closed';
    const STATUS_OPEN = 'open';

    const TYPE_APPEAL = 'appeal';
    const TYPE_AUTHORIZATION_DOCUMENTS = 'authorization_documents';
    const TYPE_PRODUCT_REMOVAL = 'product_removal';
}
