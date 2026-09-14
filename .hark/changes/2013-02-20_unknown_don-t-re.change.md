---
title: Don't re-encode strings that are already encoded in UTF-8. If you were previously using plan or coupon objects with UTF-8 IDs, they may have been treated as ISO-8859-1 (Latin-1) and encoded to UTF-8 a 2nd time. You may now need to pass the IDs to utf8_encode before passing them to Stripe_Plan::retrieve or Stripe_Coupon::retrieve.
released_in_version: 1.7.14
---
