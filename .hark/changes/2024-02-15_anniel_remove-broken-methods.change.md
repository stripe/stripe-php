---
title: Remove broken methods on CustomerCashBalanceTransaction
pr_link: https://github.com/stripe/stripe-php/pull/1648
released_in_version: 13.11.0
---

* Bugfix: remove support for `CustomerCashBalanceTransaction::all` and `CustomerCashBalanceTransaction::retrieve`. These methods were included in the library unintentionally and never functioned.
