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
            'items' => ['kind' => 'int64_string'],
        ];
        $params = [1, 2, 3];
        $result = Int64::coerceRequestParams($params, $schema);

        self::assertSame(['1', '2', '3'], $result);
    }

    public function testCoerceRequestParamsHandlesArrayOfObjects()
    {
        $schema = [
            'kind' => 'array',
            'items' => [
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
            'items' => ['kind' => 'int64_string'],
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
                'items' => ['kind' => 'int64_string'],
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
                'items' => [
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
                'items' => ['kind' => 'int64_string'],
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
}
