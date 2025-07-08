<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Magic Links API endpoints for B2B
 */
class MagicLinks extends BaseApiClient
{
    /**
     * Send login or signup email
     * 
     * @param array $data Magic link data
     * @return array
     */
    public function send(array $data): array
    {
        return $this->post('/v1/b2b/magic_links/email/send', $data);
    }

    /**
     * Send invite email
     * 
     * @param array $data Invite data
     * @return array
     */
    public function sendInvite(array $data): array
    {
        return $this->post('/v1/b2b/magic_links/email/invite', $data);
    }

    /**
     * Authenticate magic link
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/b2b/magic_links/authenticate', $data);
    }

    /**
     * Send discovery email
     * 
     * @param array $data Discovery data
     * @return array
     */
    public function sendDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/magic_links/discovery/send', $data);
    }

    /**
     * Authenticate discovery magic link
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/magic_links/discovery/authenticate', $data);
    }
} 