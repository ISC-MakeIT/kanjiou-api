<?php

namespace Packages\Domain\Models;

use Illuminate\Support\Facades\Validator;

abstract class StringLengthLimit
{
	protected int $lengthLimit;
	protected string $value;
    protected string $name;

	protected function __construct(string $value)
	{
        Validator::make(
            ['name' => $value],
            ['name' => ["max:{$this->lengthLimit}"]]
        )->validate();
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
