---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1871
is_stripe_api_change: true
released_in_version: 17.3.0
---

* Add support for `attach_payment` method on resource `Invoice`
* Add support for `collect_inputs` method on resource `Terminal.Reader`
* Add support for `succeed_input_collection` and `timeout_input_collection` test helper methods on resource `Terminal.Reader`
* Add support for `refund_and_dispute_prefunding` on `Balance`
* Add support for `balance_type` on `BalanceTransaction`
* Add support for `post_payment_amount` and `pre_payment_amount` on `CreditNote`
* Add support for new value `mixed` on enum `CreditNote.type`
* Add support for new value `invoice_payment.paid` on enum `Event.type`
* Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethodConfiguration`
* Add support for `billing_thresholds` on `SubscriptionItem` and `Subscription`
* Add support for `metadata` on `Tax.CalculationLineItem`
* Add support for new value `collect_inputs` on enum `Terminal.Reader.action.type`
* Add support for new value `simulated_stripe_s700` on enum `Terminal.Reader.device_type`
* Add support for snapshot event `INVOICE_PAYMENT_PAID` with resource `InvoicePayment`
* Add support for error code `forwarding_api_upstream_error` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
