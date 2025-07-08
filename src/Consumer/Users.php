<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * Users API endpoints for Consumer
 */
class Users extends BaseApiClient
{
    /**
     * Create user
     * 
     * @param array $data User data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->post('/v1/users', $data);
    }

    /**
     * Search users
     * 
     * @param array $data Search parameters
     * @return array
     */
    public function search(array $data = []): array
    {
        return $this->post('/v1/users/search', $data);
    }

    /**
     * Get user
     * 
     * @param string $userId User ID
     * @return array
     */
    public function getUser(string $userId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id', [
            'user_id' => $userId
        ]);
        return $this->get($endpoint);
    }

    /**
     * Update user
     * 
     * @param string $userId User ID
     * @param array $data Update data
     * @return array
     */
    public function update(string $userId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id', [
            'user_id' => $userId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Exchange primary factor
     * 
     * @param string $userId User ID
     * @param array $data Exchange data
     * @return array
     */
    public function exchangePrimaryFactor(string $userId, array $data): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/primary_factor', [
            'user_id' => $userId
        ]);
        return $this->put($endpoint, $data);
    }

    /**
     * Delete user
     * 
     * @param string $userId User ID
     * @return array
     */
    public function deleteUser(string $userId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id', [
            'user_id' => $userId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user email
     * 
     * @param string $userId User ID
     * @param string $emailId Email ID
     * @return array
     */
    public function deleteEmail(string $userId, string $emailId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/emails/:email_id', [
            'user_id' => $userId,
            'email_id' => $emailId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user phone number
     * 
     * @param string $userId User ID
     * @param string $phoneId Phone ID
     * @return array
     */
    public function deletePhone(string $userId, string $phoneId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/phone_numbers/:phone_id', [
            'user_id' => $userId,
            'phone_id' => $phoneId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user WebAuthn registration
     * 
     * @param string $userId User ID
     * @param string $webauthnRegistrationId WebAuthn registration ID
     * @return array
     */
    public function deleteWebAuthnRegistration(string $userId, string $webauthnRegistrationId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/webauthn_registrations/:webauthn_registration_id', [
            'user_id' => $userId,
            'webauthn_registration_id' => $webauthnRegistrationId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user biometric registration
     * 
     * @param string $userId User ID
     * @param string $biometricRegistrationId Biometric registration ID
     * @return array
     */
    public function deleteBiometricRegistration(string $userId, string $biometricRegistrationId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/biometric_registrations/:biometric_registration_id', [
            'user_id' => $userId,
            'biometric_registration_id' => $biometricRegistrationId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user TOTP
     * 
     * @param string $userId User ID
     * @param string $totpId TOTP ID
     * @return array
     */
    public function deleteTOTP(string $userId, string $totpId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/totps/:totp_id', [
            'user_id' => $userId,
            'totp_id' => $totpId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user crypto wallet
     * 
     * @param string $userId User ID
     * @param string $cryptoWalletId Crypto wallet ID
     * @return array
     */
    public function deleteCryptoWallet(string $userId, string $cryptoWalletId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/crypto_wallets/:crypto_wallet_id', [
            'user_id' => $userId,
            'crypto_wallet_id' => $cryptoWalletId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user password
     * 
     * @param string $userId User ID
     * @return array
     */
    public function deletePassword(string $userId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/passwords', [
            'user_id' => $userId
        ]);
        return $this->delete($endpoint);
    }

    /**
     * Delete user OAuth registration
     * 
     * @param string $userId User ID
     * @param string $oauthRegistrationId OAuth registration ID
     * @return array
     */
    public function deleteOAuthRegistration(string $userId, string $oauthRegistrationId): array
    {
        $endpoint = $this->buildUrl('/v1/users/:user_id/oauth_registrations/:oauth_registration_id', [
            'user_id' => $userId,
            'oauth_registration_id' => $oauthRegistrationId
        ]);
        return $this->delete($endpoint);
    }
} 