<?php declare(strict_types = 1);

namespace WebChemistry\Exceptions;

use Throwable;

/**
 * This is similar to OutOfBoundsException but should be used for array indexes (integers) that are not valid.
 */
class OutOfRangeException extends \OutOfRangeException
{

	public function __construct(int $requested, ?int $maxLength = null, int $code = 0, ?Throwable $previous = null)
	{
		parent::__construct(sprintf('%d is out of range', $requested) . self::maximum($maxLength), $code, $previous);
	}

	private static function maximum(?int $maxLength): string
	{
		if (!$maxLength) {
			return '.';
		}

		return sprintf(', maximum is %d.', $maxLength);
	}

}
