---
title: Build SDK w/ V2 OpenAPI spec
pr_url: https://github.com/stripe/stripe-php/pull/1898
semver_level: major
released_in_version: 18.0.0
---

- ⚠️ The delete methods for v2 APIs (the ones in the `StripeClient.v2` namespace) now return a `V2DeletedObject` which has the id of the object that has been deleted and a string representing the type of the object that has been deleted.
- the generated types of some properties in `EventDestination` changed from `something: null|string` to `something?: string`
