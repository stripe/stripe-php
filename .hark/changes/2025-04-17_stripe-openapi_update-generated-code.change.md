---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1855
is_stripe_api_change: true
released_in_version: 17.2.0-beta.4
---

* Add support for new resources `FxQuote` and `PaymentIntentAmountDetailsLineItem`
* Add support for `all`, `create`, and `retrieve` methods on resource `FxQuote`
* Remove support for `attach_payment_intent` method on resource `Invoice`
* Add support for `script` and `type` on `Coupon`
* Add support for new value `fx_quote.expired` on enum `Event.type`
* Add support for new value `affirm` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for `fx_quote` on `PaymentIntent` and `Transfer`
* Add support for `pix` on `PaymentMethodConfiguration`
* Add support for `us_cfpb_data` on `Person`
* Add support for `pending_reason` on `Refund`
* Add support for snapshot event `FX_QUOTE_EXPIRED` with resource `FxQuote`
