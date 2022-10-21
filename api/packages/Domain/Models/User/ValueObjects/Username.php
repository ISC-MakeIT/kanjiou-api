<?php

namespace Packages\Domain\Models\User\ValueObjects;

use Packages\Domain\Models\StringLengthLimit;

final class Username extends StringLengthLimit
{
    protected int $lengthLimit = 50;
}
