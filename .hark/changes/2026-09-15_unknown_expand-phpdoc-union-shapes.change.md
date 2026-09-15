---
title: Expand PHPDoc union parameter shapes
pr_url: https://github.com/stripe/stripe-php/pull/2148
semver_level: major
---

- ⚠️ Request-parameter PHPDoc now describes the complete object and list shapes in unions instead of using a generic `array` type. This may produce new PHPStan or IDE diagnostics for arrays that do not match the documented types.
- This change affects documentation and static analysis only. It has no runtime impact and does not change the minimum supported PHP version.
