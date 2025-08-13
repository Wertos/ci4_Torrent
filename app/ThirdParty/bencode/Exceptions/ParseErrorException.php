<?php

declare(strict_types=1);

namespace Arokettu\Bencode\Exceptions;

use UnexpectedValueException;

final class ParseErrorException extends UnexpectedValueException implements BencodeException
{
}
