---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2013
is_stripe_api_change: true
released_in_version: 19.5.0-alpha.1
---

* Add support for new resource `AccountSignals`
* Add support for `retrieve` method on resource `AccountSignals`
* Add support for `aggregation_period`, `group_by`, and `triggered_at` on `Billing.AlertTriggered`
* Add support for `external_account_collection` on `AccountLink.create().$params.collection_option`
* Add support for `funding_source` on `ApplicationFee`
* Change `DelegatedCheckout\RequestedSession.confirm().$params.payment_method_datum.billing_detail.address.line1`, `DelegatedCheckout\RequestedSession.create().$params.fulfillment_detail.address.line1`, `DelegatedCheckout\RequestedSession.create().$params.payment_method_datum.billing_detail.address.line1`, `DelegatedCheckout\RequestedSession.update().$params.fulfillment_detail.address.line1`, and `DelegatedCheckout\RequestedSession.update().$params.payment_method_datum.billing_detail.address.line1` to be optional
* Add support for `hosted` and `ui_mode` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
* Add support for `url` on `FinancialConnections.Session`
* Add support for `billing_cycle_anchor` on `Subscription.create().$params.trial_setting.end_behavior` and `Subscription.update().$params.trial_setting.end_behavior`
