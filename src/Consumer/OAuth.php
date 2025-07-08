<?php

namespace Stytch\Consumer;

use Stytch\BaseApiClient;

/**
 * OAuth API endpoints for Consumer
 */
class OAuth extends BaseApiClient
{
    /**
     * Attach OAuth provider
     * 
     * @param array $data OAuth data
     * @return array
     */
    public function attach(array $data): array
    {
        return $this->post('/v1/oauth/attach', $data);
    }

    /**
     * Authenticate OAuth
     * 
     * @param array $data Authentication data
     * @return array
     */
    public function authenticate(array $data): array
    {
        return $this->post('/v1/oauth/authenticate', $data);
    }

    // Provider-specific methods
    public function google(array $data): array
    {
        return $this->post('/v1/oauth/google/start', $data);
    }

    public function amazon(array $data): array
    {
        return $this->post('/v1/oauth/amazon/start', $data);
    }

    public function apple(array $data): array
    {
        return $this->post('/v1/oauth/apple/start', $data);
    }

    public function bitbucket(array $data): array
    {
        return $this->post('/v1/oauth/bitbucket/start', $data);
    }

    public function coinbase(array $data): array
    {
        return $this->post('/v1/oauth/coinbase/start', $data);
    }

    public function discord(array $data): array
    {
        return $this->post('/v1/oauth/discord/start', $data);
    }

    public function facebook(array $data): array
    {
        return $this->post('/v1/oauth/facebook/start', $data);
    }

    public function figma(array $data): array
    {
        return $this->post('/v1/oauth/figma/start', $data);
    }

    public function github(array $data): array
    {
        return $this->post('/v1/oauth/github/start', $data);
    }

    public function gitlab(array $data): array
    {
        return $this->post('/v1/oauth/gitlab/start', $data);
    }

    public function linkedin(array $data): array
    {
        return $this->post('/v1/oauth/linkedin/start', $data);
    }

    public function microsoft(array $data): array
    {
        return $this->post('/v1/oauth/microsoft/start', $data);
    }

    public function salesforce(array $data): array
    {
        return $this->post('/v1/oauth/salesforce/start', $data);
    }

    public function slack(array $data): array
    {
        return $this->post('/v1/oauth/slack/start', $data);
    }

    public function snapchat(array $data): array
    {
        return $this->post('/v1/oauth/snapchat/start', $data);
    }

    public function tiktok(array $data): array
    {
        return $this->post('/v1/oauth/tiktok/start', $data);
    }

    public function twitch(array $data): array
    {
        return $this->post('/v1/oauth/twitch/start', $data);
    }

    public function twitter(array $data): array
    {
        return $this->post('/v1/oauth/twitter/start', $data);
    }

    public function yahoo(array $data): array
    {
        return $this->post('/v1/oauth/yahoo/start', $data);
    }
} 