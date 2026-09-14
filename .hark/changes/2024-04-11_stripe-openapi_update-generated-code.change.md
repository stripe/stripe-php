---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1677
is_stripe_api_change: true
released_in_version: 14.1.0
---

* Add support for new values `billing_policy_remote_function_response_invalid`, `billing_policy_remote_function_timeout`, `billing_policy_remote_function_unexpected_status_code`, and `billing_policy_remote_function_unreachable` on enum `StripeError.code`
* Change type of `Billing.MeterEventAdjustment.cancel` from `BillingMeterResourceBillingMeterEventAdjustmentCancel` to `nullable(BillingMeterResourceBillingMeterEventAdjustmentCancel)`
* Add support for `amazon_pay` on `PaymentMethodConfiguration` and `PaymentMethod`
* Add support for new value `amazon_pay` on enum `PaymentMethod.type`
* Add support for new values `bh_vat`, `kz_bin`, `ng_tin`, and `om_vat` on enum `TaxId.type`
