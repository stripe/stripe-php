<?php

namespace Stripe;

/**
 * Tests for discriminated union serialization.
 *
 * Stripe APIs use discriminated unions where a literal discriminator field
 * (e.g. `model`) selects which variant of a union type is being used.
 *
 * Request-side: PHP users pass plain arrays; the discriminator is just a
 * regular key in the nested array.
 *
 * Response-side: The API returns an object whose fields include the
 * discriminator; stripe-php deserializes it into a StripeObject.
 *
 * @internal
 *
 * @covers \Stripe\StripeObject
 * @covers \Stripe\Util\Util
 */
final class DiscriminatedUnionTest extends TestCase
{
    // -------------------------------------------------------------------------
    // Request-side: array params structure
    // -------------------------------------------------------------------------

    /**
     * Standalone union: the discriminated union value is a nested associative
     * array where one of the keys is the discriminator literal.
     *
     * Example: setting a color with model = 'rgb' and component values.
     */
    public function testStandaloneUnionParamsStructure()
    {
        $params = [
            'color' => [
                'model' => 'rgb',
                'r' => 255,
                'g' => 128,
                'b' => 0,
            ],
            'name' => 'sunset',
        ];

        // The discriminator 'model' must be present in the nested array.
        self::assertArrayHasKey('model', $params['color']);
        self::assertSame('rgb', $params['color']['model']);

        // Variant-specific fields are siblings of the discriminator.
        self::assertSame(255, $params['color']['r']);
        self::assertSame(128, $params['color']['g']);
        self::assertSame(0, $params['color']['b']);

        // The parent level has the wrapper key and other sibling fields.
        self::assertArrayHasKey('color', $params);
        self::assertArrayHasKey('name', $params);
        self::assertSame('sunset', $params['name']);
    }

    /**
     * Inline union: the discriminator lives at the parent level and the
     * variant-specific fields are in a nested object keyed by the variant name.
     *
     * Example: payment method type = 'card' with card-specific details.
     */
    public function testInlineUnionParamsStructure()
    {
        $params = [
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 12,
                'exp_year' => 2026,
                'cvc' => '123',
            ],
        ];

        // The discriminator is a sibling of the variant data.
        self::assertSame('card', $params['type']);

