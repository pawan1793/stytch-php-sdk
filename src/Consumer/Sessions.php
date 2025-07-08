<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Sessions API endpoints for Consumer
 */
class Sessions extends BaseApiClient
{
    /**
     * Get JWKS
     * 
     * @return array
     */
    public function getJWKs(): array
    {
        return $this->get('/v1/sessions/jwks');
    }

    /**
     * Get sessions
     * 
     * @param array $data Session data
     * @return array
     */
    public function getSessions(array $data): array
    {
        return $this->post('/v1/sessions/get', $data);
    }

    /**
     * Authenticate session
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/sessions/authenticate', $data);
    }

    /**
     * Revoke session
     * 
     * @param array $data Revoke data
     * @return array
     */
    public function revoke(array $data): array
    {
        return $this->post('/v1/sessions/revoke', $data);
    }
} 