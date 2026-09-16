---
title: Fix account scoping for event notification handler callback clients
semver_level: patch
---

* Fix callback clients to use the event's Stripe context without inheriting the original client's Stripe account.
