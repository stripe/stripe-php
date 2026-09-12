---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1839
is_stripe_api_change: true
released_in_version: 17.2.0
---

* Add support for new value `tax_id_prohibited` on enums `Invoice.last_finalization_error.code`, `PaymentIntent.last_payment_error.code`, `SetupAttempt.setup_error.code`, `SetupIntent.last_setup_error.code`, and `StripeError.code`
* Add support for `wallet_options` on `Checkout.Session`
* Add support for `context` on `Event`
* Add support for new values `aw_tin`, `az_tin`, `bd_bin`, `bf_ifu`, `bj_ifu`, `cm_niu`, `cv_nif`, `et_tin`, `kg_tin`, and `la_tin` on enums `Invoice.customer_tax_ids[].type` and `TaxId.type`
* Add support for new value `affirm` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
* Add support for `pix` on `PaymentMethodConfiguration`
* Add support for `klarna` on `PaymentMethodDomain`
* Add support for `us_cfpb_data` on `Person`
* Add support for `pending_reason` on `Refund`
* Change type of `Tax.CalculationLineItem.reference` from `nullable(string)` to `string`
