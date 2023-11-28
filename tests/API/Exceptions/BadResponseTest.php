<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Tests\API\Exceptions;

use Alexanderpas\Common\HTTP\StatusCode;
use Maccath\GrowVeg\API\Exceptions\BadResponse;
use Maccath\GrowVeg\Exceptions\Exception;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class BadResponseTest extends TestCase
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
        $exception = new BadResponse($response);

        $this->assertInstanceOf(Exception::class, $exception);
        $this->assertInstanceOf(RuntimeException::class, $exception);
        $this->assertSame($response, $exception->getResponse());
    }

    public function testMessage(): void
    {
        $response = $this->psrFactory->createResponse(StatusCode::HTTP_500->value);
        $exception = new BadResponse($response);

        $this->assertSame('Bad response returned by API: Internal Server Error', $exception->getMessage());
        $this->assertSame(500, $exception->getCode());
    }

    public function testPrevious(): void
    {
        $response = $this->psrFactory->createResponse(StatusCode::HTTP_500->value);
        $previous = new RuntimeException('Something bad happened.');
        $exception = new BadResponse($response, $previous);

        $this->assertSame($previous, $exception->getPrevious());
    }
}
