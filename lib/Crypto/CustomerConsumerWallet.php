<?php

// File generated from our OpenAPI spec

namespace Stripe\Crypto;

/**
 * A consumer wallet represents a cryptocurrency wallet address associated with a Crypto Customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $network The blockchain network for this wallet
 * @property bool $verified_ownership Whether ownership of this wallet has been verified
 * @property string $wallet_address The wallet address
 */
class CustomerConsumerWallet extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'crypto.consumer_wallet';

    const NETWORK_APTOS = 'aptos';
    const NETWORK_AVALANCHE = 'avalanche';
    const NETWORK_BASE = 'base';
    const NETWORK_BITCOIN = 'bitcoin';
    const NETWORK_ETHEREUM = 'ethereum';
    const NETWORK_OPTIMISM = 'optimism';
    const NETWORK_POLYGON = 'polygon';
    const NETWORK_SOLANA = 'solana';
    const NETWORK_STELLAR = 'stellar';
    const NETWORK_SUI = 'sui';
    const NETWORK_WORLDCHAIN = 'worldchain';
}
