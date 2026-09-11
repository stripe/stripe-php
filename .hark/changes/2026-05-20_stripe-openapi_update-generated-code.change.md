---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2068
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.2.0-alpha.6
---

* Add support for new resource `PaymentLocationCapability`
* Add support for `all`, `retrieve`, and `update` methods on resource `PaymentLocationCapability`
* Add support for `close` and `simulate_network_lifecycle_dispute_response` test helper methods on resource `Issuing.Dispute`
* Change type of `DelegatedCheckout\RequestedSession.update().$params.discount.codes` from `array(string)` to `emptyable(array(string))`
* ⚠️ Remove support for `credited_items` on `InvoiceItem.proration_details`
* Add support for `balance_response` on `Issuing.Authorization`
* Add support for `payment_evaluations` on `PaymentAttemptRecord.report_canceled().$params`, `PaymentAttemptRecord.report_failed().$params`, `PaymentRecord.report_payment().$params.failed`, `PaymentRecord.report_payment_attempt().$params.failed`, `PaymentRecord.report_payment_attempt_canceled().$params`, and `PaymentRecord.report_payment_attempt_failed().$params`
* Add support for `enabled` on `PaymentIntent.confirm().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.create().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.update().$params.payment_detail.benefit.fr_meal_voucher`, `SetupIntent.confirm().$params.setup_detail.benefit.fr_meal_voucher`, `SetupIntent.create().$params.setup_detail.benefit.fr_meal_voucher`, and `SetupIntent.update().$params.setup_detail.benefit.fr_meal_voucher`
* Add support for `advanced_feature_details` and `allowed_payment_method_types` on `PaymentIntent`
* Change type of `PaymentLocation.update().$params.address.city` from `string` to `emptyable(string)`
* Change type of `PaymentLocation.update().$params.address.line1` from `string` to `emptyable(string)`
* Change type of `PaymentLocation.update().$params.address.line2` from `string` to `emptyable(string)`
* Change type of `PaymentLocation.update().$params.address.postal_code` from `string` to `emptyable(string)`
* Change type of `PaymentLocation.update().$params.address.state` from `string` to `emptyable(string)`
* Change `Subscription.pause().$params.type` to be optional
* ⚠️ Remove support for `payment_behavior` on `Subscription.resume().$params`
* ⚠️ Remove support for `status_details` on `Subscription`
