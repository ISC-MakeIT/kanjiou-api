<?php

namespace Packages\Domain\Rank\ValueObjects;

use Packages\Domain\PositiveNumber;

final class RankOrder extends PositiveNumber {
    protected string $name = '順位';

    public function isEmpty(): bool {
        return $this->value() === 0;
    }
}
