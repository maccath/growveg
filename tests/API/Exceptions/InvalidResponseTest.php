<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Tests\API\Exceptions;

use Alexanderpas\Common\HTTP\StatusCode;
use Maccath\GrowVeg\API\Exceptions\InvalidResponse;
use Maccath\GrowVeg\Exceptions\Exception;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use UnexpectedValueException;

class InvalidResponseTest extends TestCase
{
    private Psr17Factory $psrFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->psrFactory = new Psr17Factory();
    }

    public function testExists(): void
    {
        $response = $this->psrFactory->createResponse(StatusCode::HTTP_500->value);
        $exception = new InvalidResponse($response);

        $this->assertInstanceOf(Exception::class, $exception);
        $this->assertInstanceOf(RuntimeException::class, $exception);
        $this->assertInstanceOf(UnexpectedValueException::class, $exception);
        $this->assertSame($response, $exception->getResponse());
    }

    public function testMessage(): void
    {
        $response = $this->psrFactory->createResponse(StatusCode::HTTP_500->value);
        $exception = new InvalidResponse($response, 'Invalid data returned by API.');

        $this->assertSame('Invalid data returned by API.', $exception->getMessage());
        $this->assertSame(500, $exception->getCode());
    }

    public function testEmptyMessageWithPrevious(): void
    {
        $response = $this->psrFactory->createResponse(StatusCode::HTTP_500->value);
        $previous = new RuntimeException('Something bad happened.', 111);
        $exception = new InvalidResponse($response, '', $previous);

        $this->assertSame($previous, $exception->getPrevious());
        $this->assertSame('Something bad happened.', $exception->getMessage());
        $this->assertSame(111, $exception->getCode());
    }
}
