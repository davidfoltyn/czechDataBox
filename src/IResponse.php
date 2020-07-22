<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox;

abstract class IResponse
{

	abstract public function getStatus(): IResponseStatus;

}
