---
title: StripeClient no longer inherits the legacy global Stripe::$accountId
semver_level: major
jira_tickets_closed:
- RUN_DEVSDK-3690
---

⚠️ `StripeClient` no longer inherits the global account set by `Stripe::setAccountId()`. Previously, a client without a configured `stripe_account` could send requests under an unrelated account set elsewhere in the process.

If you relied on this behavior, pass `['stripe_account' => $accountId]` when constructing the client or making a request.

An explicit `['stripe_account' => null]` now clears the account for a request, overriding both the client's configured account and the global account. Legacy static API calls still inherit the global account when `stripe_account` is omitted.
