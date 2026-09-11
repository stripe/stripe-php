---
title: Better type hints in your editor!!
pr_link: https://github.com/stripe/stripe-php/pull/1837
released_in_version: 17.0.0
---

* Added type hints for method parameters
    * <img width="417" alt="PHPStorm IDE with array type hints" src="https://github.com/user-attachments/assets/e914dcda-354f-4df2-b82e-217ad931e71d">
* Improved type hints for resource properties that are not primitive types. Take for example, the invoice settings in Customer resource. Previously, you could not reference inner fields like `custom_fields` on `customer->invoice_settings` without PHPStan complaining. This is now fixed.
