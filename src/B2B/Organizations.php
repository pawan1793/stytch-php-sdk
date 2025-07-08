<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Organizations API endpoints
 */
class Organizations extends BaseApiClient
{
    /**
     * Create an organization
     * 
     * @param array $data Organization data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->post('/v1/b2b/organizations', $data);
    }

    /**
     * Get an organization by ID
     * 
     * @param string $organizationId Organization ID
     * @return array
     */
    public function getOrganization(string $organizationId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id', [
            'organization_id' => $organizationId
        ]);
        return $this->get($endpoint);
    }

    /**
     * Update an organization
     * 
     * @param string $organizationId Organization ID
     * @param array $data Update data
     * @return array
     */
    public function update(string $organizationId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id', [
            'organization_id' => $organizationId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Search for organizations
     * 
     * @param array $data Search parameters
     * @return array
     */
    public function search(array $data = []): array
    {
        return $this->post('/v1/b2b/organizations/search', $data);
    }

    /**
     * Delete an organization
     * 
     * @param string $organizationId Organization ID
     * @return array
     */
    public function deleteOrganization(string $organizationId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id', [
            'organization_id' => $organizationId
        ]);
        return $this->delete($endpoint);
    }
} 