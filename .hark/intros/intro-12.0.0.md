**⚠️ ACTION REQUIRED: the breaking change in this release likely affects you ⚠️**

### Version pinning


In this release, Stripe API Version `2023-08-16` (the latest at time of release) will be sent by default on all requests. This is a significant change with wide ramifications. The API version affects the properties you see on responses, the parameters you are allowed to send on requests, and so on. The previous default was to use your [Stripe account's default API version](https://stripe.com/docs/development/dashboard/request-logs#view-your-default-api-version).

To successfully upgrade to stripe-php v12, you must either

1. **(Recommended) Upgrade your integration to be compatible with API Version `2023-08-16`.**

   Please read the API Changelog carefully for each API Version from `2023-08-16` back to your [Stripe account's default API version](https://stripe.com/docs/development/dashboard/request-logs#view-your-default-api-version). Determine if you are using any of the APIs that have changed in a breaking way, and adjust your integration accordingly. Carefully test your changes with Stripe [Test Mode](https://stripe.com/docs/keys#test-live-modes) before deploying them to production.

   You can read the [v12 migration guide](https://github.com/stripe/stripe-php/wiki/Migration-guide-for-v12) for more detailed instructions.
2. **(Alternative option) Specify a version other than `2023-08-16` when initializing `stripe-php`.**

     If you were previously initializing stripe-php without an explicit API Version, you can postpone modifying your integration by specifying a version equal to your [Stripe account's default API version](https://stripe.com/docs/development/dashboard/request-logs#view-your-default-api-version). For example:

     ```diff
       // if using StripeClient
     - $stripe = new \Stripe\StripeClient('sk_test_xyz');
     + $stripe = new \Stripe\StripeClient([
     +   'api_key' => 'sk_test_xyz',
         'stripe_version' => '2020-08-27',
     + ]);

       // if using the global client
       Stripe.apiKey = "sk_test_xyz";
     + Stripe::setApiVersion('2020-08-27');
     ```

     If you were already initializing stripe-php with an explicit API Version, upgrading to v12 will not affect your integration.

     Read the [v12 migration guide](https://github.com/stripe/stripe-php/wiki/Migration-guide-for-v12) for more details.

    Going forward, each major release of this library will be *pinned* by default to the latest Stripe API Version at the time of release.

    That is, instead of upgrading stripe-php and separately upgrading your Stripe API Version through the Stripe Dashboard, whenever you upgrade major versions of stripe-php, you should also upgrade your integration to be compatible with the latest Stripe API version.

### Other changes

" ⚠️" symbol highlights breaking changes.
