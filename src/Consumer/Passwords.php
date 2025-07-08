<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Passwords API endpoints for Consumer
 */
class Passwords extends BaseApiClient
{
    /**
     * Authenticate password
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/passwords/authenticate', $data);
    }

    /**
     * Password reset by email start
     * 
     * @param array $data Reset data
     * @return array
     */
    public function resetByEmailStart(array $data): array
    {
        return $this->post('/v1/passwords/email/reset/start', $data);
    }

    /**
     * Password reset by email
     * 
     * @param array $data Reset data
     * @return array
     */
    public function resetByEmail(array $data): array
    {
        return $this->post('/v1/passwords/email/reset', $data);
    }

    /**
     * Password reset by existing password
     * 
     * @param array $data Reset data
     * @return array
     */
    public function resetByExistingPassword(array $data): array
    {
        return $this->post('/v1/passwords/existing_password/reset', $data);
    }

    /**
     * Password reset by session
     * 
     * @param array $data Reset data
     * @return array
     */
    public function resetBySession(array $data): array
    {
        return $this->post('/v1/passwords/session/reset', $data);
    }

    /**
     * Strength check
     * 
     * @param array $data Password data
     * @return array
     */
    public function strengthCheck(array $data): array
    {
        return $this->post('/v1/passwords/strength_check', $data);
    }

    /**
     * Migrate password
     * 
     * @param array $data Migration data
     * @return array
     */
    public function migrate(array $data): array
    {
        return $this->post('/v1/passwords/migrate', $data);
    }
} 