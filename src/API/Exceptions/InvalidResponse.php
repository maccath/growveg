<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\API\Exceptions;

use Maccath\GrowVeg\Exceptions\Exception;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use UnexpectedValueException;

class InvalidResponse extends UnexpectedValueException implements Exception
{
    public function __construct(
        private readonly ResponseInterface $response,
        string $message = '',
        ?Throwable $previous = null
    ) {
        parent::__construct(
            $message ?: $previous?->getMessage() ?? '',
            $previous?->getCode() ?? $this->response->getStatusCode(),
            $previous,
        );
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
