---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1996
is_stripe_api_change: true
released_in_version: 19.2.0-alpha.3
---

* Add support for `risk_details` on `DelegatedCheckout.RequestedSession`
* Remove support for `description`, `images`, and `name` on `DelegatedCheckout.RequestedSession.line_item_details[]`
* Add support for `name` on `ProductCatalog.TrialOffer` and `ProductCatalog\TrialOffer.create().$params`
* Add support for `login_failed` and `registration_failed` on `Radar.AccountEvaluation.events[]` and `Radar\AccountEvaluation.update().$params`
* Change type of `Radar\AccountEvaluation.update().$params.type` from `literal('registration_succeeded')` to `enum('login_failed'|'login_succeeded'|'registration_failed'|'registration_succeeded')`
