---
title: Reject ASCII-whitespace-only webhook secrets
pr_url: https://github.com/stripe/stripe-php/pull/2172
semver_level: patch
jira_tickets_closed:
- RUN_DEVSDK-3378
released_in_version: 22.1.0
---

- Reject webhook signing secrets made entirely of ASCII whitespace instead of using them as HMAC keys.
