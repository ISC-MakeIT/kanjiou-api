<?php

namespace Packages\Domain\Models\TimeLimit\ValueObjects;

use Illuminate\Support\Facades\Validator;
use Packages\Domain\Models\StringLengthLimit;

final class Name extends StringLengthLimit
{
    protected int $lengthLimit = 8;

    protected function __construct(string $value)
    {
        Validator::make(
            ['name' => $value],
            ['name' => ['required']]
        );
        parent::__construct($value);
    }
}
