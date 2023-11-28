<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\API\Exceptions;

use Maccath\GrowVeg\Exceptions\Exception;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Throwable;

class BadResponse extends RuntimeException implements Exception
{
    public function __construct(
        private readonly ResponseInterface $response,
        ?Throwable $previous = null
    ) {
        $reason = $this->response->getReasonPhrase() ?: 'no reason given';
        $message = sprintf('Bad response returned by API: %s', $reason);

        parent::__construct($message, $this->response->getStatusCode(), $previous);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
