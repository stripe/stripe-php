<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data;

/**
 * A ranked set of public analytical resources matching a natural-language query.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{business_concepts: (object{definition: string, term: string}&\Stripe\StripeObject)[], domain: string, guidance: string}&\Stripe\StripeObject) $context Domain-level intelligence. Present when a known domain matches; omitted when the system falls back to direct semantic search.
 * @property ((object{description: string, execution_spec: (object{execution_url: string, http_method: string, id: string}&\Stripe\StripeObject), extended_description?: string, id: string, name: string, object_type: string, reference_url: string, refreshed_at: string, relevance_score: string, catalog?: null|string, metrics?: null|(object{accepts_currency: bool, dimensions: (object{description: string, name: string}&\Stripe\StripeObject)[], measure_format: string, metric_namespace: string}&\Stripe\StripeObject), reports?: null|(object{output_columns: (object{description: string, name: string, type: string}&\Stripe\StripeObject)[], parameters: \Stripe\StripeObject}&\Stripe\StripeObject), schemas?: null|(object{columns: (object{description: string, foreign_keys_from: (object{column: string, schema: string, schema_name: string}&\Stripe\StripeObject)[], foreign_keys_to: (object{column: string, schema: string, schema_name: string}&\Stripe\StripeObject)[], is_primary_key: bool, name: string, type: string}&\Stripe\StripeObject)[], dataset: string, relevant_reports: (object{description: string, id: string, name: string, reference_url: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject))[] $data Ranked public resources. Always present, including when empty.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $next_page_url Token for the next page.
 * @property null|string $previous_page_url Token for the previous page.
 */
class SearchResultList extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.search_result_list';

    public static function fieldEncodings()
    {
        return [
            'data' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => [
                        'relevance_score' => ['kind' => 'decimal_string'],
                        'catalog' => [
                            'kind' => 'discriminatedUnion',
                            'discriminator' => 'catalog',
                            'variants' => [
                                'metrics' => [
                                    'kind' => 'object',
                                    'fields' => [],
                                ],
                                'reports' => [
                                    'kind' => 'object',
                                    'fields' => [],
                                ],
                                'schemas' => [
                                    'kind' => 'object',
                                    'fields' => [],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
