---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1906
is_stripe_api_change: true
released_in_version: 18.1.0-alpha.1
---

* Add support for `paypay_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
* Add support for `billing_cadence` on `Invoice.all().$params`
* Add support for `credit_grants` on `Billing\Alert.create().$params.credit_balance_threshold.filter`
* Add support for `payment_record_refund` and `type` on `CreditNote.create().$params.refund`, `CreditNote.preview().$params.refund`, `CreditNote.preview_lines().$params.refund`, and `CreditNote.refunds[]`
* Remove support for values `saturday` and `sunday` from enums `Account.settings.payouts.schedule.weekly_payout_days`
* Add support for `location` and `reader` on `Charge.payment_method_details.paynow`
* Add support for `paypay` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
