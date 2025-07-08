<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * M2M API endpoints for B2B
 */
class M2M extends BaseApiClient
{
    /**
     * Get access token
     * 
     * @param array $data Token data
     * @return array
     */
    public function getAccessToken(array $data): array
    {
        return $this->post('/v1/b2b/m2m/clients/access_token', $data);
    }

    /**
     * Create M2M client
     * 
     * @param array $data Client data
     * @return array
     */
    public function createClient(array $data): array
    {
        return $this->post('/v1/b2b/m2m/clients', $data);
    }

    /**
     * Get M2M client
     * 
     * @param string $clientId Client ID
     * @return array
     */
    public function getClient(string $clientId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/m2m/clients/:client_id', [
            'client_id' => $clientId
        ]);
        return $this->get($endpoint);
    }

    /**
     * Search M2M clients
     * 
     * @param array $data Search parameters
     * @return array
     */
    public function searchClients(array $data = []): array
    {
        return $this->post('/v1/b2b/m2m/clients/search', $data);
    }

    /**
     * Update M2M client
     * 
     * @param string $clientId Client ID
     * @param array $data Update data
     * @return array
     */
    public function updateClient(string $clientId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/m2m/clients/:client_id', [
            'client_id' => $clientId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Start secret rotation
     * 
     * @param string $clientId Client ID
     * @return array
     */
    public function startSecretRotation(string $clientId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/m2m/clients/:client_id/secret/rotate/start', [
            'client_id' => $clientId
        ]);
        return $this->post($endpoint);
    }

    /**
     * Rotate secret
     * 
     * @param string $clientId Client ID
     * @param array $data Rotation data
     * @return array
     */
    public function rotateSecret(string $clientId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/m2m/clients/:client_id/secret/rotate', [
            'client_id' => $clientId
        ]);
        return $this->post($endpoint, $data);
    }

    /**
     * Cancel secret rotation
     * 
     * @param string $clientId Client ID
     * @return array
     */
    public function cancelSecretRotation(string $clientId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/m2m/clients/:client_id/secret/rotate/cancel', [
            'client_id' => $clientId
        ]);
        return $this->post($endpoint);
    }

    /**
     * Delete M2M client
     * 
     * @param string $clientId Client ID
     * @return array
     */
    public function deleteClient(string $clientId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/m2m/clients/:client_id', [
            'client_id' => $clientId
        ]);
        return $this->delete($endpoint);
    }
} 