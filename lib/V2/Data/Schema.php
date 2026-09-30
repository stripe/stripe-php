<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data;

/**
 * The <code>Schema</code> resource describes the columns, types, and relationships of a table that
 * can be queried.
 *
 * @property string $id The unique identifier of the <code>Schema</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{description: string, foreign_keys_from: (object{column: string, schema: string}&\Stripe\StripeObject)[], foreign_keys_to: (object{column: string, schema: string}&\Stripe\StripeObject)[], is_primary_key: bool, name: string, type: string}&\Stripe\StripeObject)[] $columns The columns of the table.
 * @property string $dataset The dataset the table belongs to.
 * @property string $description A description of the table.
 * @property null|string $extended_description An extended, LLM-friendly description of the table, useful for query generation.
 * @property bool $livemode Whether this <code>Schema</code> describes live mode data.
 * @property string $name The human-readable name of the table.
 * @property string $refreshed_at Time at which the table's schema was last refreshed.
 * @property (object{description: string, id: string, name: string}&\Stripe\StripeObject)[] $relevant_reports Reports relevant to this table.
 */
class Schema extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.schema';

    const DATASET_ANALYTICAL = 'analytical';
}
