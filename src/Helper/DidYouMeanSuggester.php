<?php declare(strict_types = 1);

namespace WebChemistry\Exceptions\Helper;

use Nette\Utils\Helpers;
use Stringable;

final class DidYouMeanSuggester
{

	/**
	 * @param mixed[] $possibilities
	 */
	public static function didYouMean(array $possibilities, string|int $value): string
	{
		if (is_int($value)) {
			return '.';
		}

		$suggestion = Helpers::getSuggestion(self::filterPossibilities($possibilities), $value);

		if (!$suggestion) {
			return '.';
		}

		return sprintf(', did you mean "%s"?', $suggestion);
	}

	/**
	 * @param mixed[] $array
	 * @return string[]
	 */
	private static function filterPossibilities(array $array): array
	{
		$return = [];

		foreach ($array as $value) {
			if (is_string($value) || $value instanceof Stringable) {
				$return[] = (string) $value;
			}
		}

		return $return;
	}

}
