---
title: Preserve custom `api_base` configuration across paginated requests
semver_level: patch
jira_tickets_closed:
- RUN_DEVSDK-3418
---

Ensure `nextPage()`, `previousPage()`, and `autoPagingIterator()` continue using the `api_base` configured on `StripeClient`.
