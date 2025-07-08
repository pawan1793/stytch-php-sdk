<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Email OTP API endpoints for B2B
 */
class EmailOTP extends BaseApiClient
{
    /**
     * Send login or signup email
     * 
     * @param array $data Email data
     * @return array
     */
    public function send(array $data): array
    {
        return $this->post('/v1/b2b/otps/email/send', $data);
    }

    /**
     * Authenticate one-time passcode
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/b2b/otps/email/authenticate', $data);
    }

    /**
     * Send discovery email OTP
     * 
     * @param array $data Discovery data
     * @return array
     */
    public function sendDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/otps/discovery/send', $data);
    }

    /**
     * Authenticate discovery one-time passcode
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/otps/discovery/authenticate', $data);
    }
} 