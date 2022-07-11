<?php

namespace Packages\Domain\Models\User\ValueObjects;

use Packages\Domain\Models\StringLengthLimit;

final class Password extends StringLengthLimit
{
    protected int $lengthLimit = 254;
}
