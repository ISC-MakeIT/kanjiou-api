<?php

namespace Packages\Domain\Models\TimeLimit\ValueObjects;

use Packages\Domain\Models\StringLengthLimit;

final class Name extends StringLengthLimit
{
    protected int $lengthLimit = 8;
    protected string $name = '名前';
}
