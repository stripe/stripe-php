---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2031
is_breaking: true
is_stripe_api_change: true
released_in_version: 19.5.0-alpha.4
---

* Add support for new resources `Orchestration.PaymentAttempt` and `Radar.CustomerEvaluation`
* Add support for `retrieve` method on resource `Orchestration.PaymentAttempt`
* Add support for `create` and `update` methods on resource `Radar.CustomerEvaluation`
* Add support for `approve` method on resource `Checkout.Session`
* Add support for `report_authenticated`, `report_canceled`, `report_failed`, `report_guaranteed`, `report_informational`, and `report_refund` methods on resource `PaymentAttemptRecord`
* Add support for `create_us_paper_check_on_application` on `AccountSession.create().$params.component.check_scanning.feature`
* ⚠️ Change `AccountSignals.delinquency` to be optional
* Add support for `approval_method` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for `current_attempt` on `Checkout.Session`
* Add support for `selected_fulfillment_option_overrides` on `DelegatedCheckout\RequestedSession.update().$params.fulfillment_detail`
* Add support for `pricing_plan_subscription_details` on `InvoiceItem.parent` and `InvoiceLineItem.parent`
* ⚠️ Remove support for `license_fee_subscription_details` on `InvoiceItem.parent` and `InvoiceLineItem.parent`
* ⚠️ Remove support for `pricing_plan_subscription` and `pricing_plan_version` on `InvoiceItem.parent.rate_card_subscription_details` and `InvoiceLineItem.parent.rate_card_subscription_details`
* Add support for new value `pricing_plan_subscription_details` on enum `InvoiceItem.parent.type`
* ⚠️ Remove support for value `license_fee_subscription_details` from enum `InvoiceItem.parent.type`
* Add support for new value `discounts` on enum `InvoiceItem.frozen_fields`
* Add support for new value `pricing_plan_subscription_details` on enum `InvoiceLineItem.parent.type`
* ⚠️ Remove support for value `license_fee_subscription_details` from enum `InvoiceLineItem.parent.type`
* Add support for `token_details` on `Issuing.Authorization`
* Add support for `failure_code` on `PaymentRecord.report_payment().$params.failed`, `PaymentRecord.report_payment_attempt().$params.failed`, and `PaymentRecord.report_payment_attempt_failed().$params`
* Change `PaymentRecord.report_payment_attempt_canceled().$params.canceled_at` to be optional
* Change `PaymentRecord.report_payment_attempt_failed().$params.failed_at` to be optional
* Change `PaymentRecord.report_payment_attempt_guaranteed().$params.guaranteed_at` to be optional
* Change `PaymentRecord.report_refund().$params.refunded` to be optional
* ⚠️ Change `Radar\IssuingAuthorizationEvaluation.create().$params.card_detail.bin_country` to be required
* Add support for `recurring_interval` on `SharedPayment\GrantedToken.create().$params.usage_limit`
* Change `SharedPayment\GrantedToken.create().$params.usage_limit.expires_at` to be optional
* Add support for `home_rule_tax` on `Tax.Registration.country_options.us` and `Tax\Registration.create().$params.country_option.me`
* Add support for new value `home_rule_tax` on enum `Tax.Registration.country_options.us.type`
