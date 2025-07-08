<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Discovery API endpoints for B2B
 */
class Discovery extends BaseApiClient
{
    /**
     * List discovered organizations
     * 
     * @param array $data Discovery data
     * @return array
     */
    public function listOrganizations(array $data): array
    {
        return $this->post('/v1/b2b/discovery/organizations', $data);
    }

    /**
     * Create organization via discovery
     * 
     * @param array $data Organization data
     * @return array
     */
    public function createOrganization(array $data): array
    {
        return $this->post('/v1/b2b/discovery/organizations/create', $data);
    }

    /**
     * Exchange intermediate session
     * 
     * @param array $data Exchange data
     * @return array
     */
    public function exchangeIntermediateSession(array $data): array
    {
        return $this->post('/v1/b2b/discovery/intermediate_sessions/exchange', $data);
    }
} 