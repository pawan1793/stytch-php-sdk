<?php

namespace Stytch\Exceptions;

/**
 * Base exception class for Stytch SDK
 */
class StytchException extends \Exception
{
    protected array $context = [];

    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null, array $context = [])
    {
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    /**
     * Get additional context information
     */
    public function getContext(): array
    {
        return $this->context;
    }
} 