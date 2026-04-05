<?php

namespace Stripe\V2;

/**
 * @internal
 *
 * @covers \Stripe\V2\Ref
 */
final class RefTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    private function makeRef($overrides = [])
    {
        $json = array_merge([
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ], $overrides);

        $client = new \Stripe\StripeClient('sk_test_123');

        return new Ref($json, $client);
    }

    public function testConstructorPopulatesProperties()
    {
        $ref = $this->makeRef();

        self::assertSame('v2.core.account', $ref->type);
        self::assertSame('acct_123', $ref->id);
        self::assertSame('/v2/core/accounts/acct_123', $ref->url);
    }

    public function testFetchMakesGetRequestToUrl()
    {
        $responseBody = json_encode([
            'object' => 'v2.core.account',
            'id' => 'acct_123',
        ]);

        $fakeResponse = new \Stripe\ApiResponse($responseBody, 200, [], json_decode($responseBody, true));

        $clientMock = $this->getMockBuilder(\Stripe\StripeClient::class)
            ->setConstructorArgs(['sk_test_123'])
            ->setMethods(['rawRequest', 'deserialize'])
            ->getMock()
        ;

        $clientMock->expects(self::once())
            ->method('rawRequest')
            ->with(
                'get',
                '/v2/core/accounts/acct_123',
                null,
                [],
                null,
                ['ref_fetch']
            )
            ->willReturn($fakeResponse)
        ;

        $expectedObject = new \Stripe\StripeObject();
        $clientMock->expects(self::once())
            ->method('deserialize')
            ->with($responseBody, 'v2')
            ->willReturn($expectedObject)
        ;

        $json = [
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ];

        $ref = new Ref($json, $clientMock);
        $result = $ref->fetch();

        self::assertSame($expectedObject, $result);
    }

    public function testFetchUsesV1ApiModeForV1Urls()
    {
        $responseBody = json_encode([
            'object' => 'account',
            'id' => 'acct_123',
        ]);

        $fakeResponse = new \Stripe\ApiResponse($responseBody, 200, [], json_decode($responseBody, true));

        $clientMock = $this->getMockBuilder(\Stripe\StripeClient::class)
            ->setConstructorArgs(['sk_test_123'])
            ->setMethods(['rawRequest', 'deserialize'])
            ->getMock()
        ;

        $clientMock->expects(self::once())
            ->method('rawRequest')
            ->willReturn($fakeResponse)
        ;

        $clientMock->expects(self::once())
            ->method('deserialize')
            ->with($responseBody, 'v1')
            ->willReturn(new \Stripe\StripeObject())
        ;

        $json = [
            'type' => 'account',
            'id' => 'acct_123',
            'url' => '/v1/accounts/acct_123',
        ];

        $ref = new Ref($json, $clientMock);
        $ref->fetch();
    }

    public function testFetchThrowsWhenClientIsNull()
    {
        $json = [
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ];

        $ref = new Ref($json);

        $this->expectException(\Stripe\Exception\UnexpectedValueException::class);
        $this->expectExceptionMessage('Ref has no client. Was it deserialized from a StripeClient response?');

        $ref->fetch();
    }

    public function testDeserializeViaClientCreatesRefWithClientSet()
    {
        $client = new \Stripe\StripeClient('sk_test_123');

        $json = json_encode([
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ]);

        $result = $client->deserialize($json, 'v2');

        self::assertInstanceOf(Ref::class, $result);
        self::assertSame('v2.core.account', $result->type);
        self::assertSame('acct_123', $result->id);
        self::assertSame('/v2/core/accounts/acct_123', $result->url);

        $reflProp = new \ReflectionProperty(Ref::class, 'client');
        $reflProp->setAccessible(true);
        self::assertSame($client, $reflProp->getValue($result));
    }

    public function testSetClientAllowsFetch()
    {
        $responseBody = json_encode([
            'object' => 'v2.core.account',
            'id' => 'acct_123',
        ]);

        $fakeResponse = new \Stripe\ApiResponse($responseBody, 200, [], json_decode($responseBody, true));

        $clientMock = $this->getMockBuilder(\Stripe\StripeClient::class)
            ->setConstructorArgs(['sk_test_123'])
            ->setMethods(['rawRequest', 'deserialize'])
            ->getMock()
        ;

        $clientMock->expects(self::once())
            ->method('rawRequest')
            ->willReturn($fakeResponse)
        ;

        $expectedObject = new \Stripe\StripeObject();
        $clientMock->expects(self::once())
            ->method('deserialize')
            ->willReturn($expectedObject)
        ;

        $json = [
            'type' => 'v2.core.account',
            'id' => 'acct_123',
            'url' => '/v2/core/accounts/acct_123',
        ];

        $ref = new Ref($json);
        $ref->setClient($clientMock);
        $result = $ref->fetch();

        self::assertSame($expectedObject, $result);
    }
}
