<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * RBAC API endpoints
 */
class RBAC extends BaseApiClient
{
    /**
     * Get RBAC policy
     * 
     * @param string $organizationId Organization ID
     * @return array
     */
    public function getPolicy(string $organizationId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/rbac_policy', [
            'organization_id' => $organizationId
        ]);
        return $this->get($endpoint);
    }
} 