---
title: Preserve custom `api_base` configuration across paginated requests
semver_level: patch
jira_tickets_closed:
- RUN_DEVSDK-3418
released_in_version: 23.1.0
---

Ensure `nextPage()`, `previousPage()`, and `autoPagingIterator()` continue using the `api_base` configured on `StripeClient`.
