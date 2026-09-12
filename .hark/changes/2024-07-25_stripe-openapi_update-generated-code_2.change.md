---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1723
is_stripe_api_change: true
released_in_version: 15.5.0-beta.1
---

* Add support for new resources `Billing.AlertTriggered`, `Billing.Alert`, and `Tax.Association`
* Add support for `activate`, `all`, `archive`, `create`, `deactivate`, and `retrieve` methods on resource `Alert`
* Add support for `find` method on resource `Association`
* Add support for new values `issuing.account_closed_for_not_providing_business_model_clarification`, `issuing.account_closed_for_not_providing_url_clarification`, and `issuing.account_closed_for_not_providing_use_case_clarification` on enum `AccountNotice.reason`
* Add support for `async_workflows` on `PaymentIntent`
* Add support for `payto` on `PaymentMethodConfiguration`
* Add support for `display_name` on `Treasury.FinancialAccount`
