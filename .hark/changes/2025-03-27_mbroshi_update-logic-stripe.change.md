---
title: Update logic for Stripe::addBetaVersion
pr_link: https://github.com/stripe/stripe-php/pull/1830
released_in_version: 17.2.0-beta.1
---

* Stripe::addBetaVersion will use the highest version number used for a beta feature instead of throwing an `Exception` on a conflict as it had done previously.
