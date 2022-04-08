<?php

namespace Stripe;

/**
 * @internal
 * @coversNothing
 */
final class GeneratedExamplesTest extends \Stripe\TestCase
{
    use TestHelper;

    /** @var null|\Stripe\StripeClient */
    private $client;

    /** @before */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
    }

    public function testListCustomer()
    {
        $this->expectsRequest('get', '/v1/customers');
        $result = $this->client->customers->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Customer::class, $result->data[0]);
    }

    public function testRetrieveBalanceTransaction()
    {
        $this->expectsRequest('get', '/v1/balance_transactions/txn_xxxxxxxxxxxxx');
        $result = $this->client->balanceTransactions->retrieve(
            'txn_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\BalanceTransaction::class, $result);
    }

    public function testListBalanceTransaction()
    {
        $this->expectsRequest('get', '/v1/balance_transactions');
        $result = $this->client->balanceTransactions->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\BalanceTransaction::class, $result->data[0]);
    }

    public function testCreateCharge()
    {
        $this->expectsRequest('post', '/v1/charges');
        $result = $this->client->charges->create(
            [
                'amount' => 2000,
                'currency' => 'usd',
                'source' => 'tok_xxxx',
                'description' => 'My First Test Charge (created for API docs)',
            ]
        );
        static::assertInstanceOf(\Stripe\Charge::class, $result);
    }

    public function testRetrieveCharge()
    {
        $this->expectsRequest('get', '/v1/charges/ch_xxxxxxxxxxxxx');
        $result = $this->client->charges->retrieve('ch_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Charge::class, $result);
    }

    public function testUpdateCharge()
    {
        $this->expectsRequest('post', '/v1/charges/ch_xxxxxxxxxxxxx');
        $result = $this->client->charges->update(
            'ch_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Charge::class, $result);
    }

    public function testCaptureCharge()
    {
        $this->expectsRequest('post', '/v1/charges/ch_xxxxxxxxxxxxx/capture');
        $result = $this->client->charges->capture('ch_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Charge::class, $result);
    }

    public function testListCharge()
    {
        $this->expectsRequest('get', '/v1/charges');
        $result = $this->client->charges->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Charge::class, $result->data[0]);
    }

    public function testCreateCustomer()
    {
        $this->expectsRequest('post', '/v1/customers');
        $result = $this->client->customers->create(
            ['description' => 'My First Test Customer (created for API docs)']
        );
        static::assertInstanceOf(\Stripe\Customer::class, $result);
    }

    public function testRetrieveCustomer()
    {
        $this->expectsRequest('get', '/v1/customers/cus_xxxxxxxxxxxxx');
        $result = $this->client->customers->retrieve('cus_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Customer::class, $result);
    }

    public function testUpdateCustomer()
    {
        $this->expectsRequest('post', '/v1/customers/cus_xxxxxxxxxxxxx');
        $result = $this->client->customers->update(
            'cus_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Customer::class, $result);
    }

    public function testDeleteCustomer()
    {
        $this->expectsRequest('delete', '/v1/customers/cus_xxxxxxxxxxxxx');
        $result = $this->client->customers->delete('cus_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Customer::class, $result);
    }

    public function testListCustomer2()
    {
        $this->expectsRequest('get', '/v1/customers');
        $result = $this->client->customers->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Customer::class, $result->data[0]);
    }

    public function testRetrieveDispute()
    {
        $this->expectsRequest('get', '/v1/disputes/dp_xxxxxxxxxxxxx');
        $result = $this->client->disputes->retrieve('dp_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Dispute::class, $result);
    }

    public function testUpdateDispute()
    {
        $this->expectsRequest('post', '/v1/disputes/dp_xxxxxxxxxxxxx');
        $result = $this->client->disputes->update(
            'dp_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Dispute::class, $result);
    }

    public function testCloseDispute()
    {
        $this->expectsRequest('post', '/v1/disputes/dp_xxxxxxxxxxxxx/close');
        $result = $this->client->disputes->close('dp_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Dispute::class, $result);
    }

    public function testListDispute()
    {
        $this->expectsRequest('get', '/v1/disputes');
        $result = $this->client->disputes->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Dispute::class, $result->data[0]);
    }

    public function testRetrieveEvent()
    {
        $this->expectsRequest('get', '/v1/events/evt_xxxxxxxxxxxxx');
        $result = $this->client->events->retrieve('evt_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Event::class, $result);
    }

    public function testListEvent()
    {
        $this->expectsRequest('get', '/v1/events');
        $result = $this->client->events->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Event::class, $result->data[0]);
    }

    public function testRetrieveFile()
    {
        $this->expectsRequest('get', '/v1/files/file_xxxxxxxxxxxxx');
        $result = $this->client->files->retrieve('file_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\File::class, $result);
    }

    public function testListFile()
    {
        $this->expectsRequest('get', '/v1/files');
        $result = $this->client->files->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\File::class, $result->data[0]);
    }

    public function testCreateFileLink()
    {
        $this->expectsRequest('post', '/v1/file_links');
        $result = $this->client->fileLinks->create(
            ['file' => 'file_xxxxxxxxxxxxx']
        );
        static::assertInstanceOf(\Stripe\FileLink::class, $result);
    }

    public function testRetrieveFileLink()
    {
        $this->expectsRequest('get', '/v1/file_links/link_xxxxxxxxxxxxx');
        $result = $this->client->fileLinks->retrieve('link_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\FileLink::class, $result);
    }

    public function testUpdateFileLink()
    {
        $this->expectsRequest('post', '/v1/file_links/link_xxxxxxxxxxxxx');
        $result = $this->client->fileLinks->update(
            'link_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\FileLink::class, $result);
    }

    public function testListFileLink()
    {
        $this->expectsRequest('get', '/v1/file_links');
        $result = $this->client->fileLinks->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\FileLink::class, $result->data[0]);
    }

    public function testRetrieveMandate()
    {
        $this->expectsRequest('get', '/v1/mandates/mandate_xxxxxxxxxxxxx');
        $result = $this->client->mandates->retrieve('mandate_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Mandate::class, $result);
    }

    public function testCreatePaymentIntent()
    {
        $this->expectsRequest('post', '/v1/payment_intents');
        $result = $this->client->paymentIntents->create(
            [
                'amount' => 2000,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]
        );
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testRetrievePaymentIntent()
    {
        $this->expectsRequest('get', '/v1/payment_intents/pi_xxxxxxxxxxxxx');
        $result = $this->client->paymentIntents->retrieve('pi_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testUpdatePaymentIntent()
    {
        $this->expectsRequest('post', '/v1/payment_intents/pi_xxxxxxxxxxxxx');
        $result = $this->client->paymentIntents->update(
            'pi_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testConfirmPaymentIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/pi_xxxxxxxxxxxxx/confirm'
        );
        $result = $this->client->paymentIntents->confirm(
            'pi_xxxxxxxxxxxxx',
            ['payment_method' => 'pm_card_visa']
        );
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testCapturePaymentIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/pi_xxxxxxxxxxxxx/capture'
        );
        $result = $this->client->paymentIntents->capture('pi_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testCancelPaymentIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/pi_xxxxxxxxxxxxx/cancel'
        );
        $result = $this->client->paymentIntents->cancel('pi_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testListPaymentIntent()
    {
        $this->expectsRequest('get', '/v1/payment_intents');
        $result = $this->client->paymentIntents->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result->data[0]);
    }

    public function testCreateSetupIntent()
    {
        $this->expectsRequest('post', '/v1/setup_intents');
        $result = $this->client->setupIntents->create(
            ['payment_method_types' => ['card']]
        );
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result);
    }

    public function testRetrieveSetupIntent()
    {
        $this->expectsRequest('get', '/v1/setup_intents/seti_xxxxxxxxxxxxx');
        $result = $this->client->setupIntents->retrieve('seti_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result);
    }

    public function testUpdateSetupIntent()
    {
        $this->expectsRequest('post', '/v1/setup_intents/seti_xxxxxxxxxxxxx');
        $result = $this->client->setupIntents->update(
            'seti_xxxxxxxxxxxxx',
            ['metadata' => ['user_id' => '3435453']]
        );
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result);
    }

    public function testConfirmSetupIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/seti_xxxxxxxxxxxxx/confirm'
        );
        $result = $this->client->setupIntents->confirm(
            'seti_xxxxxxxxxxxxx',
            ['payment_method' => 'pm_card_visa']
        );
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result);
    }

    public function testCancelSetupIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/seti_xxxxxxxxxxxxx/cancel'
        );
        $result = $this->client->setupIntents->cancel('seti_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result);
    }

    public function testListSetupIntent()
    {
        $this->expectsRequest('get', '/v1/setup_intents');
        $result = $this->client->setupIntents->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result->data[0]);
    }

    public function testListSetupAttempt()
    {
        $this->expectsRequest('get', '/v1/setup_attempts');
        $result = $this->client->setupAttempts->all(
            ['setup_intent' => 'seti_xxxxxxxxxxxxx', 'limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\SetupAttempt::class, $result->data[0]);
    }

    public function testCreatePayout()
    {
        $this->expectsRequest('post', '/v1/payouts');
        $result = $this->client->payouts->create(
            ['amount' => 1100, 'currency' => 'usd']
        );
        static::assertInstanceOf(\Stripe\Payout::class, $result);
    }

    public function testRetrievePayout()
    {
        $this->expectsRequest('get', '/v1/payouts/po_xxxxxxxxxxxxx');
        $result = $this->client->payouts->retrieve('po_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Payout::class, $result);
    }

    public function testUpdatePayout()
    {
        $this->expectsRequest('post', '/v1/payouts/po_xxxxxxxxxxxxx');
        $result = $this->client->payouts->update(
            'po_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Payout::class, $result);
    }

    public function testListPayout()
    {
        $this->expectsRequest('get', '/v1/payouts');
        $result = $this->client->payouts->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Payout::class, $result->data[0]);
    }

    public function testCancelPayout()
    {
        $this->expectsRequest('post', '/v1/payouts/po_xxxxxxxxxxxxx/cancel');
        $result = $this->client->payouts->cancel('po_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Payout::class, $result);
    }

    public function testReversePayout()
    {
        $this->expectsRequest('post', '/v1/payouts/po_xxxxxxxxxxxxx/reverse');
        $result = $this->client->payouts->reverse('po_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Payout::class, $result);
    }

    public function testCreateProduct()
    {
        $this->expectsRequest('post', '/v1/products');
        $result = $this->client->products->create(['name' => 'Gold Special']);
        static::assertInstanceOf(\Stripe\Product::class, $result);
    }

    public function testRetrieveProduct()
    {
        $this->expectsRequest('get', '/v1/products/prod_xxxxxxxxxxxxx');
        $result = $this->client->products->retrieve('prod_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Product::class, $result);
    }

    public function testUpdateProduct()
    {
        $this->expectsRequest('post', '/v1/products/prod_xxxxxxxxxxxxx');
        $result = $this->client->products->update(
            'prod_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Product::class, $result);
    }

    public function testListProduct()
    {
        $this->expectsRequest('get', '/v1/products');
        $result = $this->client->products->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Product::class, $result->data[0]);
    }

    public function testDeleteProduct()
    {
        $this->expectsRequest('delete', '/v1/products/prod_xxxxxxxxxxxxx');
        $result = $this->client->products->delete('prod_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Product::class, $result);
    }

    public function testCreatePrice()
    {
        $this->expectsRequest('post', '/v1/prices');
        $result = $this->client->prices->create(
            [
                'unit_amount' => 2000,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month'],
                'product' => 'prod_xxxxxxxxxxxxx',
            ]
        );
        static::assertInstanceOf(\Stripe\Price::class, $result);
    }

    public function testRetrievePrice()
    {
        $this->expectsRequest('get', '/v1/prices/price_xxxxxxxxxxxxx');
        $result = $this->client->prices->retrieve('price_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Price::class, $result);
    }

    public function testUpdatePrice()
    {
        $this->expectsRequest('post', '/v1/prices/price_xxxxxxxxxxxxx');
        $result = $this->client->prices->update(
            'price_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Price::class, $result);
    }

    public function testListPrice()
    {
        $this->expectsRequest('get', '/v1/prices');
        $result = $this->client->prices->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Price::class, $result->data[0]);
    }

    public function testCreateRefund()
    {
        $this->expectsRequest('post', '/v1/refunds');
        $result = $this->client->refunds->create(['charge' => 'ch_xxxxxxxxxxxxx']);
        static::assertInstanceOf(\Stripe\Refund::class, $result);
    }

    public function testRetrieveRefund()
    {
        $this->expectsRequest('get', '/v1/refunds/re_xxxxxxxxxxxxx');
        $result = $this->client->refunds->retrieve('re_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Refund::class, $result);
    }

    public function testUpdateRefund()
    {
        $this->expectsRequest('post', '/v1/refunds/re_xxxxxxxxxxxxx');
        $result = $this->client->refunds->update(
            're_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Refund::class, $result);
    }

    public function testListRefund()
    {
        $this->expectsRequest('get', '/v1/refunds');
        $result = $this->client->refunds->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Refund::class, $result->data[0]);
    }

    public function testCreateToken()
    {
        $this->expectsRequest('post', '/v1/tokens');
        $result = $this->client->tokens->create(
            [
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => '5',
                    'exp_year' => '2022',
                    'cvc' => '314',
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testCreateToken2()
    {
        $this->expectsRequest('post', '/v1/tokens');
        $result = $this->client->tokens->create(
            [
                'bank_account' => [
                    'country' => 'US',
                    'currency' => 'usd',
                    'account_holder_name' => 'Jenny Rosen',
                    'account_holder_type' => 'individual',
                    'routing_number' => '110000000',
                    'account_number' => '000123456789',
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testCreateToken3()
    {
        $this->expectsRequest('post', '/v1/tokens');
        $result = $this->client->tokens->create(
            ['pii' => ['id_number' => '000000000']]
        );
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testCreateToken4()
    {
        $this->expectsRequest('post', '/v1/tokens');
        $result = $this->client->tokens->create(
            [
                'account' => [
                    'individual' => ['first_name' => 'Jane', 'last_name' => 'Doe'],
                    'tos_shown_and_accepted' => true,
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testCreateToken5()
    {
        $this->expectsRequest('post', '/v1/tokens');
        $result = $this->client->tokens->create(
            [
                'person' => [
                    'first_name' => 'Jane',
                    'last_name' => 'Doe',
                    'relationship' => ['owner' => true],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testCreateToken6()
    {
        $this->expectsRequest('post', '/v1/tokens');
        $result = $this->client->tokens->create(['cvc_update' => ['cvc' => '123']]);
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testRetrieveToken()
    {
        $this->expectsRequest('get', '/v1/tokens/tok_xxxx');
        $result = $this->client->tokens->retrieve('tok_xxxx', []);
        static::assertInstanceOf(\Stripe\Token::class, $result);
    }

    public function testCreatePaymentMethod()
    {
        $this->expectsRequest('post', '/v1/payment_methods');
        $result = $this->client->paymentMethods->create(
            [
                'type' => 'card',
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => 5,
                    'exp_year' => 2022,
                    'cvc' => '314',
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\PaymentMethod::class, $result);
    }

    public function testRetrievePaymentMethod()
    {
        $this->expectsRequest('get', '/v1/payment_methods/pm_xxxxxxxxxxxxx');
        $result = $this->client->paymentMethods->retrieve('pm_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\PaymentMethod::class, $result);
    }

    public function testUpdatePaymentMethod()
    {
        $this->expectsRequest('post', '/v1/payment_methods/pm_xxxxxxxxxxxxx');
        $result = $this->client->paymentMethods->update(
            'pm_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\PaymentMethod::class, $result);
    }

    public function testListPaymentMethod()
    {
        $this->expectsRequest('get', '/v1/payment_methods');
        $result = $this->client->paymentMethods->all(
            ['customer' => 'cus_xxxxxxxxxxxxx', 'type' => 'card']
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\PaymentMethod::class, $result->data[0]);
    }

    public function testAttachPaymentMethod()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_methods/pm_xxxxxxxxxxxxx/attach'
        );
        $result = $this->client->paymentMethods->attach(
            'pm_xxxxxxxxxxxxx',
            ['customer' => 'cus_xxxxxxxxxxxxx']
        );
        static::assertInstanceOf(\Stripe\PaymentMethod::class, $result);
    }

    public function testDetachPaymentMethod()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_methods/pm_xxxxxxxxxxxxx/detach'
        );
        $result = $this->client->paymentMethods->detach('pm_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\PaymentMethod::class, $result);
    }

    public function testRetrieveSource()
    {
        $this->expectsRequest('get', '/v1/sources/src_xxxxxxxxxxxxx');
        $result = $this->client->sources->retrieve('src_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Source::class, $result);
    }

    public function testUpdateSource()
    {
        $this->expectsRequest('post', '/v1/sources/src_xxxxxxxxxxxxx');
        $result = $this->client->sources->update(
            'src_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Source::class, $result);
    }

    public function testCreateSession()
    {
        $this->expectsRequest('post', '/v1/checkout/sessions');
        $result = $this->client->checkout->sessions->create(
            [
                'success_url' => 'https://example.com/success',
                'cancel_url' => 'https://example.com/cancel',
                'payment_method_types' => ['card'],
                'line_items' => [['price' => 'price_xxxxxxxxxxxxx', 'quantity' => 2]],
                'mode' => 'payment',
            ]
        );
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $result);
    }

    public function testRetrieveSession()
    {
        $this->expectsRequest('get', '/v1/checkout/sessions/cs_test_xxxxxxxxxxxxx');
        $result = $this->client->checkout->sessions->retrieve(
            'cs_test_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $result);
    }

    public function testListSession()
    {
        $this->expectsRequest('get', '/v1/checkout/sessions');
        $result = $this->client->checkout->sessions->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $result->data[0]);
    }

    public function testCreateCoupon()
    {
        $this->expectsRequest('post', '/v1/coupons');
        $result = $this->client->coupons->create(
            [
                'percent_off' => 25,
                'duration' => 'repeating',
                'duration_in_months' => 3,
            ]
        );
        static::assertInstanceOf(\Stripe\Coupon::class, $result);
    }

    public function testRetrieveCoupon()
    {
        $this->expectsRequest('get', '/v1/coupons/25_5OFF');
        $result = $this->client->coupons->retrieve('25_5OFF', []);
        static::assertInstanceOf(\Stripe\Coupon::class, $result);
    }

    public function testUpdateCoupon()
    {
        $this->expectsRequest('post', '/v1/coupons/co_xxxxxxxxxxxxx');
        $result = $this->client->coupons->update(
            'co_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Coupon::class, $result);
    }

    public function testDeleteCoupon()
    {
        $this->expectsRequest('delete', '/v1/coupons/co_xxxxxxxxxxxxx');
        $result = $this->client->coupons->delete('co_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Coupon::class, $result);
    }

    public function testListCoupon()
    {
        $this->expectsRequest('get', '/v1/coupons');
        $result = $this->client->coupons->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Coupon::class, $result->data[0]);
    }

    public function testPreviewCreditNote()
    {
        $this->expectsRequest('get', '/v1/credit_notes/preview');
        $result = $this->client->creditNotes->preview(
            [
                'invoice' => 'in_xxxxxxxxxxxxx',
                'lines' => [
                    [
                        'type' => 'invoice_line_item',
                        'invoice_line_item' => 'il_xxxxxxxxxxxxx',
                        'quantity' => 1,
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\CreditNote::class, $result);
    }

    public function testCreateCreditNote()
    {
        $this->expectsRequest('post', '/v1/credit_notes');
        $result = $this->client->creditNotes->create(
            [
                'invoice' => 'in_xxxxxxxxxxxxx',
                'lines' => [
                    [
                        'type' => 'invoice_line_item',
                        'invoice_line_item' => 'il_xxxxxxxxxxxxx',
                        'quantity' => 1,
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\CreditNote::class, $result);
    }

    public function testRetrieveCreditNote()
    {
        $this->expectsRequest('get', '/v1/credit_notes/cn_xxxxxxxxxxxxx');
        $result = $this->client->creditNotes->retrieve('cn_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\CreditNote::class, $result);
    }

    public function testUpdateCreditNote()
    {
        $this->expectsRequest('post', '/v1/credit_notes/cn_xxxxxxxxxxxxx');
        $result = $this->client->creditNotes->update(
            'cn_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\CreditNote::class, $result);
    }

    public function testListCreditNoteLineItem()
    {
        $this->expectsRequest('get', '/v1/credit_notes/cn_xxxxxxxxxxxxx/lines');
        $result = $this->client->creditNotes->allLines(
            'cn_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\CreditNoteLineItem::class, $result->data[0]);
    }

    public function testPreviewCreditNote2()
    {
        $this->expectsRequest('get', '/v1/credit_notes/preview');
        $result = $this->client->creditNotes->preview(
            [
                'invoice' => 'in_xxxxxxxxxxxxx',
                'lines' => [
                    [
                        'type' => 'invoice_line_item',
                        'invoice_line_item' => 'il_xxxxxxxxxxxxx',
                        'quantity' => 1,
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\CreditNote::class, $result);
    }

    public function testVoidCreditNoteCreditNote()
    {
        $this->expectsRequest('post', '/v1/credit_notes/cn_xxxxxxxxxxxxx/void');
        $result = $this->client->creditNotes->voidCreditNote(
            'cn_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\CreditNote::class, $result);
    }

    public function testListCreditNote()
    {
        $this->expectsRequest('get', '/v1/credit_notes');
        $result = $this->client->creditNotes->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\CreditNote::class, $result->data[0]);
    }

    public function testCreateCustomerBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/cus_xxxxxxxxxxxxx/balance_transactions'
        );
        $result = $this->client->customers->createBalanceTransaction(
            'cus_xxxxxxxxxxxxx',
            ['amount' => -500, 'currency' => 'usd']
        );
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $result);
    }

    public function testRetrieveCustomerBalanceTransaction()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/cus_xxxxxxxxxxxxx/balance_transactions/cbtxn_xxxxxxxxxxxxx'
        );
        $result = $this->client->customers->retrieveBalanceTransaction(
            'cus_xxxxxxxxxxxxx',
            'cbtxn_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $result);
    }

    public function testUpdateCustomerBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/cus_xxxxxxxxxxxxx/balance_transactions/cbtxn_xxxxxxxxxxxxx'
        );
        $result = $this->client->customers->updateBalanceTransaction(
            'cus_xxxxxxxxxxxxx',
            'cbtxn_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $result);
    }

    public function testListCustomerBalanceTransaction()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/cus_xxxxxxxxxxxxx/balance_transactions'
        );
        $result = $this->client->customers->allBalanceTransactions(
            'cus_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $result->data[0]);
    }

    public function testCreateSession2()
    {
        $this->expectsRequest('post', '/v1/billing_portal/sessions');
        $result = $this->client->billingPortal->sessions->create(
            [
                'customer' => 'cus_xxxxxxxxxxxxx',
                'return_url' => 'https://example.com/account',
            ]
        );
        static::assertInstanceOf(\Stripe\BillingPortal\Session::class, $result);
    }

    public function testUpdateConfiguration()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/configurations/bpc_xxxxxxxxxxxxx'
        );
        $result = $this->client->billingPortal->configurations->update(
            'bpc_xxxxxxxxxxxxx',
            [
                'business_profile' => [
                    'privacy_policy_url' => 'https://example.com/privacy',
                    'terms_of_service_url' => 'https://example.com/terms',
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\BillingPortal\Configuration::class, $result);
    }

    public function testRetrieveConfiguration()
    {
        $this->expectsRequest(
            'get',
            '/v1/billing_portal/configurations/bpc_xxxxxxxxxxxxx'
        );
        $result = $this->client->billingPortal->configurations->retrieve(
            'bpc_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\BillingPortal\Configuration::class, $result);
    }

    public function testListConfiguration()
    {
        $this->expectsRequest('get', '/v1/billing_portal/configurations');
        $result = $this->client->billingPortal->configurations->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\BillingPortal\Configuration::class, $result->data[0]);
    }

    public function testCreateTaxId()
    {
        $this->expectsRequest('post', '/v1/customers/cus_xxxxxxxxxxxxx/tax_ids');
        $result = $this->client->customers->createTaxId(
            'cus_xxxxxxxxxxxxx',
            ['type' => 'eu_vat', 'value' => 'DE123456789']
        );
        static::assertInstanceOf(\Stripe\TaxId::class, $result);
    }

    public function testRetrieveTaxId()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/cus_xxxxxxxxxxxxx/tax_ids/txi_xxxxxxxxxxxxx'
        );
        $result = $this->client->customers->retrieveTaxId(
            'cus_xxxxxxxxxxxxx',
            'txi_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\TaxId::class, $result);
    }

    public function testDeleteTaxId()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/cus_xxxxxxxxxxxxx/tax_ids/txi_xxxxxxxxxxxxx'
        );
        $result = $this->client->customers->deleteTaxId(
            'cus_xxxxxxxxxxxxx',
            'txi_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\TaxId::class, $result);
    }

    public function testListTaxId()
    {
        $this->expectsRequest('get', '/v1/customers/cus_xxxxxxxxxxxxx/tax_ids');
        $result = $this->client->customers->allTaxIds(
            'cus_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\TaxId::class, $result->data[0]);
    }

    public function testCreateInvoice()
    {
        $this->expectsRequest('post', '/v1/invoices');
        $result = $this->client->invoices->create(
            ['customer' => 'cus_xxxxxxxxxxxxx']
        );
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testRetrieveInvoice()
    {
        $this->expectsRequest('get', '/v1/invoices/in_xxxxxxxxxxxxx');
        $result = $this->client->invoices->retrieve('in_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testUpdateInvoice()
    {
        $this->expectsRequest('post', '/v1/invoices/in_xxxxxxxxxxxxx');
        $result = $this->client->invoices->update(
            'in_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testDeleteInvoice()
    {
        $this->expectsRequest('delete', '/v1/invoices/in_xxxxxxxxxxxxx');
        $result = $this->client->invoices->delete('in_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testFinalizeInvoiceInvoice()
    {
        $this->expectsRequest('post', '/v1/invoices/in_xxxxxxxxxxxxx/finalize');
        $result = $this->client->invoices->finalizeInvoice('in_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testPayInvoice()
    {
        $this->expectsRequest('post', '/v1/invoices/in_xxxxxxxxxxxxx/pay');
        $result = $this->client->invoices->pay('in_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testSendInvoiceInvoice()
    {
        $this->expectsRequest('post', '/v1/invoices/in_xxxxxxxxxxxxx/send');
        $result = $this->client->invoices->sendInvoice('in_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testVoidInvoiceInvoice()
    {
        $this->expectsRequest('post', '/v1/invoices/in_xxxxxxxxxxxxx/void');
        $result = $this->client->invoices->voidInvoice('in_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testMarkUncollectibleInvoice()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/in_xxxxxxxxxxxxx/mark_uncollectible'
        );
        $result = $this->client->invoices->markUncollectible(
            'in_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Invoice::class, $result);
    }

    public function testListInvoice()
    {
        $this->expectsRequest('get', '/v1/invoices');
        $result = $this->client->invoices->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Invoice::class, $result->data[0]);
    }

    public function testCreateInvoiceItem()
    {
        $this->expectsRequest('post', '/v1/invoiceitems');
        $result = $this->client->invoiceItems->create(
            ['customer' => 'cus_xxxxxxxxxxxxx', 'price' => 'price_xxxxxxxxxxxxx']
        );
        static::assertInstanceOf(\Stripe\InvoiceItem::class, $result);
    }

    public function testRetrieveInvoiceItem()
    {
        $this->expectsRequest('get', '/v1/invoiceitems/ii_xxxxxxxxxxxxx');
        $result = $this->client->invoiceItems->retrieve('ii_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\InvoiceItem::class, $result);
    }

    public function testUpdateInvoiceItem()
    {
        $this->expectsRequest('post', '/v1/invoiceitems/ii_xxxxxxxxxxxxx');
        $result = $this->client->invoiceItems->update(
            'ii_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\InvoiceItem::class, $result);
    }

    public function testDeleteInvoiceItem()
    {
        $this->expectsRequest('delete', '/v1/invoiceitems/ii_xxxxxxxxxxxxx');
        $result = $this->client->invoiceItems->delete('ii_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\InvoiceItem::class, $result);
    }

    public function testListInvoiceItem()
    {
        $this->expectsRequest('get', '/v1/invoiceitems');
        $result = $this->client->invoiceItems->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\InvoiceItem::class, $result->data[0]);
    }

    public function testCreatePlan()
    {
        $this->expectsRequest('post', '/v1/plans');
        $result = $this->client->plans->create(
            [
                'amount' => 2000,
                'currency' => 'usd',
                'interval' => 'month',
                'product' => 'prod_xxxxxxxxxxxxx',
            ]
        );
        static::assertInstanceOf(\Stripe\Plan::class, $result);
    }

    public function testRetrievePlan()
    {
        $this->expectsRequest('get', '/v1/plans/price_xxxxxxxxxxxxx');
        $result = $this->client->plans->retrieve('price_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Plan::class, $result);
    }

    public function testUpdatePlan()
    {
        $this->expectsRequest('post', '/v1/plans/price_xxxxxxxxxxxxx');
        $result = $this->client->plans->update(
            'price_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Plan::class, $result);
    }

    public function testDeletePlan()
    {
        $this->expectsRequest('delete', '/v1/plans/price_xxxxxxxxxxxxx');
        $result = $this->client->plans->delete('price_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Plan::class, $result);
    }

    public function testListPlan()
    {
        $this->expectsRequest('get', '/v1/plans');
        $result = $this->client->plans->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Plan::class, $result->data[0]);
    }

    public function testCreatePromotionCode()
    {
        $this->expectsRequest('post', '/v1/promotion_codes');
        $result = $this->client->promotionCodes->create(['coupon' => '25_5OFF']);
        static::assertInstanceOf(\Stripe\PromotionCode::class, $result);
    }

    public function testUpdatePromotionCode()
    {
        $this->expectsRequest('post', '/v1/promotion_codes/promo_xxxxxxxxxxxxx');
        $result = $this->client->promotionCodes->update(
            'promo_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\PromotionCode::class, $result);
    }

    public function testRetrievePromotionCode()
    {
        $this->expectsRequest('get', '/v1/promotion_codes/promo_xxxxxxxxxxxxx');
        $result = $this->client->promotionCodes->retrieve(
            'promo_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\PromotionCode::class, $result);
    }

    public function testListPromotionCode()
    {
        $this->expectsRequest('get', '/v1/promotion_codes');
        $result = $this->client->promotionCodes->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\PromotionCode::class, $result->data[0]);
    }

    public function testCreateSubscription()
    {
        $this->expectsRequest('post', '/v1/subscriptions');
        $result = $this->client->subscriptions->create(
            [
                'customer' => 'cus_xxxxxxxxxxxxx',
                'items' => [['price' => 'price_xxxxxxxxxxxxx']],
            ]
        );
        static::assertInstanceOf(\Stripe\Subscription::class, $result);
    }

    public function testRetrieveSubscription()
    {
        $this->expectsRequest('get', '/v1/subscriptions/sub_xxxxxxxxxxxxx');
        $result = $this->client->subscriptions->retrieve('sub_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Subscription::class, $result);
    }

    public function testUpdateSubscription()
    {
        $this->expectsRequest('post', '/v1/subscriptions/sub_xxxxxxxxxxxxx');
        $result = $this->client->subscriptions->update(
            'sub_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Subscription::class, $result);
    }

    public function testCancelSubscription()
    {
        $this->expectsRequest('delete', '/v1/subscriptions/sub_xxxxxxxxxxxxx');
        $result = $this->client->subscriptions->cancel('sub_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Subscription::class, $result);
    }

    public function testListSubscription()
    {
        $this->expectsRequest('get', '/v1/subscriptions');
        $result = $this->client->subscriptions->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Subscription::class, $result->data[0]);
    }

    public function testCreateSubscriptionItem()
    {
        $this->expectsRequest('post', '/v1/subscription_items');
        $result = $this->client->subscriptionItems->create(
            [
                'subscription' => 'sub_xxxxxxxxxxxxx',
                'price' => 'price_xxxxxxxxxxxxx',
                'quantity' => 2,
            ]
        );
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $result);
    }

    public function testRetrieveSubscriptionItem()
    {
        $this->expectsRequest('get', '/v1/subscription_items/si_xxxxxxxxxxxxx');
        $result = $this->client->subscriptionItems->retrieve(
            'si_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $result);
    }

    public function testUpdateSubscriptionItem()
    {
        $this->expectsRequest('post', '/v1/subscription_items/si_xxxxxxxxxxxxx');
        $result = $this->client->subscriptionItems->update(
            'si_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $result);
    }

    public function testDeleteSubscriptionItem()
    {
        $this->expectsRequest('delete', '/v1/subscription_items/si_xxxxxxxxxxxxx');
        $result = $this->client->subscriptionItems->delete('si_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $result);
    }

    public function testListSubscriptionItem()
    {
        $this->expectsRequest('get', '/v1/subscription_items');
        $result = $this->client->subscriptionItems->all(
            ['subscription' => 'sub_xxxxxxxxxxxxx']
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $result->data[0]);
    }

    public function testCreateSubscriptionSchedule()
    {
        $this->expectsRequest('post', '/v1/subscription_schedules');
        $result = $this->client->subscriptionSchedules->create(
            [
                'customer' => 'cus_xxxxxxxxxxxxx',
                'start_date' => 1620753115,
                'end_behavior' => 'release',
                'phases' => [
                    [
                        'items' => [['price' => 'price_xxxxxxxxxxxxx', 'quantity' => 1]],
                        'iterations' => 12,
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\SubscriptionSchedule::class, $result);
    }

    public function testRetrieveSubscriptionSchedule()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules/sub_sched_xxxxxxxxxxxxx'
        );
        $result = $this->client->subscriptionSchedules->retrieve(
            'sub_sched_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\SubscriptionSchedule::class, $result);
    }

    public function testUpdateSubscriptionSchedule()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/sub_sched_xxxxxxxxxxxxx'
        );
        $result = $this->client->subscriptionSchedules->update(
            'sub_sched_xxxxxxxxxxxxx',
            ['end_behavior' => 'release']
        );
        static::assertInstanceOf(\Stripe\SubscriptionSchedule::class, $result);
    }

    public function testCancelSubscriptionSchedule()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/sub_sched_xxxxxxxxxxxxx/cancel'
        );
        $result = $this->client->subscriptionSchedules->cancel(
            'sub_sched_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\SubscriptionSchedule::class, $result);
    }

    public function testReleaseSubscriptionSchedule()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/sub_sched_xxxxxxxxxxxxx/release'
        );
        $result = $this->client->subscriptionSchedules->release(
            'sub_sched_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\SubscriptionSchedule::class, $result);
    }

    public function testListSubscriptionSchedule()
    {
        $this->expectsRequest('get', '/v1/subscription_schedules');
        $result = $this->client->subscriptionSchedules->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\SubscriptionSchedule::class, $result->data[0]);
    }

    public function testCreateTaxRate()
    {
        $this->expectsRequest('post', '/v1/tax_rates');
        $result = $this->client->taxRates->create(
            [
                'display_name' => 'VAT',
                'description' => 'VAT Germany',
                'jurisdiction' => 'DE',
                'percentage' => 16,
                'inclusive' => false,
            ]
        );
        static::assertInstanceOf(\Stripe\TaxRate::class, $result);
    }

    public function testRetrieveTaxRate()
    {
        $this->expectsRequest('get', '/v1/tax_rates/txr_xxxxxxxxxxxxx');
        $result = $this->client->taxRates->retrieve('txr_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\TaxRate::class, $result);
    }

    public function testUpdateTaxRate()
    {
        $this->expectsRequest('post', '/v1/tax_rates/txr_xxxxxxxxxxxxx');
        $result = $this->client->taxRates->update(
            'txr_xxxxxxxxxxxxx',
            ['active' => false]
        );
        static::assertInstanceOf(\Stripe\TaxRate::class, $result);
    }

    public function testListTaxRate()
    {
        $this->expectsRequest('get', '/v1/tax_rates');
        $result = $this->client->taxRates->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\TaxRate::class, $result->data[0]);
    }

    public function testCreateUsageRecord()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_items/si_xxxxxxxxxxxxx/usage_records'
        );
        $result = $this->client->subscriptionItems->createUsageRecord(
            'si_xxxxxxxxxxxxx',
            ['quantity' => 100, 'timestamp' => 1571252444]
        );
        static::assertInstanceOf(\Stripe\UsageRecord::class, $result);
    }

    public function testListUsageRecordSummary()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_items/si_xxxxxxxxxxxxx/usage_record_summaries'
        );
        $result = $this->client->subscriptionItems->allUsageRecordSummaries(
            'si_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\UsageRecordSummary::class, $result->data[0]);
    }

    public function testCreateAccount()
    {
        $this->expectsRequest('post', '/v1/accounts');
        $result = $this->client->accounts->create(
            [
                'type' => 'custom',
                'country' => 'US',
                'email' => 'jenny.rosen@example.com',
                'capabilities' => [
                    'card_payments' => ['requested' => true],
                    'transfers' => ['requested' => true],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Account::class, $result);
    }

    public function testRetrieveAccount()
    {
        $this->expectsRequest('get', '/v1/accounts/acct_xxxxxxxxxxxxx');
        $result = $this->client->accounts->retrieve('acct_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Account::class, $result);
    }

    public function testUpdateAccount()
    {
        $this->expectsRequest('post', '/v1/accounts/acct_xxxxxxxxxxxxx');
        $result = $this->client->accounts->update(
            'acct_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Account::class, $result);
    }

    public function testDeleteAccount()
    {
        $this->expectsRequest('delete', '/v1/accounts/acct_xxxxxxxxxxxxx');
        $result = $this->client->accounts->delete('acct_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Account::class, $result);
    }

    public function testRejectAccount()
    {
        $this->expectsRequest('post', '/v1/accounts/acct_xxxxxxxxxxxxx/reject');
        $result = $this->client->accounts->reject(
            'acct_xxxxxxxxxxxxx',
            ['reason' => 'fraud']
        );
        static::assertInstanceOf(\Stripe\Account::class, $result);
    }

    public function testListAccount()
    {
        $this->expectsRequest('get', '/v1/accounts');
        $result = $this->client->accounts->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Account::class, $result->data[0]);
    }

    public function testCreateLoginLink()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/acct_xxxxxxxxxxxxx/login_links'
        );
        $result = $this->client->accounts->createLoginLink(
            'acct_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\LoginLink::class, $result);
    }

    public function testCreateAccountLink()
    {
        $this->expectsRequest('post', '/v1/account_links');
        $result = $this->client->accountLinks->create(
            [
                'account' => 'acct_xxxxxxxxxxxxx',
                'refresh_url' => 'https://example.com/reauth',
                'return_url' => 'https://example.com/return',
                'type' => 'account_onboarding',
            ]
        );
        static::assertInstanceOf(\Stripe\AccountLink::class, $result);
    }

    public function testRetrieveApplicationFee()
    {
        $this->expectsRequest('get', '/v1/application_fees/fee_xxxxxxxxxxxxx');
        $result = $this->client->applicationFees->retrieve('fee_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\ApplicationFee::class, $result);
    }

    public function testListApplicationFee()
    {
        $this->expectsRequest('get', '/v1/application_fees');
        $result = $this->client->applicationFees->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\ApplicationFee::class, $result->data[0]);
    }

    public function testCreateApplicationFeeRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/fee_xxxxxxxxxxxxx/refunds'
        );
        $result = $this->client->applicationFees->createRefund(
            'fee_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $result);
    }

    public function testRetrieveApplicationFeeRefund()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/fee_xxxxxxxxxxxxx/refunds/fr_xxxxxxxxxxxxx'
        );
        $result = $this->client->applicationFees->retrieveRefund(
            'fee_xxxxxxxxxxxxx',
            'fr_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $result);
    }

    public function testUpdateApplicationFeeRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/fee_xxxxxxxxxxxxx/refunds/fr_xxxxxxxxxxxxx'
        );
        $result = $this->client->applicationFees->updateRefund(
            'fee_xxxxxxxxxxxxx',
            'fr_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $result);
    }

    public function testListApplicationFeeRefund()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/fee_xxxxxxxxxxxxx/refunds'
        );
        $result = $this->client->applicationFees->allRefunds(
            'fee_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $result->data[0]);
    }

    public function testRetrieveCapability()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/acct_xxxxxxxxxxxxx/capabilities/card_payments'
        );
        $result = $this->client->accounts->retrieveCapability(
            'acct_xxxxxxxxxxxxx',
            'card_payments',
            []
        );
        static::assertInstanceOf(\Stripe\Capability::class, $result);
    }

    public function testUpdateCapability()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/acct_xxxxxxxxxxxxx/capabilities/card_payments'
        );
        $result = $this->client->accounts->updateCapability(
            'acct_xxxxxxxxxxxxx',
            'card_payments',
            ['requested' => true]
        );
        static::assertInstanceOf(\Stripe\Capability::class, $result);
    }

    public function testListCapability()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/acct_xxxxxxxxxxxxx/capabilities'
        );
        $result = $this->client->accounts->allCapabilities(
            'acct_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Capability::class, $result->data[0]);
    }

    public function testListCountrySpec()
    {
        $this->expectsRequest('get', '/v1/country_specs');
        $result = $this->client->countrySpecs->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\CountrySpec::class, $result->data[0]);
    }

    public function testRetrieveCountrySpec()
    {
        $this->expectsRequest('get', '/v1/country_specs/US');
        $result = $this->client->countrySpecs->retrieve('US', []);
        static::assertInstanceOf(\Stripe\CountrySpec::class, $result);
    }

    public function testCreatePerson()
    {
        $this->expectsRequest('post', '/v1/accounts/acct_xxxxxxxxxxxxx/persons');
        $result = $this->client->accounts->createPerson(
            'acct_xxxxxxxxxxxxx',
            ['first_name' => 'Jane', 'last_name' => 'Diaz']
        );
        static::assertInstanceOf(\Stripe\Person::class, $result);
    }

    public function testRetrievePerson()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/acct_xxxxxxxxxxxxx/persons/person_xxxxxxxxxxxxx'
        );
        $result = $this->client->accounts->retrievePerson(
            'acct_xxxxxxxxxxxxx',
            'person_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Person::class, $result);
    }

    public function testUpdatePerson()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/acct_xxxxxxxxxxxxx/persons/person_xxxxxxxxxxxxx'
        );
        $result = $this->client->accounts->updatePerson(
            'acct_xxxxxxxxxxxxx',
            'person_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Person::class, $result);
    }

    public function testDeletePerson()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/acct_xxxxxxxxxxxxx/persons/person_xxxxxxxxxxxxx'
        );
        $result = $this->client->accounts->deletePerson(
            'acct_xxxxxxxxxxxxx',
            'person_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Person::class, $result);
    }

    public function testListPerson()
    {
        $this->expectsRequest('get', '/v1/accounts/acct_xxxxxxxxxxxxx/persons');
        $result = $this->client->accounts->allPersons(
            'acct_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Person::class, $result->data[0]);
    }

    public function testCreateTopup()
    {
        $this->expectsRequest('post', '/v1/topups');
        $result = $this->client->topups->create(
            [
                'amount' => 2000,
                'currency' => 'usd',
                'description' => 'Top-up for Jenny Rosen',
                'statement_descriptor' => 'Top-up',
            ]
        );
        static::assertInstanceOf(\Stripe\Topup::class, $result);
    }

    public function testRetrieveTopup()
    {
        $this->expectsRequest('get', '/v1/topups/tu_xxxxxxxxxxxxx');
        $result = $this->client->topups->retrieve('tu_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Topup::class, $result);
    }

    public function testUpdateTopup()
    {
        $this->expectsRequest('post', '/v1/topups/tu_xxxxxxxxxxxxx');
        $result = $this->client->topups->update(
            'tu_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Topup::class, $result);
    }

    public function testListTopup()
    {
        $this->expectsRequest('get', '/v1/topups');
        $result = $this->client->topups->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Topup::class, $result->data[0]);
    }

    public function testCancelTopup()
    {
        $this->expectsRequest('post', '/v1/topups/tu_xxxxxxxxxxxxx/cancel');
        $result = $this->client->topups->cancel('tu_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Topup::class, $result);
    }

    public function testCreateTransfer()
    {
        $this->expectsRequest('post', '/v1/transfers');
        $result = $this->client->transfers->create(
            [
                'amount' => 400,
                'currency' => 'usd',
                'destination' => 'acct_xxxxxxxxxxxxx',
                'transfer_group' => 'ORDER_95',
            ]
        );
        static::assertInstanceOf(\Stripe\Transfer::class, $result);
    }

    public function testRetrieveTransfer()
    {
        $this->expectsRequest('get', '/v1/transfers/tr_xxxxxxxxxxxxx');
        $result = $this->client->transfers->retrieve('tr_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Transfer::class, $result);
    }

    public function testUpdateTransfer()
    {
        $this->expectsRequest('post', '/v1/transfers/tr_xxxxxxxxxxxxx');
        $result = $this->client->transfers->update(
            'tr_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Transfer::class, $result);
    }

    public function testListTransfer()
    {
        $this->expectsRequest('get', '/v1/transfers');
        $result = $this->client->transfers->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Transfer::class, $result->data[0]);
    }

    public function testCreateTransferReversal()
    {
        $this->expectsRequest('post', '/v1/transfers/tr_xxxxxxxxxxxxx/reversals');
        $result = $this->client->transfers->createReversal(
            'tr_xxxxxxxxxxxxx',
            ['amount' => 100]
        );
        static::assertInstanceOf(\Stripe\TransferReversal::class, $result);
    }

    public function testRetrieveTransferReversal()
    {
        $this->expectsRequest(
            'get',
            '/v1/transfers/tr_xxxxxxxxxxxxx/reversals/trr_xxxxxxxxxxxxx'
        );
        $result = $this->client->transfers->retrieveReversal(
            'tr_xxxxxxxxxxxxx',
            'trr_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\TransferReversal::class, $result);
    }

    public function testUpdateTransferReversal()
    {
        $this->expectsRequest(
            'post',
            '/v1/transfers/tr_xxxxxxxxxxxxx/reversals/trr_xxxxxxxxxxxxx'
        );
        $result = $this->client->transfers->updateReversal(
            'tr_xxxxxxxxxxxxx',
            'trr_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\TransferReversal::class, $result);
    }

    public function testListTransferReversal()
    {
        $this->expectsRequest('get', '/v1/transfers/tr_xxxxxxxxxxxxx/reversals');
        $result = $this->client->transfers->allReversals(
            'tr_xxxxxxxxxxxxx',
            ['limit' => 3]
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\TransferReversal::class, $result->data[0]);
    }

    public function testRetrieveEarlyFraudWarning()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings/issfr_xxxxxxxxxxxxx'
        );
        $result = $this->client->radar->earlyFraudWarnings->retrieve(
            'issfr_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Radar\EarlyFraudWarning::class, $result);
    }

    public function testListEarlyFraudWarning()
    {
        $this->expectsRequest('get', '/v1/radar/early_fraud_warnings');
        $result = $this->client->radar->earlyFraudWarnings->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Radar\EarlyFraudWarning::class, $result->data[0]);
    }

    public function testApproveReview()
    {
        $this->expectsRequest('post', '/v1/reviews/prv_xxxxxxxxxxxxx/approve');
        $result = $this->client->reviews->approve('prv_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Review::class, $result);
    }

    public function testRetrieveReview()
    {
        $this->expectsRequest('get', '/v1/reviews/prv_xxxxxxxxxxxxx');
        $result = $this->client->reviews->retrieve('prv_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Review::class, $result);
    }

    public function testListReview()
    {
        $this->expectsRequest('get', '/v1/reviews');
        $result = $this->client->reviews->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Review::class, $result->data[0]);
    }

    public function testCreateValueList()
    {
        $this->expectsRequest('post', '/v1/radar/value_lists');
        $result = $this->client->radar->valueLists->create(
            [
                'alias' => 'custom_ip_xxxxxxxxxxxxx',
                'name' => 'Custom IP Blocklist',
                'item_type' => 'ip_address',
            ]
        );
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $result);
    }

    public function testRetrieveValueList()
    {
        $this->expectsRequest('get', '/v1/radar/value_lists/rsl_xxxxxxxxxxxxx');
        $result = $this->client->radar->valueLists->retrieve(
            'rsl_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $result);
    }

    public function testUpdateValueList()
    {
        $this->expectsRequest('post', '/v1/radar/value_lists/rsl_xxxxxxxxxxxxx');
        $result = $this->client->radar->valueLists->update(
            'rsl_xxxxxxxxxxxxx',
            ['name' => 'Updated IP Block List']
        );
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $result);
    }

    public function testDeleteValueList()
    {
        $this->expectsRequest('delete', '/v1/radar/value_lists/rsl_xxxxxxxxxxxxx');
        $result = $this->client->radar->valueLists->delete('rsl_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $result);
    }

    public function testListValueList()
    {
        $this->expectsRequest('get', '/v1/radar/value_lists');
        $result = $this->client->radar->valueLists->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $result->data[0]);
    }

    public function testCreateValueListItem()
    {
        $this->expectsRequest('post', '/v1/radar/value_list_items');
        $result = $this->client->radar->valueListItems->create(
            ['value_list' => 'rsl_xxxxxxxxxxxxx', 'value' => '1.2.3.4']
        );
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $result);
    }

    public function testRetrieveValueListItem()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items/rsli_xxxxxxxxxxxxx'
        );
        $result = $this->client->radar->valueListItems->retrieve(
            'rsli_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $result);
    }

    public function testDeleteValueListItem()
    {
        $this->expectsRequest(
            'delete',
            '/v1/radar/value_list_items/rsli_xxxxxxxxxxxxx'
        );
        $result = $this->client->radar->valueListItems->delete(
            'rsli_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $result);
    }

    public function testListValueListItem()
    {
        $this->expectsRequest('get', '/v1/radar/value_list_items');
        $result = $this->client->radar->valueListItems->all(
            ['limit' => 3, 'value_list' => 'rsl_xxxxxxxxxxxxx']
        );
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $result->data[0]);
    }

    public function testRetrieveAuthorization()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations/iauth_xxxxxxxxxxxxx'
        );
        $result = $this->client->issuing->authorizations->retrieve(
            'iauth_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $result);
    }

    public function testUpdateAuthorization()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/iauth_xxxxxxxxxxxxx'
        );
        $result = $this->client->issuing->authorizations->update(
            'iauth_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $result);
    }

    public function testApproveAuthorization()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/iauth_xxxxxxxxxxxxx/approve'
        );
        $result = $this->client->issuing->authorizations->approve(
            'iauth_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $result);
    }

    public function testDeclineAuthorization()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/iauth_xxxxxxxxxxxxx/decline'
        );
        $result = $this->client->issuing->authorizations->decline(
            'iauth_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $result);
    }

    public function testListAuthorization()
    {
        $this->expectsRequest('get', '/v1/issuing/authorizations');
        $result = $this->client->issuing->authorizations->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $result->data[0]);
    }

    public function testCreateCardholder()
    {
        $this->expectsRequest('post', '/v1/issuing/cardholders');
        $result = $this->client->issuing->cardholders->create(
            [
                'type' => 'individual',
                'name' => 'Jenny Rosen',
                'email' => 'jenny.rosen@example.com',
                'phone_number' => '+18888675309',
                'billing' => [
                    'address' => [
                        'line1' => '1234 Main Street',
                        'city' => 'San Francisco',
                        'state' => 'CA',
                        'country' => 'US',
                        'postal_code' => '94111',
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $result);
    }

    public function testRetrieveCardholder()
    {
        $this->expectsRequest('get', '/v1/issuing/cardholders/ich_xxxxxxxxxxxxx');
        $result = $this->client->issuing->cardholders->retrieve(
            'ich_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $result);
    }

    public function testUpdateCardholder()
    {
        $this->expectsRequest('post', '/v1/issuing/cardholders/ich_xxxxxxxxxxxxx');
        $result = $this->client->issuing->cardholders->update(
            'ich_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $result);
    }

    public function testListCardholder()
    {
        $this->expectsRequest('get', '/v1/issuing/cardholders');
        $result = $this->client->issuing->cardholders->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $result->data[0]);
    }

    public function testCreateCard()
    {
        $this->expectsRequest('post', '/v1/issuing/cards');
        $result = $this->client->issuing->cards->create(
            [
                'cardholder' => 'ich_xxxxxxxxxxxxx',
                'currency' => 'usd',
                'type' => 'virtual',
            ]
        );
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $result);
    }

    public function testRetrieveCard()
    {
        $this->expectsRequest('get', '/v1/issuing/cards/ic_xxxxxxxxxxxxx');
        $result = $this->client->issuing->cards->retrieve('ic_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $result);
    }

    public function testUpdateCard()
    {
        $this->expectsRequest('post', '/v1/issuing/cards/ic_xxxxxxxxxxxxx');
        $result = $this->client->issuing->cards->update(
            'ic_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $result);
    }

    public function testListCard()
    {
        $this->expectsRequest('get', '/v1/issuing/cards');
        $result = $this->client->issuing->cards->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $result->data[0]);
    }

    public function testCreateDispute()
    {
        $this->expectsRequest('post', '/v1/issuing/disputes');
        $result = $this->client->issuing->disputes->create(
            [
                'transaction' => 'ipi_xxxxxxxxxxxxx',
                'evidence' => [
                    'reason' => 'fraudulent',
                    'fraudulent' => ['explanation' => 'Purchase was unrecognized.'],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $result);
    }

    public function testSubmitDispute()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/idp_xxxxxxxxxxxxx/submit'
        );
        $result = $this->client->issuing->disputes->submit('idp_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $result);
    }

    public function testRetrieveDispute2()
    {
        $this->expectsRequest('get', '/v1/issuing/disputes/idp_xxxxxxxxxxxxx');
        $result = $this->client->issuing->disputes->retrieve(
            'idp_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $result);
    }

    public function testUpdateDispute2()
    {
        $this->expectsRequest('post', '/v1/issuing/disputes/idp_xxxxxxxxxxxxx');
        $result = $this->client->issuing->disputes->update(
            'idp_xxxxxxxxxxxxx',
            [
                'evidence' => [
                    'reason' => 'not_received',
                    'not_received' => [
                        'expected_at' => 1590000000,
                        'explanation' => '',
                        'product_description' => 'Baseball cap',
                        'product_type' => 'merchandise',
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $result);
    }

    public function testListDispute2()
    {
        $this->expectsRequest('get', '/v1/issuing/disputes');
        $result = $this->client->issuing->disputes->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $result->data[0]);
    }

    public function testRetrieveTransaction()
    {
        $this->expectsRequest('get', '/v1/issuing/transactions/ipi_xxxxxxxxxxxxx');
        $result = $this->client->issuing->transactions->retrieve(
            'ipi_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Issuing\Transaction::class, $result);
    }

    public function testUpdateTransaction()
    {
        $this->expectsRequest('post', '/v1/issuing/transactions/ipi_xxxxxxxxxxxxx');
        $result = $this->client->issuing->transactions->update(
            'ipi_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Issuing\Transaction::class, $result);
    }

    public function testListTransaction()
    {
        $this->expectsRequest('get', '/v1/issuing/transactions');
        $result = $this->client->issuing->transactions->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Issuing\Transaction::class, $result->data[0]);
    }

    public function testCreateConnectionToken()
    {
        $this->expectsRequest('post', '/v1/terminal/connection_tokens');
        $result = $this->client->terminal->connectionTokens->create([]);
        static::assertInstanceOf(\Stripe\Terminal\ConnectionToken::class, $result);
    }

    public function testCreateLocation()
    {
        $this->expectsRequest('post', '/v1/terminal/locations');
        $result = $this->client->terminal->locations->create(
            [
                'display_name' => 'My First Store',
                'address' => [
                    'line1' => '1234 Main Street',
                    'city' => 'San Francisco',
                    'country' => 'US',
                    'postal_code' => '94111',
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $result);
    }

    public function testRetrieveLocation()
    {
        $this->expectsRequest('get', '/v1/terminal/locations/tml_xxxxxxxxxxxxx');
        $result = $this->client->terminal->locations->retrieve(
            'tml_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $result);
    }

    public function testUpdateLocation()
    {
        $this->expectsRequest('post', '/v1/terminal/locations/tml_xxxxxxxxxxxxx');
        $result = $this->client->terminal->locations->update(
            'tml_xxxxxxxxxxxxx',
            ['display_name' => 'My First Store']
        );
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $result);
    }

    public function testDeleteLocation()
    {
        $this->expectsRequest('delete', '/v1/terminal/locations/tml_xxxxxxxxxxxxx');
        $result = $this->client->terminal->locations->delete(
            'tml_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $result);
    }

    public function testListLocation()
    {
        $this->expectsRequest('get', '/v1/terminal/locations');
        $result = $this->client->terminal->locations->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $result->data[0]);
    }

    public function testCreateReader()
    {
        $this->expectsRequest('post', '/v1/terminal/readers');
        $result = $this->client->terminal->readers->create(
            [
                'registration_code' => 'puppies-plug-could',
                'label' => 'Blue Rabbit',
                'location' => 'tml_1234',
            ]
        );
        static::assertInstanceOf(\Stripe\Terminal\Reader::class, $result);
    }

    public function testRetrieveReader()
    {
        $this->expectsRequest('get', '/v1/terminal/readers/tmr_P400-123-456-789');
        $result = $this->client->terminal->readers->retrieve(
            'tmr_P400-123-456-789',
            []
        );
        static::assertInstanceOf(\Stripe\Terminal\Reader::class, $result);
    }

    public function testUpdateReader()
    {
        $this->expectsRequest('post', '/v1/terminal/readers/tmr_P400-123-456-789');
        $result = $this->client->terminal->readers->update(
            'tmr_P400-123-456-789',
            ['label' => 'Blue Rabbit']
        );
        static::assertInstanceOf(\Stripe\Terminal\Reader::class, $result);
    }

    public function testDeleteReader()
    {
        $this->expectsRequest(
            'delete',
            '/v1/terminal/readers/tmr_P400-123-456-789'
        );
        $result = $this->client->terminal->readers->delete(
            'tmr_P400-123-456-789',
            []
        );
        static::assertInstanceOf(\Stripe\Terminal\Reader::class, $result);
    }

    public function testListReader()
    {
        $this->expectsRequest('get', '/v1/terminal/readers');
        $result = $this->client->terminal->readers->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Terminal\Reader::class, $result->data[0]);
    }

    public function testCreateOrder()
    {
        $this->expectsRequest('post', '/v1/orders');
        $result = $this->client->orders->create(
            [
                'currency' => 'usd',
                'email' => 'jenny.rosen@example.com',
                'items' => [['type' => 'sku', 'parent' => 'sku_xxxxxxxxxxxxx']],
                'shipping' => [
                    'name' => 'Jenny Rosen',
                    'address' => [
                        'line1' => '1234 Main Street',
                        'city' => 'San Francisco',
                        'state' => 'CA',
                        'country' => 'US',
                        'postal_code' => '94111',
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Order::class, $result);
    }

    public function testRetrieveOrder()
    {
        $this->expectsRequest('get', '/v1/orders/or_xxxxxxxxxxxxx');
        $result = $this->client->orders->retrieve('or_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\Order::class, $result);
    }

    public function testUpdateOrder()
    {
        $this->expectsRequest('post', '/v1/orders/or_xxxxxxxxxxxxx');
        $result = $this->client->orders->update(
            'or_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\Order::class, $result);
    }

    public function testPayOrder()
    {
        $this->expectsRequest('post', '/v1/orders/or_xxxxxxxxxxxxx/pay');
        $result = $this->client->orders->pay(
            'or_xxxxxxxxxxxxx',
            ['source' => 'tok_xxxx']
        );
        static::assertInstanceOf(\Stripe\Order::class, $result);
    }

    public function testListOrder()
    {
        $this->expectsRequest('get', '/v1/orders');
        $result = $this->client->orders->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Order::class, $result->data[0]);
    }

    public function testRetrieveOrderReturn()
    {
        $this->expectsRequest('get', '/v1/order_returns/orret_xxxxxxxxxxxxx');
        $result = $this->client->orderReturns->retrieve('orret_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\OrderReturn::class, $result);
    }

    public function testListOrderReturn()
    {
        $this->expectsRequest('get', '/v1/order_returns');
        $result = $this->client->orderReturns->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\OrderReturn::class, $result->data[0]);
    }

    public function testCreateSku()
    {
        $this->expectsRequest('post', '/v1/skus');
        $result = $this->client->skus->create(
            [
                'attributes' => ['size' => 'Medium', 'gender' => 'Unisex'],
                'price' => 1500,
                'currency' => 'usd',
                'inventory' => ['type' => 'finite', 'quantity' => 500],
                'product' => 'prod_xxxxxxxxxxxxx',
            ]
        );
        static::assertInstanceOf(\Stripe\SKU::class, $result);
    }

    public function testRetrieveSku()
    {
        $this->expectsRequest('get', '/v1/skus/sku_xxxxxxxxxxxxx');
        $result = $this->client->skus->retrieve('sku_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\SKU::class, $result);
    }

    public function testUpdateSku()
    {
        $this->expectsRequest('post', '/v1/skus/sku_xxxxxxxxxxxxx');
        $result = $this->client->skus->update(
            'sku_xxxxxxxxxxxxx',
            ['metadata' => ['order_id' => '6735']]
        );
        static::assertInstanceOf(\Stripe\SKU::class, $result);
    }

    public function testListSku()
    {
        $this->expectsRequest('get', '/v1/skus');
        $result = $this->client->skus->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\SKU::class, $result->data[0]);
    }

    public function testDeleteSku()
    {
        $this->expectsRequest('delete', '/v1/skus/sku_xxxxxxxxxxxxx');
        $result = $this->client->skus->delete('sku_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\SKU::class, $result);
    }

    public function testRetrieveScheduledQueryRun()
    {
        $this->expectsRequest(
            'get',
            '/v1/sigma/scheduled_query_runs/sqr_xxxxxxxxxxxxx'
        );
        $result = $this->client->sigma->scheduledQueryRuns->retrieve(
            'sqr_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $result);
    }

    public function testListScheduledQueryRun()
    {
        $this->expectsRequest('get', '/v1/sigma/scheduled_query_runs');
        $result = $this->client->sigma->scheduledQueryRuns->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $result->data[0]);
    }

    public function testCreateReportRun()
    {
        $this->expectsRequest('post', '/v1/reporting/report_runs');
        $result = $this->client->reporting->reportRuns->create(
            [
                'report_type' => 'balance.summary.1',
                'parameters' => [
                    'interval_start' => 1522540800,
                    'interval_end' => 1525132800,
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Reporting\ReportRun::class, $result);
    }

    public function testRetrieveReportRun()
    {
        $this->expectsRequest('get', '/v1/reporting/report_runs/frr_xxxxxxxxxxxxx');
        $result = $this->client->reporting->reportRuns->retrieve(
            'frr_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\Reporting\ReportRun::class, $result);
    }

    public function testListReportRun()
    {
        $this->expectsRequest('get', '/v1/reporting/report_runs');
        $result = $this->client->reporting->reportRuns->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Reporting\ReportRun::class, $result->data[0]);
    }

    public function testRetrieveReportType()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types/balance.summary.1'
        );
        $result = $this->client->reporting->reportTypes->retrieve(
            'balance.summary.1',
            []
        );
        static::assertInstanceOf(\Stripe\Reporting\ReportType::class, $result);
    }

    public function testListReportType()
    {
        $this->expectsRequest('get', '/v1/reporting/report_types');
        $result = $this->client->reporting->reportTypes->all([]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\Reporting\ReportType::class, $result->data[0]);
    }

    public function testRetrieveWebhookEndpoint()
    {
        $this->expectsRequest('get', '/v1/webhook_endpoints/we_xxxxxxxxxxxxx');
        $result = $this->client->webhookEndpoints->retrieve('we_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $result);
    }

    public function testUpdateWebhookEndpoint()
    {
        $this->expectsRequest('post', '/v1/webhook_endpoints/we_xxxxxxxxxxxxx');
        $result = $this->client->webhookEndpoints->update(
            'we_xxxxxxxxxxxxx',
            ['url' => 'https://example.com/new_endpoint']
        );
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $result);
    }

    public function testListWebhookEndpoint()
    {
        $this->expectsRequest('get', '/v1/webhook_endpoints');
        $result = $this->client->webhookEndpoints->all(['limit' => 3]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $result->data[0]);
    }

    public function testDeleteWebhookEndpoint()
    {
        $this->expectsRequest('delete', '/v1/webhook_endpoints/we_xxxxxxxxxxxxx');
        $result = $this->client->webhookEndpoints->delete('we_xxxxxxxxxxxxx', []);
        static::assertInstanceOf(\Stripe\WebhookEndpoint::class, $result);
    }

    public function testExpireSession()
    {
        $this->expectsRequest('post', '/v1/checkout/sessions/sess_xyz/expire');
        $result = $this->client->checkout->sessions->expire('sess_xyz', []);
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $result);
    }

    public function testCreateShippingRate()
    {
        $this->expectsRequest('post', '/v1/shipping_rates');
        $result = $this->client->shippingRates->create(
            [
                'display_name' => 'Sample Shipper',
                'fixed_amount' => ['currency' => 'usd', 'amount' => 400],
                'type' => 'fixed_amount',
            ]
        );
        static::assertInstanceOf(\Stripe\ShippingRate::class, $result);
    }

    public function testListShippingRate()
    {
        $this->expectsRequest('get', '/v1/shipping_rates');
        $result = $this->client->shippingRates->all([]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\ShippingRate::class, $result->data[0]);
    }

    public function testCreateSession3()
    {
        $this->expectsRequest('post', '/v1/checkout/sessions');
        $result = $this->client->checkout->sessions->create(
            [
                'success_url' => 'https://example.com/success',
                'cancel_url' => 'https://example.com/cancel',
                'mode' => 'payment',
                'shipping_options' => [
                    ['shipping_rate' => 'shr_standard'],
                    [
                        'shipping_rate_data' => [
                            'display_name' => 'Standard',
                            'delivery_estimate' => [
                                'minimum' => ['unit' => 'day', 'value' => 5],
                                'maximum' => ['unit' => 'day', 'value' => 7],
                            ],
                        ],
                    ],
                ],
            ]
        );
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $result);
    }

    public function testCreatePaymentIntent2()
    {
        $this->expectsRequest('post', '/v1/payment_intents');
        $result = $this->client->paymentIntents->create(
            [
                'amount' => 1099,
                'currency' => 'eur',
                'automatic_payment_methods' => ['enabled' => true],
            ]
        );
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testCreatePaymentLink()
    {
        $this->expectsRequest('post', '/v1/payment_links');
        $result = $this->client->paymentLinks->create(
            ['line_items' => [['price' => 'price_xxxxxxxxxxxxx', 'quantity' => 1]]]
        );
        static::assertInstanceOf(\Stripe\PaymentLink::class, $result);
    }

    public function testListLineItemsPaymentLink()
    {
        $this->expectsRequest('get', '/v1/payment_links/pl_xyz/line_items');
        $result = $this->client->paymentLinks->allLineItems('pl_xyz', []);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\LineItem::class, $result->data[0]);
    }

    public function testRetrievePaymentLink()
    {
        $this->expectsRequest('get', '/v1/payment_links/pl_xyz');
        $result = $this->client->paymentLinks->retrieve('pl_xyz', []);
        static::assertInstanceOf(\Stripe\PaymentLink::class, $result);
    }

    public function testVerifyMicrodepositsPaymentIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/pi_xxxxxxxxxxxxx/verify_microdeposits'
        );
        $result = $this->client->paymentIntents->verifyMicrodeposits(
            'pi_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $result);
    }

    public function testVerifyMicrodepositsSetupIntent()
    {
        $this->expectsRequest(
            'post',
            '/v1/setup_intents/seti_xxxxxxxxxxxxx/verify_microdeposits'
        );
        $result = $this->client->setupIntents->verifyMicrodeposits(
            'seti_xxxxxxxxxxxxx',
            []
        );
        static::assertInstanceOf(\Stripe\SetupIntent::class, $result);
    }

    public function testCreateTestClock()
    {
        $this->expectsRequest('post', '/v1/test_helpers/test_clocks');
        $result = $this->client->testHelpers->testClocks->create(
            ['frozen_time' => 123, 'name' => 'cogsworth']
        );
        static::assertInstanceOf(\Stripe\TestHelpers\TestClock::class, $result);
    }

    public function testRetrieveTestClock()
    {
        $this->expectsRequest('get', '/v1/test_helpers/test_clocks/clock_xyz');
        $result = $this->client->testHelpers->testClocks->retrieve('clock_xyz', []);
        static::assertInstanceOf(\Stripe\TestHelpers\TestClock::class, $result);
    }

    public function testListTestClock()
    {
        $this->expectsRequest('get', '/v1/test_helpers/test_clocks');
        $result = $this->client->testHelpers->testClocks->all([]);
        static::assertInstanceOf(\Stripe\Collection::class, $result);
        static::assertInstanceOf(\Stripe\TestHelpers\TestClock::class, $result->data[0]);
    }

    public function testDeleteTestClock()
    {
        $this->expectsRequest('delete', '/v1/test_helpers/test_clocks/clock_xyz');
        $result = $this->client->testHelpers->testClocks->delete('clock_xyz', []);
        static::assertInstanceOf(\Stripe\TestHelpers\TestClock::class, $result);
    }

    public function testAdvanceTestClock()
    {
        $this->expectsRequest(
            'post',
            '/v1/test_helpers/test_clocks/clock_xyz/advance'
        );
        $result = $this->client->testHelpers->testClocks->advance(
            'clock_xyz',
            ['frozen_time' => 142]
        );
        static::assertInstanceOf(\Stripe\TestHelpers\TestClock::class, $result);
    }
}
