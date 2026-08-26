<?php

namespace Stripe\Util;

/**
 * @internal
 *
 * @covers \Stripe\Util\Int64
 */
final class Int64Test extends \Stripe\TestCase
{
    // ——— coerceRequestParams ———

    public function testCoerceRequestParamsReturnsNullForNullParams()
    {
        $schema = ['kind' => 'object', 'fields' => ['amount' => ['kind' => 'int64_string']]];
        self::assertNull(Int64::coerceRequestParams(null, $schema));
    }

    public function testCoerceRequestParamsReturnsParamsWhenSchemaHasNoKind()
    {
        $params = ['amount' => 42];
        self::assertSame($params, Int64::coerceRequestParams($params, []));
    }

    public function testCoerceRequestParamsConvertsIntToStringForInt64Field()
    {
        $schema = ['kind' => 'int64_string'];
        self::assertSame('42', Int64::coerceRequestParams(42, $schema));
    }

    public function testCoerceRequestParamsPassesThroughStringForInt64Field()
    {
        $schema = ['kind' => 'int64_string'];
        self::assertSame('42', Int64::coerceRequestParams('42', $schema));
    }

    public function testCoerceRequestParamsConvertsObjectFieldsSelectively()
    {
        $schema = [
            'kind' => 'object',
            'fields' => [
                'amount' => ['kind' => 'int64_string'],
            ],
        ];
        $params = ['amount' => 100, 'currency' => 'usd'];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('100', $result['amount']);
        self::assertSame('usd', $result['currency']);
    }

    public function testCoerceRequestParamsLeavesUnmatchedFieldsAlone()
    {
        $schema = [
            'kind' => 'object',
            'fields' => [
                'amount' => ['kind' => 'int64_string'],
            ],
        ];
        $params = ['description' => 'test'];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('test', $result['description']);
    }

    public function testCoerceRequestParamsHandlesArrayOfInt64()
    {
        $schema = [
            'kind' => 'array',
            'element' => ['kind' => 'int64_string'],
        ];
        $params = [1, 2, 3];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame(['1', '2', '3'], $result);
    }

