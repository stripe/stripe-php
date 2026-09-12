---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1659
is_stripe_api_change: true
released_in_version: 13.15.0-beta.1
---

* Add support for new resources `Billing.MeterEventAdjustment`, `Billing.MeterEvent`, and `Billing.Meter`
* Add support for `all`, `create`, `deactivate`, `reactivate`, `retrieve`, and `update` methods on resource `Meter`
* Add support for `create` method on resources `MeterEventAdjustment` and `MeterEvent`
* Add support for `create` test helper method on resource `ConfirmationToken`
* Add support for `add_lines`, `remove_lines`, and `update_lines` methods on resource `Invoice`
* Add support for `multibanco` on `PaymentMethodConfiguration` and `PaymentMethod`
* Add support for new value `multibanco` on enum `PaymentMethod.type`
* Add support for `meter` on `Plan`
