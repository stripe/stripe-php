<?php

namespace Stripe\Util;

class ObjectTypes
{
    /**
     * @var array Mapping from object types to resource classes
     */
    const mapping
        = [
            \Stripe\Collection::OBJECT_NAME => \Stripe\Collection::class,
            \Stripe\Issuing\CardDetails::OBJECT_NAME => \Stripe\Issuing\CardDetails::class,
            \Stripe\SearchResult::OBJECT_NAME => \Stripe\SearchResult::class,
            \Stripe\File::OBJECT_NAME_ALT => \Stripe\File::class,
            // object classes: The beginning of the section generated from our OpenAPI spec
            // object classes: The end of the section generated from our OpenAPI spec
        ];

    /**
     * @var array Mapping from v2 object types to resource classes
     */
    const v2Mapping = [
        // v2 object classes: The beginning of the section generated from our OpenAPI spec
        // v2 object classes: The end of the section generated from our OpenAPI spec
    ];
}
