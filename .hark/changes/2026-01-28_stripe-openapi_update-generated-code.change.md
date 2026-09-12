---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2002
is_stripe_api_change: true
released_in_version: 19.4.0-alpha.1
---

* Add support for new resources `FrMealVouchersOnboarding`, `Reserve.Hold`, `Reserve.Plan`, and `Reserve.Release`
* Add support for `all`, `create`, `retrieve`, and `update` methods on resource `FrMealVouchersOnboarding`
* Add support for `all` and `retrieve` methods on resources `Reserve.Hold` and `Reserve.Release`
* Add support for `retrieve` method on resource `Reserve.Plan`
* Add support for `pause` method on resource `Subscription`
* Add support for `service_period_details` on `Discount`
* Add support for `agentic_commerce_settings` on `AccountSession.components`
* Add support for new value `risk_reserved` on enum `BalanceTransaction.balance_type`
* Add support for `service_period` on `Coupon.create().$params` and `Coupon`
* Add support for new value `service_period` on enum `Coupon.duration`
* Change type of `InvoiceItem.pricing.price_details.price` and `InvoiceLineItem.pricing.price_details.price` from `string` to `expandable($Price)`
* Add support for `settings` on `Invoice.create_preview().$params.discount`, `Invoice.create_preview().$params.schedule_detail.amendment.discount_action.add`, `Invoice.create_preview().$params.schedule_detail.amendment.discount_action.set`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.add.discount`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.set.discount`, `Invoice.create_preview().$params.schedule_detail.phase.discount`, `Invoice.create_preview().$params.schedule_detail.phase.item.discount`, `Invoice.create_preview().$params.subscription_detail.item.discount`, `Quote.create().$params.line.action.add_discount`, `Quote.create().$params.line.action.add_item.discount`, `Quote.create().$params.line.action.set_discount`, `Quote.create().$params.line.action.set_item.discount`, `Quote.update().$params.line.action.add_discount`, `Quote.update().$params.line.action.add_item.discount`, `Quote.update().$params.line.action.set_discount`, `Quote.update().$params.line.action.set_item.discount`, `Subscription.create().$params.discount`, `Subscription.create().$params.item.discount`, `Subscription.update().$params.discount`, `Subscription.update().$params.item.discount`, `SubscriptionItem.create().$params.discount`, `SubscriptionItem.update().$params.discount`, `SubscriptionSchedule.amend().$params.amendment.discount_action.add`, `SubscriptionSchedule.amend().$params.amendment.discount_action.set`, `SubscriptionSchedule.amend().$params.amendment.item_action.add.discount`, `SubscriptionSchedule.amend().$params.amendment.item_action.set.discount`, `SubscriptionSchedule.create().$params.phase.discount`, `SubscriptionSchedule.create().$params.phase.item.discount`, `SubscriptionSchedule.update().$params.phase.discount`, and `SubscriptionSchedule.update().$params.phase.item.discount`
* Add support for `subtotal` on `InvoiceLineItem`
* Add support for `billing_cadence` on `Subscription.all().$params`