        // Variant fields are nested under their own key.
        self::assertArrayHasKey('card', $params);
        self::assertSame('4242424242424242', $params['card']['number']);
        self::assertSame(12, $params['card']['exp_month']);
        self::assertSame(2026, $params['card']['exp_year']);
        self::assertSame('123', $params['card']['cvc']);
    }

    // -------------------------------------------------------------------------
    // Request encoding: discriminator survives form-encoding
    // -------------------------------------------------------------------------

    /**
     * Verifies that a discriminated union array encodes correctly to form
     * params. The discriminator and all variant fields must appear as nested
     * bracket-notation keys (e.g. color[model]=rgb&color[r]=255).
     */
    public function testStandaloneUnionEncodesToFormParams()
    {
        $params = [
            'color' => [
                'model' => 'rgb',
                'r' => 255,
                'g' => 128,
                'b' => 0,
            ],
        ];

        $encoded = Util\Util::encodeParameters($params);

        // The discriminator must be present in the encoded output.
        self::assertStringContainsString('color[model]=rgb', $encoded);

        // Variant fields must also be encoded with the same prefix.
        self::assertStringContainsString('color[r]=255', $encoded);
        self::assertStringContainsString('color[g]=128', $encoded);
        self::assertStringContainsString('color[b]=0', $encoded);
    }

    /**
     * Verifies that an inline-discriminated union encodes correctly.
     * The discriminator at the top level encodes as a plain key, while the
     * variant-specific nested object encodes with bracket notation.
     */
    public function testInlineUnionEncodesToFormParams()
    {
        $params = [
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 12,
            ],
        ];

        $encoded = Util\Util::encodeParameters($params);

        // Top-level discriminator encodes as a plain key.
        self::assertStringContainsString('type=card', $encoded);

        // Variant fields encode with bracket notation.
        self::assertStringContainsString('card[number]=4242424242424242', $encoded);
        self::assertStringContainsString('card[exp_month]=12', $encoded);
    }

    /**
     * Verifies that flattenParams produces the correct key-value pairs for a
     * discriminated union, preserving both discriminator and variant fields.
     */
    public function testFlattenParamsPreservesDiscriminator()
    {
        $params = [
            'color' => [
                'model' => 'rgb',
                'r' => 255,
                'g' => 0,
                'b' => 0,
            ],
        ];

        $flat = Util\Util::flattenParams($params);

        // Build a map of key => value from the flattened list for easy lookup.
        $flatMap = [];
        foreach ($flat as [$key, $value]) {
            $flatMap[$key] = $value;
        }

        self::assertArrayHasKey('color[model]', $flatMap);
        self::assertSame('rgb', $flatMap['color[model]']);
        self::assertSame(255, $flatMap['color[r]']);
        self::assertSame(0, $flatMap['color[g]']);
        self::assertSame(0, $flatMap['color[b]']);
    }

    // -------------------------------------------------------------------------
    // Response-side: StripeObject deserialization
    // -------------------------------------------------------------------------

    /**
     * Verifies that a discriminated union value returned by the API is
     * correctly deserialized into a StripeObject whose fields — including the
     * discriminator — are accessible.
     */
    public function testResponseDeserializationStandaloneUnion()
    {
        $obj = Util\Util::convertToStripeObject(
            ['model' => 'rgb', 'r' => 255, 'g' => 128, 'b' => 0],
            null
        );

        self::assertInstanceOf(StripeObject::class, $obj);
        self::assertSame('rgb', $obj->model); // @phpstan-ignore-line
        self::assertSame(255, $obj->r); // @phpstan-ignore-line
        self::assertSame(128, $obj->g); // @phpstan-ignore-line
        self::assertSame(0, $obj->b); // @phpstan-ignore-line
    }

    /**
     * Verifies array-syntax access works the same as property access for
     * discriminated union response objects.
     */
    public function testResponseDeserializationArrayAccess()
    {
        $obj = Util\Util::convertToStripeObject(
            ['model' => 'rgb', 'r' => 255, 'g' => 128, 'b' => 0],
            null
        );

        self::assertInstanceOf(StripeObject::class, $obj);
        self::assertSame('rgb', $obj['model']);
        self::assertSame(255, $obj['r']);
    }

    /**
     * Verifies that an inline-discriminated union response is deserialized
     * correctly: the discriminator and all variant-specific fields are
     * accessible on the parent object.
     */
    public function testResponseDeserializationInlineUnion()
    {
        $obj = Util\Util::convertToStripeObject(
            [
                'id' => 'pm_123',
                'object' => 'payment_method',
                'type' => 'card',
                'card' => [
                    'brand' => 'visa',
                    'last4' => '4242',
                    'exp_month' => 12,
                    'exp_year' => 2026,
                ],
            ],
            null
        );

        self::assertInstanceOf(StripeObject::class, $obj);
        // Discriminator is directly accessible.
        self::assertSame('card', $obj->type); // @phpstan-ignore-line

        // Nested variant data is deserialized into a StripeObject.
        self::assertInstanceOf(StripeObject::class, $obj->card); // @phpstan-ignore-line
        self::assertSame('visa', $obj->card->brand); // @phpstan-ignore-line
        self::assertSame('4242', $obj->card->last4); // @phpstan-ignore-line
        self::assertSame(12, $obj->card->exp_month); // @phpstan-ignore-line
        self::assertSame(2026, $obj->card->exp_year); // @phpstan-ignore-line
    }

    /**
     * Verifies that a response with multiple discriminated union variants
     * at different levels is fully deserialized.
     */
    public function testResponseDeserializationNestedUnion()
    {
        $obj = Util\Util::convertToStripeObject(
            [
                'name' => 'sunset',
                'color' => [
                    'model' => 'rgb',
                    'r' => 255,
                    'g' => 128,
                    'b' => 0,
                ],
            ],
            null
        );

        self::assertInstanceOf(StripeObject::class, $obj);
        self::assertSame('sunset', $obj->name); // @phpstan-ignore-line

        // Nested discriminated union is also a StripeObject.
        self::assertInstanceOf(StripeObject::class, $obj->color); // @phpstan-ignore-line
        self::assertSame('rgb', $obj->color->model); // @phpstan-ignore-line
        self::assertSame(255, $obj->color->r); // @phpstan-ignore-line
        self::assertSame(128, $obj->color->g); // @phpstan-ignore-line
        self::assertSame(0, $obj->color->b); // @phpstan-ignore-line
    }

    // -------------------------------------------------------------------------
    // Round-trip: serialized request includes discriminator
    // -------------------------------------------------------------------------

    /**
     * Verifies that when params containing a discriminated union are passed
     * through objectsToIds (the pre-encoding step), the discriminator and
     * variant fields are preserved intact.
     */
    public function testObjectsToIdsPreservesDiscriminatorFields()
    {
        $params = [
            'color' => [
                'model' => 'rgb',
                'r' => 255,
                'g' => 128,
                'b' => 0,
            ],
            'name' => 'sunset',
        ];

        $result = Util\Util::objectsToIds($params, false);

        self::assertArrayHasKey('color', $result);
        self::assertArrayHasKey('model', $result['color']);
        self::assertSame('rgb', $result['color']['model']);
        self::assertSame(255, $result['color']['r']);
        self::assertSame('sunset', $result['name']);
    }
}
