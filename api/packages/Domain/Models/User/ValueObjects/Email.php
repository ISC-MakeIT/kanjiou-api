<?php

namespace Packages\Domain\Models\User\ValueObjects;

use Illuminate\Support\Facades\Validator;
use Packages\Domain\Models\StringLengthLimit;

final class Email extends StringLengthLimit
{
    protected int $lengthLimit = 254;

    protected function __construct(string $value)
    {
        Validator::make(
            ['email' => $value],
            ['email' => ['email']]
        );
        parent::__construct($value);
    }
}
