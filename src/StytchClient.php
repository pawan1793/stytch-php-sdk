<?php

namespace Stytch;

use Stytch\B2B\B2BClient;
use Stytch\Consumer\ConsumerClient;
use Stytch\Exceptions\StytchException;

/**
 * Main Stytch client for accessing B2B and Consumer APIs
 */
class StytchClient
{
    public B2BClient $b2b;
    public ConsumerClient $consumer;
    
    private array $config;
    private \GuzzleHttp\Client $httpClient;

    /**
     * Initialize the Stytch client
     * 
     * @param array $config Configuration options
     * @throws StytchException
     */
    public function __construct(array $config = [])
    {
        $this->config = $this->validateConfig($config);
        $this->httpClient = $this->createHttpClient();
        
        // Initialize B2B and Consumer clients
        $this->b2b = new B2BClient($this->httpClient, $this->config);
        $this->consumer = new ConsumerClient($this->httpClient, $this->config);
    }

    /**
     * Validate and merge configuration
     */
    private function validateConfig(array $config): array
    {
        $defaults = [
            'project_id' => $_ENV['STYTCH_PROJECT_ID'] ?? null,
            'secret' => $_ENV['STYTCH_SECRET'] ?? null,
            'env' => $_ENV['STYTCH_ENV'] ?? 'test',
            'timeout' => 30,
            'user_agent' => 'Stytch-PHP-SDK/1.0',
        ];

        $config = array_merge($defaults, $config);

        if (empty($config['project_id'])) {
            throw new StytchException('Project ID is required');
        }

        if (empty($config['secret'])) {
            throw new StytchException('Secret key is required');
        }

        if (!in_array($config['env'], ['test', 'live'])) {
            throw new StytchException('Environment must be either "test" or "live"');
        }

        return $config;
    }

    /**
     * Create HTTP client with proper configuration
     */
    private function createHttpClient(): \GuzzleHttp\Client
    {
        $baseUrl = $this->config['env'] === 'live' 
            ? 'https://api.stytch.com' 
            : 'https://test.stytch.com';

        return new \GuzzleHttp\Client([
            'base_uri' => $baseUrl,
            'timeout' => $this->config['timeout'],
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->config['project_id'] . ':' . $this->config['secret']),
                'Content-Type' => 'application/json',
                'User-Agent' => $this->config['user_agent'],
            ],
        ]);
    }

    /**
     * Get the current configuration
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Get the HTTP client instance
     */
    public function getHttpClient(): \GuzzleHttp\Client
    {
        return $this->httpClient;
    }
} 