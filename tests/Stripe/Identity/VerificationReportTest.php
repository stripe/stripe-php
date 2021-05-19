<?php

namespace Stripe\Identity;

/**
 * @internal
 * @coversNothing
 */
final class VerificationReportTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;
    const TEST_RESOURCE_ID = 'vr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_reports'
        );
        $resources = VerificationReport::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Identity\VerificationReport::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_reports/' . self::TEST_RESOURCE_ID
        );
        $resource = VerificationReport::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Identity\VerificationReport::class, $resource);
    }
}
