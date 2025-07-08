<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Passkeys & WebAuthn API endpoints for Consumer
 */
class Passkeys extends BaseApiClient
{
    /**
     * Start WebAuthn registration
     * 
     * @param array $data Registration data
     * @return array
     */
    public function registerStart(array $data): array
    {
        return $this->post('/v1/webauthn/register/start', $data);
    }

    /**
     * Complete WebAuthn registration
     * 
     * @param array $data Registration data
     * @return array
     */
    public function register(array $data): array
    {
        return $this->post('/v1/webauthn/register', $data);
    }

    /**
     * Start WebAuthn authentication
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateStart(array $data): array
    {
        return $this->post('/v1/webauthn/authenticate/start', $data);
    }

    /**
     * Complete WebAuthn authentication
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/webauthn/authenticate', $data);
    }

    /**
     * Update WebAuthn registration
     * 
     * @param array $data Update data
     * @return array
     */
    public function updateRegistration(array $data): array
    {
        return $this->post('/v1/webauthn/update', $data);
    }
} 