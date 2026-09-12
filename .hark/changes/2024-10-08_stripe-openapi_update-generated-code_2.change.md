---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1749
is_stripe_api_change: true
released_in_version: 16.2.0-beta.2
---

* Add support for `submit_card` test helper method on resource `Issuing.Card`
* Add support for `groups` on `Account`
* Add support for new value `payout_statement_descriptor_profanity` on enum `StripeError.code`
* Add support for new value `refund.failed` on enum `Event.type`
* Add support for `metadata` on `Forwarding.Request`
* Add support for new value `expired` on enum `Issuing.Authorization.status`
* Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethod`
* Add support for new values `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on enum `PaymentMethod.type`
* Add support for new values `by_tin`, `ma_vat`, `md_vat`, `tz_vat`, `uz_tin`, and `uz_vat` on enum `TaxId.type`
* Add support for `flat_amount` and `rate_type` on `TaxRate`
* Add support for new value `retail_delivery_fee` on enum `TaxRate.tax_type`
