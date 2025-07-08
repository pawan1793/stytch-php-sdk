<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Impersonation API endpoints for B2B
 */
class Impersonation extends BaseApiClient
{
    /**
     * Authenticate impersonation token
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/b2b/impersonation/authenticate', $data);
    }
} 