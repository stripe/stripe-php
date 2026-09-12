---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1587
is_stripe_api_change: true
released_in_version: 12.7.0-beta.1
---

* Add support for `mark_draft` and `mark_stale` methods on resource `Quote`
* Remove support for `draft_quote` and `mark_stale_quote` methods on resource `Quote`
* Add support for `allow_backdated_lines` on `Quote`
* Rename `previewInvoiceLines` to `allPreviewInvoiceLines` on resource `Quote`
