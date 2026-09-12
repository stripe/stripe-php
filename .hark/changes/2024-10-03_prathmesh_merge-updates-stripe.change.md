---
title: Merge updates from stripe-php master to beta
pr_url: https://github.com/stripe/stripe-php/pull/1766
released_in_version: 16.7.0-beta.1
---

* The `Preview` class has been removed. Please use [rawRequest](https://github.com/stripe/stripe-php?tab=readme-ov-file#custom-requests) instead which accepts
     * the http method as parameter instead of the dedicated methods in the `Preview` class
     * an `apiMode` of `v1` instead of `standard` and `v2` instead of `preview`.
