---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2010
is_breaking: true
is_stripe_api_change: true
released_in_version: 19.4.0-alpha.4
---

* Add support for `spend_threshold` on `Billing.Alert` and `Billing\Alert.create().$params`
* ⚠️ Add support for new value `spend_threshold` on enum `Billing.Alert.alert_type`
* Add support for `invoice_item`, `proration_details`, `proration`, and `subscription` on `InvoiceLineItem.parent.schedule_details`
* Add support for `custom` on `PaymentMethod.update().$params`
* Add support for `payment_method_reference` and `usage` on `PaymentMethod.custom`
* Add support for `outstanding_usage_through` and `unused_time_from` on `Subscription.pause().$params.bill_for`
* ⚠️ Remove support for `outstanding_usage` and `unused_time` on `Subscription.pause().$params.bill_for`
* ⚠️ Remove support for `payment_behavior` on `Subscription.resume().$params`
