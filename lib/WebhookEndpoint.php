<?php

namespace Stripe;

/**
 * You can configure <a href="https://stripe.com/docs/webhooks/">webhook
 * endpoints</a> via the API to be notified about events that happen in your Stripe
 * account or connected accounts.
 *
 * Most users configure webhooks from <a
 * href="https://dashboard.stripe.com/webhooks">the dashboard</a>, which provides a
 * user interface for registering and testing your webhook endpoints.
 *
 * Related guide: <a href="https://stripe.com/docs/webhooks/configure">Setting up
 * Webhooks</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $api_version The API version events are rendered as for this webhook endpoint.
 * @property null|string $application The ID of the associated Connect application.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $description An optional description of what the webhook is used for.
 * @property string[] $enabled_events The list of events to enable for this endpoint. <code>['*']</code> indicates that all events are enabled, except those that require explicit selection.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $secret The endpoint's secret, used to generate <a href="https://stripe.com/docs/webhooks/signatures">webhook signatures</a>. Only returned at creation.
 * @property string $status The status of the webhook. It can be <code>enabled</code> or <code>disabled</code>.
 * @property string $url The URL of the webhook endpoint.
 */
class WebhookEndpoint extends ApiResource
{
    const OBJECT_NAME = 'webhook_endpoint';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const API_VERSION_2011_01_01 = '2011-01-01';
    const API_VERSION_2011_06_21 = '2011-06-21';
    const API_VERSION_2011_06_28 = '2011-06-28';
    const API_VERSION_2011_08_01 = '2011-08-01';
    const API_VERSION_2011_09_15 = '2011-09-15';
    const API_VERSION_2011_11_17 = '2011-11-17';
    const API_VERSION_2012_02_23 = '2012-02-23';
    const API_VERSION_2012_03_25 = '2012-03-25';
    const API_VERSION_2012_06_18 = '2012-06-18';
    const API_VERSION_2012_06_28 = '2012-06-28';
    const API_VERSION_2012_07_09 = '2012-07-09';
    const API_VERSION_2012_09_24 = '2012-09-24';
    const API_VERSION_2012_10_26 = '2012-10-26';
    const API_VERSION_2012_11_07 = '2012-11-07';
    const API_VERSION_2013_02_11 = '2013-02-11';
    const API_VERSION_2013_02_13 = '2013-02-13';
    const API_VERSION_2013_07_05 = '2013-07-05';
    const API_VERSION_2013_08_12 = '2013-08-12';
    const API_VERSION_2013_08_13 = '2013-08-13';
    const API_VERSION_2013_10_29 = '2013-10-29';
    const API_VERSION_2013_12_03 = '2013-12-03';
    const API_VERSION_2014_01_31 = '2014-01-31';
    const API_VERSION_2014_03_13 = '2014-03-13';
    const API_VERSION_2014_03_28 = '2014-03-28';
    const API_VERSION_2014_05_19 = '2014-05-19';
    const API_VERSION_2014_06_13 = '2014-06-13';
    const API_VERSION_2014_06_17 = '2014-06-17';
    const API_VERSION_2014_07_22 = '2014-07-22';
    const API_VERSION_2014_07_26 = '2014-07-26';
    const API_VERSION_2014_08_04 = '2014-08-04';
    const API_VERSION_2014_08_20 = '2014-08-20';
    const API_VERSION_2014_09_08 = '2014-09-08';
    const API_VERSION_2014_10_07 = '2014-10-07';
    const API_VERSION_2014_11_05 = '2014-11-05';
    const API_VERSION_2014_11_20 = '2014-11-20';
    const API_VERSION_2014_12_08 = '2014-12-08';
    const API_VERSION_2014_12_17 = '2014-12-17';
    const API_VERSION_2014_12_22 = '2014-12-22';
    const API_VERSION_2015_01_11 = '2015-01-11';
    const API_VERSION_2015_01_26 = '2015-01-26';
    const API_VERSION_2015_02_10 = '2015-02-10';
    const API_VERSION_2015_02_16 = '2015-02-16';
    const API_VERSION_2015_02_18 = '2015-02-18';
    const API_VERSION_2015_03_24 = '2015-03-24';
    const API_VERSION_2015_04_07 = '2015-04-07';
    const API_VERSION_2015_06_15 = '2015-06-15';
    const API_VERSION_2015_07_07 = '2015-07-07';
    const API_VERSION_2015_07_13 = '2015-07-13';
    const API_VERSION_2015_07_28 = '2015-07-28';
    const API_VERSION_2015_08_07 = '2015-08-07';
    const API_VERSION_2015_08_19 = '2015-08-19';
    const API_VERSION_2015_09_03 = '2015-09-03';
    const API_VERSION_2015_09_08 = '2015-09-08';
    const API_VERSION_2015_09_23 = '2015-09-23';
    const API_VERSION_2015_10_01 = '2015-10-01';
    const API_VERSION_2015_10_12 = '2015-10-12';
    const API_VERSION_2015_10_16 = '2015-10-16';
    const API_VERSION_2016_02_03 = '2016-02-03';
    const API_VERSION_2016_02_19 = '2016-02-19';
    const API_VERSION_2016_02_22 = '2016-02-22';
    const API_VERSION_2016_02_23 = '2016-02-23';
    const API_VERSION_2016_02_29 = '2016-02-29';
    const API_VERSION_2016_03_07 = '2016-03-07';
    const API_VERSION_2016_06_15 = '2016-06-15';
    const API_VERSION_2016_07_06 = '2016-07-06';
    const API_VERSION_2016_10_19 = '2016-10-19';
    const API_VERSION_2017_01_27 = '2017-01-27';
    const API_VERSION_2017_02_14 = '2017-02-14';
    const API_VERSION_2017_04_06 = '2017-04-06';
    const API_VERSION_2017_05_25 = '2017-05-25';
    const API_VERSION_2017_06_05 = '2017-06-05';
    const API_VERSION_2017_08_15 = '2017-08-15';
    const API_VERSION_2017_12_14 = '2017-12-14';
    const API_VERSION_2018_01_23 = '2018-01-23';
    const API_VERSION_2018_02_05 = '2018-02-05';
    const API_VERSION_2018_02_06 = '2018-02-06';
    const API_VERSION_2018_02_28 = '2018-02-28';
    const API_VERSION_2018_05_21 = '2018-05-21';
    const API_VERSION_2018_07_27 = '2018-07-27';
    const API_VERSION_2018_08_23 = '2018-08-23';
    const API_VERSION_2018_09_06 = '2018-09-06';
    const API_VERSION_2018_09_24 = '2018-09-24';
    const API_VERSION_2018_10_31 = '2018-10-31';
    const API_VERSION_2018_11_08 = '2018-11-08';
    const API_VERSION_2019_02_11 = '2019-02-11';
    const API_VERSION_2019_02_19 = '2019-02-19';
    const API_VERSION_2019_03_14 = '2019-03-14';
    const API_VERSION_2019_05_16 = '2019-05-16';
    const API_VERSION_2019_08_14 = '2019-08-14';
    const API_VERSION_2019_09_09 = '2019-09-09';
    const API_VERSION_2019_10_08 = '2019-10-08';
    const API_VERSION_2019_10_17 = '2019-10-17';
    const API_VERSION_2019_11_05 = '2019-11-05';
    const API_VERSION_2019_12_03 = '2019-12-03';
    const API_VERSION_2020_03_02 = '2020-03-02';
}
