<?php

namespace Packages\Domain\Models;

use Packages\Domain\Exceptions\InvariantException;

abstract class PositiveNumber
{
	protected int $value;

	protected function __construct(int $value)
	{
		if ($value < 0) {
			throw new InvariantException('value must be positive number:'.$value);
		}
		$this->value = $value;
	}

	public function value(): int
	{
		return $this->value;
	}

	public static function of(int $value = 0): static
	{
		return new static($value);
	}
}
