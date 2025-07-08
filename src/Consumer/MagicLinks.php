<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Magic Links API endpoints for Consumer
 */
class MagicLinks extends BaseApiClient
{
    /**
     * Send magic link via email
     * 
     * @param array $data Magic link data
     * @return array
     */
    public function send(array $data): array
    {
        return $this->post('/v1/magic_links/email/send', $data);
    }

    /**
     * Login or create user
     * 
     * @param array $data Login data
     * @return array
     */
    public function loginOrCreate(array $data): array
    {
        return $this->post('/v1/magic_links/email/login_or_create', $data);
    }

    /**
     * Invite user
     * 
     * @param array $data Invite data
     * @return array
     */
    public function invite(array $data): array
    {
        return $this->post('/v1/magic_links/email/invite', $data);
    }

    /**
     * Revoke invite
     * 
     * @param array $data Revoke data
     * @return array
     */
    public function revokeInvite(array $data): array
    {
        return $this->post('/v1/magic_links/email/revoke_invite', $data);
    }

    /**
     * Create embeddable magic link
     * 
     * @param array $data Embeddable data
     * @return array
     */
    public function createEmbeddable(array $data): array
    {
        return $this->post('/v1/magic_links/embeddable', $data);
    }

    /**
     * Authenticate magic link
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/magic_links/authenticate', $data);
    }
} 