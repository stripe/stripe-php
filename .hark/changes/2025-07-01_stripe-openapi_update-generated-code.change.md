---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1880
is_stripe_api_change: true
released_in_version: 17.4.0
---

* Add support for `migrate` method on resource `Subscription`
* Add support for `collect_payment_method` and `confirm_payment_intent` methods on resource `Terminal.Reader`
* Add support for new value `crypto` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Change type of `Dispute.enhanced_eligibility_types` from `literal('visa_compelling_evidence_3')` to `enum('visa_compelling_evidence_3'|'visa_compliance')`
* Add support for new value `terminal.reader.action_updated` on enum `Event.type`
* Add support for `related_person` on `Identity.VerificationSession`
* Add support for new value `crypto` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
* Add support for `crypto` on `PaymentMethod`
* Add support for new value `buut` on enum `PaymentMethod.ideal.bank`
* Add support for new value `BUUTNL2A` on enum `PaymentMethod.ideal.bic`
* Add support for `billing_mode` on `SubscriptionSchedule` and `Subscription`
* Add support for new values `collect_payment_method` and `confirm_payment_intent` on enum `Terminal.Reader.action.type`
* Add support for snapshot event `TERMINAL_READER_ACTION_UPDATED` with resource `Terminal.Reader`
