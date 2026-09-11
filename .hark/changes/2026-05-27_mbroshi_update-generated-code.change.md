---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2073
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.3.0-alpha.1
---

* Change type of `Billing\Alert.create().$params.spend_threshold.group_by` from `literal('pricing_plan_subscription')` to `enum('billing_cadence'|'pricing_plan_subscription')`
* ⚠️ Change type of `Billing.Alert.spend_threshold.group_by` from `literal('pricing_plan_subscription')` to `enum('billing_cadence'|'pricing_plan_subscription')`
* Change `DelegatedCheckout.RequestedSession.affiliate_attributions` to be required
* Add support for new value `institution_requirement` on enum `FinancialConnections.Account.status_details.inactive.cause`
* Add support for `wechat_pay` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for `gift_card` on `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, and `PaymentIntent.update().$params.payment_method_option`
* Add support for `payment_details` on `PaymentIntent.create().$params.payments_orchestration`
* Add support for `enabled` on `PaymentIntent.payment_details.benefit.fr_meal_voucher` and `SetupIntent.setup_details.benefit.fr_meal_voucher`
* ⚠️ Remove support for `login_failed`, `registration_failed`, `registration_success`, and `type` on `Radar\CustomerEvaluation.update().$params`
* ⚠️ Remove support for `latest_version` on `V2.Billing.LicenseFee`, `V2.Billing.PricingPlan`, and `V2.Billing.RateCard`
* ⚠️ Remove support for `service_interval_count` and `service_interval` on `V2.Billing.LicenseFee` and `V2.Billing.RateCard`
* Add support for `debit_agreement` on `V2.MoneyManagement.ReceivedCredit.stripe_balance_payment`
* Add support for `canonical_path` on `EventsV2CoreHealthTrafficVolumeDropFiringEvent.impact` and `EventsV2CoreHealthTrafficVolumeDropResolvedEvent.impact`
* Add support for snapshot event `PAYMENT_INTENT_EXPIRED` with resource `PaymentIntent`
* Add support for event notifications `V2CoreHealthElementsErrorFiringEvent`, `V2CoreHealthElementsErrorResolvedEvent`, `V2CoreHealthInvoiceCountDroppedFiringEvent`, and `V2CoreHealthInvoiceCountDroppedResolvedEvent`
