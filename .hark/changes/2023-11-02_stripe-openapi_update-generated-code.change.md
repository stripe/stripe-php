---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1598
is_stripe_api_change: true
released_in_version: 13.3.0-beta.1
---

* Add support for `attach_payment_intent` method on resource `Invoice`
* Add support for `post_payment_amount`, `pre_payment_amount`, and `refunds` on `CreditNote`
* Add support for new value `invoice.payment.overpaid` on enum `Event.type`
* Add support for `amounts_due` and `payments` on `Invoice`
* Add support for `created` on `Issuing.PersonalizationDesign`
