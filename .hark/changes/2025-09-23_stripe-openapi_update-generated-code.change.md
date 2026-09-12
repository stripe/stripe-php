---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1896
is_stripe_api_change: true
released_in_version: 18.1.0-beta.1
---

* Add support for new resources `Billing.Analytics.MeterUsageRow` and `Billing.Analytics.MeterUsage`
* Remove support for resources `Billing.MeterUsageRow` and `Billing.MeterUsage`
* Add support for `retrieve` method on resource `Billing.Analytics.MeterUsage`
* Remove support for `retrieve` method on resource `Billing.MeterUsage`
* Add support for `report_payment_attempt_informational` method on resource `PaymentRecord`
* Add support for `minimum_balance_by_currency` on `BalanceSettings.payments.payouts` and `BalanceSettings.update().$params.payment.payout`
* Change type of `BalanceSettings.update().$params.payment.settlement_timing.delay_days_override` from `longInteger` to `emptyable(longInteger)`
* Change `BalanceSettings.update().$params.payments` to be optional
* Remove support for values `saturday` and `sunday` from enum `BalanceSettings.payments.payouts.schedule.weekly_payout_days`
* Add support for `delay_days_override` on `BalanceSettings.payments.settlement_timing`
* Add support for `automatic_tax` and `invoice_creation` on `Checkout\Session.update().$params`
* Add support for `unit_label` on `Checkout\Session.update().$params.line_item.price_datum.product_datum`
* Add support for `invoice_settings` on `Checkout\Session.update().$params.subscription_datum`
* Change `Checkout.Session.collected_information.business_name` to be required
* Add support for `intended_submission_method` on `Dispute.update().$params` and `Dispute`
* Change type of `Dispute.smart_disputes.recommended_evidence` from `string` to `array(string)`
* Add support for `pix` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for `billing_schedules` on `Invoice.create_preview().$params.subscription_detail`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
* Add support for new value `pix` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for `paypay` on `PaymentAttemptRecord.payment_method_details` and `PaymentRecord.payment_method_details`
* Add support for `wallet` on `PaymentAttemptRecord.payment_method_details.card` and `PaymentRecord.payment_method_details.card`
* Change type of `PaymentAttemptRecord.processor_details.custom.payment_reference` and `PaymentRecord.processor_details.custom.payment_reference` from `string` to `nullable(string)`
* Add support for `flexible` on `QuotePreviewSubscriptionSchedule.billing_mode`
* Add support for `billed_until` on `SubscriptionItem`
* Add support for error codes `financial_connections_account_pending_account_numbers` and `financial_connections_account_unavailable_account_numbers` on `QuotePreviewInvoice.last_finalization_error`
