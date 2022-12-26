<?php

namespace Packages\Domain\Record\ValueObjects;

use Packages\Domain\StringBetweenLimit;

final class Name extends StringBetweenLimit {
    protected int $lengthMaximum = 8;
    protected string $name       = '名前';
}
