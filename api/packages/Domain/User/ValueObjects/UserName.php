<?php

namespace Packages\Domain\User\ValueObjects;

use Packages\Domain\StringBetweenLimit;

final class UserName extends StringBetweenLimit {
    protected int $lengthMaximum = 255;
    protected string $name       = 'ユーザー名';
}
