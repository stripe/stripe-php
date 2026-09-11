---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1988
is_stripe_api_change: true
released_in_version: 19.4.0-beta.1
---

* Add support for new resource `FinancialConnections.Authorization`
* Add support for `retrieve` method on resource `FinancialConnections.Authorization`
* Add support for `detach_payment` method on resource `Invoice`
* Remove support for `cancel`, `list_line_items`, and `reopen` methods on resource `Order`
* Remove support for `attach_cadence` method on resource `Subscription`
* Add support for `additional_files` and `site` on `Account.create().$params.setting.paypay_payment`, `Account.settings.paypay_payments`, and `Account.update().$params.setting.paypay_payment`
* Remove support for `capital` on `Account.settings`
* Change type of `Charge.payment_method_details.stripe_balance.source_type`, `ConfirmationToken.payment_method_preview.stripe_balance.source_type`, `PaymentAttemptRecord.payment_method_details.stripe_balance.source_type`, `PaymentMethod.stripe_balance.source_type`, and `PaymentRecord.payment_method_details.stripe_balance.source_type` from `enum('bank_account'|'card'|'fpx')` to `nullable(enum('bank_account'|'card'|'fpx'))`
* Add support for new value `pl_nip` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Order.tax_details.tax_ids[].type`, and `QuotePreviewInvoice.customer_tax_ids[].type`
* Add support for new value `capital.financing_summary.line_of_credit_update` on enum `Event.type`
* Add support for `authorization` and `status_details` on `FinancialConnections.Account`
* Add support for `relink_options` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
* Change `FinancialConnections\Session.create().$params.account_holder` to be optional
* Add support for `relink_result` on `FinancialConnections.Session`
* Remove support for `billing_cadence` on `Invoice.create_preview().$params`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
* Remove support for `billing_cadence_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
* Remove support for value `billing_cadence_details` from enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
* Add support for `car_rental_data`, `flight_data`, and `lodging_data` on `PaymentIntent.payment_details`
* Change `QuotePreviewInvoice.payment_settings.payment_method_options.payto` to be required
* Add support for new values `ae_bank_account`, `ag_bank_account`, `bh_bank_account`, `gm_bank_account`, `hk_bank_account`, `kh_bank_account`, `lc_bank_account`, `mc_bank_account`, `mg_bank_account`, `my_bank_account`, `qa_bank_account`, `rw_bank_account`, `th_bank_account`, `tt_bank_account`, and `vn_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for `alternative_reference` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod`
* Add support for `account_holder_address` and `account_holder_name` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
* Add support for `fingerprint` on `V2.MoneyManagement.PayoutMethod.card`
* Add support for snapshot event `INVOICE_PAYMENT_DETACHED` with resource `InvoicePayment`
* Add support for error code `request_blocked` on `QuotePreviewInvoice.last_finalization_error`
