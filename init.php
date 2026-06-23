<?php

require __DIR__ . '/lib/version_check.php';


// Stripe singleton
require __DIR__ . '/lib/Stripe.php';

// Stripe Context
require __DIR__ . '/lib/StripeContext.php';

// Utilities
require __DIR__ . '/lib/Util/CaseInsensitiveArray.php';
require __DIR__ . '/lib/Util/LoggerInterface.php';
require __DIR__ . '/lib/Util/DefaultLogger.php';
require __DIR__ . '/lib/Util/RandomGenerator.php';
require __DIR__ . '/lib/Util/RequestOptions.php';
require __DIR__ . '/lib/Util/Set.php';
require __DIR__ . '/lib/Util/Util.php';
require __DIR__ . '/lib/Util/EventTypes.php';
require __DIR__ . '/lib/Util/EventNotificationTypes.php';
require __DIR__ . '/lib/Util/Int64.php';
require __DIR__ . '/lib/Util/ObjectTypes.php';

// HttpClient
require __DIR__ . '/lib/HttpClient/ClientInterface.php';
require __DIR__ . '/lib/HttpClient/StreamingClientInterface.php';
require __DIR__ . '/lib/HttpClient/CurlClient.php';

// Exceptions
require __DIR__ . '/lib/Exception/ExceptionInterface.php';
require __DIR__ . '/lib/Exception/ApiErrorException.php';
require __DIR__ . '/lib/Exception/ApiConnectionException.php';
require __DIR__ . '/lib/Exception/AuthenticationException.php';
require __DIR__ . '/lib/Exception/BadMethodCallException.php';
require __DIR__ . '/lib/Exception/CardException.php';
require __DIR__ . '/lib/Exception/IdempotencyException.php';
require __DIR__ . '/lib/Exception/InvalidArgumentException.php';
require __DIR__ . '/lib/Exception/InvalidRequestException.php';
require __DIR__ . '/lib/Exception/PermissionException.php';
require __DIR__ . '/lib/Exception/SignatureVerificationException.php';
require __DIR__ . '/lib/Exception/UnexpectedValueException.php';
require __DIR__ . '/lib/Exception/UnknownApiErrorException.php';

// OAuth exceptions
require __DIR__ . '/lib/Exception/OAuth/ExceptionInterface.php';
require __DIR__ . '/lib/Exception/OAuth/OAuthErrorException.php';
require __DIR__ . '/lib/Exception/OAuth/InvalidClientException.php';
require __DIR__ . '/lib/Exception/OAuth/InvalidGrantException.php';
require __DIR__ . '/lib/Exception/OAuth/InvalidRequestException.php';
require __DIR__ . '/lib/Exception/OAuth/InvalidScopeException.php';
require __DIR__ . '/lib/Exception/OAuth/UnknownOAuthErrorException.php';
require __DIR__ . '/lib/Exception/OAuth/UnsupportedGrantTypeException.php';
require __DIR__ . '/lib/Exception/OAuth/UnsupportedResponseTypeException.php';

// API operations
require __DIR__ . '/lib/ApiOperations/All.php';
require __DIR__ . '/lib/ApiOperations/Create.php';
require __DIR__ . '/lib/ApiOperations/Delete.php';
require __DIR__ . '/lib/ApiOperations/NestedResource.php';
require __DIR__ . '/lib/ApiOperations/Request.php';
require __DIR__ . '/lib/ApiOperations/Retrieve.php';
require __DIR__ . '/lib/ApiOperations/SingletonRetrieve.php';
require __DIR__ . '/lib/ApiOperations/Update.php';

// Plumbing
require __DIR__ . '/lib/ApiResponse.php';
require __DIR__ . '/lib/RequestTelemetry.php';
require __DIR__ . '/lib/StripeObject.php';
require __DIR__ . '/lib/ApiRequestor.php';
require __DIR__ . '/lib/ApiResource.php';
require __DIR__ . '/lib/SingletonApiResource.php';
require __DIR__ . '/lib/Service/ServiceNavigatorTrait.php';
require __DIR__ . '/lib/Service/AbstractService.php';
require __DIR__ . '/lib/Service/AbstractServiceFactory.php';
require __DIR__ . '/lib/V2/Core/Event.php';
require __DIR__ . '/lib/V2/Core/EventNotification.php';
require __DIR__ . '/lib/Events/UnknownEventNotification.php';
require __DIR__ . '/lib/Reason.php';
require __DIR__ . '/lib/RelatedObject.php';
require __DIR__ . '/lib/Collection.php';
require __DIR__ . '/lib/V2/Collection.php';
require __DIR__ . '/lib/V2/DeletedObject.php';
require __DIR__ . '/lib/SearchResult.php';
require __DIR__ . '/lib/ErrorObject.php';
require __DIR__ . '/lib/Issuing/CardDetails.php';

// StripeClient
require __DIR__ . '/lib/BaseStripeClientInterface.php';
require __DIR__ . '/lib/StripeClientInterface.php';
require __DIR__ . '/lib/StripeStreamingClientInterface.php';
require __DIR__ . '/lib/BaseStripeClient.php';
require __DIR__ . '/lib/StripeClient.php';

// EventRouter
require __DIR__ . '/lib/StripeEventNotificationHandler.php';

// The beginning of the section generated from our OpenAPI spec
// The end of the section generated from our OpenAPI spec

// OAuth
require __DIR__ . '/lib/OAuth.php';
require __DIR__ . '/lib/OAuthErrorObject.php';
require __DIR__ . '/lib/Service/OAuthService.php';

// Webhooks
require __DIR__ . '/lib/Webhook.php';
require __DIR__ . '/lib/WebhookSignature.php';
