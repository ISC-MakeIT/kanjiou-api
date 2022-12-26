<?php

namespace Packages\Domain\Rank\ValueObjects;

use Packages\Domain\PositiveNumber;

final class RankOrder extends PositiveNumber {
    protected string $name = '順位';
}
