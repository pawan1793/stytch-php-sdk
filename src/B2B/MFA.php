<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * MFA API endpoints for B2B
 */
class MFA extends BaseApiClient
{
    /**
     * Create TOTP
     * 
     * @param array $data TOTP data
     * @return array
     */
    public function createTOTP(array $data): array
    {
        return $this->post('/v1/b2b/totps/create', $data);
    }

    /**
     * Authenticate TOTP
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateTOTP(array $data): array
    {
        return $this->post('/v1/b2b/totps/authenticate', $data);
    }

    /**
     * Migrate TOTP
     * 
     * @param array $data Migration data
     * @return array
     */
    public function migrateTOTP(array $data): array
    {
        return $this->post('/v1/b2b/totps/migrate', $data);
    }

    /**
     * OTP SMS send
     * 
     * @param array $data SMS data
     * @return array
     */
    public function sendOTPSMS(array $data): array
    {
        return $this->post('/v1/b2b/otps/sms/send', $data);
    }

    /**
     * OTP SMS authenticate
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateOTPSMS(array $data): array
    {
        return $this->post('/v1/b2b/otps/sms/authenticate', $data);
    }

    /**
     * Get recovery codes
     * 
     * @param array $data Recovery data
     * @return array
     */
    public function getRecoveryCodes(array $data): array
    {
        return $this->post('/v1/b2b/recovery_codes/get', $data);
    }

    /**
     * Recover with recovery codes
     * 
     * @param array $data Recovery data
     * @return array
     */
    public function recover(array $data): array
    {
        return $this->post('/v1/b2b/recovery_codes/recover', $data);
    }

    /**
     * Rotate recovery codes
     * 
     * @param array $data Rotation data
     * @return array
     */
    public function rotateRecoveryCodes(array $data): array
    {
        return $this->post('/v1/b2b/recovery_codes/rotate', $data);
    }
} 