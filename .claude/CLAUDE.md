# stripe-php

## Testing

- Run all tests: `just test`
- Run specific test: `just test --filter testMethodName`
- Run specific test file: `just test tests/Stripe/SomeTest.php`
- Tests use PHPUnit

## Formatting & Linting

- Format: `just format` (uses php-cs-fixer)
- Lint/static analysis: `just lint` (uses PHPStan)

## Key Locations

- HTTP client interface: `lib/HttpClient/ClientInterface.php`
- cURL HTTP implementation: `lib/HttpClient/CurlClient.php`
- Streaming client interface: `lib/HttpClient/StreamingClientInterface.php`
- Base client (request building, auth): `lib/BaseStripeClient.php`
- Main client class: `lib/StripeClient.php`
- Version/config: `lib/Stripe.php`

## Generated Code

- Files containing `File generated from our OpenAPI spec` at the top are generated; do not edit. Similarly, any code block starting with `The beginning of the section generated from our OpenAPI spec` is generated and should not be edited directly.
    - If something in a generated file/range needs to be updated, add a summary of the change to your report but don't attempt to edit it directly.
- Resource classes under `lib/` (e.g. `lib/Customer.php`, `lib/Service/`) are largely generated.
- The `HttpClient/` directory and `BaseStripeClient.php` are NOT generated.

## Conventions

- Uses PHP cURL extension for HTTP
- Composer for dependency management
- Vendored executables in `vendor/bin/`
- Work is not complete until `just test` and `just lint` complete successfully.
- All code must run on all supported PHP versions (full list in the test section of @.github/workflows/ci.yml)

### Comments

- Comments MUST only be used to:
    1. Document a function
    2. Explain the WHY of a piece of code
    3. Explain a particularly complicated piece of code
- Comments NEVER should be used to:
    1. Say what used to be there. That's no longer relevant!
    2. Explain the WHAT of a piece of code (unless it's very non-obvious)

It's ok not to put comments on/in a function if their addition wouldn't meaningfully clarify anything.
