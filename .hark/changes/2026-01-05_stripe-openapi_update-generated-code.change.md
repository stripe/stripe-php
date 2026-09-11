---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1979
is_stripe_api_change: true
released_in_version: 19.2.0-alpha.2
---

* Add support for new resource `Tax.Location`
* Add support for `all`, `create`, and `retrieve` methods on resource `Tax.Location`
* Add support for `pause` method on resource `Subscription`
* Add support for `performance_location` on `Checkout\Session.create().$params.line_item.price_datum.product_datum.tax_detail`, `Checkout\Session.update().$params.line_item.price_datum.product_datum.tax_detail`, `Invoice.add_lines().$params.line.price_datum.product_datum.tax_detail`, `Invoice.update_lines().$params.line.price_datum.product_datum.tax_detail`, `InvoiceLineItem.update().$params.price_datum.product_datum.tax_detail`, `PaymentLink.create().$params.line_item.price_datum.product_datum.tax_detail`, `Product.create().$params.tax_detail`, `Product.update().$params.tax_detail`, `Tax.CalculationLineItem`, and `Tax\Calculation.create().$params.line_item`
* Add support for new value `performance` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].sourcing`, `Tax.CalculationLineItem.tax_breakdown[].sourcing`, and `Tax.Transaction.shipping_cost.tax_breakdown[].sourcing`
* Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, and `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`
* Change type of `DelegatedCheckout\RequestedSession.update().$params.metadata` from `map(string: string)` to `emptyable(map(string: string))`
* Change type of `DelegatedCheckout\RequestedSession.update().$params.payment_method_data` from `payment_method_data` to `emptyable(payment_method_data)`
* Change type of `DelegatedCheckout\RequestedSession.update().$params.shared_metadata` from `map(string: string)` to `emptyable(map(string: string))`
* Add support for `subscription` on `Invoice.parent.schedule_details` and `QuotePreviewInvoice.parent.schedule_details`
* Change type of `PaymentIntent.confirm().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.create().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.update().$params.payment_detail.benefit.fr_meal_voucher`, `SetupIntent.confirm().$params.setup_detail.benefit.fr_meal_voucher`, `SetupIntent.create().$params.setup_detail.benefit.fr_meal_voucher`, and `SetupIntent.update().$params.setup_detail.benefit.fr_meal_voucher` from `payment_details_benefit_fr_meal_voucher` to `emptyable(payment_details_benefit_fr_meal_voucher)`
* Add support for `tax_details` on `Plan.create().$params.product` and `Price.create().$params.product_datum`
* Add support for `external_reference` on `Plan` and `Price`
* Add support for new value `phase_start` on enums `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at`
* Remove support for value `line_start` from enums `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at`
* Add support for `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on `Tax.Registration.country_options.us`
* Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enum `Tax.Registration.country_options.us.type`
* Add support for `requirements` on `TaxCode`
