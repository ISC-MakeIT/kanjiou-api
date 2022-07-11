<?php

namespace Packages\Domain\Models;

use Packages\Domain\Exceptions\InvariantException;

abstract class StringLengthLimit
{
	protected int $lengthLimit;
	protected string $value;

	protected function __construct(string $value)
	{
		if ($this->lengthLimit < mb_strlen($value)) {
			throw new InvariantException('value length must be less then or equals to '.$this->lengthLimit.' characters:'.$value);
		}
		$this->value = $value;
	}

	public function value(): string
	{
		return $this->value;
	}

	public static function of(string $value = ''): static
	{
		return new static($value);
	}
}
