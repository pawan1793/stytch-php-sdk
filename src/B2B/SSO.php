<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * SSO API endpoints for B2B
 */
class SSO extends BaseApiClient
{
    /**
     * Create SAML connection
     * 
     * @param array $data SAML connection data
     * @return array
     */
    public function createSAMLConnection(array $data): array
    {
        return $this->post('/v1/b2b/sso/saml/connections', $data);
    }

    /**
     * Update SAML connection
     * 
     * @param string $connectionId Connection ID
     * @param array $data Update data
     * @return array
     */
    public function updateSAMLConnection(string $connectionId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/sso/saml/connections/:connection_id', [
            'connection_id' => $connectionId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Update SAML connection by metadata URL
     * 
     * @param string $connectionId Connection ID
     * @param array $data Metadata URL data
     * @return array
     */
    public function updateSAMLConnectionByMetadataURL(string $connectionId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/sso/saml/connections/:connection_id/metadata_url', [
            'connection_id' => $connectionId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Create OIDC connection
     * 
     * @param array $data OIDC connection data
     * @return array
     */
    public function createOIDCConnection(array $data): array
    {
        return $this->post('/v1/b2b/sso/oidc/connections', $data);
    }

    /**
     * Update OIDC connection
     * 
     * @param string $connectionId Connection ID
     * @param array $data Update data
     * @return array
     */
    public function updateOIDCConnection(string $connectionId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/sso/oidc/connections/:connection_id', [
            'connection_id' => $connectionId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Get SSO connections
     * 
     * @param string $organizationId Organization ID
     * @return array
     */
    public function getConnections(string $organizationId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/sso/connections', [
            'organization_id' => $organizationId
        ]);
        return $this->get($endpoint);
    }

    /**
     * Delete SSO connection
     * 
     * @param string $connectionId Connection ID
     * @return array
     */
    public function deleteConnection(string $connectionId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/sso/connections/:connection_id', [
            'connection_id' => $connectionId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Start SSO authentication
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function startAuthentication(array $data): array
    {
        return $this->post('/v1/b2b/sso/start', $data);
    }

    /**
     * Complete SSO authentication
     * 
     * @param array $data Completion data
     * @return array
     */
    public function completeAuthentication(array $data): array
    {
        return $this->post('/v1/b2b/sso/complete', $data);
    }

    /**
     * Delete SAML verification certificate
     * 
     * @param string $connectionId Connection ID
     * @param string $certificateId Certificate ID
     * @return array
     */
    public function deleteSAMLVerificationCertificate(string $connectionId, string $certificateId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/sso/saml/connections/:connection_id/verification_certificates/:certificate_id', [
            'connection_id' => $connectionId,
            'certificate_id' => $certificateId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Create external connection
     * 
     * @param array $data External connection data
     * @return array
     */
    public function createExternalConnection(array $data): array
    {
        return $this->post('/v1/b2b/sso/external/connections', $data);
    }

    /**
     * Update external connection
     * 
     * @param string $connectionId Connection ID
     * @param array $data Update data
     * @return array
     */
    public function updateExternalConnection(string $connectionId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/sso/external/connections/:connection_id', [
            'connection_id' => $connectionId
        ]);
        return $this->put($endpoint, $data);
    }
} 