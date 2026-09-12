---
title: Preserve null values in v2 JSON request bodies
pr_url: https://github.com/stripe/stripe-php/pull/2042
is_breaking: true
released_in_version: 20.0.0
---

- The SDK now preserves and sends `null` when set in V2 API metadata and params, enabling you to clear metadata entries and some unsettable properties for V2 APIs.
- ⚠️ The `Util::objectsToIds()` method now has a required `$serializeNull` parameter to indicate if null values set in the object should be output in the resulting hash. This is relevant for V2 POST APIs to let callers clear emptyable values.  
