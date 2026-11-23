---
title: Encode `decimal_string` floats in fixed-point notation
semver_level: patch
---

- A `float` passed for a `decimal_string` field is now sent in fixed-point notation. Previously, floats below `1e-4` and from `1e14` up were sent in exponent notation, which V2 endpoints reject: `0.00001` was sent as `"1.0E-5"` and `1e15` as `"1.0E+15"`. Now they are sent as `"0.00001"` and `"1000000000000000"`, with the float's shortest round-trip digits.
