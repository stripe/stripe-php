---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1859
is_stripe_api_change: true
released_in_version: 17.3.0-beta.1
---

This release changes the pinned API version to `2025-04-30.preview`.

* Add support for new value `balance_settings.updated` on enum `Event.type`
* Add support for new values `aw_tin`, `az_tin`, `bd_bin`, `bf_ifu`, `bj_ifu`, `cm_niu`, `cv_nif`, `et_tin`, `kg_tin`, and `la_tin` on enum `QuotePreviewInvoice.customer_tax_ids[].type`
* Add support for `billing_mode` on `QuotePreviewSubscriptionSchedule`, `SubscriptionSchedule`, and `Subscription`
