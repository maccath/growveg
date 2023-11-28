<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Tests\Exceptions;

use Maccath\GrowVeg\Exceptions\Exception;
use PHPUnit\Framework\TestCase;
use Throwable;

class ExceptionTest extends TestCase
{
    public function testExists(): void
    {
        $this->assertTrue(interface_exists(Exception::class));
        $this->assertInstanceOf(Throwable::class, $this->createMock(Exception::class));
    }
}
