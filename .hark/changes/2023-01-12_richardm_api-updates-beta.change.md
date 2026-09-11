---
title: API Updates for beta branch
pr_link: https://github.com/stripe/stripe-php/pull/1423
is_stripe_api_change: true
released_in_version: 10.4.0-beta.3
---

* Updated stable APIs to the latest version
* Add support for `Tax.Registration` resource.
* Change `draft_quote` method implementation from hitting `/v1/quotes/{quotes}/draft` to `/v1/quotes/{quotes}/mark_draft`
