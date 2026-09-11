---
title: Add optional appInfo to StripeClient config
pr_link: https://github.com/stripe/stripe-php/pull/1700
released_in_version: 14.9.0
---

* `StripeClient` can now accept `$appInfo` as a `$config` option, so AppInfo can be set per-client. If not passed in, will fall back on the global AppInfo set by `Stripe::setAppInfo()`.
  * The config expects `$appInfo` to be of type `array{name: string, version?: string, url?: string, partner_id?: string}`
