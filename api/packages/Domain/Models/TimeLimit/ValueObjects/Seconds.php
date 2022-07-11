<?php

namespace Packages\Domain\Models\TimeLimit\ValueObjects;

use Illuminate\Support\Facades\Validator;
use Packages\Domain\Models\PositiveNumber;

final class Seconds extends PositiveNumber
{
    protected function __construct(int $value)
    {
        Validator::make(
            ['seconds' => $value],
            ['seconds' => ['required', 'max:60']]
        );
        parent::__construct($value);
    }
}
