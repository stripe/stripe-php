---
title: API Updates
pr_link: https://github.com/stripe/stripe-php/pull/1265
is_stripe_api_change: true
released_in_version: 7.124.0
---

* Add support for new resources `FundingInstructions` and `Terminal.Configuration`
* Add support for `create_funding_instructions` method on resource `Customer`
* Add support for `amount_details` on `PaymentIntent`
* Add support for `customer_balance` on `PaymentMethod`
* Add support for new value `customer_balance` on enum `PaymentMethod.type`
* Add support for `configuration_overrides` on `Terminal.Location`
