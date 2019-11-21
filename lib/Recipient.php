<?php

namespace Stripe;

/**
 * Class Recipient
 *
 * @property string $id
 * @property string $object
 * @property mixed $active_account
 * @property mixed $cards
 * @property int $created
 * @property string $default_card
 * @property string $description
 * @property string $email
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string $migrated_to
 * @property string $name
 * @property string $rolled_back_from
 * @property string $type
 * @property bool $verified
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
