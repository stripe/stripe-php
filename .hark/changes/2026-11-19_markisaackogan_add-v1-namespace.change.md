---
title: Add a v1 namespace for API services
semver_level: minor
---

All top-level, non-[v2 API services](https://docs.stripe.com/api-v2-overview) on `StripeClient` are made available under the new `v1` namespace. The existing top-level services remain supported but will be marked as deprecated in the next major release. For example:

```diff
 $stripe = new \Stripe\StripeClient($STRIPE_API_KEY);
- $customers = $stripe->customers->all(); // existing way to access v1 endpoints
+ $customers = $stripe->v1->customers->all(); // recommended way to access v1 endpoints
```
