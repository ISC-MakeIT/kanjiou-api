<?php

namespace Packages\Domain\Rank\ValueObjects;

use Packages\Domain\PositiveNumber;

final class SearchRankCount extends PositiveNumber {
    protected string $name = '絞り込み用取得ランク数';

    public function toParams(): string {
        return '&rankCount=' . $this->value;
    }

    public static function elseDefaultHundredValue($value): SearchRankCount {
        if (!$value) {
            return SearchRankCount::from(100);
        }

        return SearchRankCount::from($value);
    }
}
