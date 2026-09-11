---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1611
is_stripe_api_change: true
released_in_version: 13.5.0
---

* Add support for new resources `Climate.Order`, `Climate.Product`, and `Climate.Supplier`
* Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `Order`
* Add support for `all` and `retrieve` methods on resources `Product` and `Supplier`
* Add support for new value `financial_connections_account_inactive` on enum `StripeError.code`
* Add support for new values `climate_order_purchase` and `climate_order_refund` on enum `BalanceTransaction.type`
* Add support for new values `climate.order.canceled`, `climate.order.created`, `climate.order.delayed`, `climate.order.delivered`, `climate.order.product_substituted`, `climate.product.created`, and `climate.product.pricing_updated` on enum `Event.type`
