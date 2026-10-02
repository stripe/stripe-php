---
title: Handle malformed webhook signature header items
semver_level: patch
jira_tickets_closed:
- RUN_DEVSDK-3404
---

- Ignore malformed Stripe-Signature header items without emitting warnings or throwing a TypeError.
