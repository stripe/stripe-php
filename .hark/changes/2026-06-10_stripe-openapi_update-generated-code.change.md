---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2082
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.3.0-alpha.3
---

* Add support for new resources `GiftCardOperation`, `GiftCard`, and `TaxFund`
* Add support for `retrieve` method on resource `GiftCardOperation`
* Add support for `activate`, `cashout`, `check_balance`, `create`, `reload`, `retrieve`, and `void_operation` methods on resource `GiftCard`
* Add support for `all` and `retrieve` methods on resource `TaxFund`
* Add support for `update_crypto_refund_address` method on resource `PaymentIntent`
* Add support for `performance_location_details` on `Tax.CalculationLineItem`, `Tax.TransactionLineItem`, and `Tax\Calculation.create().$params.line_item`
* ⚠️ Remove support for `money_services` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, and `PaymentIntent.capture().$params.payment_detail`
* Add support for `fr_meal_voucher` on `Charge.payment_method_details.card.benefits`
* Add support for `multicapture` on `Charge.payment_method_details.card_present`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.card_present`
* Add support for `pix` on `Checkout.Session.current_attempt.payment_method_details`
* Add support for new value `jaywan` on enum `Checkout.Session.current_attempt.payment_method_details.card.brand`
* Add support for `provisional_credit` on `Issuing.Dispute` and `Issuing\Dispute.update().$params`
* Add support for `reason` on `PaymentAttemptRecord.report_canceled().$params` and `PaymentRecord.report_payment_attempt_canceled().$params`
* Add support for `fiserv_valuelink`, `givex`, and `svs` on `PaymentAttemptRecord.processor_details` and `PaymentRecord.processor_details`
* ⚠️ Change type of `PaymentAttemptRecord.processor_details.type` and `PaymentRecord.processor_details.type` from `literal('custom')` to `enum('custom'|'fiserv_valuelink'|'givex'|'svs')`
* Add support for `capture_by` and `capture_delay` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card_present`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card_present`, and `PaymentIntent.update().$params.payment_method_option.card`
* ⚠️ Remove support for `liquid_asset` on `PaymentIntent.confirm().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.update().$params.payment_method_option.card.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`
* Add support for `request_multicapture` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.payment_method_options.card_present`, and `PaymentIntent.update().$params.payment_method_option.card_present`
* Add support for `ignore_application_fee`, `ignore_transfer_data`, and `request_partial_authorization` on `PaymentIntent.confirm().$params.payment_method_option.gift_card`, `PaymentIntent.create().$params.payment_method_option.gift_card`, and `PaymentIntent.update().$params.payment_method_option.gift_card`
* Change `PaymentIntent.confirm().$params.payment_detail.benefit.fr_meal_voucher.siret`, `PaymentIntent.create().$params.payment_detail.benefit.fr_meal_voucher.siret`, `PaymentIntent.update().$params.payment_detail.benefit.fr_meal_voucher.siret`, `SetupIntent.confirm().$params.setup_detail.benefit.fr_meal_voucher.siret`, `SetupIntent.create().$params.setup_detail.benefit.fr_meal_voucher.siret`, and `SetupIntent.update().$params.setup_detail.benefit.fr_meal_voucher.siret` to be optional
* Add support for `latest_payment_attempt_record` and `payment_record` on `PaymentIntent`
* ⚠️ Remove support for `reauthorization` and `reauthorize_before` on `PaymentIntent.advanced_feature_details`
* Add support for `refund_address` on `PaymentIntent.next_action.crypto_display_details.deposit_addresses.base`, `PaymentIntent.next_action.crypto_display_details.deposit_addresses.solana`, and `PaymentIntent.next_action.crypto_display_details.deposit_addresses.tempo`
* Add support for `location` on `PaymentIntent.payment_details` and `SetupIntent.setup_details`
* Add support for new value `transaction_verification` on enum `PaymentIntent.payment_method_options.crypto.mode`
* Add support for `data` on `Radar\AccountEvaluation.create().$params.login_initiated.client_device_metadata_detail`, `Radar\AccountEvaluation.create().$params.registration_initiated.client_device_metadata_detail`, and `Radar\CustomerEvaluation.create().$params.evaluation_context.client_detail`
* Change `Radar\AccountEvaluation.create().$params.login_initiated.client_device_metadata_detail.radar_session`, `Radar\AccountEvaluation.create().$params.registration_initiated.client_device_metadata_detail.radar_session`, and `Radar\CustomerEvaluation.create().$params.evaluation_context.client_detail.radar_session` to be optional
* Add support for new value `promotion` on enum `V2.Commerce.ProductCatalogImport.feed_type`
* ⚠️ Change type of `V2.Core.FeeBatch.adjustments.tax_adjustment` from `amount` to `an object`
* ⚠️ Change type of `V2.Core.FeeBatch.amount`, `V2.Core.FeeBatch.collection_records[].amount`, `V2.Core.FeeBatch.collection_records[].tax.amount`, `V2.Core.FeeBatch.tax.amount`, `V2.Core.FeeEntry.amount`, and `V2.Core.FeeEntry.tax.amount` from `amount` to `an object`
* Add support for new value `tax_fund` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Add support for `tax_fund` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* Add support for new value `tax_fund` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
