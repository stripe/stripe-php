---
title: StripeClient no longer inherits the legacy global Stripe::$accountId
semver_level: major
jira_tickets_closed:
- RUN_DEVSDK-3690
---

⚠️ An instance-scoped `StripeClient` that doesn't explicitly configure `stripe_account` no longer inherits the legacy, process-global `Stripe::setAccountId()` value.

Previously, `ApiRequestor` unconditionally layered the process-global account into every request's `Stripe-Account` header whenever it was set, and an explicit `stripe_account => null` override (at client construction or per-request) was silently dropped instead of suppressing it. In a long-lived or multi-tenant PHP process that mixes the legacy global setter with instance-scoped clients, this let an unrelated `StripeClient` silently send requests under whichever account the global was last set to.

If your integration relies on an unscoped `StripeClient` picking up `Stripe::setAccountId()`, pass the account explicitly instead, either on the client (`new StripeClient(['stripe_account' => $accountId])`) or per request (`['stripe_account' => $accountId]`).
