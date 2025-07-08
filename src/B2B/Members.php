<?php

namespace Stytch\B2B;

use Stytch\BaseApiClient;

/**
 * Members API endpoints
 */
class Members extends BaseApiClient
{
    /**
     * Create a member
     * 
     * @param string $organizationId Organization ID
     * @param array $data Member data
     * @return array
     */
    public function create(string $organizationId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members', [
            'organization_id' => $organizationId
        ]);
        return $this->post($endpoint, $data);
    }

    /**
     * Get a member
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @return array
     */
    public function getMember(string $organizationId, string $memberId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->get($endpoint);
    }

    /**
     * Get a member (dangerous - includes sensitive data)
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @return array
     */
    public function getDangerous(string $organizationId, string $memberId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id/dangerous', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->get($endpoint);
    }

    /**
     * Update a member
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @param array $data Update data
     * @return array
     */
    public function update(string $organizationId, string $memberId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Reactivate a member
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @return array
     */
    public function reactivate(string $organizationId, string $memberId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id/reactivate', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->post($endpoint);
    }

    /**
     * Search for members
     * 
     * @param string $organizationId Organization ID
     * @param array $data Search parameters
     * @return array
     */
    public function search(string $organizationId, array $data = []): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/search', [
            'organization_id' => $organizationId
        ]);
        return $this->post($endpoint, $data);
    }

    /**
     * Unlink a member's retired email
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @param array $data Unlink data
     * @return array
     */
    public function unlinkRetiredEmail(string $organizationId, string $memberId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id/unlink_retired_email', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->post($endpoint, $data);
    }

    /**
     * Delete a member
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @return array
     */
    public function deleteMember(string $organizationId, string $memberId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete member password
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @return array
     */
    public function deletePassword(string $organizationId, string $memberId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id/passwords', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete member MFA phone number
     * 
     * @param string $organizationId Organization ID
     * @param string $memberId Member ID
     * @return array
     */
    public function deleteMFAPhone(string $organizationId, string $memberId): array
    {
        $endpoint = $this->buildUrl('/v1/b2b/organizations/:organization_id/members/:member_id/mfa_phone_numbers', [
            'organization_id' => $organizationId,
            'member_id' => $memberId
        ]);
        return $this->delete($endpoint);
    }
} 