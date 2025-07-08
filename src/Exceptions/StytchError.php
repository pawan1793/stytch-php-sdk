<?php

namespace Stytch\Exceptions;

/**
 * Exception thrown when Stytch API returns an error
 */
class StytchError extends StytchException
{
    private string $errorCode;
    private string $errorType;
    private array $errorDetails;

    public function __construct(
        string $message,
        string $errorCode,
        string $errorType = '',
        array $errorDetails = [],
        int $httpCode = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $httpCode, $previous);
        $this->errorCode = $errorCode;
        $this->errorType = $errorType;
        $this->errorDetails = $errorDetails;
    }

    /**
     * Get the Stytch error code
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * Get the error type
     */
    public function getErrorType(): string
    {
        return $this->errorType;
    }

    /**
     * Get additional error details
     */
    public function getErrorDetails(): array
    {
        return $this->errorDetails;
    }

    /**
     * Create from API response
     */
    public static function fromResponse(array $response, int $httpCode = 0): self
    {
        $error = $response['error'] ?? [];
        
        return new self(
            $error['error_message'] ?? 'Unknown error',
            $error['error_code'] ?? 'unknown_error',
            $error['error_type'] ?? '',
            $error['error_details'] ?? [],
            $httpCode
        );
    }
} 