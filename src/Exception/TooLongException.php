<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Exception;

use Exception;

class TooLongException extends Exception
{

	public function __construct(string $value, int $maxChars)
	{
		parent::__construct(sprintf('The value "%s" is too long. Accepted is %d chars', $value, $maxChars));
	}

}
