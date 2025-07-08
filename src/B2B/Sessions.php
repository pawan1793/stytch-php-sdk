<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Sessions API endpoints for B2B
 */
class Sessions extends BaseApiClient
{
    /**
     * Get JWKs
     * 
     * @return array
     */
    public function getJWKs(): array
    {
        return $this->get('/v1/b2b/sessions/jwks');
    }

    /**
     * Get session
     * 
     * @param array $data Session data
     * @return array
     */
    public function getSession(array $data): array
    {
        return $this->post('/v1/b2b/sessions/get', $data);
    }

    /**
     * Authenticate session
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/b2b/sessions/authenticate', $data);
    }

    /**
     * Exchange session
     * 
     * @param array $data Exchange data
     * @return array
     */
    public function exchange(array $data): array
    {
        return $this->post('/v1/b2b/sessions/exchange', $data);
    }

    /**
     * Revoke session
     * 
     * @param array $data Revoke data
     * @return array
     */
    public function revoke(array $data): array
    {
        return $this->post('/v1/b2b/sessions/revoke', $data);
    }
} 