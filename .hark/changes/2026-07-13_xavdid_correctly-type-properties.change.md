---
title: Correctly type properties on `ErrorObject`
pr_url: https://github.com/stripe/stripe-php/pull/2097
is_breaking: true
released_in_version: 21.0.0
---

* the properties of `ErrorObject` were typed as `string` when many of them should have been `null|string`. If you (or your typechecker) were treating these as plain strings, you'll need to be more defensive in your code.
* to be clear: no runtime code has changed, we've just made the types more accurate. We didn't want to break any builds in a patch version, so this is released as a major
