---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1989
is_stripe_api_change: true
released_in_version: 19.2.0-alpha.2
---

* Add support for `tracking_details` on `V2.MoneyManagement.OutboundPayment`
* Add support for `paper_check` on `V2.MoneyManagement.OutboundPayment.delivery_options` and `V2\MoneyManagement\OutboundPayment.create().$params.delivery_option`
* Add support for event notification `V2CoreAccountIncludingFutureRequirementsUpdatedEvent` with related object `V2.Core.Account`
