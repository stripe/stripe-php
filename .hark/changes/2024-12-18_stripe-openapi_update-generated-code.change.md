---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1793
is_stripe_api_change: true
released_in_version: 16.4.0
---

* Add support for new values `payout_minimum_balance_hold` and `payout_minimum_balance_release` on enum `BalanceTransaction.type`
* Add support for `allow_redisplay` on `Card` and `Source`
* Add support for `regulated_status` on `Card`
* Add support for new value `request_signature` on enum `Forwarding.Request.replacements[]`
* Change type of `LineItem.description` from `string` to `nullable(string)`
* Add support for new values `al_tin`, `am_tin`, `ao_tin`, `ba_tin`, `bb_tin`, `bs_tin`, `cd_nif`, `gn_nif`, `kh_tin`, `me_pib`, `mk_vat`, `mr_nif`, `np_pan`, `sn_ninea`, `sr_fin`, `tj_tin`, `ug_tin`, `zm_tin`, and `zw_tin` on enum `TaxId.type`
