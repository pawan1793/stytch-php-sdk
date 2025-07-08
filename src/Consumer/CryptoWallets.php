<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Crypto Wallets API endpoints for Consumer
 */
class CryptoWallets extends BaseApiClient
{
    /**
     * Start crypto wallet authentication
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateStart(array $data): array
    {
        return $this->post('/v1/crypto_wallets/authenticate/start', $data);
    }

    /**
     * Authenticate crypto wallet
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/crypto_wallets/authenticate', $data);
    }
} 