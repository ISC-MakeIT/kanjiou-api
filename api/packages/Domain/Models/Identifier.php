<?php

namespace Packages\Domain\Models;

abstract class Identifier
{
	protected int $value;

	private function __construct(int $value)
	{
		$this->value = $value;
	}

	public function value(): int
	{
		return $this->value;
	}

	public static function of(int $value): Identifier
	{
		return new static($value);
	}
}
