---
title: Move `V2.Event` API resources to `V2.Core.Events`
pr_url: https://github.com/stripe/stripe-php/pull/1920
is_breaking: true
released_in_version: 18.0.0
---

- ⚠️ Move all V2 Event-related resources (`Event`, `RelatedObject`, etc) from `Stripe\V2` to `Stripe\V2\Core`. They now correctly match their API path and are in line with all other resources. To update your code:
```diff
-Stripe\V2\Event
+Stripe\V2\Core\Event
```
