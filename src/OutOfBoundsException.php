<?php declare(strict_types = 1);

namespace WebChemistry\Exceptions;

use Throwable;
use WebChemistry\Exceptions\Helper\DidYouMeanSuggester;

/**
 * An OutOfBoundsException should be thrown if a value is not a valid key.
 *
 * If you are dealing with an integer index that is out of bounds then you should use the next exception: OutOfRangeException.
 */
class OutOfBoundsException extends \OutOfBoundsException
{

	/**
	 * @param mixed[] $array
	 */
	public function __construct(string|int $index, array $array = [], int $code = 0, ?Throwable $previous = null)
	{
		parent::__construct(
			sprintf('Undefined index "%s"', $index) . DidYouMeanSuggester::didYouMean($array, $index),
			$code,
			$previous
		);
	}

}
