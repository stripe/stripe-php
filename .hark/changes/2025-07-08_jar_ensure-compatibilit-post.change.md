---
title: Ensure compatibility with POST on older versions of libcurl
pr_link: https://github.com/stripe/stripe-php/pull/1881
released_in_version: 17.5.0
---

* Fixes an issue with older versions of php/libcurl where certain SDK calls that have empty POST bodies will result in a 400 Bad Request returned from the server.
