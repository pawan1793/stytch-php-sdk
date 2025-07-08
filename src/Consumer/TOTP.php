<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * TOTP API endpoints for Consumer
 */
class TOTP extends BaseApiClient
{
    /**
     * Create TOTP
     * 
     * @param array $data TOTP data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->post('/v1/totps/create', $data);
    }

    /**
     * Authenticate TOTP
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/totps/authenticate', $data);
    }

    /**
     * Get TOTP recovery codes
     * 
     * @param array $data Recovery data
     * @return array
     */
    public function getRecoveryCodes(array $data): array
    {
        return $this->post('/v1/totps/recovery_codes', $data);
    }

    /**
     * Recover TOTP
     * 
     * @param array $data Recovery data
     * @return array
     */
    public function recover(array $data): array
    {
        return $this->post('/v1/totps/recover', $data);
    }
} 