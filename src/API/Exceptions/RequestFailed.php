<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\API\Exceptions;

use Maccath\GrowVeg\Exceptions\Exception;
use RuntimeException;

class RequestFailed extends RuntimeException implements Exception
{
}
