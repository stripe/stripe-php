---
title: Support discriminated unions in the V2 runtime and fix array coercion
pr_url: https://github.com/stripe/stripe-php/pull/2113
released_in_version: 21.3.0
---

- Adds support for `nullable` and `discriminatedUnion` field encodings in the V2 coercion runtime, so `int64` and `decimal` fields wrapped in those schema kinds convert correctly.
- Encoding a V2 request throws `\Stripe\Exception\InvalidArgumentException` when a polymorphic (discriminated union) parameter is missing its discriminator field, or that field is not a string.
- Fixes `int64_string` and `decimal_string` fields inside arrays not being coerced in either direction.
