<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Tests\API\Exceptions;

use Maccath\GrowVeg\API\Exceptions\RequestFailed;
use Maccath\GrowVeg\Exceptions\Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class RequestFailedTest extends TestCase
{
    public function testExists(): void
    {
        $exception = new RequestFailed();

        $this->assertInstanceOf(Exception::class, $exception);
        $this->assertInstanceOf(RuntimeException::class, $exception);
    }

    public function testMessage(): void
    {
        $exception = new RequestFailed('Oops.');

        $this->assertSame('Oops.', $exception->getMessage());
        $this->assertSame(0, $exception->getCode());
    }

    public function testEmptyMessageWithPrevious(): void
    {
        $previous = new RuntimeException('Something bad happened.', 111);
        $exception = new RequestFailed('', 111, $previous);

        $this->assertSame($previous, $exception->getPrevious());
        $this->assertSame('', $exception->getMessage());
        $this->assertSame(111, $exception->getCode());
    }
}