    public function testCoerceRequestParamsHandlesArrayOfObjects()
    {
        $schema = [
            'kind' => 'array',
            'element' => [
                'kind' => 'object',
                'fields' => [
                    'amount' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $params = [
            ['amount' => 100, 'currency' => 'usd'],
            ['amount' => 200, 'currency' => 'eur'],
        ];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('100', $result[0]['amount']);
        self::assertSame('usd', $result[0]['currency']);
        self::assertSame('200', $result[1]['amount']);
        self::assertSame('eur', $result[1]['currency']);
    }

    public function testCoerceRequestParamsHandlesNestedObjects()
    {
        $schema = [
            'kind' => 'object',
            'fields' => [
                'outer' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
        $params = ['outer' => ['amount' => 500, 'label' => 'test']];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('500', $result['outer']['amount']);
        self::assertSame('test', $result['outer']['label']);
    }

    public function testCoerceRequestParamsPassesThroughNonArrayForObjectSchema()
    {
        $schema = [
            'kind' => 'object',
            'fields' => [
                'amount' => ['kind' => 'int64_string'],
            ],
        ];
        self::assertSame('not-an-array', Int64::coerceRequestParams('not-an-array', $schema));
    }

    public function testCoerceRequestParamsPassesThroughNonArrayForArraySchema()
    {
        $schema = [
            'kind' => 'array',
            'element' => ['kind' => 'int64_string'],
        ];
        self::assertSame('not-an-array', Int64::coerceRequestParams('not-an-array', $schema));
    }

    public function testCoerceRequestParamsPassesThroughForUnknownKind()
    {
        $schema = ['kind' => 'unknown_type'];
        $params = ['foo' => 'bar'];
        self::assertSame($params, Int64::coerceRequestParams($params, $schema));
    }

    // ——— coerceResponseValues ———

    public function testCoerceResponseValuesReturnsNonArrayAsIs()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        self::assertSame('not-an-array', Int64::coerceResponseValues('not-an-array', $encodings));
    }

    public function testCoerceResponseValuesConvertsNumericStringToInt()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        $values = ['amount' => '12345'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(12345, $result['amount']);
    }

    public function testCoerceResponseValuesLeavesNonNumericStringAlone()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        $values = ['amount' => 'not-a-number'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('not-a-number', $result['amount']);
    }

    public function testCoerceResponseValuesLeavesNonIntFieldsAlone()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        $values = ['amount' => '100', 'currency' => 'usd'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(100, $result['amount']);
        self::assertSame('usd', $result['currency']);
    }

    public function testCoerceResponseValuesSkipsMissingFields()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        $values = ['currency' => 'usd'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(['currency' => 'usd'], $result);
    }

    public function testCoerceResponseValuesSkipsEncodingsWithNoKind()
    {
        $encodings = ['amount' => []];
        $values = ['amount' => '100'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('100', $result['amount']);
    }

    public function testCoerceResponseValuesHandlesArrayOfInt64()
    {
        $encodings = [
            'amounts' => [
                'kind' => 'array',
                'element' => ['kind' => 'int64_string'],
            ],
        ];
        $values = ['amounts' => ['100', '200', '300']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame([100, 200, 300], $result['amounts']);
    }

    public function testCoerceResponseValuesHandlesArrayOfObjects()
    {
        $encodings = [
            'line_items' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
        $values = [
            'line_items' => [
                ['amount' => '100', 'description' => 'Widget'],
                ['amount' => '200', 'description' => 'Gadget'],
            ],
        ];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(100, $result['line_items'][0]['amount']);
        self::assertSame('Widget', $result['line_items'][0]['description']);
        self::assertSame(200, $result['line_items'][1]['amount']);
        self::assertSame('Gadget', $result['line_items'][1]['description']);
    }

    public function testCoerceResponseValuesHandlesNestedObject()
    {
        $encodings = [
            'details' => [
                'kind' => 'object',
                'fields' => [
                    'amount' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $values = ['details' => ['amount' => '999', 'label' => 'test']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(999, $result['details']['amount']);
        self::assertSame('test', $result['details']['label']);
    }

    public function testCoerceResponseValuesHandlesNonArrayValueForArrayEncoding()
    {
        $encodings = [
            'amounts' => [
                'kind' => 'array',
                'element' => ['kind' => 'int64_string'],
            ],
        ];
        $values = ['amounts' => 'not-an-array'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('not-an-array', $result['amounts']);
    }

    public function testCoerceResponseValuesHandlesNonArrayValueForObjectEncoding()
    {
        $encodings = [
            'details' => [
                'kind' => 'object',
                'fields' => [
                    'amount' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $values = ['details' => 'not-an-array'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('not-an-array', $result['details']);
    }

    public function testCoerceResponseValuesHandlesNegativeNumbers()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        $values = ['amount' => '-500'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(-500, $result['amount']);
    }

    public function testCoerceResponseValuesHandlesZero()
    {
        $encodings = ['amount' => ['kind' => 'int64_string']];
        $values = ['amount' => '0'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(0, $result['amount']);
    }

    public function testCoerceRequestParamsHandlesZero()
    {
        $schema = ['kind' => 'int64_string'];
        self::assertSame('0', Int64::coerceRequestParams(0, $schema));
    }

    public function testCoerceRequestParamsHandlesNegativeInt()
    {
        $schema = ['kind' => 'int64_string'];
        self::assertSame('-500', Int64::coerceRequestParams(-500, $schema));
    }

    public function testCoerceRequestParamsConvertsFloatToStringForDecimalField()
    {
        $schema = ['kind' => 'decimal_string'];
        self::assertSame('3.14', Int64::coerceRequestParams(3.14, $schema));
    }

    public function testCoerceRequestParamsConvertsIntToStringForDecimalField()
    {
        $schema = ['kind' => 'decimal_string'];
        self::assertSame('42', Int64::coerceRequestParams(42, $schema));
    }

    public function testCoerceRequestParamsPassesThroughStringForDecimalField()
    {
        $schema = ['kind' => 'decimal_string'];
        self::assertSame('3.14', Int64::coerceRequestParams('3.14', $schema));
    }

    public function testCoerceRequestParamsNullableReturnsNullForNullValue()
    {
        $schema = ['kind' => 'nullable', 'inner' => ['kind' => 'int64_string']];
        self::assertNull(Int64::coerceRequestParams(null, $schema));
    }

    public function testCoerceRequestParamsNullableRecursesIntoInnerSchema()
    {
        $schema = ['kind' => 'nullable', 'inner' => ['kind' => 'int64_string']];
        self::assertSame('100', Int64::coerceRequestParams(100, $schema));
    }

    public function testCoerceRequestParamsNullableWithObjectInner()
    {
        $schema = [
            'kind' => 'nullable',
            'inner' => [
                'kind' => 'object',
                'fields' => [
                    'amount' => ['kind' => 'int64_string'],
                ],
            ],
        ];
        $params = ['amount' => 500, 'currency' => 'usd'];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('500', $result['amount']);
        self::assertSame('usd', $result['currency']);
    }

    public function testCoerceRequestParamsDiscriminatedUnionSelectsMatchingVariant()
    {
        $schema = [
            'kind' => 'discriminatedUnion',
            'discriminator' => 'type',
            'variants' => [
                'transfer' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
                'fee' => [
                    'kind' => 'object',
                    'fields' => [
                        'fee_amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
        $params = ['type' => 'transfer', 'amount' => 200, 'currency' => 'usd'];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('200', $result['amount']);
        self::assertSame('usd', $result['currency']);
        self::assertSame('transfer', $result['type']);
    }

    public function testCoerceRequestParamsDiscriminatedUnionUsesCorrectVariant()
    {
        $schema = [
            'kind' => 'discriminatedUnion',
            'discriminator' => 'type',
            'variants' => [
                'transfer' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
                'fee' => [
                    'kind' => 'object',
                    'fields' => [
                        'fee_amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
        $params = ['type' => 'fee', 'fee_amount' => 50, 'currency' => 'usd'];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame('50', $result['fee_amount']);
        self::assertSame('usd', $result['currency']);
    }

    public function testCoerceRequestParamsDiscriminatedUnionPassesThroughForUnknownVariant()
    {
        $schema = [
            'kind' => 'discriminatedUnion',
            'discriminator' => 'type',
            'variants' => [
                'transfer' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
        $params = ['type' => 'unknown', 'amount' => 100];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame(100, $result['amount']);
    }

    public function testCoerceRequestParamsDiscriminatedUnionThrowsForMissingDiscriminator()
    {
        // Skipping coercion here would send `amount` as a raw JSON number
        // rather than the int64_string the wire format expects.
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('discriminator `type`');
        Int64::coerceRequestParams(['amount' => 100], self::discriminatedUnionSchema());
    }

    public function testCoerceRequestParamsDiscriminatedUnionListsVariantsWhenItThrows()
    {
        $this->expectExceptionMessage('one of: transfer.');
        Int64::coerceRequestParams(['amount' => 100], self::discriminatedUnionSchema());
    }

    public function testCoerceRequestParamsDiscriminatedUnionThrowsForNonStringDiscriminator()
    {
        // A discriminator that is present but not a string is the same failure
        // as one that is absent: there is no key to look a variant schema up by.
        foreach ([123, true, 1.5, [], null] as $discriminator) {
            $described = \var_export($discriminator, true);

            try {
                Int64::coerceRequestParams(
                    ['type' => $discriminator, 'amount' => 100],
                    self::discriminatedUnionSchema()
                );
                self::fail("expected discriminator {$described} to be rejected");
            } catch (\Stripe\Exception\InvalidArgumentException $e) {
                self::assertStringContainsString('discriminator `type`', $e->getMessage());
            }
        }
    }

    private static function discriminatedUnionSchema()
    {
        return [
            'kind' => 'discriminatedUnion',
            'discriminator' => 'type',
            'variants' => [
                'transfer' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
    }

    public function testCoerceRequestParamsDiscriminatedUnionPassesThroughNonArray()
    {
        $schema = [
            'kind' => 'discriminatedUnion',
            'discriminator' => 'type',
            'variants' => [
                'transfer' => ['kind' => 'object', 'fields' => []],
            ],
        ];
        self::assertSame('not-an-array', Int64::coerceRequestParams('not-an-array', $schema));
    }

    // ——— coerceResponseValues — nullable ———

    public function testCoerceResponseValuesNullableSkipsNullValue()
    {
        $encodings = [
            'amount' => ['kind' => 'nullable', 'inner' => ['kind' => 'int64_string']],
        ];
        $values = ['amount' => null];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertNull($result['amount']);
    }

    public function testCoerceResponseValuesNullableRecursesForNonNull()
    {
        $encodings = [
            'amount' => ['kind' => 'nullable', 'inner' => ['kind' => 'int64_string']],
        ];
        $values = ['amount' => '999'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(999, $result['amount']);
    }

    public function testCoerceResponseValuesNullableWithObjectInner()
    {
        $encodings = [
            'details' => [
                'kind' => 'nullable',
                'inner' => [
                    'kind' => 'object',
                    'fields' => [
                        'amount' => ['kind' => 'int64_string'],
                    ],
                ],
            ],
        ];
        $values = ['details' => ['amount' => '300', 'label' => 'test']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(300, $result['details']['amount']);
        self::assertSame('test', $result['details']['label']);
    }

    // ——— coerceResponseValues — discriminatedUnion ———

    public function testCoerceResponseValuesDiscriminatedUnionSelectsMatchingVariant()
    {
        $encodings = [
            'adjustment' => [
                'kind' => 'discriminatedUnion',
                'discriminator' => 'type',
                'variants' => [
                    'transfer' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'fee' => [
                        'kind' => 'object',
                        'fields' => [
                            'fee_amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
        $values = ['adjustment' => ['type' => 'transfer', 'amount' => '750', 'currency' => 'usd']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(750, $result['adjustment']['amount']);
        self::assertSame('usd', $result['adjustment']['currency']);
        self::assertSame('transfer', $result['adjustment']['type']);
    }

    public function testCoerceResponseValuesDiscriminatedUnionUsesCorrectVariant()
    {
        $encodings = [
            'adjustment' => [
                'kind' => 'discriminatedUnion',
                'discriminator' => 'type',
                'variants' => [
                    'transfer' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                    'fee' => [
                        'kind' => 'object',
                        'fields' => [
                            'fee_amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
        $values = ['adjustment' => ['type' => 'fee', 'fee_amount' => '25', 'currency' => 'usd']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame(25, $result['adjustment']['fee_amount']);
        self::assertSame('usd', $result['adjustment']['currency']);
    }

    public function testCoerceResponseValuesDiscriminatedUnionPassesThroughForUnknownVariant()
    {
        $encodings = [
            'adjustment' => [
                'kind' => 'discriminatedUnion',
                'discriminator' => 'type',
                'variants' => [
                    'transfer' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
        $values = ['adjustment' => ['type' => 'unknown', 'amount' => '100']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('100', $result['adjustment']['amount']);
    }

    public function testCoerceResponseValuesDiscriminatedUnionPassesThroughForMissingDiscriminator()
    {
        $encodings = [
            'adjustment' => [
                'kind' => 'discriminatedUnion',
                'discriminator' => 'type',
                'variants' => [
                    'transfer' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
        $values = ['adjustment' => ['amount' => '100']];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('100', $result['adjustment']['amount']);
    }

    public function testCoerceResponseValuesDiscriminatedUnionPassesThroughForNonStringDiscriminator()
    {
        // The request side throws here, because encoding without knowing the
        // variant loses precision silently. Decoding has nothing to lose: the
        // value is already a string on the wire, so an unusable discriminator
        // just means we hand back what the API sent.
        $encodings = [
            'adjustment' => [
                'kind' => 'discriminatedUnion',
                'discriminator' => 'type',
                'variants' => [
                    'transfer' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
        foreach ([123, true, 1.5, [], null] as $bad) {
            $values = ['adjustment' => ['type' => $bad, 'amount' => '100']];
            $result = Int64::coerceResponseValues($values, $encodings);

            self::assertSame('100', $result['adjustment']['amount']);
            self::assertSame($bad, $result['adjustment']['type']);
        }
    }

    public function testCoerceResponseValuesDiscriminatedUnionPassesThroughNonArrayValue()
    {
        $encodings = [
            'adjustment' => [
                'kind' => 'discriminatedUnion',
                'discriminator' => 'type',
                'variants' => [
                    'transfer' => ['kind' => 'object', 'fields' => []],
                ],
            ],
        ];
        $values = ['adjustment' => 'not-an-array'];
        $result = Int64::coerceResponseValues($values, $encodings);

        self::assertSame('not-an-array', $result['adjustment']);
    }

    // ——— generated schema shapes ———
    //
    // The schemas below are copied verbatim out of generated code rather than
    // written by hand. Every other array test in this file invented its own key
    // for the element schema, so they all passed while the runtime read a key
    // the generator never emits and the array branch was dead. Pinning these to
    // real generated output means a future rename fails here instead of
    // silently skipping coercion again.

    public function testCoerceRequestParamsHandlesGeneratedArraySchema()
    {
        // From znapshots/php-private-preview Service/V2/Billing/IntentService: create().
        $schema = [
            'kind' => 'object',
            'fields' => [
                'actions' => [
                    'kind' => 'array',
                    'element' => [
                        'kind' => 'object',
                        'fields' => [
                            'apply' => [
                                'kind' => 'object',
                                'fields' => [
                                    'invoice_discount_rule' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_off' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'percent_off' => [
                                                        'kind' => 'decimal_string',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $params = [
            'actions' => [
                ['apply' => ['invoice_discount_rule' => ['percent_off' => ['percent_off' => 12.5]]]],
            ],
        ];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame(
            '12.5',
            $result['actions'][0]['apply']['invoice_discount_rule']['percent_off']['percent_off']
        );
    }

    public function testCoerceResponseValuesHandlesGeneratedArraySchema()
    {
        // From znapshots/php V2/Commerce/ProductCatalogImport: fieldEncodings().
        $encodings = [
            'status_details' => [
                'kind' => 'object',
                'fields' => [
                    'succeeded_with_errors' => [
                        'kind' => 'object',
                        'fields' => [
                            'error_count' => ['kind' => 'int64_string'],
                            'samples' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'row' => ['kind' => 'int64_string'],
                                    ],
                                ],
                            ],
                            'success_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ];
        $values = [
            'status_details' => [
                'succeeded_with_errors' => [
                    'error_count' => '2',
                    'samples' => [
                        ['row' => '7', 'field' => 'price'],
                        ['row' => '9', 'field' => 'sku'],
                    ],
                    'success_count' => '98',
                ],
            ],
        ];
        $result = Int64::coerceResponseValues($values, $encodings);
        $details = $result['status_details']['succeeded_with_errors'];

        self::assertSame(2, $details['error_count']);
        self::assertSame(98, $details['success_count']);
        self::assertSame(7, $details['samples'][0]['row']);
        self::assertSame(9, $details['samples'][1]['row']);
        self::assertSame('price', $details['samples'][0]['field']);
    }
}
