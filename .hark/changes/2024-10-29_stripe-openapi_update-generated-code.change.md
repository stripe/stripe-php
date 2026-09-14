---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1772
is_stripe_api_change: true
released_in_version: 16.2.0
---

* Add support for new resource `V2.EventDestinations`
* Add support for `create`, `retrieve`, `update`, `list`, `delete`, `disable`, `enable` and `ping` methods on resource `V2.EventDestinations`
* Add support for `submit_card` test helper method on resource `Issuing.Card`
* Add support for `groups` on `Account`
* Add support for `enhanced_eligibility_types` on `Dispute`
* Add support for new values `issuing_transaction.purchase_details_receipt_updated` and `refund.failed` on enum `Event.type`
* Add support for `metadata` on `Forwarding.Request`
* Add support for new value `alma` on enum `PaymentLink.payment_method_types[]`
* Add support for `alma` on `PaymentMethodConfiguration` and `PaymentMethod`
* Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethod`
* Add support for new values `alma`, `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on enum `PaymentMethod.type`
* Add support for `amazon_pay` on `PaymentMethodDomain`
* Add support for new values `by_tin`, `ma_vat`, `md_vat`, `tz_vat`, `uz_tin`, and `uz_vat` on enum `TaxId.type`
* Add support for `flat_amount` and `rate_type` on `TaxRate`
* Add support for new value `retail_delivery_fee` on enum `TaxRate.tax_type`
