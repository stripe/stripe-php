---
title: "Add TStripeObject to iterator PHPDoc comments (fixes [#2091](https://github.com/stripe/stripe-php/issues/2091))"
pr_url: https://github.com/stripe/stripe-php/pull/2093
released_in_version: 20.3.1
---

- Fixed: PHPStan no longer infers iterated Collection values as `mixed`; loop variables are now correctly typed as the collection's generic type parameter
