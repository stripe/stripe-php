---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1670
is_stripe_api_change: true
released_in_version: 13.17.0
---

* Add support for `subscription_item` on `Discount`
* Add support for `email` and `phone` on `Identity.VerificationReport`
* Add support for `verification_flow` on `Identity.VerificationReport` and `Identity.VerificationSession`
* Add support for new value `verification_flow` on enums `Identity.VerificationReport.type` and `Identity.VerificationSession.type`
* Add support for `provided_details` on `Identity.VerificationSession`
* Change type of `Invoice.discounts` from `nullable(array(expandable(deletable($Discount))))` to `array(expandable(deletable($Discount)))`
* Add support for `zip` on `PaymentMethodConfiguration`
* Add support for `discounts` on `SubscriptionItem` and `Subscription`
* Add support for new value `mobile_phone_reader` on enum `Terminal.Reader.device_type`
