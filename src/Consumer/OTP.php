<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * OTP API endpoints for Consumer
 */
class OTP extends BaseApiClient
{
    /**
     * Send OTP via SMS
     * 
     * @param array $data SMS data
     * @return array
     */
    public function sendSMS(array $data): array
    {
        return $this->post('/v1/otps/sms/send', $data);
    }

    /**
     * Login or create user via SMS
     * 
     * @param array $data Login data
     * @return array
     */
    public function loginOrCreateSMS(array $data): array
    {
        return $this->post('/v1/otps/sms/login_or_create', $data);
    }

    /**
     * Send OTP via WhatsApp
     * 
     * @param array $data WhatsApp data
     * @return array
     */
    public function sendWhatsApp(array $data): array
    {
        return $this->post('/v1/otps/whatsapp/send', $data);
    }

    /**
     * Login or create user via WhatsApp
     * 
     * @param array $data Login data
     * @return array
     */
    public function loginOrCreateWhatsApp(array $data): array
    {
        return $this->post('/v1/otps/whatsapp/login_or_create', $data);
    }

    /**
     * Send OTP via email
     * 
     * @param array $data Email data
     * @return array
     */
    public function sendEmail(array $data): array
    {
        return $this->post('/v1/otps/email/send', $data);
    }

    /**
     * Login or create user via email
     * 
     * @param array $data Login data
     * @return array
     */
    public function loginOrCreateEmail(array $data): array
    {
        return $this->post('/v1/otps/email/login_or_create', $data);
    }

    /**
     * Authenticate OTP
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/otps/authenticate', $data);
    }
} 