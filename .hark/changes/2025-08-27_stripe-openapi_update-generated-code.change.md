---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1888
is_stripe_api_change: true
released_in_version: 17.7.0-beta.1
---

* Add support for `all` and `retrieve` methods on resource `InvoicePayment`
* Add support for `all` method on resource `Mandate`
* Add support for `applied` on `V2.Core.Account.configuration.customer`, `V2.Core.Account.configuration.merchant`, `V2.Core.Account.configuration.recipient`, `V2.Core.Account.configuration.storer`, `V2\Core\Account.update().$params.configuration.customer`, `V2\Core\Account.update().$params.configuration.merchant`, `V2\Core\Account.update().$params.configuration.recipient`, and `V2\Core\Account.update().$params.configuration.storer`
* Add support for new values `ao_nif`, `az_tin`, `bd_etin`, `cr_cpj`, `cr_nite`, `do_rcn`, `gt_nit`, `kz_bin`, `mz_nuit`, `pe_ruc`, `pk_ntn`, `sa_crn`, and `sa_tin` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
* Add support for new values `ao_nif`, `az_tin`, `bd_brc`, `bd_etin`, `bd_nid`, `cr_cpf`, `cr_dimex`, `cr_nite`, `do_rcn`, `gt_nit`, `kz_iin`, `mz_nuit`, `pe_dni`, `pk_cnic`, `pk_snic`, and `sa_tin` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.Person.id_numbers[].type`
* Change type of `Billing.AlertTriggered.value` from `longInteger` to `decimal_string`
* Add support for `display_name` on `V2.MoneyManagement.FinancialAccount` and `V2\MoneyManagement\FinancialAccount.create().$params`
* Add support for new value `currency_conversion` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Add support for `currency_conversion` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* Add support for new value `currency_conversion` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* Add support for `payments` on `BalanceSettings.update().$params` and `BalanceSettings`
* Remove support for `debit_negative_balances`, `payouts`, and `settlement_timing` on `BalanceSettings.update().$params` and `BalanceSettings`
* Add support for `mandate` on `Charge.payment_method_details.pix`, `PaymentAttemptRecord.payment_method_details.pix`, and `PaymentRecord.payment_method_details.pix`
* Add support for `coupon_data` on `Checkout\Session.create().$params.discount`
* Add support for `mandate_options` on `Checkout.Session.payment_method_options.pix`, `Checkout\Session.create().$params.payment_method_option.pix`, `PaymentIntent.confirm().$params.payment_method_option.pix`, `PaymentIntent.create().$params.payment_method_option.pix`, `PaymentIntent.payment_method_options.pix`, and `PaymentIntent.update().$params.payment_method_option.pix`
* Change type of `Checkout.Session.payment_method_options.pix.setup_future_usage`, `Checkout\Session.create().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.confirm().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.create().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.payment_method_options.pix.setup_future_usage`, and `PaymentIntent.update().$params.payment_method_option.pix.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* Add support for `amount` on `Mandate.multi_use`, `PaymentAttemptRecord`, and `PaymentRecord`
* Add support for `currency` on `Mandate.multi_use`
* Add support for `pix` on `Mandate.payment_method_details`, `SetupAttempt.payment_method_details`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, and `SetupIntent.update().$params.payment_method_option`
* Add support for `limit` on `PaymentAttemptRecord.all().$params`
* Add support for `amount_authorized`, `amount_refunded`, and `application` on `PaymentAttemptRecord` and `PaymentRecord`
* Add support for `processor_details` on `PaymentAttemptRecord`, `PaymentRecord.report_payment().$params`, and `PaymentRecord`
* Remove support for `payment_reference` on `PaymentAttemptRecord`, `PaymentRecord.report_payment().$params`, and `PaymentRecord`
* Add support for `installments` on `PaymentAttemptRecord.payment_method_details.alma` and `PaymentRecord.payment_method_details.alma`
* Add support for `transaction_id` on `PaymentAttemptRecord.payment_method_details.alma`, `PaymentAttemptRecord.payment_method_details.amazon_pay`, `PaymentAttemptRecord.payment_method_details.billie`, `PaymentAttemptRecord.payment_method_details.kakao_pay`, `PaymentAttemptRecord.payment_method_details.kr_card`, `PaymentAttemptRecord.payment_method_details.naver_pay`, `PaymentAttemptRecord.payment_method_details.payco`, `PaymentAttemptRecord.payment_method_details.revolut_pay`, `PaymentAttemptRecord.payment_method_details.samsung_pay`, `PaymentAttemptRecord.payment_method_details.satispay`, `PaymentRecord.payment_method_details.alma`, `PaymentRecord.payment_method_details.amazon_pay`, `PaymentRecord.payment_method_details.billie`, `PaymentRecord.payment_method_details.kakao_pay`, `PaymentRecord.payment_method_details.kr_card`, `PaymentRecord.payment_method_details.naver_pay`, `PaymentRecord.payment_method_details.payco`, `PaymentRecord.payment_method_details.revolut_pay`, `PaymentRecord.payment_method_details.samsung_pay`, and `PaymentRecord.payment_method_details.satispay`
* Add support for `location` and `reader` on `PaymentAttemptRecord.payment_method_details.paynow` and `PaymentRecord.payment_method_details.paynow`
* Add support for `latest_active_mandate` on `PaymentMethod`
* Change `Payout.payout_method` to be required
* Add support for `metadata` and `period` on `QuotePreviewSubscriptionSchedule.phases[].add_invoice_items[]`
* Add support for `pix_display_qr_code` on `SetupIntent.next_action`
* Add support for `reader_security` on `Terminal.Configuration`, `Terminal\Configuration.create().$params`, and `Terminal\Configuration.update().$params`
* Add support for error codes `customer_session_expired` and `india_recurring_payment_mandate_canceled` on `QuotePreviewInvoice.last_finalization_error`
