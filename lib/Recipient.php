<?php

namespace Stripe;

/**
 * Class Recipient
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\BankAccount|null $active_account Hash describing the current account on the recipient, if there is one.
 * @property \Stripe\Collection|null $cards
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|\Stripe\Card|null $default_card The default card to use for creating transfers to this recipient.
 * @property string|null $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property string|null $email
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|\Stripe\Account|null $migrated_to The ID of the <a href="https://stripe.com/docs/connect/custom-accounts">Custom account</a> this recipient was migrated to. If set, the recipient can no longer be updated, nor can transfers be made to it: use the Custom account instead.
 * @property string|null $name Full, legal name of the recipient.
 * @property string|\Stripe\Account $rolled_back_from
 * @property string $type Type of the recipient, one of <code>individual</code> or <code>corporation</code>.
 * @property bool $verified Whether the recipient has been verified. This field is non-standard, and maybe removed in the future
 *
 * @package Stripe
 */
class Recipient extends ApiResource
{
    const OBJECT_NAME = 'recipient';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
