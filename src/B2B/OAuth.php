<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * OAuth API endpoints for B2B
 */
class OAuth extends BaseApiClient
{
    /**
     * Login with Google
     * 
     * @param array $data OAuth data
     * @return array
     */
    public function loginWithGoogle(array $data): array
    {
        return $this->post('/v1/b2b/oauth/google/start', $data);
    }

    /**
     * Login with Microsoft
     * 
     * @param array $data OAuth data
     * @return array
     */
    public function loginWithMicrosoft(array $data): array
    {
        return $this->post('/v1/b2b/oauth/microsoft/start', $data);
    }

    /**
     * Authenticate OAuth
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/b2b/oauth/authenticate', $data);
    }

    /**
     * Use Google for discovery
     * 
     * @param array $data Discovery data
     * @return array
     */
    public function useGoogleForDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/oauth/discovery/google/start', $data);
    }

    /**
     * Use Microsoft for discovery
     * 
     * @param array $data Discovery data
     * @return array
     */
    public function useMicrosoftForDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/oauth/discovery/microsoft/start', $data);
    }

    /**
     * Authenticate discovery OAuth
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticateDiscovery(array $data): array
    {
        return $this->post('/v1/b2b/oauth/discovery/authenticate', $data);
    }
} 