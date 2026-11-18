---
title: Prefix request ID to the error message as `[req_xxx]` if a request ID exists
---

`getMessage()` now returns `[req_xxx] message`, and `__toString()` no longer repeats the request ID as `(Request req_xxx)`.
