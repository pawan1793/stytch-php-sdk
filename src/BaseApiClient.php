<?php

namespace Stytch;

use Stytch\Exceptions\StytchError;
use Stytch\Exceptions\StytchException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Base API client with common HTTP request functionality
 */
abstract class BaseApiClient
{
    protected \GuzzleHttp\Client $httpClient;
    protected array $config;

    public function __construct(\GuzzleHttp\Client $httpClient, array $config)
    {
        $this->httpClient = $httpClient;
        $this->config = $config;
    }

    /**
     * Make a GET request
     */
    protected function get(string $endpoint, array $params = []): array
    {
        return $this->request('GET', $endpoint, ['query' => $params]);
    }

    /**
     * Make a POST request
     */
    protected function post(string $endpoint, array $data = []): array
    {
        return $this->request('POST', $endpoint, ['json' => $data]);
    }

    /**
     * Make a PUT request
     */
    protected function put(string $endpoint, array $data = []): array
    {
        return $this->request('PUT', $endpoint, ['json' => $data]);
    }

    /**
     * Make a DELETE request
     */
    protected function delete(string $endpoint, array $params = []): array
    {
        return $this->request('DELETE', $endpoint, ['query' => $params]);
    }

    /**
     * Make an HTTP request
     */
    protected function request(string $method, string $endpoint, array $options = []): array
    {
        try {
            $response = $this->httpClient->request($method, $endpoint, $options);
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new StytchException('Invalid JSON response from Stytch API');
            }

            // Check for API errors
            if (isset($data['error'])) {
                throw StytchError::fromResponse($data, $response->getStatusCode());
            }

            return $data;

        } catch (GuzzleException $e) {
            $response = $e->hasResponse() ? $e->getResponse() : null;
            $statusCode = $response ? $response->getStatusCode() : 0;
            $body = $response ? $response->getBody()->getContents() : '';

            if ($body) {
                $data = json_decode($body, true);
                if (isset($data['error'])) {
                    throw StytchError::fromResponse($data, $statusCode);
                }
            }

            throw new StytchException(
                'HTTP request failed: ' . $e->getMessage(),
                $statusCode,
                $e
            );
        }
    }

    /**
     * Build URL with path parameters
     */
    protected function buildUrl(string $endpoint, array $pathParams = []): string
    {
        foreach ($pathParams as $key => $value) {
            $endpoint = str_replace(':' . $key, $value, $endpoint);
        }
        return $endpoint;
    }
} 